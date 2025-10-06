<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsigneeName;
use Yajra\DataTables\Facades\DataTables;

class ConsigneeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ConsigneeName::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('consignee.edit', $row->id);
                    $deleteUrl = route('consignee.delete', $row->id);

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
        return view('masters.consignee.list_consignee');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('masters.consignee.add_consignee');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        $validate['created_by'] = GetSession();
        ConsigneeName::create($validate);

        return redirect()->back()->with('add_consignee', 'consignee Add Successfully!');
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
       
        $data = ConsigneeName::findorfail($id);
      
        return view('masters.consignee.edit_consignee', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $data = ConsigneeName::findorfail($id);

        $validate = $request->validate([
            'name' => 'required'
        ]);

        $validate['updated_by'] = GetSession();
        $data->update($validate);
        return redirect()->back()->with('update_consignee', 'consignee Detail Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          $data = ConsigneeName::find($id);
        $data->delete();
        return redirect()->back()
                         ->with('consignee_delete', 'consignee Deleted successfully.');
    }
}
