<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Yajra\DataTables\Facades\DataTables;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Client::all();
            return datatables()->of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('client.edit', $row->id);
                    $deleteUrl = route('client.delete', $row->id);
                    return '
                        <a href="' . $editUrl . '" class="btn btn-success"><i class="fa fa-edit"></i></a>
                        <a href="' . $deleteUrl . '" onclick="return confirm(\'Are you sure?\')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('masters.client.list');
    }

    public function create()
    {
        return view('masters.client.add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
        ]);

        $validate['created_by'] = GetSession();
        Client::create($validate);

        return redirect()->route('client.index')->with('success', 'Client added successfully!');
    }

    public function edit(string $id)
    {
        $client = Client::findOrFail($id);
        return view('masters.client.edit', compact('client'));
    }

    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'name' => 'required',
        ]);

        $validate['updated_by'] = GetSession();
        $client = Client::findOrFail($id);
        $client->update($validate);

        return redirect()->route('client.index')->with('success', 'Client updated successfully!');
    }

    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('client.index')->with('success', 'Client deleted successfully!');
    }
}
