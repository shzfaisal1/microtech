<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Yajra\DataTables\Facades\DataTables;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Account::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('is_Default', function ($row) {
                    $checked = $row->is_Default == 1 ? 'checked' : '';
                    return '<input type="checkbox"  disabled ' . $checked . '>';
                })
                ->addColumn('action', function ($row) {
                    $editUrl = route('account.edit', $row->id);
                    $deleteUrl = route('account.delete', $row->id);
                    return '
                    <a href="' . $editUrl . '" class="btn btn-success"><i class="fa fa-edit"></i></a>
                    <a href="' . $deleteUrl . '" onclick="return confirm(\'Are you sure?\')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                ';
                })
                ->rawColumns(['is_Default', 'action'])
                ->make(true);
        }

        return view('masters.account.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('masters.account.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        if ($request->is_Default == 1) {
            Account::where('is_Default', 1)->update([
                'is_Default' => 0
            ]);
        }
        $validate = $request->validate([
            'account_name' => 'required',
            'account_holder_name' => 'required',
            'account_holder_add' => 'required',
            'account_no' => 'required|integer',
            'bank_name' => 'required',
            'branch' => 'required',
            'ifsc' => 'required',
            'bank_add' => 'required|nullable',
            'is_Default' => 'sometimes|in:1,0',
        ]);

        $validate['created_by'] = GetSession();
        Account::create($validate);
        return redirect()->route('account.index')->with('add_account', 'Account Add Successfully!');
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
        $account = Account::findOrFail($id);
        return view('masters.account.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'account_name' => 'required|string|max:255',
            'account_holder_name' => 'required|string|max:255',
            'account_holder_add' => 'required|string|max:255',
            'account_no' => 'required|integer',
            'bank_name' => 'required|string|max:255',
            'branch' => 'required|string|max:255',
            'ifsc' => 'required|string|max:255',
            'bank_add' => 'required|string|max:255',
            'is_Default' => 'nullable|in:1,0',
        ]);


        $account = Account::findOrFail($id);

        $isDefault = $request->has('is_Default') && $request->is_Default == 1 ? 1 : 0;

        if ($isDefault) {
            Account::where('is_Default', 1)
                ->where('id', '!=', $id)
                ->update(['is_Default' => 0]);
        }
        $validatedData['is_Default'] = $isDefault;
        $validatedData['updated_by'] = GetSession();
        $account->update($validatedData);

        return redirect()->route('account.index')->with('update_account', 'Account Updated Successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $account = Account::findOrFail($id);

        $account->delete();

        return redirect()->route('account.index')->with('delete_account', 'Account deleted successfully!');
    }
}
