<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reminder;
use Yajra\DataTables\Facades\DataTables;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Reminder::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('reminder.edit', $row->id);
                    $deleteUrl = route('reminder.delete', $row->id);

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

        return view('masters.reminder.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('masters.reminder.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'reminder_value' => 'required'
        ]);

        $validate['created_by'] = GetSession();
        Reminder::create($validate);

        return redirect()->route('reminder.index')->with('add_reminder', 'Reminder Add Successfully!');
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
        $reminder_data = Reminder::findorfail($id);

        return view('masters.reminder.edit', compact('reminder_data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Reminder::findorfail($id);

        $validate = $request->validate([
            'reminder_value' => 'required'
        ]);

        $validate['updated_by'] = GetSession();
        $data->update($validate);
        return redirect()->route('reminder.index')->with('update_reminder', 'Reminder Detail Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Reminder::find($id);
        $data->delete();
        return redirect()->back()
            ->with('reminder_delete', 'Reminder Deleted successfully.');
    }
}
