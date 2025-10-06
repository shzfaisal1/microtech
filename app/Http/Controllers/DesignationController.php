<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;
use Yajra\DataTables\Facades\DataTables;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
          if ($request->ajax()) {
            $data = Designation::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('designation.edit', $row->id);
                    $deleteUrl = route('designation.delete', $row->id);

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
      return view('masters.designation.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('masters.designation.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validate = $request->validate([
            'designation' => 'required|unique:designations,designation',
        ]);
        $validate['created_by'] = GetSession();
        Designation::create($validate);
        return redirect()->route('designation.index')->with('success', 'Designation created successfully.');
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
        $designation = Designation::findOrFail($id);
        return view('masters.designation.edit', compact('designation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $request->validate([
            'designation' => 'required|unique:designations,designation,' . $id
        ]);

        $designation = Designation::findOrFail($id);
        $designation->update([
            'designation' => $request->designation,
            'updated_by' => GetSession(),    
        ]);

        return redirect()->route('designation.index')->with('success', 'Designation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $designation = Designation::findOrFail($id);
        $designation->delete();
        return redirect()->route('designation.index')->with('success', 'Designation deleted successfully.');
    }
}
