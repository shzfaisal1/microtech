<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientType;
use Yajra\DataTables\Facades\DataTables;

class ClientTypeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ClientType::all();
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('client-type.edit', $row->id);
                    $deleteUrl = route('client-type.delete', $row->id);
                    return '
                        <a href="' . $editUrl . '" class="btn btn-success"><i class="fa fa-edit"></i></a>
                        <a href="' . $deleteUrl . '" onclick="return confirm(\'Are you sure?\')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('masters.client_type.list');
    }

    public function create()
    {
        return view('masters.client_type.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $validated['created_by'] = GetSession();
        ClientType::create($validated);

        return redirect()->route('client-type.index')->with('success', 'Client Type added successfully!');
    }

    public function edit($id)
    {
        $clientType = ClientType::findOrFail($id);
        return view('masters.client_type.edit', compact('clientType'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $validated['updated_by'] = GetSession();
        $clientType = ClientType::findOrFail($id);
        $clientType->update($validated);

        return redirect()->route('client-type.index')->with('success', 'Client Type updated successfully!');
    }

    public function destroy($id)
    {
        $clientType = ClientType::findOrFail($id);
        $clientType->delete();

        return redirect()->route('client-type.index')->with('success', 'Client Type deleted successfully!');
    }
}
