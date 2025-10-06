<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quarter;
use Yajra\DataTables\Facades\DataTables;

class QuarterController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    /**
     * Show the form for creating a new resource.
     */
    public function index(Request $request)
    {
         if ($request->ajax()) {
            $data = Quarter::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('quarter.edit', $row->id);
                    $deleteUrl = route('quarter.delete', $row->id);
                     
                    return '
                    <a href="' . $editUrl . '" class="btn btn-success btn-edit">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="' . $deleteUrl . '" onclick="return confirm(\'Are you sure you want to delete this invoice type?\');" class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                    </a>
                ';
                })
                
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('masters.quarter.list');
    }

    public function create()
    {
        return view('masters.quarter.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
        ]);

        $validatedData['created_by'] = GetSession();

        Quarter::create($validatedData);


        return redirect()->route('quarter.index')->with('Financial_Year', 'Quarter added successfully!');
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
   public function edit($id)
    {
        $quarter = Quarter::findOrFail($id);
        return view('masters.quarter.edit', compact('quarter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
             $request->validate([
            'name' => 'required|string|max:255',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
        ]);

        $quarter = Quarter::findOrFail($id);
        $quarter->update($request->all());

        return redirect()->route('quarter.index')->with('success', 'Quarter updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
    {
        Quarter::findOrFail($id)->delete();
        return redirect()->route('quarter.index')->with('delete', 'Quarter deleted successfully.');
    }
}
