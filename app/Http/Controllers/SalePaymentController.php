<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyDetail;
use App\Models\FinancialYear;
use App\Models\ClientDetail;
use App\Models\Client;
use App\Models\Account;
use App\Models\InvoiceType;
use App\Models\SalePayment;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Models\ReceiptSalePaymentDetail;
class SalePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    //  $query = SalePayment::with(['ReceiptSalePaymentDetail','Clients','Account']);
    //  dd($query->get());
      
    if ($request->ajax()) {

   $query = SalePayment::with(['ReceiptSalePaymentDetail','Clients']);

        if ($request->filled('filter_company')) {
            $query->where('company_id', $request->filter_company);
        }

        if ($request->filled('filter_financial_year')) {
            $query->where('financial_id', $request->filter_financial_year);
        }

        return DataTables::of($query->get())
            ->addIndexColumn()
            ->addColumn('voucher_no', fn($row) => $row->voucher_no ?? '')
            ->addColumn('voucher_date', fn($row) => $row->voucher_date ?? '')   
            ->addColumn('client_group', fn($row) => $row->ClientInfo->clientGroup->name?? '-')
            ->addColumn('clientName', fn($row) => $row->Clients->client_name?? '-')
            ->addColumn('account', fn($row) => $row->Account->account_name ?? '-')
            // ->addColumn('gst_type', fn($row) => $row->ReceiptSalePaymentDetail->gst_type?? '-')
            ->addColumn('net_amount', fn($row) => $row->ProformaCalculation->net_amount?? '-')   
            ->addColumn('packing', fn($row) => $row->ProformaCalculation->packing?? '-')
            ->addColumn('discount', fn($row) => $row->ProformaCalculation->discount?? '-')
            ->addColumn('late_fees', fn($row) => $row->ProformaCalculation->late_fees?? '-')
            ->addColumn('taxable_amount', fn($row) => $row->ProformaCalculation->taxable_amount?? '-')
            ->addColumn('tax_type1_value', fn($row) => $row->ProformaCalculation->tax_type1_value?? '-')
            ->addColumn('tax1_amount', fn($row) => $row->ProformaCalculation->tax1_amount?? '-')
            ->addColumn('tax_type2_value', fn($row) => $row->ProformaCalculation->tax_type2_value?? '-')
            ->addColumn('tax2_amount', fn($row) => $row->ProformaCalculation->tax2_amount?? '-')
            ->addColumn('advance', fn($row) => $row->ProformaCalculation->adv?? '-')
            ->addColumn('quarter', fn($row) => $row->quarter->name?? '-')
            ->addColumn('contactPerson', fn($row) => $row->contactPerson->name?? '-')
            ->addColumn('company_name', fn($row) => $row->company->company_name?? '-')
            ->addColumn('finance', fn($row) => $row->finance->financial_year?? '-')
            ->addColumn('po_no', fn($row) => $row->po_no?? '-')
            ->addColumn('po_date', fn($row) => $row->po_date ?? '-')
            ->addColumn('contact_period_from', fn($row) => $row->contact_period_from?? '-')
            ->addColumn('contact_period_to', fn($row) => $row->contact_period_to ?? '-')
            ->addColumn('proforma_type', fn($row) => $row->proforma_type->invoice_type ?? '-')
            ->addColumn('challan', fn($row) => $row->challan->challan_no ?? '-')
            ->addColumn('action', function ($row) {
            $editUrl = route('sale.payment.edit', $row->id);
            $deleteUrl = route('sale.payment.delete', $row->id);
            $pdf_view = route('sale.payment.pdf', $row->id);

    return '
      <div class="d-flex">
    <a href="' . $editUrl . '" class="btn btn-success btn-sm mr-1" title="Edit">
        <i class="fa fa-edit"></i>
    </a>
    <a href="' . $deleteUrl . '" onclick="return confirm(\'Are you sure?\');" class="btn btn-danger btn-sm mr-1" title="Delete">
        <i class="fa fa-trash"></i>
    </a>
    <a href="' . $pdf_view . '" onclick="return confirm(\'Are you sure?\');" class="btn btn-danger btn-sm mr-1" t>
        <i class="fa fa-print"></i>
      </a>
    <button type="button" class="btn btn-info btn-sm  view-challan" data-id="' . $row->id . '" title="View">
        <i class="fa fa-eye"></i>
    </button>
</div>

    ';
})
            ->rawColumns(['action'])
            ->make(true);
    }

    // Load filters and return view
    $companies = CompanyDetail::select('id', 'company_name')->get();
    $financialYears = FinancialYear::select('id', 'financial_year')->get();

    return view('masters.SalePayment.list', compact('companies', 'financialYears'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Accounts = Account::select('id','account_name')->get();
        $companies = CompanyDetail::select('id', 'company_name')->get();
        $financial = FinancialYear::select('id', 'financial_year')->get();
        $clients_grp = Client::all();
        $clients_details = ClientDetail::all();
        $vc_no = $this->generateQuotationNumberInternal($financial->first()?->id);
        return view('masters.SalePayment.add',compact('vc_no','companies','financial','clients_grp','clients_details','Accounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->payload['company_id'];


      // Store data
  $payment = SalePayment::create([
    'company_id'       => $request->payload['company_id'],
    'financial_id'     => $request->payload['financial_id'],
    'voucher_no'       => $request->payload['vc_no'],
    'voucher_date'     => $request->payload['vc_date'],
    'client_group_id'  => $request->payload['client_grp'],
    'client_name_id'   => $request->payload['client'],
    'payment_mode'     => $request->payload['payment_mode'],
    'account'          => $request->payload['account_id'],
    'ref_no'           => $request->payload['ref_no'] ?? null,
    'ref_date'         => $request->payload['ref_date'] ?? null,
    'adv_amount'       => $request->payload['advanced_paid'] ?? 0,
    'total'            => $request->payload['total_amount'] ?? 0,
    'return_amount'    => $request->payload['return_amount'] ?? 0,
]);
    $saleId =  $payment->id;
   $items =  $request->payload['items'];
   if(!empty($items)){
    foreach($items as $item){
        
        $detailData = [
            'sale_id'       => $saleId,
            'invoice_no'    => $item['invoice_no'] ?? null,
            'invoice_date'  => $item['invoice_date'] ?? null,
            'client_group'  => $item['client_group'] ?? null,
            'client'        => $item['client'] ?? null,
            'fl_year'       => $item['fl_year'] ?? null,
            'type'          => $item['type'] ?? null,
            'total'         => isset($item['total']) ? floatval($item['total']) : 0,
            'balance'       => isset($item['balance']) ? floatval($item['balance']) : 0,
            'amount'        => isset($item['amount']) ? floatval($item['amount']) : 0,
            'tsd'           => isset($item['tsd']) ? floatval($item['tsd']) : 0,
            'is_checked'    => !empty($item['is_checked']) ? 1 : 0,  
        ];

        // create row
        ReceiptSalePaymentDetail::create($detailData);
    }

   }
    return response()->json([
        'success' => true,
        'message' => 'Sale Payment stored successfully!',
        'data'    => $payment
    ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       SalePayment::findorfail($id)->delete();
       return redirect()->back();
    }

    public function generateQuotationNumberAjax(Request $request)
    {
        $vc_no = $this->generateQuotationNumberInternal($request->fin_year_id);
      
        return response()->json([
            'status' => $vc_no !== null,
            'vc_no' => $vc_no ?? 'Invalid financial year'
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
        
        $prefix = 'MIM/RC';

        $latestQuotation = SalePayment::where('voucher_no', 'LIKE', "%$fyShort%")
            ->orderBy('id', 'desc')
            ->first();
      
        if ($latestQuotation) {
            $lastNumber = (int)substr($latestQuotation->voucher_no, -3);
            $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {

            $newNumber = '001';
        }

        return $prefix . '/' . $fyShort . '/' . $newNumber;
    }
    public function getCompaniesList()
    {
   
    $companies = CompanyDetail::select('id', 'company_name')->get();

    return response()->json($companies);

    }

    public function getClientData($id){
        // DB::connection()->enableQueryLog();
      
    $receipt_details = DB::table('sale_invoices')
    ->where('client_information_sale_invoices.client_name_id',$id)
    ->select('sale_invoices.id as sale_id','sale_invoices.invoice_date','sale_invoices.invoice_no','clients_details.client_name','company_details.company_name','financial_years.financial_year as fy','sale_invoices.gst_type','sale_invoic_calculations.*')
    ->leftJoin('client_information_sale_invoices', 'sale_invoices.id', '=', 'client_information_sale_invoices.invoice_id')
    ->leftJoin('clients_details', 'clients_details.id', '=', 'client_information_sale_invoices.client_name_id')
    ->leftJoin('company_details', 'company_details.id', '=', 'sale_invoices.company_id')
    ->leftJoin('financial_years', 'financial_years.id', '=', 'sale_invoices.financial_id')
    ->leftJoin('sale_invoic_calculations', 'sale_invoic_calculations.invoice_id', '=', 'sale_invoices.id')
    ->get();
 
        return response()->json($receipt_details);
    }

    
}
