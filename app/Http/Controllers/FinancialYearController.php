<?php

namespace App\Http\Controllers;

use App\Models\FinancialYear;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FinancialYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */ public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = FinancialYear::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('is_Default', function ($row) {
                    $checked = $row->is_Default == 1 ? 'checked' : '';
                    return '<input type="checkbox"  disabled ' . $checked . '>';
                })
                ->addColumn('action', function ($row) {
                    $editUrl = route('financial.edit', $row->id);
                    $deleteUrl = route('financial.delete', $row->id);
                    return '
                    <a href="' . $editUrl . '" class="btn btn-success"><i class="fa fa-edit"></i></a>
                    <a href="' . $deleteUrl . '" onclick="return confirm(\'Are you sure?\')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                ';
                })
                ->rawColumns(['is_Default', 'action'])
                ->make(true);
        }

        return view('masters.financial-year.view');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('masters.financial-year.financial-year');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->is_Default == 1) {
            FinancialYear::where('is_Default', 1)->update([
                'is_Default' => 0
            ]);
        }
        $validate = $request->validate([

            'financial_year' => 'required',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'description' => 'required',
            'is_Default' => 'sometimes|in:1,0',

        ]);

        $validate['created_by'] = GetSession();

        FinancialYear::create($validate);

        return redirect()->back()->with('Financial_Year', 'Financial Year Add Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(FinancialYear $financialYear) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $financialYear = FinancialYear::findOrFail($id);
        return view('masters.financial-year.final-year-edit', compact('financialYear'));
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{
    $financialYear = FinancialYear::findOrFail($id);

    $isDefault = $request->has('is_Default') && $request->is_Default == 1 ? 1 : 0;

    if ($isDefault) {
        FinancialYear::where('is_Default', 1)->update(['is_Default' => 0]);
    }

    $validatedData = $request->validate([
        'financial_year' => 'required',
        'from_date' => 'required|date',
        'to_date' => 'required|date',
        'description' => 'required',
    ]);

    $validatedData['is_Default'] = $isDefault;

    $financialYear->update($validatedData);

    return redirect()->route('financial.index')->with('Financial_Year', 'Financial Year updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinancialYear $financialYear) {}

    public function view(FinancialYear $financialYear) {}
}
