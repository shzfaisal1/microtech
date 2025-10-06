<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\ClientType;
use App\Models\Zone;
use App\Models\Location;
use Illuminate\Support\Facades\DB;
class ClientNameController extends Controller
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
    $clients_data = [];
        $clients_data['client_group'] = Client::all();
        $clients_data['client_type'] =ClientType::all();
        $clients_data['client_zone '] =Zone::all();
        $clients_data['location'] =Location::all();


         
        return view('masters.client-name.add',compact('clients_data'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
  
        
        $clientId = DB::table('clients_details')->insertGetId([
            'client_name'        => $request->client_name,
            'print_name'         => $request->print_name,
            'client_group_id'    => $request->client_group_id,
            'zone_id'            => $request->zone_id,
            'location_id'        => $request->location_id,
            'client_type_id'     => $request->client_type_id,
            'state'              => $request->state,
            'address'            => $request->address,
            'pan_no'             => $request->pan_no,
            'gstin'              => $request->gstin,
            'contact_no1'        => $request->contact_no1,
            'contact_no2'        => $request->contact_no2,
            'email_id_1'            => $request->email_id_1,
            'email_id_2'            => $request->email_id_2,
            'fax'                => $request->fax,
            'web_add'            => $request->web_add,
            'vat_tin_no'         => $request->vat_tin_no,
            'vat_tin_date'       => $request->vat_tin_date,
            'cst_tin_no'         => $request->cst_tin_no,
            'cst_tin_date'       => $request->cst_tin_date,
            'service_tax_no'     => $request->service_tax_no,
            'related_vendor_id'  => $request->related_vendor_id,
            'updated_by'         => null,
            'created_at'         => now(),
            'updated_at'         => now(),
        ]);

  
        if ($request->has('name') && is_array($request->name)) {
          
            foreach ($request->name as $index => $name) {
                if (!empty($name)) {
                    DB::table('client_contact_people')->insert([
                        'client_details_id' => $clientId,
                        'name'              => $name,
                        'designation'       => $request->designation[$index] ?? null,
                        'contact_1'          => $request->contact_1[$index] ?? null,
                        'contact_2'          =>  $request->contact_2[$index] ?? null,
                        'email_1'           => $request->email_1[$index] ?? null,
                        'email_2'           => $request->email_2[$index] ?? null,
                        'created_at'        => now(),
                        'updated_at'        => now(),

                    ]);
                }
            }
        }

     
        return redirect()->back()->with('success', 'Client and contact persons saved successfully.');

    
     return redirect()->back()->with('error', 'Error occurred: ' . $e->getMessage());
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

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
