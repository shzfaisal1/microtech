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
use Yajra\DataTables\Facades\DataTables;
use App\Models\AMCQuotation;
use App\Models\ContractAMC;
use App\Models\AMCProduct;
class ContractAMCController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)

{
    //   $query = ContractAMC::select('*')->with([
    //         'quarter',
    //         'company_name:id,company_name',
    //         'Clients_Group:id,name',
    //         'ClientsName:id,client_name,address',
    //         'contact_person:id,name',
    //         'finance_name:id,financial_year'
    //     ]);
    //     dd($query->get());
    if ($request->ajax()) {
       $query = ContractAMC::select('*')->with([
            'quarter',
            'company_name:id,company_name',
            'Clients_Group:id,name',
            'ClientsName:id,client_name,address',
            'contact_person:id,name',
            'finance_name:id,financial_year'
        ]);

        if ($request->filled('company_id')) {
            $query->where('company_id', $request->company_id);
        }

        if ($request->filled('financial_year')) {
            $query->where('financial_id', $request->financial_year);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('amc_no', fn($row) => $row->amc_no ?? '')
            ->addColumn('amc_date', fn($row) => $row->amc_date ?? '')
            ->addColumn('quarter_id', fn($row) => $row->quarter->name ?? '-')
            ->editColumn('status', function ($row) {
                return match((int)$row->status) {
                    1 => 'New',
                    2 => 'Renew',
                    3 => 'Terminate',
                    default => '-'
                };
                })
            ->rawColumns(['status'])
            ->addColumn('contract_period_from', fn($row) => $row->contract_period_from ?? '-')
            ->addColumn('contract_period_to', fn($row) => $row->contract_period_to ?? '-')
            ->addColumn('remark', fn($row) => $row->remark ?? '-')
            ->addColumn('client_group_id', fn($row) => $row->Clients_Group->name ?? '-')
            ->addColumn('client_name_id', fn($row) => $row->ClientsName->client_name ?? '-')
            ->addColumn('contact_person_id', fn($row) => $row->contact_person->name ?? '-')
            ->addColumn('company_name', fn($row) => $row->company_name->company_name ?? '-')
            ->addColumn('finance_name', fn($row) => $row->finance_name->financial_year ?? '-')

            ->addColumn('net_amount', fn($row) => number_format($row->net_amount ?? 0, 2))
            ->addColumn('tax1', fn($row) => number_format($row->tax1 ?? 0, 2))
            ->addColumn('tax1_amount', fn($row) => number_format($row->tax1_amount ?? 0, 2))
            ->addColumn('tax2', fn($row) => number_format($row->tax2 ?? 0, 2))
            ->addColumn('tax2_amount', fn($row) => number_format($row->tax2_amount ?? 0, 2))
            ->addColumn('total_amount', fn($row) => number_format($row->total_amount ?? 0, 2))
            ->addColumn('round_off', fn($row) => number_format($row->round_off ?? 0, 2))
            ->addColumn('grand_total', fn($row) => number_format($row->grand_total ?? 0, 2))
            ->addColumn('action', function ($row) {
                $editUrl = route('contract.amc.edit', $row->id);
                $deleteUrl = route('contract.amc.delete', $row->id);

                return '
                    <a type="button" class="text-info btn-sm view-amc mr-1" data-id="' . $row->id . '" title="View"><i class="fa fa-eye" style="font-size:15px;"></i></a>
                    <a href="' . $editUrl . '" class="text-primary btn-sm mr-1" title="Edit"><i class="fa fa-edit" style="font-size:15px;"></i></a>
                    <a href="' . $deleteUrl . '" onclick="return confirm(\'Are you sure?\');" class="text-danger btn-sm" title="Delete"><i class="fa fa-trash" style="font-size:15px;"></i></a>
                    
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    // Load filters and return view
    $companies = CompanyDetail::select('id', 'company_name')->get();
    $financialYears = FinancialYear::select('id', 'financial_year')->get();

    return view('masters.contracts.amc.list', compact('companies', 'financialYears'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      
         $financial = FinancialYear::with('lut')->get();
       $amc_no = $this->generateQuotationNumberInternal($financial->first()?->id);

    
        $companies = CompanyDetail::all();
        $financial = FinancialYear::with('lut')->get();
        $clients_grp = Client::all();
        $clients_details = ClientDetail::all();
        $Quarters = Quarter::all();
        $makes = make::all();
        $emp =DB::table('employee_details')->get();
        $taxes = DB::table('tax')->get();
        $ref = DB::table('reference_entries')->get();
        return view('masters.contracts.amc.add', compact('ref','emp','companies', 'financial', 'clients_grp', 'clients_details', 'Quarters', 'makes', 'taxes','amc_no'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
         $amc_contract =  ContractAMC::create([
            'company_id' => $request->company_id,
            'financial_id' => $request->fin_year_id,
            'amc_no' => $request->amc_no,
            'amc_date' => $request->amc_date,
            'quarter_id' => $request->quarter,
            'status' => $request->status,
            'contract_period_from' => $request->contract_period_from,
            'contract_period_to' => $request->contract_period_to,
            'remark' => $request->remark,
            'emp_id' => $request->emp_id,
            'refer_id' => $request->ref_id,
            'client_group_id' => $request->client_group_id,
            'client_name_id' => $request->client_name_id,
            'contact_person_id' => $request->contact_person_id,
            'net_amount' => $request->net_amount,
            'tax1' => $request->tax1,
            'tax1_amount' => $request->tax1_amount,
            'tax2' => $request->tax2,
            'tax2_amount' => $request->tax2_amount,
            'total_amount' => $request->total_amount,
            'round_off' => $request->round_off,
            'grand_total' => $request->grand_total,
        ]);
       
          $amc_id  =  $amc_contract->id;
        
          $items =  $request->items;

    
   
          if(!empty($amc_id)){

            foreach($items as $item){

           $serial_no = explode(',', $item['serial_no']);
           
                AMCProduct::create([                   
                'amc_id' => $amc_id,
                'make_id' => $item['make_id'],
                'model_id' => $item['model_id'],
                'capacity' => $item['capacity'],
                'serial_no' => json_encode($serial_no), 
                'table_location' => $item['table_location'],
                'lst_st_qtr' => $item['st_qtr'],
                'late_fees' => $item['late_fees'],
                'contract_amount' => $item['contract_amount'],
                'description' =>$item['description'],

                ]) ;  
            }



          }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    $quotation = ContractAMC::where('id',$id)
    ->with(['products','quarter','ClientsName','contact_person','Clients_Group','company_name:id,company_name','finance_name:id,financial_year','products.make_data','products.models','products.models','products.quarter'])
    ->get();

          
   
        return response()->json($quotation);
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit(string $id)
{
     $amc = ContractAMC::with([
    'products',
    'products.make_data:id,name',
    'products.models:id,model_name',
    'products.quarter'
    ])->findOrFail($id);
 


    $companies = CompanyDetail::all();
    $financial = FinancialYear::with('lut')->get(); 
    $clients_grp = Client::all(); 
    $clients = ClientDetail::all(); 
    $Quarters = Quarter::all();
      $emp =DB::table('employee_details')->get();
        $ref = DB::table('reference_entries')->get();
    $makes = Make::all();
    $taxes = DB::table('tax')->get(); 
    return view('masters.contracts.amc.edit', compact(
        'amc',
        'companies',
        'financial',
        'clients_grp',
        'clients',
        'Quarters',
        'makes',
        'taxes',
        'emp',
         'ref',
        
    ));
}



    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{
    
     
     $delete_ids = $request->deletedItemIds;

       if(!empty($delete_ids)){
        foreach($delete_ids as $list_id){ 
        AMCProduct::where('id',$list_id)->delete();  
        }
       }

           $amc = ContractAMC::findOrFail($id);
      
     $mc_contract= $request->formData;
    // 1. Update AMC Header
       
      $amc->update([
        'company_id' => $mc_contract['company_id'],
        'financial_id' => $mc_contract['fin_year_id'],
        'amc_no' => $mc_contract['amc_no'],
        'amc_date' => $mc_contract['amc_date'],
        'contract_period_from' => $mc_contract['contract_period_from'],
        'contract_period_to' => $mc_contract['contract_period_to'],
        'status' => $mc_contract['status'],
        'remark' => $mc_contract['remark'],
        'client_group_id' => $mc_contract['client_group_id'],
        'emp_id' => $mc_contract['emp_id'],
        'client_name_id' => $mc_contract['client_name_id'],
        'refer_id' => $mc_contract['ref_id'],
        'quarter_id' => $mc_contract['quarter'],
        'contact_person_id' =>$mc_contract['contact_person_id'],
        'net_amount' => $mc_contract['net_amount'],
        'tax1' => $mc_contract['tax1'],
        'tax1_amount' => $mc_contract['tax1_amount'],
        'tax2' => $mc_contract['tax2'],
        'tax2_amount' =>$mc_contract['tax2_amount'],
        'total_amount' => $mc_contract['total_amount'],
        'round_off' => $mc_contract['round_off'],
        'grand_total' => $mc_contract['grand_total'],
        
    ]);

   

    // // 3. Insert updated product rows
    // foreach ($request->items as $item) {
    //     $amc->products()->create([
    //         'make_id' => $item['make_id'],
    //         'model_id' => $item['model_id'],
    //         'capacity' => $item['capacity'],
    //         'serial_no' => $item['serial_no'],
    //         'table_location' => $item['table_location'],
    //         'st_qtr' => $item['st_qtr'],
    //         'late_fees' => $item['late_fees'],
    //         'contract_amount' => $item['contract_amount'],
    //         'description' => $item['description'],
    //     ]);
    // }

     if ($request->formData['items']) {

            foreach ($request->formData['items'] as $item) {
          
                              
                if (!empty($item['id'])) {
                 $serial_no = is_array($item['serial_no']) ? $item['serial_no'] : explode(',', $item['serial_no']);

                    AMCProduct::where('id', $item['id'])->update([
                    'amc_id'  => $id,
                    'make_id' => $item['make_id'],
                    'model_id' => $item['model_id'],
                    'capacity' => $item['capacity'],
                    'serial_no' => json_encode($serial_no),
                    'table_location' => $item['table_location'],
                    'lst_st_qtr' => $item['st_qtr'],
                    'late_fees' => $item['late_fees'],
                    'contract_amount' => $item['contract_amount'],
                    'description' => $item['description'],
                    ]);
                } else {
              $serial_no = is_array($item['serial_no']) ? $item['serial_no'] : explode(',', $item['serial_no']);

                    AMCProduct::create([
                    'amc_id'  => $id,
                    'make_id' => $item['make_id'],
                    'model_id' => $item['model_id'],
                    'capacity' => $item['capacity'],
                    'serial_no' => json_encode($serial_no),
                    'table_location' => $item['table_location'],
                    'lst_st_qtr' => $item['st_qtr'],
                    'late_fees' => $item['late_fees'],
                    'contract_amount' => $item['contract_amount'],
                    'description' => $item['description'],
                    ]);
                }
            }
        }
    return redirect()->back();
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       ContractAMC::where('id',$id)->delete();
       return redirect()->back();
    }


  public function generateQuotationNumberAjax(Request $request)
    {
        $quotationNo = $this->generateQuotationNumberInternal($request->fin_year_id);

        return response()->json([
            'status' => $quotationNo !== null,
            'quotation_no' => $quotationNo ?? 'Invalid financial year'
        ]);
    }


  protected function generateQuotationNumberInternal($financialYearId)
    {
        if (!$financialYearId) return null;

        $financial = FinancialYear::find($financialYearId);

        if (!$financial) return null;

        $fullYear = $financial->financial_year;
        
        // e.g., "2025-2026"
        $years = explode('-', $fullYear);
       
        $fyShort = substr($years[0], -2) . '-' . substr($years[1], -2); // "25-26"

        $prefix = 'MIM/AMC';

        $latestQuotation = ContractAMC::where('amc_no', 'LIKE', "%$fyShort%")
            ->orderBy('id', 'desc')
            ->first();

        if ($latestQuotation) {
            $lastNumber = (int)substr($latestQuotation->amc_no, -3);
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



}