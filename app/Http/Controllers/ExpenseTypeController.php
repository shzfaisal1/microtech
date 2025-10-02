<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseType;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class ExpenseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       
        if ($request->ajax()) {
            $data = ExpenseType::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('expense.edit', $row->id);
                    $deleteUrl = route('expense.delete', $row->id);

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

        return view('masters.expense.list_expense');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('masters.expense.add_expense');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'expense' => 'required'
        ]);
        $sessionId = Session::get('user_id');
        $validate['created_by'] = $sessionId;
        ExpenseType::create($validate);

        return redirect()->route('expense.index')->with('add_expenseType', 'Expense Type Add Successfully!');
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
         $data = ExpenseType::findorfail($id);

        return view('masters.expense.edit_expense', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
             $data = ExpenseType::findorfail($id);
         $sessionId = Session::get('user_id');

        $validate = $request->validate([
            'expense' => 'required',
        ]);
        $validate['updated_by'] = $sessionId;
        $data->update($validate);
        return redirect()->route('expense.index')->with('update_expenseType', 'Expense Type Updated Successfully!');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
           $tax = ExpenseType::find($id);
            $tax->delete();
              return redirect()->back()
            ->with('expense_delete', 'Expense Type Deleted successfully.');
    }
}
