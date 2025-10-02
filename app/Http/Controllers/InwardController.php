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
use Yajra\DataTables\Facades\DataTables;
use App\Models\Inward;
use App\Models\InwardItem;
class InwardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
         public function index(Request $request)
    {
   
        // $query = Inward::select('*')->with([
        //     'company:id,company_name',
        //     'clientGroup:id,name',
        //     'clientName:id,client_name',
        //     'contactPerson:id,name',
        //     'finance:id,financial_year',
        // ]);

        // dd($query->get());

      
    if ($request->ajax()) {
        $query = Inward::select('*')->with([
            'company:id,company_name',
            'clientGroup:id,name',
            'clientName:id,client_name',
            'contactPerson:id,name',
            'finance:id,financial_year',
        ]);

        if ($request->filled('company_id')) {
            $query->where('company_id', $request->company_id);
        }

        if ($request->filled('financial_year')) {
            $query->where('financial_id', $request->financial_year);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('inward_no', fn($row) => $row->inward_no ?? '')
            ->addColumn('recieve_date', fn($row) => $row->recieve_date ?? '')   
            ->addColumn('client_group_id', fn($row) => $row->clientGroup->name ?? '-')
            ->addColumn('client_name_id', fn($row) => $row->clientName->client_name ?? '-')
            ->addColumn('contact_person_id', fn($row) => $row->contactPerson->name ?? '-')
            ->addColumn('company_name', fn($row) => $row->company->company_name ?? '-')
            ->addColumn('finance_name', fn($row) => $row->finance->financial_year ?? '-')
            ->addColumn('reference', fn($row) => $row->reference ?? '-')
          ->addColumn('action', function ($row) {
    $editUrl = route('inward.edit', $row->id);
    $deleteUrl = route('inward.delete', $row->id);

    return '
        <div class="d-flex">
            <a href="' . $editUrl . '" class="text-success mr-1" title="Edit">
                <i class="fa fa-edit" style="font-size:15px;"></i>
            </a>
            <a href="' . $deleteUrl . '" onclick="return confirm(\'Are you sure?\');" class="text-danger mr-1" title="Delete">
                <i class="fa fa-trash" style="font-size:15px;"></i>
            </a>
            <a type="button" class="text-info view-amc" data-id="' . $row->id . '" title="View">
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

    return view('masters.inward.list', compact('companies', 'financialYears'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $financial = FinancialYear::with('lut')->get(); 
        $companies = CompanyDetail::all();
        $financial = FinancialYear::with('lut')->get();
        $clients_grp = Client::all();
        $clients_details = ClientDetail::all();
        $quarters = Quarter::all();
        $makes = make::all();
        $emp =DB::table('employee_details')->get();
        $taxes = DB::table('tax')->get();
        $ref = DB::table('reference_entries')->get();
        $inward_no = $this->generateQuotationNumberInternal($financial->first()?->id);
        return view('masters.inward.add', compact('inward_no','ref','emp','companies', 'financial', 'clients_grp', 'clients_details', 'quarters', 'makes', 'taxes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
            $inward =  Inward::create([
            'company_id' => $request->company_id,
            'financial_id' => $request->fin_year_id,
            'inward_no' => $request->inward_no,
            'recieve_date' => $request->received_date,
            'Invoice_status' => $request->invoice_status,
            'reference' => $request->reference,
            'client_group_id' => $request->client_group_id,
            'client_name_id' => $request->client_id,
            'contact_person_id' => $request->contact_person_id,
        ]);
       

           $inward_id  =  $inward->id;
        
          $items =  $request->items;

    
   
          if(!empty($inward_id)){

            foreach($items as $item){

           $serial_no = explode(',', $item['serial_no']);
           
                InwardItem::create([                   
                'inward_id' => $inward_id,
                'make' => $item['make'],
                'model' => $item['model'],
                'serial_no' => json_encode($serial_no), 
                'adaptor' => $item['adaptor'],
                'batteries' => $item['batteries'],
                'draft_shield' => $item['draft_shield'], 
                'in_use_cover' => $item['in_use_cover'],          
                'pan' => $item['pan'],          
                'pan_support' => $item['pan_support'],          
                'weighing_pan' => $item['weighing_pan'],   
                'calibration_wt' => $item['calibration_wt'],          
                'cable' => $item['cable'],          
                'other' => $item['other'],          
                'other_details' => $item['other_details'],    
                'defect' => $item['defect'],    
                'remark' => $item['remark'],          
                ]) ;  
            }



          }
        
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
        Inward::where('id',$id)->delete();
        return redirect()->back();
    }


     public function generateQuotationNumberAjax(Request $request)
    {
        $inward_no = $this->generateQuotationNumberInternal($request->fin_year_id);

        return response()->json([
            'status' => $inward_no !== null,
            'inward_no' => $inward_no ?? 'Invalid financial year'
        ]);
    }


    protected function generateQuotationNumberInternal($financialYearId)
    {
        if (!$financialYearId) return null;

        $financial = FinancialYear::find($financialYearId);

        if (!$financial) return null;

        $fullYear = $financial->financial_year; // e.g., "2025-2026"
        $years = explode('-', $fullYear);
        $fyShort = substr($years[0], -2) . '-' . substr($years[1], -2); // "25-26"

        $prefix = 'INW/SCT';

        $latestQuotation = Inward::where('inward_no', 'LIKE', "%$fyShort%")
            ->orderBy('id', 'desc')
            ->first();

        if ($latestQuotation) {
            $lastNumber = (int)substr($latestQuotation->inward_no, -3);
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
