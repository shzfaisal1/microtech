<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\make;
use App\Models\AttributeValue;
use App\Models\ModelDetail;
use DB;



class ModelDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $make = make::all();
        $attributes = AttributeValue::with('attribute')->get();
           $models= ModelDetail::with([
                'make',
                'attributeValues.attribute' 
            ])->get();

          
       
         return view('masters.model-details.list',compact('make','attributes','models'));
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
    $validated = $request->validate([
        'make_id' => 'required|exists:makes,id',
        'model_name' => 'required|string|max:255',
        'type_of_code' => 'required|string',
        'code' => 'required|string',
        'available_stock' => 'required|integer',
        'reliance_item_code' => 'required|string',
        'attribute_ids' => 'nullable|array',
        'attribute_ids.*' => 'exists:attribute_values,id',
    ]);

    // 1. Create Model Detail Entry
    $model = ModelDetail::create([
        'make_id' => $validated['make_id'],
        'model_name' => $validated['model_name'],
        'type_of_code' => $validated['type_of_code'],
        'code' => $validated['code'],
        'available_stock' => $validated['available_stock'],
        'reliance_item_code' => $validated['reliance_item_code'],
       
    ]);

    // 2. Attach attribute values
    if (!empty($validated['attribute_ids'])) {
        $model->attributeValues()->attach($validated['attribute_ids']);
    }

    return redirect()->route('model.index')->with('success', 'Model details saved successfully.');
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
   
    $model_details = ModelDetail::with('make', 'attributeValues')->findOrFail($id); 
   

    $make = Make::all();
    $attributes = AttributeValue::with('attribute')->get();

    $selectedAttributes = $model_details->attributeValues->pluck('id')->toArray(); // ✅ fixed relation name

    return view('masters.model-details.list', compact('model_details', 'make', 'attributes', 'selectedAttributes'));
}


    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{
    $validated = $request->validate([
        'make_id' => 'required|exists:makes,id',
        'model_name' => 'required|string|max:255',
        'type_of_code' => 'nullable|string',
        'code' => 'nullable|string|max:255',
        'available_stock' => 'nullable|numeric',
        'reliance_item_code' => 'nullable|string|max:255',
        'attribute_ids' => 'nullable|array',
        'attribute_ids.*' => 'exists:attribute_values,id',
    ]);

    DB::beginTransaction();
    try {
        // Update model basic fields
        $model = ModelDetail::findOrFail($id);
        $model->make_id = $request->make_id;
        $model->model_name = $request->model_name;
        $model->type_of_code = $request->type_of_code;
        $model->code = $request->code;
        $model->available_stock = $request->available_stock;
        $model->reliance_item_code = $request->reliance_item_code;
        $model->save();

        // Sync pivot table with selected attributes
        $model->attributeValues()->sync($request->attribute_ids ?? []);

        DB::commit();
        return redirect()->route('model.index')->with('success', 'Model updated successfully.');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect()->back()->with('error', 'Failed to update model.')->withInput();
    }
}
 //
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    try {
        $model = ModelDetail::findOrFail($id);

        // Detach related attributes
        $model->attributeValues()->detach();

        // Delete the model
        $model->delete();

        return redirect()->route('model.index')->with('success', 'Model deleted successfully.');
    } catch (\Exception $e) {
        return redirect()->route('model.index')->with('error', 'Failed to delete model.');
    }
}


       public function GetModelName(string $id)
    {
       
    }
}
