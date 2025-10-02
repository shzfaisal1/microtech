<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyDetail;
use App\Models\FinancialYear;
use App\Models\Quotation;
use App\Models\ClientDetail;
use App\Models\Client;
use App\Models\Quarter;
use App\Models\ClientContactPerson;
use App\Models\make;
use App\Models\QuotationProductCalculation;
use Illuminate\Support\Facades\DB;
use App\Models\Challan;
use App\Models\InvoiceType;;
use App\Models\proforma;
use App\Models\ProformaCalculation;
use Yajra\DataTables\Facades\DataTables;
use App\Models\ProformaProdct;
use App\Models\ProformaClientDetail;
class ProformaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
   
        //   $query = proforma::with(['company','finance','ClientInfo','ClientInfo.clientGroup','ClientInfo.clientName' ,'ClientInfo.contactPerson','ProformaCalculation','quarter','proforma_type','challan'])->get();
    //    dd($query);


      
    if ($request->ajax()) {

        $query = proforma::with(['company','finance','ClientInfo','ClientInfo.clientGroup','ClientInfo.clientName' ,'ClientInfo.contactPerson','ProformaCalculation','quarter','proforma_type','challan']);

        if ($request->filled('filter_company')) {
            $query->where('company_id', $request->filter_company);
        }

        if ($request->filled('filter_financial_year')) {
            $query->where('financial_id', $request->filter_financial_year);
        }

        return DataTables::of($query->get())
            ->addIndexColumn()
            ->addColumn('pl_no', fn($row) => $row->pl_no ?? '')
            ->addColumn('pl_date', fn($row) => $row->pl_date ?? '')   
            ->addColumn('client_group', fn($row) => $row->ClientInfo->clientGroup->name?? '-')
            ->addColumn('clientName', fn($row) => $row->ClientInfo->clientName->client_name?? '-')
            ->addColumn('contactPerson', fn($row) => $row->ClientInfo->contactPerson->name?? '-')
            ->addColumn('company_name', fn($row) => $row->company->company_name?? '-')
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
            $editUrl = route('proforma.edit', $row->id);
            $deleteUrl = route('proforma.delete', $row->id);

    return '
      <div class="d-flex">
    <a href="' . $editUrl . '" class="text-success mr-1" title="Edit">
        <i class="fa fa-edit" style="font-size:15px;"></i>
    </a>
    <a href="' . $deleteUrl . '" onclick="return confirm(\'Are you sure?\');" class="text-danger mr-1" title="Delete">
        <i class="fa fa-trash" style="font-size:15px;"></i>
    </a>
    <a type="button" class="text-secondary mr-1 print-challan" data-id="' . $row->id . '" title="Print">
        <i class="fa fa-print" style="font-size:15px;"></i>
    </a>
    <a type="button" class="text-info view-challan" data-id="' . $row->id . '" title="View">
        <i class="fa fa-eye" style="font-size:15px;"></i>
    </a>
</div>

    ';
})
            ->rawColumns(['action'])
            ->make(true);
    }

    // Load filters and return view
    $companies = CompanyDetail::select('id', 'company_name')->get();
    $financialYears = FinancialYear::select('id', 'financial_year')->get();

    return view('masters.proforma.list', compact('companies', 'financialYears'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proforma_types = InvoiceType::all();
        $financial = FinancialYear::with('lut')->get(); 
        $companies = CompanyDetail::all();
        $financial = FinancialYear::with('lut')->get();
        $clients_grp = Client::all();
        $clients_details = ClientDetail::all();
        $quarters = Quarter::all();
        $makes = make::all();
        $emp =DB::table('employee_details')->get();
        $taxes = DB::table('tax')->get();
        $referrers = DB::table('reference_entries')->get();
        $states = DB::table('state_code')->get();
        $challans = Challan::all();
        $pl_no = $this->generateQuotationNumberInternal($financial->first()?->id);
        return view('masters.proforma.add',compact('challans','proforma_types','pl_no','referrers','emp','companies', 'financial', 'clients_grp', 'clients_details', 'quarters', 'makes', 'taxes','states'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $proforma = proforma::create([
            'company_id' => $request->company_id,
            'financial_id' => $request->fin_year_id,
            'pl_no' => $request->pl_no,
            'pl_date' => $request->pl_date,
            'po_no' => $request->po_no,
            'po_date' => $request->po_date,
            'proforma_type' => $request->proforma_type_id,
            'proforma_type_name' => $request->proforma_type,
            'contact_period_from' => $request->contract_start,
            'contact_period_to' => $request->contract_end,
            'quarter_id' => $request->quarter_id,
            'description' => $request->description,
            'ref_id' => $request->referred_by,
            'emp_id' => $request->employee_id,
            'challan_id' => $request->challan_no,
            'challan_date' => $request->challan_date,
            'desp_id' => $request->company_id,
            'comment' => $request->comment,
        ]);

        $proforma_id = $proforma->id;


        ProformaClientDetail::create([
        'pl_id' => $proforma_id,
        'client_name_id' =>   $request->client_name_id,  
         'contact_person_id' =>   $request->company_id,   
         'is_shipping_add' =>   $request->same_address,  
         'client_name' =>   $request->shipping_client_name,  
         'client_add' =>   $request->shipping_address,  
         'tel_no' =>   $request->tel_no,  
         'email' =>   $request->email,  
         'contact_person' =>   $request->shipping_contact,  
         'contact_no' =>   $request->contact_no,  
         'pan_no' =>   $request->pan_no,  
         'gstin' =>   $request->gstin,  
         'state_code_id' =>   $request->state_code_id, 
        ]);
          $product_sale = $request->product;
            if(!empty($product_sale)){
            
        foreach ($product_sale as $key => $value) {
            ProformaProdct::create([
            'pl_id' => $proforma_id,
            'make_id' => $value['make_id'],
            'model_id' => $value['model_id'],
            'serial_no' => $value['serial_no'],
            'capacity' => $value['capacity'],
            'type_of_code' =>$value['sale_code_type'],
            'value_code' => $value['sale_code_value'],
            'remove_stock' => $value['stock_demo'],
            'calibration' => $value['calibration'],
            'readability' =>$value['readability'],
            'pan_size' => $value['pan_size'],
            'part_details' => $value['part_details'],
            'vc_no' =>$value['vc_no'],
            'vc_date' => $value['vc_date'],
            'qty' => $value['quantity'],
            'rate' => $value['rate'],
            'amount' => $value['amount'],
            ]);
            }
        }
        ProformaCalculation::create([
        'pl_id' => $proforma_id,
        'net_amount' => $request->net_amount,
        'packing' => $request->packing,
        'late_fees' => $request->late_fees,
        'discount' => $request->discount,
        'taxable_amount' => $request->taxable_amount,
        'tax_type1' => $request->tax1,
        'tax1_amount' => $request->tax1_amount,
        'tax_type2' => $request->tax2,
        'tax2_amount' => $request->tax2_amount,
        'round_off' => $request->round_off,
        'total' => $request->total_amount,
        'grand_total' => $request->grand_total,
        'advance' => $request->adv,
        'balance_amount' => $request->balance_amount,
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
        $proforma = Proforma::with(['ClientInfo','proforma_product','proforma_product.make_data','proforma_product.model_data','ProformaCalculation'])->find($id);
        $proforma_types = InvoiceType::all();
        $financial = FinancialYear::with('lut')->get(); 
        $companies = CompanyDetail::all();
        $financial = FinancialYear::with('lut')->get();
        $clients_grp = Client::all();
        $clients_details = ClientDetail::all();
        $quarters = Quarter::all();
        $makes = make::all();
        $emp =DB::table('employee_details')->get();
        $taxes = DB::table('tax')->get();
        $referrers = DB::table('reference_entries')->get();
        $states = DB::table('state_code')->get();
        $challans = Challan::all();
        $pl_no = $this->generateQuotationNumberInternal($financial->first()?->id);
        return view('masters.proforma.edit',compact('proforma','challans','proforma_types','pl_no','referrers','emp','companies', 'financial', 'clients_grp', 'clients_details', 'quarters', 'makes', 'taxes','states'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        // dd($request->client_name_id);
         $deletedProductSale =$request->deletedProductSale;
        if(!empty($deletedProductSale)){

        foreach ($deletedProductSale as $key => $value) {
            $product_sale = ProformaProdct::find($value);
            $product_sale->delete();
            }
        }
        proforma::where('id',$id)->update([
            'company_id' => $request->company_id,
            'financial_id' => $request->fin_year_id,
            'pl_no' => $request->pl_no,
            'pl_date' => $request->pl_date,
            'po_no' => $request->po_no,
            'po_date' => $request->po_date,
            'proforma_type' => $request->proforma_type_id,
            'proforma_type_name' => $request->proforma_type,
            'contact_period_from' => $request->contract_start,
            'contact_period_to' => $request->contract_end,
            'quarter_id' => $request->quarter_id,
            'description' => $request->description,
            'ref_id' => $request->referred_by,
            'emp_id' => $request->employee_id,
            'challan_id' => $request->challan_no,
            'challan_date' => $request->challan_date,
            'desp_id' => $request->company_id,
            'comment' => $request->comment,
        ]);


        ProformaClientDetail::where('pl_id',$id)->update([
        'client_group_id' =>   $request->client_group_id,  
        'client_name_id' =>   $request->client_name_id,  
         'contact_person_id' =>   $request->contact_person_id,   
         'is_shipping_add' =>   $request->same_address,  
         'client_name' =>   $request->shipping_client_name,  
         'client_add' =>   $request->shipping_address,  
         'tel_no' =>   $request->tel_no,  
         'email' =>   $request->email,  
         'contact_person' =>   $request->contact_person_id,  
         'contact_no' =>   $request->contact_no,  
         'pan_no' =>   $request->pan_no,  
         'gstin' =>   $request->gstin,  
         'state_code_id' =>   $request->state_code_id, 
        ]);
        $products = $request->product;
        if(!empty($products)){
        foreach($products as $product){
           if(!empty($product['id'])) {
            ProformaProdct::where('id',$product['id'])->update([
            'make_id' => $product['make_id'],
            'model_id' => $product['model_id'],
            'serial_no' => $product['serial_no'],
            'capacity' => $product['capacity'],
            'type_of_code' =>$product['sale_code_type'],
            'value_code' => $product['sale_code_value'],
            'remove_stock' => $product['stock_demo'],
            'calibration' => $product['calibration'],
            'readability' =>$product['readability'],
            'pan_size' => $product['pan_size'],
            'part_details' => $product['part_details'],
            'vc_no' =>$product['vc_no'],
            'vc_date' => $product['vc_date'],
            'qty' => $product['quantity'],
            'rate' => $product['rate'],
            'amount' => $product['amount'],

            ]);
        }else{
            ProformaProdct::create([
            'pl_id' => $id,
            'make_id' => $product['make_id'],
            'model_id' => $product['model_id'],
            'serial_no' => $product['serial_no'],
            'capacity' => $product['capacity'],
            'type_of_code' =>$product['sale_code_type'],
            'value_code' => $product['sale_code_value'],
            'remove_stock' => $product['stock_demo'],
            'calibration' => $product['calibration'],
            'readability' =>$product['readability'],
            'pan_size' => $product['pan_size'],
            'part_details' => $product['part_details'],
            'vc_no' =>$product['vc_no'],
            'vc_date' => $product['vc_date'],
            'qty' => $product['quantity'],
            'rate' => $product['rate'],
            'amount' => $product['amount'],   
            ]);
            
        }
        }
    }
        ProformaCalculation::where('id',$id)->update([
        'pl_id' => $id,
        'net_amount' => $request->net_amount,
        'packing' => $request->packing,
        'late_fees' => $request->late_fees,
        'discount' => $request->discount,
        'taxable_amount' => $request->taxable_amount,
        'tax_type1' => $request->tax1,
        'tax1_amount' => $request->tax1_amount,
        'tax_type2' => $request->tax2,
        'tax2_amount' => $request->tax2_amount,
        'round_off' => $request->round_off,
        'total' => $request->total_amount,
        'grand_total' => $request->grand_total,
        'advance' => $request->adv,
        'balance_amount' => $request->balance_amount,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        proforma::where('id',$id)->delete();
        return redirect()->back();
    }
       public function generateQuotationNumberAjax(Request $request)
    {
        $pl_no = $this->generateQuotationNumberInternal($request->fin_year_id);

        return response()->json([
            'status' => $pl_no !== null,
            'pl_no' => $pl_no ?? 'Invalid financial year'
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
        
        $prefix = 'MIM/PRM';

        $latestQuotation = proforma::where('pl_no', 'LIKE', "%$fyShort%")
            ->orderBy('id', 'desc')
            ->first();
      
        if ($latestQuotation) {
            $lastNumber = (int)substr($latestQuotation->pl_no, -3);
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
    public function proforma_type(Request $request){
    $proforma_type =  InvoiceType::where('id',$request->proforma_type_id)->first();
    // dd($proforma_type);
    return response()->json($proforma_type);    

    }
}
