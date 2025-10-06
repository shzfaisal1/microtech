<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportType;
use App\Models\Page;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
class ReportTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
        $data = ReportType::with('pages')->select('report_types.*');
        return DataTables::of($data)
            ->addColumn('report', function ($row) {
                return $row->pages->page ?? '-';
            })
            ->addColumn('action', function ($row) {
                $editUrl = route('report.edit', $row->id);
                $deleteUrl = route('report.delete', $row->id);
                return '
                    <a href="' . $editUrl . '" class="btn btn-success"><i class="fa fa-edit"></i></a>
                    <a href="' . $deleteUrl . '" onclick="return confirm(\'Are you sure?\')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                ';
            })
            ->rawColumns(['action']) // to render HTML
            ->make(true);
    }

    return view('masters.report-type.view_report');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pages = Page::all();
        return view('masters.report-type.add_report', compact('pages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sessionId = Session::get('user_id');
        $validate = $request->validate([
            'report_type' => 'required',
            'page_id' => 'required',

        ]);
        $validate['created_by'] = $sessionId;
        ReportType::create($validate);

        return redirect()->back()->with('add_reportType', 'Report Type Add Successfully!');
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
        $pages = Page::all();
        $edit_val = ReportType::with('pages')->find($id);
        return view('masters.report-type.edit_report', compact('edit_val', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sessionId = Session::get('user_id');

        $data = ReportType::findorfail($id);
        $validate = $request->validate([
            'report_type' => 'required',
            'page_id' => 'required',

        ]);
        $validate['updated_by'] = $sessionId;
        $data->update($validate);
        return redirect()->back()->with('update_report', 'Invoice Type Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $report = ReportType::find($id);
        $report->delete();
        return redirect()->back()
            ->with('report_delete', 'Report Type Deleted successfully.');
    }
}
