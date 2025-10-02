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

class SaleInvoicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
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
        //
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
