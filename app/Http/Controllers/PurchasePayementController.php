<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyDetail;
use App\Models\FinancialYear;
use App\Models\Vendor;
use App\Models\Account;
use App\Models\AttributeValue;
use App\Models\Calculation;
class PurchasePayementController extends Controller
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
        $companies = CompanyDetail::all();
        $financial_year = FinancialYear::all();
        $vendors =  Vendor::all();
        $accounts = Account::all();
      
      return view('masters.purchase-payment.add',compact('companies','financial_year','vendors','accounts'));
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

    public function getBalanceVendor(Request $request){
    
      
      $balance  = Calculation::with(['vendor','financialYear','companyDetail'])
      ->where('financial_year',1)
      ->where('company_id',3)
      ->where('vendor_id',11)->get();
        return response()->json($balance);
    }
}
