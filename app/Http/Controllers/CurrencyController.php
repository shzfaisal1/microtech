<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;
use Yajra\DataTables\Facades\DataTables;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
     
        if ($request->ajax()) {
            $data = Currency::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('is_Default', function ($row) {
                    $checked = $row->is_Default == 1 ? 'checked' : '';
                    return '<input type="checkbox"  disabled ' . $checked . '>';
                })
                ->addColumn('action', function ($row) {
                    $editUrl = route('currency.edit', $row->id);
                    $deleteUrl = route('currency.delete', $row->id);
                    return '
                    <a href="' . $editUrl . '" class="btn btn-success"><i class="fa fa-edit"></i></a>
                    <a href="' . $deleteUrl . '" onclick="return confirm(\'Are you sure?\')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                ';
                })
                ->rawColumns(['is_Default', 'action'])
                ->make(true);
        }

        return view('masters.currency.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('masters.currency.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->is_Default == 1) {
            Currency::where('is_Default', 1)->update([
                'is_Default' => 0
            ]);
        }
        $validate = $request->validate([
            'currency_name' => 'required',
            'value' => 'required|integer',
            'symbol' => 'required',
            'is_Default' => 'sometimes|in:1,0',
        ]);
        
        $validate['created_by'] = GetSession();
        Currency::create($validate);
        return redirect()->route('currency.index')->with('add_currency', 'Currency Add Successfully!');
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
        $currency = Currency::findOrFail($id);
        return view('masters.currency.edit', compact('currency'));
    }


    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{
    $validate = $request->validate([
        'currency_name' => 'required',
        'value' => 'required|numeric',
        'symbol' => 'required',
    ]);

    $currency = Currency::findOrFail($id);
    
    
    
         $isDefault = $request->has('is_Default') && $request->is_Default == 1 ? 1 : 0;

        if ($isDefault) {
            Currency::where('is_Default', 1)
                ->where('id', '!=', $id)
                ->update(['is_Default' => 0]);
        }
        $validate['is_Default'] = $isDefault;  
        $currency->update($validate);

    return redirect()->route('currency.index')->with('success', 'Currency updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
{
    $currency = Currency::findOrFail($id);
    $currency->delete();

    return redirect()->route('currency.index')->with('delete', 'Currency deleted successfully');
}
}
