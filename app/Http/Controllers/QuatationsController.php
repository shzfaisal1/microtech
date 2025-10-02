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


class QuatationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    if ($request->ajax()) {
        $query = Quotation::with([
            'quarter', 'ClientName', 'clientGroup', 'company', 'finance'
        ]);

        if ($request->filled('company_id')) {
            $query->where('company_id', $request->company_id);
        }

        if ($request->filled('financial_year')) {
            $query->where('fin_year_id', $request->financial_year);
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('quotation_no', fn($row) => $row->quotation_no ?? '')
            ->addColumn('quotation_date', fn($row) => $row->quotation_date ?? '')
            ->addColumn('client_name_id', fn($row) => $row->ClientName->client_name ?? '')
            ->addColumn('subject', fn($row) => $row->subject ?? '')
            ->addColumn('quarter', fn($row) => $row->quarter->name ?? '')
            ->addColumn('clientgroup', fn($row) => $row->clientGroup->name ?? '')
            ->addColumn('note', fn($row) => $row->note ?? '-') // Assuming `note` exists
            ->addColumn('net_amount', fn($row) => $row->net_amount ?? '')
            ->addColumn('tax_value_1', fn($row) => $row->tax_value_1 ?? '')
            ->addColumn('tax_value_amount_1', fn($row) => $row->tax_value_amount_1 ?? '')
            ->addColumn('tax_value_2', fn($row) => $row->tax_value_2 ?? '')
            ->addColumn('tax_value_amount_2', fn($row) => $row->tax_value_amount_2 ?? '')
            ->addColumn('total_amount', fn($row) => $row->total_amount ?? '')
            ->addColumn('grand_total', fn($row) => $row->grand_total ?? '')
            ->addColumn('round_off', fn($row) => $row->round_off ?? '')
            ->addColumn('company', fn($row) => $row->company->company_name ?? '')
            ->addColumn('financial_year', fn($row) => $row->finance->financial_year ?? '')
            ->addColumn('action', function ($row) {
                $editUrl = route('quatation.edit', $row->id);
                $deleteUrl = route('quatation.delete', $row->id);
                return '
                    <a href="#" class="text-info view-po mr-1" data-id="' . $row->id . '"><i class="fa fa-eye" style="font-size:15px;"></i></a>
                    <a href="' . $editUrl . '" class="text-success mr-1"><i class="fa fa-edit" style="font-size:15px;"></i></a>
                    <a href="' . $deleteUrl . '" onclick="return confirm(\'Are you sure?\');" class="text-danger"><i class="fa fa-trash" style="font-size:15px;"></i></a>
                    
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    $companies = CompanyDetail::all();
    $financialYears = FinancialYear::all();

    return view('masters.quotation.list', compact('companies', 'financialYears'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     
        $companies = CompanyDetail::all();
        $financial = FinancialYear::with('lut')->get();
        $clients_grp = Client::all();
        $clients_details = ClientDetail::all();
        $Quarters = Quarter::all();
        $makes = make::all();
        $taxes = DB::table('tax')->get();
        $emp = DB::table('employee_details')->get();
        $ref = DB::table('reference_entries')->get();
       $quotationNumber = $this->generateQuotationNumber($financial->first()?->id);
        return view('masters.quotation.add', compact('ref','emp','companies', 'financial', 'quotationNumber', 'clients_grp', 'clients_details', 'Quarters', 'makes', 'taxes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $quotation = $request->all();
        $data = Quotation::create([
            'company_id' => $quotation['company_id'],
            'fin_year_id' => $quotation['fin_year_id'],
            'quotation_no' => $quotation['quotation_no'],
            'quotation_date' => $quotation['quotation_date'],
            'quarter_id' => $quotation['quarter'],
            'client_group_id' => $quotation['client_group_id'],
            'client_name_id' => $quotation['client_name_id'],
            'contact_person_id' => $quotation['contact_person_id'],
          'hallmarking' => $quotation['hallmarking'],
            'emp_name_id' => $quotation['emp_id'],
            'ref_id' => $quotation['ref_id'],
            'note' => $quotation['note'],
            'net_amount' => $quotation['net_amount'],
            'tax_value_1' => $quotation['tax1'],
            'tax_value_amount_1' => $quotation['tax1_amount'],
            'tax_value_2' => $quotation['tax2'],
            'tax_value_amount_2' => $quotation['tax2_amount'],
            'total_amount' => $quotation['total_amount'],
            'grand_total' => $quotation['grand_total'],
            'round_off' => $quotation['round_off'],
        ]);


        $quotation_id =  $data->id;
        $items = $request->items;
        if (!empty($items)) {
            foreach ($items as $item) {
                QuotationProductCalculation::create([
                    'quotation_id' => $quotation_id,
                    'make_id' => $item['make_id'],
                    'model_id' => $item['model_id'],
                    'capacity' => $item['capacity'],
                    'readability' => $item['readability'],
                    'calibration' => $item['calibration'],
                    'calibration_charge' => $item['calibration_charge'],
                    'pan_size' => $item['pan_size'],
                    'price' => $item['item_price'],
                    'description' => $item['part_details'],
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
      
        $quotation = Quotation::where('id',$id)
        ->with(['quarter','ClientName','clientGroup','company','finance','product_data.make_data','product_data.model_data'])
        ->get();

      
      

        return response()->json($quotation);
    }

    /**
     * Show the form for editing the specified resource.
     */
  public function edit($id)
{
    $quotation = Quotation::with(['product_data','product_data.make_data','product_data.model_data'])->findOrFail($id);


   
     // assumes model is Quotation
   $selectedContactPersonId = $quotation->contact_person; 
    $quotationNumber = $quotation->quotation_no;
    $selectedClientId = $quotation->client_name_id;
    $companies = CompanyDetail::all();
    $financial = FinancialYear::with('lut')->get();
    $clients_grp = Client::all();
    $clients_details = ClientDetail::all();
    $Quarters = Quarter::all();
    $makes = Make::all();
    $taxes = DB::table('tax')->get();
    $ClientContactPerson = ClientContactPerson::all();
    $selectedQuarterId = $quotation->quarter_id;
     $emp = DB::table('employee_details')->get();
    $ref = DB::table('reference_entries')->get(); 
    return view('masters.quotation.edit', compact(
        'ref',
        'emp',
        'quotation',
        'quotationNumber',
        'companies',
        'financial',
        'clients_grp',
        'clients_details',
        'Quarters',
        'makes',
        'taxes',
        'selectedClientId',
        'ClientContactPerson',
        'selectedContactPersonId',
        'selectedQuarterId'
    ));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $quotation = $request->formData;
      

       $delete_ids = $request->deletedItemIds;

       if(!empty($delete_ids)){
        foreach($delete_ids as $list_id){ 
        QuotationProductCalculation::where('id',$list_id)->delete();  
        }
       }

        $quotationDetails =   Quotation::where('id',$id)->first();

  
    
        if ($request->formData['items']) {

          
     

            foreach ($request->formData['items'] as $item) {
          

                if (!empty($item['id'])) {
                   
                    QuotationProductCalculation::where('id', $item['id'])->update([
                    'quotation_id'  => $quotation['quotation_id'],
                    'make_id' => $item['make_id'],
                    'model_id' => $item['model_id'],
                    'capacity' => $item['capacity'],
                    'readability' => $item['readability'],
                    'calibration' => $item['calibration'],
                    'calibration_charge' => $item['calibration_charge'],
                    'pan_size' => $item['pan_size'],
                    'price' => $item['item_price'],
                    'description' => $item['part_details'],
                    ]);
                } else {
                  
                    QuotationProductCalculation::create([
                    'quotation_id'  => $quotation['quotation_id'],
                    'make_id' => $item['make_id'],
                    'model_id' => $item['model_id'],
                    'capacity' => $item['capacity'],
                    'readability' => $item['readability'],
                    'calibration' => $item['calibration'],
                    'calibration_charge' => $item['calibration_charge'],
                    'pan_size' => $item['pan_size'],
                    'price' => $item['item_price'],
                    'description' => $item['part_details'],
                    ]);
                }
            }
        }

            if(!empty($quotation)){

                $quotationDetails->update([
                'company_id' => $quotation['company_id'],
                    'fin_year_id' => $quotation['fin_year_id'],
                    'quotation_no' => $quotation['quotation_no'],
                    'quotation_date' => $quotation['quotation_date'],
                    'quarter_id' => $quotation['quarter'],
                    'client_group_id' => $quotation['client_group_id'],
                    'client_name_id' => $quotation['client_name_id'],
                    'contact_person_id' => $quotation['contact_person_id'],
                    'hallmarking' => 1,
                    'emp_name_id' => $quotation['emp_id'],
                    'ref_id' => $quotation['ref_id'],
                    'note' => $quotation['note'],
                    'net_amount' => $quotation['net_amount'],
                    'tax_value_1' => $quotation['tax1'],
                    'tax_value_amount_1' => $quotation['tax1_amount'],
                    'tax_value_2' => $quotation['tax2'],
                    'tax_value_amount_2' => $quotation['tax2_amount'],
                    'total_amount' => $quotation['total_amount'],
                    'grand_total' => $quotation['grand_total'],
                    'round_off' => $quotation['round_off'],

            ]);
            }

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       Quotation::where('id',$id)->delete();
       return redirect()->back();
    }

      public function generateQuotationNumberAjax(Request $request)
     {
        $quotationNo = $this->generateQuotationNumber($request->fin_year_id);

        return response()->json([
            'status' => $quotationNo !== null,
            'quotation_no' => $quotationNo ?? 'Invalid financial year'
        ]);
    }

       protected function generateQuotationNumber($financialYearId)
    {
        if (!$financialYearId) return null;

        $financial = FinancialYear::find($financialYearId);

        if (!$financial) return null;

        $fullYear = $financial->financial_year; 
        $years = explode('-', $fullYear);
        $fyShort = substr($years[0], -2) . '-' . substr($years[1], -2); 
        
        $prefix = 'MIM/CHN';

        $latestQuotation = Quotation::where('quotation_no', 'LIKE', "%$fyShort%")
            ->orderBy('id', 'desc')
            ->first();;
      
        if ($latestQuotation) {
            $lastNumber = (int)substr($latestQuotation->challan_no, -3);
            $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {

            $newNumber = '001';
        }

        return $prefix . '/' . $fyShort . '/' . $newNumber;
    }

    public function ClientGroup(Request $request)
    {


        $client_grp =  ClientDetail::where('client_group_id', $request->client_gr_id)->get();

        return response()->json(
            [
                'client_grp' => $client_grp
            ]
        );
    }


    public function client_add(Request $request)
    {
        $client_add =  ClientDetail::select('id', 'address')->where('id', $request->client_add_id)->first();


        $ClientContactPerson = ClientContactPerson::where('client_details_id', $client_add->id)->get();


        return response()->json(
            [
                'client_add' => $client_add,
                'ClientContactPerson' => $ClientContactPerson
            ]
        );
    }

    public function  make(Request $request)
    {

        $model = DB::table('model_details')->where('make_id', $request->make_id)->get();
        return response()->json($model);
    }


 public function search(Request $request)
{

    
    if ($request->ajax()) {
        $query = QuotationProductCalculation::with(['Quotation.clientGroup', 'make_data', 'model_data']);

        // Filter: Date Range
        if ($request->from_date && $request->to_date) {
            $query = $query->whereHas('Quotation', function ($q) use ($request) {
                $q->whereBetween('quotation_date', [$request->from_date, $request->to_date]);
            });
        }

        // Filter: Quotation No
        if (!empty($request->quotation_no)) {
            $query = $query->whereHas('Quotation', function ($q) use ($request) {
                $q->where('quotation_no', 'like', '%' . $request->quotation_no . '%');
            });
        }

        // Filter: Client Group
        if (!empty($request->client_group_id)) {
            $query = $query->whereHas('Quotation.clientGroup', function ($q) use ($request) {
                $q->where('id', $request->client_group_id);
            });
        }

        // Filter: Client Name
        if (!empty($request->client_name_id)) {
            $query = $query->whereHas('Quotation', function ($q) use ($request) {
                $q->where('client_name_id', $request->client_name_id);
            });
        }

        // Filter: Reference Name
        if (!empty($request->ref_name)) {
            $query = $query->whereHas('Quotation', function ($q) use ($request) {
                $q->where('ref_id', 'like', '%' . $request->ref_name . '%');
            });
        }

        // Filter: Employee
        if (!empty($request->employee_name)) {
            $query = $query->whereHas('Quotation', function ($q) use ($request) {
                $q->where('emp_name_id', 'like', '%' . $request->employee_name . '%');
            });
        }

        // Filter: Make
        if (!empty($request->make_id)) {
            $query = $query->where('make_id', $request->make_id);
        }

        // Filter: Model
        if (!empty($request->model_id)) {
            $query = $query->where('model_id', $request->model_id);
        }

        $data = $query->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('quotation_no', fn($row) => $row->Quotation->quotation_no ?? '')
            ->addColumn('clientgroup', fn($row) => $row->Quotation->clientGroup->name ?? '')
            ->addColumn('make', fn($row) => $row->make_data->name ?? '')
            ->addColumn('model', fn($row) => $row->model_data->model_name ?? '')
            ->addColumn('reference', fn($row) => $row->Quotation->ref_id ?? '')
            ->addColumn('emp_name_id', fn($row) => $row->Quotation->emp_name_id ?? '')
            ->addColumn('capacity', fn($row) => $row->capacity ?? '')
            ->addColumn('readability', fn($row) => $row->readability ?? '')
            ->addColumn('calibration', fn($row) => $row->calibration ?? '')
            ->addColumn('calibration_charge', fn($row) => $row->calibration_charge ?? '')
            ->addColumn('pan_size', fn($row) => $row->pan_size ?? '')
            ->addColumn('price', fn($row) => $row->price ?? '')
            ->addColumn('description', fn($row) => $row->description ?? '')
            ->addColumn('action', function ($row) {
                $editUrl = route('quatation.edit', $row->id);
                $deleteUrl = route('quatation.delete', $row->id);
                return '

                    <a href="" id="view_quo" class="text-info view-po" data-id="' . $row->Quotation->id . '"><i class="fa fa-eye" style="font-size:15px;"></i></a>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    // For first page load
    $clients_grp = Client::all();
    $makes = Make::all();
    return view('masters.quotation.summary', compact('clients_grp', 'makes'));
}

}
