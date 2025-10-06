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
use Illuminate\Support\Facades\Log;
class PurchaseInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function indexold(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $query = Calculation::with(['vendor', 'buyer', 'consignee', 'financialYear', 'companyDetail']);

    //         // Apply filters
    //         if ($request->has('company_id') && $request->company_id != '') {
    //             $query->where('company_id', $request->company_id);
    //         }

    //         if ($request->has('financial_year') && $request->financial_year != '') {
    //             $query->where('financial_year', $request->financial_year);
    //         }

    //         return DataTables::of($query)
    //             ->addIndexColumn()
    //             ->addColumn('vendor_id', fn($row) => $row->vendor->name ?? '')
    //             ->addColumn('buyer_id', fn($row) => $row->buyer->buyer_name ?? '')
    //             ->addColumn('consignee_id', fn($row) => $row->consignee->name ?? '')
    //             ->addColumn('company_id', fn($row) => $row->companyDetail->company_name ?? '')
    //             ->addColumn('financial_year', fn($row) => $row->financialYear->financial_year ?? '')
    //             ->addColumn('action', function ($row) {
    //                 $editUrl = route('purchase-invoice.edit', $row->invoice_number);
    //                 $deleteUrl = route('purchase-invoice.delete', $row->invoice_number);
    //                 return '
    //                 <a href="javascript:void(0);" class="mr-1" data-id="' . $row->invoice_number  . '"><i class="fa fa-eye text-success" style="font-size:15px;"></i></a>
    //                 <a href="' . $editUrl . '" class="mr-1"><i class="fa fa-edit text-primary" style="font-size:15px;"></i></a>
    //                 <a href="' . $deleteUrl . '" onclick="return confirm(\'Are you sure?\');" class=""><i class="fa fa-trash text-danger" style="font-size:15px;"></i></a>';
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }

    //     // For initial page load
    //     $companies = CompanyDetail::all();
    //     $financialYears = FinancialYear::all();
    //     return view('masters.purchase.list', compact('companies', 'financialYears'));
    // }

