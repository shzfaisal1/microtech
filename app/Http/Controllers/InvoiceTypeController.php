<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoiceType;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class InvoiceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
          
        if ($request->ajax()) {        
            $data = InvoiceType::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('invoice.edit', $row->id);
                    $deleteUrl = route('invoice.delete', $row->id);

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

        return view('masters.invoice-type.list_invoice');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


        return view('masters.invoice-type.add_invoice');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sessionId = Session::get('user_id');
        $validate = $request->validate([
            'invoice_type' => 'required',
            'stamp_description' => 'required',
            'unstamp_description' => 'required',
        ]);



        InvoiceType::create([
            'invoice_type' => $request->invoice_type,
            'stamp_description' =>  $request->stamp_description,
            'unstamp_description' => $request->unstamp_description,
            'created_by'        => $sessionId
        ]);

        return redirect()->back()->with('add_invoice_type', 'Invoive Type Add Successfully!');
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
        $edit_val = InvoiceType::findorfail($id);

        return view('masters.invoice-type.edit_invoice', compact('edit_val'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = InvoiceType::findorfail($id);
        $sessionId = Session::get('user_id');

        $validate = $request->validate([
            'invoice_type' => 'required',
            'stamp_description' => 'required',
            'unstamp_description' => 'required',
        ]);
        $validate['updated_by'] = $sessionId;
        $data->update($validate);
        return redirect()->back()->with('update_invoice', 'Invoice Type Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tax = InvoiceType::find($id);
        $tax->delete();
        return redirect()->back()
            ->with('invoice_delete', 'Invoice Type Deleted successfully.');
    }
}
