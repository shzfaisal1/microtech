<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor; 
use App\Models\VednorContactPerson;
use Yajra\DataTables\Facades\DataTables;
class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       
          if ($request->ajax()) {
            $data = Vendor::all();
            return DataTables::of($data)
                ->addIndexColumn()
                 ->addColumn('phone', function($row) {
                return $row->phone1 . ' / ' . $row->phone2;
            })
               ->addColumn('email', function($row) {
                return $row->email_id_1  . ' / ' . $row->email_id_2;
            })
                ->addColumn('vat_no', function($row) {
                return $row->vat_tin_no_1  . ' / ' . $row->vat_tin_no_2;
            })
            ->addColumn('cst_no', function($row) {
                return $row->cst_tin_no_1  . ' / ' . $row->cst_tin_no_2;
            })
                ->addColumn('action', function ($row) {
                    $editUrl = route('vendor.edit', $row->id);
                    $deleteUrl = route('vendor.delete', $row->id);

                    return '
                    <a href="' . $editUrl . '" class="text-primary btn-edit">
                        <i class="fa fa-edit mr-1" style="font-size:16px;"></i>
                    </a>
                    <a href="' . $deleteUrl . '" onclick="return confirm(\'Are you sure you want to delete this invoice type?\');" class="text-danger">
                        <i class="fa fa-trash" style="font-size:16px;"></i>
                    </a>
                ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
       return view('masters.vendor.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('masters.vendor.vendor-master');
    }

    /**
     * Store a newly created resource in storage.
     */



    public function store(Request $request)
        {
        
        $validated = $request->validate([
                'name' => 'required|string|max:255',
                'print_name_as' => 'required|string|max:255',
                'phone1' => 'nullable|string|max:20',
                'phone2' => 'nullable|string|max:20',
                'email_id_1' => 'nullable|email',
                'email_id_2' => 'nullable|email',
                'address' => 'nullable|string|max:255',
                'vat_tin_no_1' => 'nullable|string|max:50',
                'vat_tin_no_2' => 'nullable|string|max:50',
                'cst_tin_no_1' => 'nullable|string|max:50',
                'cst_tin_no_2' => 'nullable|string|max:50',
                'pan_no' => 'nullable|string|max:50',
                'gst_no' => 'nullable|string|max:50',
                'web_address' => 'nullable|string|max:255',
                'bank_name' => 'nullable|string|max:100',
                'bank_account_no' => 'nullable|string|max:50',
                'bank_ifsc_code' => 'nullable|string|max:20',
                'bank_add' => 'nullable|string|max:255',
                'bank_branch_name' => 'nullable|string|max:100',
                'balance' => 'nullable|numeric',
                'service_tax_no' => 'nullable|string|max:100',
            
            ]);

            $validated['created_by'] = GetSession(); 

            $vendor = Vendor::create($validated);
        
            
            if ($request->has('contact_person_name')) {
                foreach ($request->contact_person_name as $index => $name) {
                   
                    VednorContactPerson::create([
                        'vendor_id' => $vendor->id,
                        'name' => $name,
                        'designation' => $request->desg_person_name[$index] ?? null,
                        'contact1' => $request->contact_person_no1[$index] ?? null,
                        'contact2' => $request->contact_person_no2[$index] ?? null,
                        'email1' => $request->contact_person_email1[$index] ?? null,
                        'email2' => $request->contact_person_email2[$index] ?? null,
                    ]);
                }
            }

            return redirect()->route('vendor.index')->with('success', 'Vendor and Contact Persons Added Successfully.');
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
        $vendor = Vendor::with('contactPersons')->findOrFail($id);;
        return view('masters.vendor.edit',compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required|max:255',
        'print_name_as' => 'required|string|max:255',
        'phone1' => 'nullable|string|max:20',
        'phone2' => 'nullable|string|max:20',
        'email_id_1' => 'nullable|email',
        'email_id_2' => 'nullable|email',
        'address' => 'nullable|string|max:255',
        'vat_tin_no_1' => 'nullable|string|max:50',
        'vat_tin_no_2' => 'nullable|string|max:50',
        'cst_tin_no_1' => 'nullable|string|max:50',
        'cst_tin_no_2' => 'nullable|string|max:50',
        'pan_no' => 'nullable|string|max:50',
        'gst_no' => 'nullable|string|max:50',
        'web_address' => 'nullable|string|max:255',
        'bank_name' => 'nullable|string|max:100',
        'bank_account_no' => 'nullable|string|max:50',
        'bank_ifsc_code' => 'nullable|string|max:20',
        'bank_add' => 'nullable|string|max:255',
        'bank_branch_name' => 'nullable|string|max:100',
        'balance' => 'nullable|numeric',
        'service_tax_no' => 'nullable|string|max:100',
    ]);

    $vendor = Vendor::findOrFail($id);
    $vendor->update($validated);

    // Optional: clear old contact persons (if you want to fully replace)
    VednorContactPerson::where('vendor_id', $vendor->id)->delete();

    // Save new contact persons
    if ($request->has('contact_person_name')) {
        foreach ($request->contact_person_name as $index => $name) {
            if ($name) {
                VednorContactPerson::create([
                    'vendor_id' => $vendor->id,
                    'name' => $name,
                    'designation' => $request->desg_person_name[$index] ?? null,
                    'contact1' => $request->contact_person_no1[$index] ?? null,
                    'contact2' => $request->contact_person_no2[$index] ?? null,
                    'email1' => $request->contact_person_email1[$index] ?? null,
                    'email2' => $request->contact_person_email2[$index] ?? null,
                ]);
            }
        }
    }

    return redirect()->route('vendor.index')->with('success', 'Vendor and Contact Persons Updated Successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         Vendor::findOrFail($id)->delete();
         return redirect()->back();
    }
}
