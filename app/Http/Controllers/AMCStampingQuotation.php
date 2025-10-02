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


class AMCStampingQuotation extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    // dd( $query = AMCQuotation::with(['quarter','finance_name','company_name','clientGroup'])->get());

    if ($request->ajax()) {

        $query = AMCQuotation::with(['quarter','finance_name','company_name','clientGroup']);

        if ($request->filled('company_id')) {
            $query->where('company_id', $request->company_id);
        }

        if ($request->filled('financial_id')) {
            $query->where('financial_id', $request->financial_id);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('quotation_no', fn($row) => $row->quotation_no ?? '')
            ->addColumn('quotation_date', fn($row) => $row->quotation_date ?? '')
            ->addColumn('quotation_type', fn($row) => $row->quotation_type ?? '')

            ->addColumn('client_name_id', fn($row) => $row->ClientName->client_name ?? '')
            ->addColumn('subject', fn($row) => $row->subject ?? '')
            ->addColumn('quarter', fn($row) => $row->quarter->name ?? '')
            ->addColumn('clientgroup', fn($row) => $row->clientGroup->name ?? '')
            ->addColumn('tax_id', fn($row) => $row->tax->tax_name ?? '')
            ->addColumn('price', fn($row) => $row->price ?? '')
            ->addColumn('total_amount', fn($row) => $row->total_amount ?? '')
            ->addColumn('grand_total', fn($row) => $row->grand_total ?? '')
            ->addColumn('round_off', fn($row) => $row->round_off ?? '')
            ->addColumn('financial_year', fn($row) => $row->finance_name->financial_year ?? '')
            ->addColumn('company', fn($row) => $row->company_name->company_name?? '')
            ->addColumn('action', function ($row) {
                $editUrl = route('amc.quatation.edit', $row->id);
                $deleteUrl = route('amc.quatation.delete', $row->id);
                return '
                    <a href="#" class="text-info mr-1 view-amc" data-id="' . $row->id . '"><i class="fa fa-eye" style="font-size:15px;"></i></a>
                    <a href="' . $editUrl . '" class="text-success mr-1"><i class="fa fa-edit" style="font-size:15px;"></i></a>
                    <a href="' . $deleteUrl . '" onclick="return confirm(\'Are you sure?\');" class="text-danger"><i class="fa fa-trash" style="font-size:15px;"></i></a>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    $companies = CompanyDetail::all();
    $financialYears = FinancialYear::all();

    return view('masters.amc-quotation.list', compact('companies', 'financialYears'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $quotationamcNo = $this->generateQuotationNumber();
        $companies = CompanyDetail::all();
        $financial = FinancialYear::with('lut')->get();
        $clients_grp = Client::all();
        $clients_details = ClientDetail::all();
        $Quarters = Quarter::all();
        $makes = make::all();
        $taxes = DB::table('tax')->get();
        return view('masters.amc-quotation.add', compact('companies', 'financial', 'quotationamcNo', 'clients_grp', 'clients_details', 'Quarters', 'makes', 'taxes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     

            AMCQuotation::create([

                'quotation_no' => $request->data,
                'company_id'    =>  $request->company_id,
                'financial_id'    =>  $request->fin_year_id,
                'quotation_no'    =>  $request->amcquotation_no,
                'quotation_date'    =>  $request->quotation_date,
                'client_group_id'    =>  $request->client_group_id,
                'emp_name_id'    =>  $request->emp_id,
                'subject'    =>  $request->subject,
                'client_name_id'    =>  $request->client_name_id,
                'ref_id'    =>  $request->ref_id,
                'quarter_id'    =>  $request->quarter,
                'contact_person_id'    =>  $request->contact_person,
                'price'    =>  $request->price,
                'tax_id'    =>  $request->tax,
                'quotation_type'    =>  $request->quotation_type,
            ]
            );

            return redirect()->route('amc.quatation.index');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
  public function edit($id)
{
    $quotation = AMCQuotation::findOrFail($id);
    
    $companies = CompanyDetail::all();
    $financial = FinancialYear::with('lut')->get();
    $clients_grp = Client::all();
    $clients_details = ClientDetail::all();
    $Quarters = Quarter::all();
    $makes = make::all();
    $taxes = DB::table('tax')->get();

    return view('masters.amc-quotation.edit', compact(
        'quotation',
        'companies',
        'financial',
        'clients_grp',
        'clients_details',
        'Quarters',
        'makes',
        'taxes'
    ));
}


    /**
     * Update the specified resource in storage.
     */
 public function update(Request $request, $id)
{
    $quotation = AMCQuotation::findOrFail($id);

    $quotation->update([
        'quotation_no'         => $request->amcquotation_no,
        'company_id'           => $request->company_id,
        'financial_id'         => $request->fin_year_id,
        'quotation_date'       => $request->quotation_date,
        'client_group_id'      => $request->client_group_id,
        'emp_name_id'          => $request->emp_id,
        'subject'              => $request->subject,
        'client_name_id'       => $request->client_name_id,
        'ref_id'               => $request->ref_id,
        'quarter_id'           => $request->quarter,
        'contact_person_id'    => $request->contact_person,
        'price'                => $request->price,
        'tax_id'               => $request->tax,
        'quotation_type'       => $request->quotation_type,
    ]);

    return redirect()->route('amc.quatation.index')->with('success', 'Quotation updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      AMCQuotation::where('id',$id)->delete();
      return redirect()->back(); 
    }

   public function generateQuotationNumber()
{
    // Step 1: Define prefix
    $prefix = 'MIM/AQN';

    // Step 2: Generate financial year like 25-26
    $currentMonth = date('n'); // 1–12
    $currentYear = date('Y');
    
    if ($currentMonth >= 4) {
        // April to March financial year
        $startYear = $currentYear;
        $endYear = $currentYear + 1;
    } else {
        $startYear = $currentYear - 1;
        $endYear = $currentYear;
    }

    $financialYear = substr($startYear, 2, 2) . '-' . substr($endYear, 2, 2); // e.g., 25-26

    // Step 3: Get latest serial number for this financial year
    $latestQuotation = AMCQuotation::where('quotation_no', 'LIKE', "%$financialYear%")
        ->orderBy('id', 'desc')
        ->first();

    if ($latestQuotation) {
        // Get last number and increment
        $lastNumber = (int)substr($latestQuotation->quotation_no, -3);
        $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
    } else {
        $newNumber = '001';
    }

    // Step 4: Combine all parts
    return $prefix . '/' . $financialYear . '/' . $newNumber;
}



      public function show($id)
    {
      
        $quotation = 
        AMCQuotation::with(['quarter','finance_name','company_name','clientGroup','ClientsName','contact_person'])
        ->where('id',$id)
        ->get();

        return response()->json($quotation);
    }
}
