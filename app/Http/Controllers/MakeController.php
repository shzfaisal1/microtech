<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\make;
use Yajra\DataTables\Facades\DataTables;
class MakeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
      if ($request->ajax()) {
        $makes = Make::query();

        return DataTables::of($makes)
            ->addIndexColumn()
            ->addColumn('calculate_incentive', function ($row) {
                $checked = $row->calculate_incentive ? 'checked' : '';
                return '<input type="checkbox" disabled ' . $checked . '>';
            })

         
            ->addColumn('action', function ($row) {
                return '
                    <a class="edit-btn" data-id="' . $row->id . '">
                        <i class="fa fa-edit text-primary mr-2" style="font-size:15px;"></i>
                    </a>
                    <a class="delete-btn" data-id="' . $row->id . '">
                        <i class="fa fa-trash text-danger" style="font-size:15px;"></i>
                    </a>
                ';
            })

            ->rawColumns(['calculate_incentive', 'action']) 
            ->make(true);
    }
     return view('masters.make.make_add');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('masters.make.make_add');
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'note' => 'nullable|string',
        'calculate_incentive' => 'nullable|boolean',
    ]);

    make::create([
        'name' => $request->name,
        'note' => $request->note,
        'calculate_incentive' => $request->calculate_incentive ? 1 : 0,
    ]);

    return response()->json(['success' => true]);
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
    $make = Make::findOrFail($id);
    return response()->json($make);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $make = Make::findOrFail($id);

    $make->update([
        'name' => $request->name,
        'note' => $request->note,
        'calculate_incentive' => $request->calculate_incentive ? 1 : 0,
    ]);

    return response()->json(['success' => true]);
}

    /**
     * Remove the specified resource from storage.
     */
  public function destroy($id)
{
    Make::findOrFail($id)->delete();
    return response()->json(['success' => true]);
}

}
