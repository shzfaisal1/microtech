<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buyer;
use App\Models\ConsigneeName;
use  App\Models\Vendor;
use App\Models\Tax;
use Illuminate\Support\Facades\DB;
use  App\Models\CompanyDetail;
use App\Models\FinancialYear;
use App\Models\Calculation;
use App\Models\PurchaseInvoice;
use App\Models\make;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\Events\StockUpdateRequested;
class PurchaseInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Calculation::with(['vendor', 'buyer', 'consignee', 'financialYear', 'companyDetail']);

            // Apply filters
            if ($request->has('company_id') && $request->company_id != '') {
                $query->where('company_id', $request->company_id);
            }

            if ($request->has('financial_year') && $request->financial_year != '') {
                $query->where('financial_year', $request->financial_year);
            }

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('vendor_id', fn($row) => $row->vendor->name ?? '')
                ->addColumn('buyer_id', fn($row) => $row->buyer->buyer_name ?? '')
                ->addColumn('consignee_id', fn($row) => $row->consignee->name ?? '')
                ->addColumn('company_id', fn($row) => $row->companyDetail->company_name ?? '')
                ->addColumn('financial_year', fn($row) => $row->financialYear->financial_year ?? '')
                ->addColumn('action', function ($row) {
                    $editUrl = route('purchase-invoice.edit', $row->invoice_number);
                    $deleteUrl = route('purchase-invoice.delete', $row->invoice_number);
                    return '
                    <a href="javascript:void(0);" class="mr-1" data-id="' . $row->invoice_number  . '"><i class="fa fa-eye text-success" style="font-size:15px;"></i></a>
                    <a href="' . $editUrl . '" class="mr-1"><i class="fa fa-edit text-primary" style="font-size:15px;"></i></a>
                    <a href="' . $deleteUrl . '" onclick="return confirm(\'Are you sure?\');" class=""><i class="fa fa-trash text-danger" style="font-size:15px;"></i></a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // For initial page load
        $companies = CompanyDetail::all();
        $financialYears = FinancialYear::all();
        return view('masters.purchase.list', compact('companies', 'financialYears'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buyers = Buyer::all();
        $vendors = Vendor::all();
        $taxes = Tax::where('status', 1)->get();
        $companies = CompanyDetail::all();
        $consignees = ConsigneeName::all();
        $financial = FinancialYear::with('lut')->get();
         $makes = make::all();
         $po_no = $this->generateQuotationNumberInternal($financial->first()?->id);
        return view('masters.purchase.add', compact('makes','buyers', 'consignees', 'vendors', 'taxes', 'companies', 'financial','po_no'));
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{
 
    $validator = Validator::make($request->all(), [
        'invoice_number'        => 'nullable|string|max:191',
        'company_id'            => 'nullable|integer|exists:company_details,id',
        'financial_year_id'     => 'nullable|integer',
        'items'                 => 'nullable|array|min:1',
        'items.*.product_id'    => 'nullable|integer',
        'items.*.serial_no'     => 'nullable|string',
        'items.*.hsn_code'      => 'nullable|string',
        'items.*.price'         => 'nullable|numeric|min:0',
        'items.*.total_price'   => 'nullable|numeric|min:0',
        'items.*.stock_location' => 'nullable|string', // or string depending on your schema
        'Cal_data.taxable_amount' => 'nullable|numeric',
        // add other Cal_data validations as needed
    ]);

    if ($validator->fails()) {
        return response()->json(['status' => 'error', 'errors' => $validator->errors()], 422);
    }

    // 2) prepare commonly used values
    $invoice_number = $request->input('invoice_number');
    $items = $request->input('items', []);
    $company_id = $request->input('company_id');
    $Cal_data = $request->input('Cal_data', []);
    $currency = $request->input('currency_value', $request->input('currency'));
    $userId = auth()->id() ?? GetSession(); // prefer auth()->id()

    // array to collect inserted purchase invoice ids if needed
    $insertedInvoiceIds = [];

    // 3) Use transaction to ensure atomicity
    DB::beginTransaction();
    try {
        // insert calculation header and get id
        $cal_id = DB::table('calculations')->insertGetId([
            'company_id'        => $company_id,
            'financial_year'    => $request->input('financial_year_id'),
            'invoice_number'    => $invoice_number,
            'taxable_amount'    => $Cal_data['taxable_amount'] ?? 0,
            'invoice_date'      => $request->input('invoice_date'),
            'po_no'             => $request->input('po_number'),
            'inward_date'       => $request->input('inward_date'),
            'po_date'           => $request->input('po_date'),
            'duty_paid_date'    => $request->input('duty_paid_date'),
            'buyer_id'          => $request->input('buyer_id'),
            'consignee_id'      => $request->input('consignee_id'),
            'currency'          => $currency,
            'contact_person'    => $request->input('contact_person'),
            'contact_perso_phone' => $request->input('contact_person_phone'),
            'net_amount'        => $Cal_data['net_amount'] ?? 0,
            'packing'           => $Cal_data['packing'] ?? 0,
            'discount'          => $Cal_data['discount'] ?? 0,
            'tax_type1'         => $Cal_data['tax_type1'] ?? null,
            'tax_type1_value'   => $Cal_data['tax_type1_value'] ?? 0,
            'tax_type2'         => $Cal_data['tax_type2'] ?? null,
            'tax_type2_value'   => $Cal_data['tax_type2_value'] ?? 0,
            'total'             => $Cal_data['total'] ?? 0,
            'round_off'         => $Cal_data['round_off'] ?? 0,
            'advance'           => $Cal_data['advance'] ?? 0,
            'payable'           => $Cal_data['payable'] ?? 0,
            'tax1_amount'       => $Cal_data['tax1_amount'] ?? 0,
            'tax2_amount'       => $Cal_data['tax2_amount'] ?? 0,
            'vendor_id'         => $request->input('vendor_id'),
            'created_by'        => $userId,
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ]);

        // 4) Prepare bulk insert payload for purchase_invoices (better performance)
        $now = Carbon::now();
        $purchaseInvoicesPayload = [];
        $stockEventItems = []; // collect for stock update event

        foreach ($items as $item) {
       
            $price = (float) ($item['price'] ?? 0);
            $totalPrice = (float) ($item['total_price'] ?? ($price * ($item['qty'] ?? 1)));
            $convertedPrice = (float) ($item['converted_price'] ?? $price);

            $payload = [
                'cal_id'            => $cal_id,
                'company_id'        => $company_id,
                'financial_year_id' => $request->input('financial_year_id'),
                'buyer_id'          => $request->input('buyer_id'),
                'consignee_id'      => $request->input('consignee_id'),
                'vendor_id'         => $request->input('vendor_id'),
                'product_id'        => $item['product_id'],
                'serial_number'     => $item['serial_no'] ?? null,
                'HSN_code'          => $item['hsn_code'] ?? null,
                'HSN_value'         => $item['code'] ?? null,
                'stamp'             => $item['stamping'] ?? null,
                'condition'         => $item['condition'] ?? null,
                'vc_no'             => $item['vc_no'] ?? null,
                'vc_date'           => $item['vc_date'] ?? null,
                'stock_location'    => $item['stock_location'] ?? null,
                'po_no'             => $request->input('po_no') ?? $request->input('po_number'),
                'po_date'           => $request->input('po_date'),
                'price'             => $price,
                'inward_date'       => $request->input('inward_date'),
                'contact_person'    => $request->input('contact_person'),
                'duty_paid_date'    => $request->input('duty_paid_date'),
                'total'             => $totalPrice,
                'price_in_INR'      => $convertedPrice,
                'created_at'        => $now,
                'updated_at'        => $now,
                'created_by'        => $userId,
            ];

            $purchaseInvoicesPayload[] = $payload;

       
            $stockEventItems[] = [
                'make_id' => $item['product_id'] ?? null,    
                'model_id' => $item['model'] ?? null,
                'qty' => (float) ($item['quantity'] ?? 1),
            ];
        }

        if (!empty($purchaseInvoicesPayload)) {
            DB::table('purchase_invoices')->insert($purchaseInvoicesPayload);

      
        }

 
        DB::commit();

    
        if (!empty($stockEventItems)) {
            // stocked_by can include reference info
            $meta = [
                'reference_type' => 'purchase_invoice',
                'reference_id' => $cal_id,
                'reference_number' => $invoice_number,
            ];

            event(new StockUpdateRequested($stockEventItems, 'receive', $userId, $meta));
        }

        return response()->json(['status' => 'success', 'cal_id' => $cal_id], 201);
    } catch (\Throwable $ex) {
        DB::rollBack();
        // log error, return proper response
        \Log::error('Purchase invoice store failed: '.$ex->getMessage(), [
            'trace' => $ex->getTraceAsString(),
            'request' => $request->all()
        ]);
        return response()->json(['status' => 'error', 'message' => $ex->getMessage()], 500);
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $items = PurchaseInvoice::where('invoice_number', $id)->get();
      
        $invoice = Calculation::with(['vendor', 'buyer', 'consignee', 'financialYear', 'companyDetail'])
        ->where('invoice_number', $id)
        ->first();


            if (!$invoice) {

                return response()->json([
                    'status' => false,
                    'message' => 'Invoice not found'
                ]);
            }

            return response()->json([
                'status' => true,
                'invoice' => $invoice,
                'items' => $items
            ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $invoice = Calculation::where('invoice_number', $id)->first();
        $items = PurchaseInvoice::where('invoice_number', $id)->get();
        $vendors = Vendor::all();
        $taxes = Tax::all();
        $buyers = Buyer::all();
        $consignees = ConsigneeName::all();
        $vendors = Vendor::all();
        $companies = CompanyDetail::all();

        if (!$invoice) {
            return redirect()->back()->with('error', 'Invoice not found');
        }

        return view('masters.purchase.edit', compact('invoice', 'items', 'vendors', 'taxes', 'buyers', 'consignees', 'companies'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        if ($request->has('Cal_data')) {
            $cal = $request->input('Cal_data');
            $calculation = Calculation::where('invoice_number', $id)->first();
            if ($calculation) {
                $calculation->update([
                    'net_amount' => $cal['net_amount'],
                    'packing' => $cal['packing'],
                    'discount' => $cal['discount'],
                    'tax_type1' => $cal['tax_type1'],
                    'tax_type1_value' => $cal['tax_type1_value'],
                    'tax1_amount' => $cal['tax1_amount'],
                    'tax_type2' => $cal['tax_type2'],
                    'tax_type2_value' => $cal['tax_type2_value'],
                    'tax2_amount' => $cal['tax2_amount'],
                    'total' => $cal['total'],
                    'round_off' => $cal['round_off'],
                    'advance' => $cal['advance'],
                    'payable' => $cal['payable'],

                ]);
            }
        }


        if ($request->has('deleted_items')) {
            $deletedItems = $request->input('deleted_items');
            if (is_array($deletedItems) && !empty($deletedItems)) {
                PurchaseInvoice::whereIn('id', $deletedItems)->delete();
            }
        }


        if ($request->has('items')) {
            foreach ($request->items as $item) {

                if (!empty($item['id'])) {

                    PurchaseInvoice::where('id', $item['id'])->update([
                        'product_id' => $item['product_id'],
                        'serial_number' => $item['serial_no'],
                        'HSN_code' => $item['hsn_code'],
                        'stamp' => $item['stamping'],
                        'vc_no' => $item['vc_no'],
                        'vc_date' => $item['vc_date'],
                        'condition' => $item['condition'],
                        'stock_location' => $item['stock_location'],
                        'price' => $item['price'],
                        'price_in_INR' => $item['converted_price'],
                    ]);
                } else {

                    PurchaseInvoice::create([
                        'invoice_number' => $request->invoice_number,
                        'invoice_date' => $request->invoice_date,
                        'vendor_id' => $request->vendor_id,
                        'buyer_id' => $request->buyer_id,
                        'consignee_id' => $request->consignee_id,
                        'duty_paid_date' => $request->duty_paid_date,
                        'inward_date' => $request->inward_date,
                        'po_date' => $request->po_date,
                        'po_number' => $request->po_number,
                        'company_id' => $request->company_id,
                        'financial_year_id' => $request->financial_year_id,
                        'contact_person' => $request->contact_person,
                        'currency_value_id' => $request->currency_value,
                        'product_id' => $item['product_id'],
                        'serial_number' => $item['serial_no'],
                        'HSN_code' => $item['hsn_code'],
                        'stamp' => $item['stamping'],
                        'vc_no' => $item['vc_no'],
                        'vc_date' => $item['vc_date'],
                        'condition' => $item['condition'],
                        'stock_location' => $item['stock_location'],
                        'price' => $item['price'],
                        'price_in_INR' => $item['converted_price'],
                    ]);
                }
            }
        }

        return response()->json(['status' => true, 'message' => 'Invoice and Items updated']);
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $calculation = Calculation::where('invoice_number', $id)->first();
        if ($calculation) {
            $calculation->delete();
        }

        $purchaseInvoices = PurchaseInvoice::where('invoice_number', $id)->get();
        foreach ($purchaseInvoices as $invoice) {
            $invoice->delete();
        }

        return  redirect()->back()->with('success', 'Invoice deleted successfully');
    }

    public function search()
    {
        $companies = CompanyDetail::all();
        $vendors = Vendor::all();
        return view('masters.purchase.purchase_invoice_summary', compact('companies', 'vendors'));
    }

        public function vendors(Request $request){
            
            
            $vendors = DB::table('vendors')->where('id',$request->vendor_id)->first();
            return response() ->json($vendors);
        }
    public function getSummaryData(Request $request)
    {
        $query = DB::table('calculations')
            ->join('vendors', 'calculations.vendor_id', '=', 'vendors.id')
            ->join('buyers', 'calculations.buyer_id', '=', 'buyers.id')
            ->join('consignee_names', 'calculations.consignee_id', '=', 'consignee_names.id')
            ->join('financial_years', 'calculations.financial_year', '=', 'financial_years.id')
            ->join('company_details', 'calculations.company_id', '=', 'company_details.id')
            ->leftJoin('purchase_invoices', 'purchase_invoices.invoice_number', '=', 'calculations.invoice_number')
            ->select(
                'calculations.*',
                'company_details.company_name',
                'buyers.buyer_name',
                'purchase_invoices.serial_number as serial_no',
                'purchase_invoices.price',
                'purchase_invoices.price_in_INR',
            );


        if ($request->filled('company_id')) {
            $query->where('calculations.company_id', $request->company_id);
        }

        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('calculations.invoice_date', [$request->from_date, $request->to_date]);
        }

        if ($request->filled('make_id')) {
            $query->where('calculations.make_id', $request->make_id);
        }

        if ($request->filled('vendor_id')) {
            $query->where('calculations.vendor_id', $request->vendor_id);
        }

        if ($request->filled('search_condition')) {
            if ($request->search_condition === 'make') {
                $query->whereNotNull('calculations.make_id');
            } elseif ($request->search_condition === 'model') {
                $query->whereNotNull('calculations.model');
            }
        }

        return DataTables::of($query)->make(true);
    }
    
       public function generateQuotationNumberAjax(Request $request)
    {
        $po_no = $this->generateQuotationNumberInternal($request->fin_year_id);

        return response()->json([
            'status' => $po_no !== null,
            'po_no' => $po_no ?? 'Invalid financial year'
        ]);
    }


    protected function generateQuotationNumberInternal($financialYearId)
    {
        if (!$financialYearId) return null;

        $financial = FinancialYear::find($financialYearId);

        if (!$financial) return null;

        $fullYear = $financial->financial_year; 
        $years = explode('-', $fullYear);
        $fyShort = substr($years[0], -2) . '-' . substr($years[1], -2); 
        
        $prefix = 'MIC';

        $latestQuotation = PurchaseInvoice::where('po_no', 'LIKE', "%$fyShort%")
            ->orderBy('id', 'desc')
            ->first();
      
        if ($latestQuotation) {
            $lastNumber = (int)substr($latestQuotation->po_no, -3);
            $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {

            $newNumber = '001';
        }

        return $prefix . '/' . $fyShort . '/' . $newNumber;
    }
    
    protected function UpdateStock($data){
        
   
        foreach($data['items'] as $stock_list){
            
          
           DB::table('stock_management')->updateOrInsert(
 
    [
        'make_id'  => $stock_list['product_id'],
        'model_id' => $stock_list['model_id'],
    ],
  
    [
        'sold'       => $sold??null,
        'unsold'     => $unsold??null,
        'total'      => $stock_list['quantity'],
        'purchase'   => $purchase??null,
        'demo'       => $demo??null,
        'created_by' => $created_by??null,
        'updated_by' => $updated_by??null,
    ]
);
        }
        
       

        
    }
}
