<?php

namespace App\Http\Controllers;

use App\Models\FinancialYear;
use Illuminate\Http\Request;
use App\Models\LUT;
use Yajra\DataTables\Facades\DataTables;
class LUTMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        
       if ($request->ajax()) {
        $data = LUT::with('financialYear')->get();

        return datatables()->of($data)
            ->addIndexColumn()
            ->addColumn('financial_year', function ($row) {
                return $row->financialYear->financial_year ?? '-';
            })
            ->addColumn('action', function ($row) {
                $editUrl = route('LUT.edit', $row->id);
                $deleteUrl = route('LUT.delete', $row->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-success"><i class="fa fa-edit"></i></a>
                    <a href="' . $deleteUrl . '" onclick="return confirm(\'Are you sure?\')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    return view('masters.LUT-master.list');
     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $FinancialYear = FinancialYear::all();
       return view('masters.LUT-master.add',compact('FinancialYear'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validate = $request->validate([
            'financial_year_id' => 'required',
            'LUT_number' => 'required',
            'LUT_note' => 'required|string|max:255',
        ]);
         $validate['created_by'] = GetSession();
        LUT::create($validate);
        return redirect()->route('LUT.index')->with('success', 'LUT created successfully.');
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
         $lut = LUT::findOrFail($id);
        $FinancialYear = FinancialYear::all();
        return view('masters.LUT-master.edit', compact('lut', 'FinancialYear')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
        'financial_year_id' => 'required',
        'LUT_number' => 'required',
    ]);

    $lut = LUT::findOrFail($id);
     $lut->update([
        'financial_year_id' => $request->financial_year_id,
        'LUT_number' => $request->LUT_number,
        'LUT_note' => $request->LUT_note,
         'updated_by' => GetSession(),
     ]);

    return redirect()->route('LUT.index')->with('success', 'LUT updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         LUT::findOrFail($id)->delete();
        return redirect()->route('LUT.index')->with('success', 'LUT deleted successfully');
    }
}
