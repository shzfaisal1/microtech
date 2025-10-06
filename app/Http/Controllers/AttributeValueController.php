<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\AttributeDetail;
use App\Models\AttributeValue;
class AttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = AttributeValue::with('attribute');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('attribute_name', function ($row) {
                    return $row->attribute->name ?? '';
                })
                ->addColumn('action', function ($row) {
                    return '
                        <a class="text-primary edit-btn mr-1" data-id="'.$row->id.'"><i class="fa fa-edit" style="font-size:15px;"></i></a>
                        <a class="text-danger delete-btn" data-id="'.$row->id.'"><i class="fa fa-trash" style="font-size:15px;"></i></a>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $AttributeDetail = AttributeDetail::all();
      
         return view('masters.attribute-value.add',compact('AttributeDetail'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'attr_val_id' => 'required|exists:attribute_details,id',
            'name' => 'required|string|max:255'
        ]);

        AttributeValue::create([
            'attr_val_id' => $request->attr_val_id,
            'name' => $request->name,
        ]);

        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        $data = AttributeValue::findOrFail($id);
        return response()->json($data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'attr_val_id' => 'required|exists:attribute_details,id',
            'name' => 'required|string|max:255'
        ]);

        $value = AttributeValue::findOrFail($id);
        $value->update([
            
            'attr_val_id' => $request->attr_val_id,
            'name' => $request->name,
           
        ]);

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $value = AttributeValue::findOrFail($id);
        $value->delete();

        return response()->json(['success' => true]);
    }
}