public function index(Request $request)
{
    // If AJAX request, return JSON for DataTables
    if ($request->ajax()) {

        // Base query: join vendors, companies, stock location, financial year and products
        $query = DB::table('new_purchase_order')
            ->leftJoin('vendors as v', 'v.id', '=', 'new_purchase_order.vendor_id')
            ->leftJoin('company_details as c', 'c.id', '=', 'new_purchase_order.company_id')
            ->leftJoin('stock_locations as sl', 'sl.id', '=', 'new_purchase_order.stock_location_id')
            ->leftJoin('financial_years as fy', 'fy.id', '=', 'new_purchase_order.financial_year_id')
            ->leftJoin('new_purchase_order_product as pop', 'pop.po_id', '=', 'new_purchase_order.id')
            ->leftJoin('new_purchase_order_calculation as calc', 'calc.po_id', '=', 'new_purchase_order.id')
            ->select(
                'new_purchase_order.id',
                'new_purchase_order.po_no',
                'new_purchase_order.po_date',
                'new_purchase_order.vendor_id',
                'new_purchase_order.company_id',
                'new_purchase_order.stock_location_id',
                'new_purchase_order.financial_year_id',
                'v.name as vendor_name',
                'c.company_name as company_name',
                'sl.location_name as stock_location_name',
                'fy.financial_year as financial_year_name',
                DB::raw('COUNT(pop.id) as items_count'),
                DB::raw('COALESCE(SUM(pop.amount),0) as products_total_amount'),
                DB::raw('COALESCE(calc.final_total, 0) as final_total_calc'),
                DB::raw('COALESCE(calc.net_amount, 0) as net_amount_calc')
            )
            ->groupBy(
                'new_purchase_order.id',
                'new_purchase_order.po_no',
                'new_purchase_order.po_date',
                'new_purchase_order.vendor_id',
                'new_purchase_order.company_id',
                'new_purchase_order.stock_location_id',
                'new_purchase_order.financial_year_id',
                'v.name','c.company_name','sl.location_name','fy.financial_year',
                'calc.final_total','calc.net_amount'
            );

        // Apply filters if present
        if ($request->filled('vendor_id')) {
            $query->where('new_purchase_order.vendor_id', $request->vendor_id);
        }
        if ($request->filled('from') && $request->filled('to')) {
            $from = Carbon::parse($request->from)->startOfDay();
            $to   = Carbon::parse($request->to)->endOfDay();
            $query->whereBetween('new_purchase_order.po_date', [$from, $to]);
        }

        return DataTables::of($query)
            ->editColumn('po_date', fn($row) => $row->po_date ? Carbon::parse($row->po_date)->format('d-m-Y') : '')
            ->addColumn('vendor', fn($row) => $row->vendor_name ?: '-')
            ->addColumn('company', fn($row) => $row->company_name ?: '-')
            ->addColumn('location', fn($row) => $row->stock_location_name ?: '-')
            ->addColumn('items_count', fn($row) => (int)$row->items_count)
            ->addColumn('products_total', function($row){
                $final = (float)$row->final_total_calc;
                return number_format($final > 0 ? $final : (float)$row->products_total_amount, 2);
            })
            ->addColumn('net_amount', fn($row) => number_format((float)$row->net_amount_calc, 2))
            ->addColumn('actions', function ($row) {
                $view = url('/masters/purchase-invoice/show/' . $row->id);
                $edit = url('/masters/purchase-invoice/edit/' . $row->id);
                $delete = url('/masters/purchase-invoice/' . $row->id);

                return '
                  <div class="action-buttons">
                    <button data-id="'. $row->id .'" class="btn btn-sm btn-info btn-view">View</button>
                    <a href="'. $edit .'" class="btn btn-sm btn-primary">Edit</a>
                    <button data-id="'. $row->id .'" class="btn btn-sm btn-danger btn-delete">Delete</button>
                  </div>
                ';
            })
            ->rawColumns(['actions']) // allow HTML in actions
            ->make(true);
    }

    // Non-AJAX request: show Blade view
    $companies = \App\Models\CompanyDetail::all();
    $financialYears = \App\Models\FinancialYear::all();
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
    $data = $request->all();

    // Basic quick validation (expand as needed)
    if (empty($data['items']) || !is_array($data['items'])) {
        return response()->json(['status' => 'error', 'message' => 'items are required and must be an array'], 422);
    }

    DB::beginTransaction();
    try {
        // 1) Insert PO and get id
        $po_id = DB::table('new_purchase_order')->insertGetId([
            "vendor_id" => $request->vendor_id,
            "po_date" => $request->po_date,
            "po_no" => $request->po_no,
            "company_id" => $request->company_id,
            "financial_year_id" => $request->financial_year_id,
            "stock_location_id" => $request->stock_location,
          
        ]);

        // 2) Insert products (bulk)
        $itemsPayload = [];
        foreach ($data['items'] as $item) {
            $itemsPayload[] = [
                'po_id'    => $po_id,
                'make_id'  => $item['product_id'] ?? null,
                'model_id' => $item['model_id'] ?? null,
                'qty'      => isset($item['quantity']) ? (float)$item['quantity'] : 0,
                'rate'     => isset($item['rate']) ? (float)$item['rate'] : 0,
                'amount'   => isset($item['amount']) ? (float)$item['amount'] : 0,
              
            ];
        }

        if (!empty($itemsPayload)) {
            DB::table('new_purchase_order_product')->insert($itemsPayload);
        }

        // 3) Handle calculation data (accept both 'cal_data' or 'Cal_data' or 'calData')
        $rawCal = $request->input('cal_data') ?? $request->input('Cal_data') ?? $request->input('calData') ?? [];

        if (is_string($rawCal)) {
            $rawCal = json_decode($rawCal, true) ?: [];
        }

        // columns to map/save
        $calcColumns = [
            'net_amount','packing','discount','taxable_amount',
            'tax_type1_value','tax1_amount','tax_type2_value','tax2_amount',
            'final_total','advance','balance'
        ];

        // prepare sanitized calc row
        $calcRow = [
            'po_id' => $po_id,
            'updated_at' => Carbon::now(),
        ];

        foreach ($calcColumns as $col) {
            $val = $rawCal[$col] ?? 0;
            // ensure numeric
            $calcRow[$col] = is_numeric($val) ? (float)$val : 0.0;
        }

        // Upsert behavior: if a calc row for this PO exists -> update, else insert
        $exists = DB::table('new_purchase_order_calculation')->where('po_id', $po_id)->exists();

        if ($exists) {
            $updateData = $calcRow;
            unset($updateData['po_id']); // don't change po_id
            DB::table('new_purchase_order_calculation')
                ->where('po_id', $po_id)
                ->update($updateData);
            $calcAction = 'updated';
        } else {
            $insertData = $calcRow;
            $insertData['created_at'] = Carbon::now();
            DB::table('new_purchase_order_calculation')->insert($insertData);
            $calcAction = 'inserted';
        }

        DB::commit();

        return response()->json([
            'status' => 'success',
            'message' => 'Purchase order saved',
            'po_id' => $po_id,
            'cal_action' => $calcAction
        ], 201);

    } catch (\Throwable $ex) {
        DB::rollBack();
        Log::error('PurchaseOrder store failed: '.$ex->getMessage(), [
            'trace' => $ex->getTraceAsString(),
            'request' => $request->all(),
        ]);
        return response()->json(['status' => 'error', 'message' => 'Something went wrong', 'error' => $ex->getMessage()], 500);
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
    public function destroy(Request $request)
    {
        // dd($request->all());
        
        $new_purchase= DB::table('new_purchase_order')->where('id',$request->id)->delete();
        if($new_purchase){
            
        }
        // $calculation = Calculation::where('invoice_number', $id)->first();
        // if ($calculation) {
        //     $calculation->delete();
        // }

        // $purchaseInvoices = PurchaseInvoice::where('invoice_number', $id)->get();
        // foreach ($purchaseInvoices as $invoice) {
        //     $invoice->delete();
        // }

        return  response()->json(['message' => 'working']);
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
