<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;
class TaxController extends Controller
{
   public function index(){
    return view('masters.tax.add_tax_details');
   }

   public function store(Request $request){
   
    $validate = $request->validate([
        'tax_name' => 'required',
        'tax_value' => 'required|integer',
         'status' => 'sometimes|in:1,0',
    ]);

    Tax::create($validate);

    return redirect()->back()->with('add_tax','Tax Add Successfully!');
    
   }

   public function view(){

    $taxes =  Tax::paginate(10);
    return view('masters.tax.list_tax',compact('taxes'));
   }


    public function edit($id)
    {
    $edit_val = Tax::find($id);
    return view('masters.tax.edit_tax',compact('edit_val'));  
    }

     public function  update(Request $request ,$id)
    {
        $request->validate([
            'tax_name' => 'required|string|max:255',
            'tax_value' => 'required|numeric|min:0',
        ]);

        $tax = Tax::findOrFail($id);
        $tax->tax_name = $request->tax_name;
        $tax->tax_value = $request->tax_value;
        $tax->status = $request->has('status') ? 0 : 1; 

        $tax->save();
    return redirect()->back()->with('update_tax','Tax Updated Successfully!');
 
    }
  public function destroy($id)
    {
        $tax = Tax::find($id);
        $tax->delete();
        return redirect()->back()
        ->with('tax_delete', 'Tax Deleted successfully.');
    }

}
