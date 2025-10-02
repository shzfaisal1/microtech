<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\VednorContactPerson;
use App\Models\Currency;
use App\Models\CompanyDetail;
use App\Models\FinancialYear;
use App\Models\POEntry;
use App\Models\PoDetail;
use Yajra\DataTables\Facades\DataTables;

class POEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = PoDetail::with(['financialYear', 'companyDetail', 'vendor', 'contactPersons']);

            if ($request->filled('company_id')) {
                $query->where('company_id', $request->company_id);
            }

            if ($request->filled('financial_year_id')) {

                $query->where('financial_year_id', $request->financial_year_id);
            }

            return DataTables::of($query->get())

                ->addIndexColumn()
                ->addColumn('company_id', fn($row) => $row->companyDetail->company_name ?? '')
                ->addColumn('financial_year', fn($row) => $row->financialYear->financial_year ?? '')
                ->addColumn('vendor_id', fn($row) => $row->vendor->name ?? '')
                ->addColumn('contact_person_name', fn($row) => $row->contactPersons->name ?? '')
                ->addColumn('contact_person_contact', fn($row) => $row->contactPersons->contact1 ?? '')
                ->addColumn('po_no', fn($row) => $row->po_no)
                ->addColumn('po_date', fn($row) => \Carbon\Carbon::parse($row->po_date)->format('d-m-Y')) // optional date format
                ->addColumn('quantity', fn($row) => $row->quantity)
                ->addColumn('total', fn($row) => number_format($row->total, 2))
                ->addColumn('priceINR', fn($row) => number_format($row->priceINR, 2))
                ->addColumn('action', function ($row) {
                    $editUrl = route('po.edit', $row->id);
                    $deleteUrl = route('po.delete', $row->id);
                    return '
                    <a href="#" class="text-success view-po mr-1" data-id="' . $row->id . '"><i class="fa fa-eye" style="font-size:15px;"></i></a>
                    <a href="' . $editUrl . '" class="text-primary mr-1"><i class="fa fa-edit" style="font-size:15px;"></i></a>
                    <a href="' . $deleteUrl . '" onclick="return confirm(\'Are you sure?\');" class="text-danger"><i class="fa fa-trash" style="font-size:15px;"></i></a>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }


        $companies = CompanyDetail::all();
        $financialYears = FinancialYear::all();

        return view('masters.po-entry.list', compact('companies', 'financialYears'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendors = Vendor::all();
        $companies = CompanyDetail::all();
        $currency = Currency::where('is_Default', 1)->get();
        $financial = FinancialYear::with('lut')->get();
        return view('masters.po-entry.add', compact('vendors', 'currency', 'companies', 'financial'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->header;
        $summary =  $request->summary;

        $poDetail = PoDetail::create([
            'company_id' => $data['company_id'],
            'financial_year_id' => $data['financial_year_id'],
            'vendor_id' => $data['vendor_id'],
            'contact_person_id' => $data['contact_person_id'],
            'po_no'  => $data['po_no'],
            'po_date'  => $data['po_date'],
            'quantity' => $summary['total_quantity'],
            'price'  => $summary['total_price'],
            'total' => $summary['total_amount'],
            'priceINR' => $summary['total_price_inr'],
        ]);




        $poId =    $poDetail->id;
        $items = $request->items;




        if (!empty($items)) {
            foreach ($items as $item) {

                POEntry::create([
                    'po_id' => $poId,
                    'make_id' => 1,
                    'model_id' => 1,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'total' => $item['total'],
                    'priceINR' => $item['price_inr'],
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function view($id)

    {

        $po_detail = PoDetail::with(['financialYear', 'companyDetail', 'vendor', 'contactPersons', 'poEntry'])
            ->where('id', $id)
            ->get();
        return response()->json($po_detail);
    }

    /**
     * Show the form for editing the specified resource.
     */




    public function update(Request $request, string $id)
    {

        if ($request->has('deleted_items')) {
            foreach ($request->deleted_items as $del) {
                POEntry::where('id', $del)->delete();
            };
        }


        if ($request->has('items')) {

            $items = $request->items;

            foreach ($items as $item) {

                if (!empty($item['id'])) {
                    POEntry::where('id', $item['id'])->update([
                        'make_id' => $item['make_id'],
                        'model_id' => $item['model_id'],
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                        'total' => $item['total'],
                        'priceINR' => $item['price_inr'],
                    ]);
                } else {
                    POEntry::create([
                        'make_id' => $item['make_id'],
                        'po_id' =>   $request->po_id,
                        'model_id' => $item['model_id'],
                        'quantity' => $item['quantity'],
                        'price' =>  $item['price'],
                        'total' =>  $item['total'],
                        'priceINR' => $item['price_inr'],
                    ]);
                }
            }
        }
        if ($request->has('summary')) {
            $cal = $request->input('summary');
            $calculation = PoDetail::where('id', $request->po_id)->first();
            if ($calculation) {
                $calculation->update([
                    'quantity' => $cal['total_quantity'],
                    'total' =>  $cal['total_amount'],
                    'price' =>   $cal['total_price'],
                    'priceINR' => $cal['total_price_inr']
                ]);
            }
        }
        return response()->json(['status' => true, 'message' => 'PO Entry updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $poEntry =  PoDetail::where('id', $id)->delete();
        return redirect()->back();
    }

    public function vendorContacts(Request $request)
    {

        $vendor_id = $request->vendor_id;
        if ($vendor_id) {
            $vendor_add = Vendor::where('id', $vendor_id)->first();
            $contact = VednorContactPerson::where('vendor_id', $vendor_id)->get();
            return response()->json([
                'vendor' => $vendor_add,
                'contact_persons' => $contact
            ]);
        } else {
            return response()->json([]);
        }
    }
    public function getCurrencyVal(Request $request)
    {

        $currency_id = $request->currency_id;
        if (!empty($currency_id)) {
            $currency_val = Currency::where('is_Default', 1)->where('id', $currency_id)->first();
            return response()->json($currency_val);
        } else {
            return response()->json([]);
        }
    }

    public function edit_data($id)
    {

        $po = PoDetail::with([

            'poEntry',
            'vendor',
            'contactPersons',
            'financialYear',
            'companyDetail',
            'currency'

        ])->where('id', $id)->firstOrFail();

        $companies = CompanyDetail::all();
        $vendors = Vendor::all();
        $contact_persons = VednorContactPerson::all();
        $financial = FinancialYear::all();
        $currency = Currency::all();


        return view('masters.po-entry.edit', compact(
            'po',
            'companies',
            'vendors',
            'contact_persons',
            'financial',
            'currency'
        ));
    }
}