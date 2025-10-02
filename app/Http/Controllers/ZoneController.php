<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone; // Assuming you have a Zone model
use Yajra\DataTables\Facades\DataTables;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         if ($request->ajax()) {
        $data = Zone::all();

        return datatables()->of($data)
            ->addIndexColumn()
           
            ->addColumn('action', function ($row) {
                $editUrl = route('zone.edit', $row->id);
                $deleteUrl = route('zone.delete', $row->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-success"><i class="fa fa-edit"></i></a>
                    <a href="' . $deleteUrl . '" onclick="return confirm(\'Are you sure?\')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
        return view('masters.zone.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('masters.zone.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $validate = $request->validate([
            'name' => 'required',
         
        ]);

        $validate['created_by'] = GetSession();
        Zone::create($validate);

        return redirect()->route('zone.index')->with('success', 'Zone added successfully!');    
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
        $zone = Zone::findOrFail($id);
        return view('masters.zone.edit', compact('zone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatezone = $request->validate([
            'name' => 'required',
        ]);
        $validatezone['updated_by'] = GetSession();
        $zone = Zone::findOrFail($id);
        $zone->update($validatezone);

        return redirect()->route('zone.index')->with('success', 'Zone updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $zone = Zone::findOrFail($id);
        $zone->delete();

        return redirect()->route('zone.index')->with('success', 'Zone deleted successfully!');
    }
}
