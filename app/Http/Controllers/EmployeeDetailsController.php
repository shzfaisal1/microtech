<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\EmployeeDetail;
use Str;
class EmployeeDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $designations = DB::table('designations')->get();
        $roles = DB::table('roles')->get();
       return view('masters.employees-details.add',compact('designations','roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
      public function store(Request $request)
{
    $validated = $request->validate([
        'title'         => 'required|in:1,2,3', // Assuming title values are 1,2,3
        'name'          => 'required|string|max:255',
        'gender'        => 'required|in:1,2,3',
        'email1'        => 'required|email|max:255',
        'dob'           => 'required|date',
        'deg_id'        => 'required|integer|exists:designations,id',
        'role_id'       => 'required|integer|exists:roles,id',
        'add'           => 'nullable|string|max:1000',
        'image'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // max 2MB
    ]);

    if ($request->hasFile('image')) {
        $file       = $request->file('image');
        $filename   = time() . '_' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/employee'), $filename);
        $validated['image'] = 'uploads/employee/' . $filename;
    }

    EmployeeDetail::create($validated);
    return redirect()->back()->with('success', 'Employee added successfully!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
