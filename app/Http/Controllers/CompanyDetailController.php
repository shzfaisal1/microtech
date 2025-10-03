<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyDetails\StoreCompanyDetailRequest;
use App\Http\Requests\CompanyDetails\UpdateCompanyDetailRequest;
use App\Models\CompanyDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CompanyDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('masters.company-details.company-details');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyDetailRequest $request)
    {

        CompanyDetail::create($request->validated());
        return redirect()->route('masters.company-details.view-file')
        ->with('success', 'Company created successfully.');
       
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyDetail $companyDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyDetail $companyDetail, $id)
    {
      
        $company = CompanyDetail::find($id);
   
        return view('masters.company-details.company-edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyDetailRequest $request, $id)
    {
        $company = CompanyDetail::find($id);
        $company->update($request->validated());
     

        return redirect()->route('masters.company-details.view-file')
            ->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $company = CompanyDetail::find($id);
        $company->delete();
        return redirect()->route('masters.company-details.view-file')
            ->with('success', 'Company Deleted successfully.');
    }


    public function view()
    {
        $companies = CompanyDetail::paginate(10);
        return view('masters.company-details.company_view', compact('companies'));
    }
}
