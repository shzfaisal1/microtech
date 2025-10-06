<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttributeDetail;
use Yajra\DataTables\Facades\DataTables;
class AttributeDetails extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    if ($request->ajax()) {
        $data = AttributeDetail::select(['id', 'name']);
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '
                    <a href="javascript:void(0)" class="edit-btn text-primary mr-1" data-id="'.$row->id.'"><i class="fa fa-edit" style="font-size:15px;"></i></a>
                    <a href="javascript:void(0)" class="text-danger delete-btn" data-id="'.$row->id.'"><i class="fa fa-trash" style="font-size:15px;"></i></a>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    return view('masters.attribute_details.add');
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string']);
        AttributeDetail::create($request->all());
        return response()->json(['success' => true, 'message' => 'Attribute added successfully']);
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
    $attribute =  AttributeDetail::findOrFail($id);
    return response()->json($attribute);
}

public function update(Request $request, $id)
{
    $attribute = AttributeDetail::findOrFail($id);
    $attribute->update($request->all());
    return response()->json(['success' => true, 'message' => 'Attribute updated successfully']);
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
{
    AttributeDetail::findOrFail($id)->delete();
    return response()->json(['success' => true, 'message' => 'Attribute deleted']);
}
}