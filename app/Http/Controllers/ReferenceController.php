<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReferenceEntry;
use Str;
class ReferenceController extends Controller
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
        return view('masters.reference.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
       $data = $request->all();
        if ($request->hasFile('image')) {
        $file       = $request->file('image');
        $filename   = time() . '_' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/reference'), $filename);   // path: /public/uploads/employee
        $data['image'] = 'uploads/reference/' . $filename;          // store relative path in DB
    }

       ReferenceEntry::create($data);
       return redirect()->back();
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
