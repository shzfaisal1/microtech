<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buyer;
use Yajra\DataTables\Facades\DataTables;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Buyer::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('buyer.edit', $row->id);
                    $deleteUrl = route('buyer.delete', $row->id);

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

        return view('masters.buyer.list_buyer');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('masters.buyer.add_buyer');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'buyer_name' => 'required'
        ]);

        $validate['created_by'] = GetSession();
        Buyer::create($validate);

        return redirect()->route('buyer.index')->with('add_buyer', 'Buyer Add Successfully!');
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
        $buyer_data = Buyer::findorfail($id);

        return view('masters.buyer.edit_buyer', compact('buyer_data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Buyer::findorfail($id);

        $validate = $request->validate([
            'buyer_name' => 'required'
        ]);

        $validate['updated_by'] = GetSession();
        $data->update($validate);
        return redirect()->route('buyer.index')->with('update_buyer', 'Buyer Detail Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Buyer::find($id);
        $data->delete();
        return redirect()->back()
                         ->with('buyer_delete', 'Buyer Deleted successfully.');
    }
}
