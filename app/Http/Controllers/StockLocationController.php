<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockLocation;
use Yajra\DataTables\Facades\DataTables;

class StockLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
             
       if ($request->ajax()) {
            $data = StockLocation::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('location.edit', $row->id);
                    $deleteUrl = route('location.delete', $row->id);

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
        return view('masters.stock-location.list');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('masters.stock-location.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'location_name' => 'required|string|max:255',

        ]);

        $validate['created_by'] = GetSession();
        StockLocation::create($validate);

        return redirect()->route('location.index')->with('success', 'Stock Location created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    $stockLocation = StockLocation::findOrFail($id);
        return view('masters.stock-location.edit', compact('stockLocation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'location_name' => 'required|string|max:255',
        ]);

        $stockLocation = StockLocation::findOrFail($id);
        $stockLocation->update($validate);

        return redirect()->route('location.index')->with('success', 'Stock Location updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stockLocation = StockLocation::findOrFail($id);
        $stockLocation->delete();

        return redirect()->route('location.index')->with('success', 'Stock Location deleted successfully.');
    }
}
