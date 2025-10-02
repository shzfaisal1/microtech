<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Yajra\DataTables\Facades\DataTables;

class LocationController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Location::all();
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('locations.edit', $row->id);
                    $deleteUrl = route('locations.delete', $row->id);
                    return '
                        <a href="' . $editUrl . '" class="btn btn-success"><i class="fa fa-edit"></i></a>
                        <a href="' . $deleteUrl . '" onclick="return confirm(\'Are you sure?\')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('masters.location.list');
    }

    public function create()
    {
        return view('masters.location.add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
        ]);

        $validate['created_by'] = GetSession();
        Location::create($validate);

        return redirect()->route('locations.index')->with('success', 'Location added successfully!');
    }

    public function edit(string $id)
    {
        $location = Location::findOrFail($id);
        return view('masters.location.edit', compact('location'));
    }

    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'name' => 'required',
        ]);

        $validate['updated_by'] = GetSession();
        $location = Location::findOrFail($id);
        $location->update($validate);

        return redirect()->route('locations.index')->with('success', 'Location updated successfully!');
    }

    public function destroy(string $id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect()->route('locations.index')->with('success', 'Location deleted successfully!');
    }
}
