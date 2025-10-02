@extends('master')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>

<style>
    .bootstrap-tagsinput {
        width: 100% !important;
        min-height: 38px;
    }
      .scrollable-select {
    max-height: 150px;    /* Height of the visible area */
    overflow-y: auto;     /* Enable vertical scroll */
  }
</style>

@section('main')
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Proforma Entry</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Challan</li>
        </ol>
    </div>
</div>

{{-- 🔷 Company & Financial Year --}}
<div class="search-client-info">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- Company -->
                        <div class="col-md-6 mb-3">
                            <label>Company Name <span class="text-danger">*</span> :</label>
                            <select class="form-control select2" id="company_id" name="company_id">
                                <option value="">Select Company</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Financial Year -->
                        <div class="col-md-6 mb-3">
                            <label>Financial Year <span class="text-danger">*</span> :</label>
                            <select class="form-control select2" id="financial_id" name="financial_id">
                                <option value="">Select Year</option>
                                @foreach($financial as $fy)
                                    <option value="{{ $fy->id }}">{{ $fy->financial_year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>

{{-- 🔷 Add Challan Invoice --}}
<div class="search-client-info">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
  <div class="card-body">
    <h5 class="mb-3 fw-bold">Add Proforma Invoice</h5>
    <div class="row">
      <!-- Left column: PI No/Date, Quarter, PO No/Date, Challan No/Date -->
      <div class="col-md-4 mb-3">
        <label>PI No/ Date <span class="text-danger">*</span></label>
        <div class="input-group">
          <input type="text" class="form-control" name="pl_no" id="pl_no" value="{{ old('pl_no', $pl_no ?? '') }}" readonly>
          <input type="date" class="form-control" name="pl_date" id="pl_date" value="{{ old('pl_date') }}">
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <label>Quarter <span class="text-danger">*</span></label>
        <div class="d-flex align-items-stretch">
          <select class="form-control select2" name="quarter_id" id="quarter_id">
            @foreach($quarters as $q)
              <option value="{{ $q->id }}" {{ old('quarter_id') == $q->id ? 'selected' : '' }}>
                {{ $q->name }}
              </option>
            @endforeach
          </select>
          <a href="{{ url('quarter-master') }}" class="btn btn-outline-light ms-2 d-flex align-items-center justify-content-center" style="width:40px">
            <i class="fa fa-plus text-success"></i>
          </a>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <label>PO No/ Date</label>
        <div class="input-group">
          <input type="text" class="form-control" name="po_no" id="po_no" value="{{ old('po_no') }}">
          <input type="date" class="form-control" name="po_date" id="po_date" value="{{ old('po_date') }}">
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <label>Challan No/ Date</label>
        <div class="input-group">
               <select class="form-control scroll-dropdown" name="challan_no" id="challan_no" >
            @foreach($challans as $challan)
              <option value="{{ $challan->id }}" >
                {{ $challan->challan_no }}
              </option>
            @endforeach
            </select>
          {{-- <input type="text" class="form-control" name="challan_no" id="challan_no" value="{{ old('challan_no') }}"> --}}
          <input type="date" class="form-control" name="challan_date" id="challan_date" value="{{ old('challan_date') }}">
        </div>
      </div>
<div class="col-md-4 mb-3">
  <label>Proforma Type <span class="text-danger">*</span></label>
  <div class="d-flex align-items-stretch">
    <select class="form-control select2" name="proforma_type_id" id="proforma_type_id">
      <option value="">Select</option>
      @foreach($proforma_types as $type)
        <option value="{{ $type->id }}" {{ old('proforma_type_id') == $type->id ? 'selected' : '' }}>
          {{ $type->invoice_type }}
        </option>
      @endforeach
    </select>
    <a href="{{ url('proforma-type-master') }}" class="btn btn-outline-light d-flex align-items-center justify-content-center ms-2" style="width: 40px;">
      <i class="fa fa-plus text-success"></i>
    </a>
  </div>
</div>

      <!-- Middle column: Proforma Type, Description, Desp Through -->
      <div class="col-md-4 mb-3">
        <label>Proforma Type <span class="text-danger">*</span></label>
        <div class="d-flex align-items-center">
          <div class="form-check me-3">
            <input class="form-check-input" type="radio" name="proforma_type" id="type_stamp" value="Stamp" {{ old('proforma_type')=='Stamp'?'checked':'' }}>
            <label class="form-check-label" for="type_stamp">Stamp</label>
          </div>
          <div class="form-check me-3">
            <input class="form-check-input" type="radio" name="proforma_type" id="type_unstamp" value="Unstamp" {{ old('proforma_type')=='Unstamp'?'checked':'' }}>
            <label class="form-check-label" for="type_unstamp">Unstamp</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="proforma_type" id="type_none" value="None" {{ old('proforma_type')=='None'?'checked':'' }}>
            <label class="form-check-label" for="type_none">None</label>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <label>Description</label>
        <textarea class="form-control" name="description" id="description" rows="1">{{ old('description') }}</textarea>
      </div>
      <div class="col-md-4 mb-3">
        <label>Desp Through</label>
        <select class="form-control select2" name="desp_through" id="desp_through">
          <option value="">Select</option>
          <option value="Courier" {{ old('desp_through')=='Courier'?'selected':'' }}>By Courier</option>
          <option value="Hand" {{ old('desp_through')=='Hand'?'selected':'' }}>By Hand</option>
          <option value="Transport" {{ old('desp_through')=='Transport'?'selected':'' }}>By Transport</option>
        </select>
      </div>

      <!-- Right column: Contract Period, Employee Name, Referred By, Comment -->
      <div class="col-md-4 mb-3">
        <label>Contract Period</label>
        <div class="input-group">
          <input type="date" class="form-control" name="contract_start" id="contract_start" value="{{ old('contract_start') }}">
          <span class="input-group-text">To</span>
          <input type="date" class="form-control" name="contract_end" id="contract_end" value="{{ old('contract_end') }}">
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <label>Employee Name</label>
        <div class="d-flex align-items-stretch">
          <select class="form-control select2" name="employee_id" id="employee_id">
            <option value="">Select</option>
            @foreach($emp as $e)
              <option value="{{ $e->id }}" {{ old('employee_id') == $e->id ? 'selected':'' }}>
                {{ $e->name }}
              </option>
            @endforeach
          </select>
          <a href="{{ url('employee-master') }}" class="btn btn-outline-light ms-2 d-flex align-items-center justify-content-center" style="width:40px">
            <i class="fa fa-plus text-success"></i>
          </a>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <label>Referred By</label>
        <div class="d-flex align-items-stretch">
          <select class="form-control select2" name="referred_by" id="referred_by">
            <option value="">Select</option>
            @foreach($referrers as $r)
              <option value="{{ $r->id }}" {{ old('referred_by')==$r->id?'selected':'' }}>
                {{ $r->name }}
              </option>
            @endforeach
          </select>
          <a href="{{ url('referrer-master') }}" class="btn btn-outline-light ms-2 d-flex align-items-center justify-content-center" style="width:40px">
            <i class="fa fa-plus text-success"></i>
          </a>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <label>Comment</label>
        <textarea class="form-control" name="comment" id="comment" rows="1">{{ old('comment') }}</textarea>
      </div>
    </div>
    <hr>

                    {{-- 🔷 Client Information --}}
                    <h5 class="mb-3 fw-bold">Client Information</h5>
                    <div class="row">
                        <!-- Client Group -->
                        <div class="col-md-4 mb-3">
                            <label>Client Group <span class="text-danger">*</span></label>
                            <div class="d-flex align-items-stretch">
                                <select class="form-control select2" name="client_group" id="client_group">
                                    @foreach($clients_grp as $group)
                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                                <a href="{{ url('buyer-master') }}" class="btn btn-outline-light d-flex align-items-center justify-content-center ms-2" style="width: 40px;">
                                    <i class="fa fa-plus text-success"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Client Name -->
                        <div class="col-md-4 mb-3">
                            <label>Client Name <span class="text-danger">*</span></label>
                            <div class="d-flex align-items-stretch">
                                <select class="form-control select2" name="client_id" id="client_id">
                                    <option value="">Select</option>
                                </select>
                                <a href="{{ url('buyer-master') }}" class="btn btn-outline-light d-flex align-items-center justify-content-center ms-2" style="width: 40px;">
                                    <i class="fa fa-plus text-success"></i>
                                </a>
                            </div>
                            <span class="text-danger d-block mt-1" id="client_add"></span>
                                <input type="text" class="form-control" name="client_gst" id="client_gst" value="" hidden>
                                <input type="text" class="form-control" name="client_pan_no" id="client_pan_no" value=""  hidden>
                                <input type="email" class="form-control" name="client_email" id="client_email" value=""  hidden>
                                <input type="number" class="form-control" name="client_no" id="client_no" value=""  hidden>
                                <input type="number" class="form-control" name="client_contact_no" id="client_contact_no" value=""  hidden>
                                <input type="text" class="form-control" name="client_contact_person" id="client_contact_person" value=""  hidden>

                        </div>

                        <!-- Contact Person -->
                        <div class="col-md-4 mb-3">
                            <label>Contact Person</label>
                            <select class="form-control select2" name="contact_person_id" id="contact_person_id">
                                <option value="">Select</option>
                            </select>
                        </div>

                        <!-- LUT No / ARN No -->
                        

                        <!-- LUT Note -->
                        

                        <!-- Same as Client Address -->
                        <div class="col-md-4 mb-3 d-flex align-items-end">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="same_address">
                                <label class="form-check-label" for="same_address">Same as Client Address</label>
                            </div>
                        </div>

                        <!-- Shipping Client Name -->
                        <div class="col-md-4 mb-3">
                            <label>Shipping Client Name</label>
                            <input type="text" class="form-control" name="shipping_client_name" id="shipping_client_name">
                        </div>

                        <!-- Shipping Address -->
                        <div class="col-md-4 mb-3">
                            <label>Shipping Address</label>
                            <textarea class="form-control" name="shipping_address" id="shipping_address" rows="1"></textarea>
                        </div>

                        <!-- Shipping Contact Person -->
                        <div class="col-md-4 mb-3">
                            <label>Shipping Contact Person</label>
                            <input type="text" class="form-control" name="shipping_contact" id="shipping_contact">
                        </div>

                        <!-- Tel No -->
                        <div class="col-md-4 mb-3">
                            <label>Tel No</label>
                            <input type="text" class="form-control" name="tel_no" id="tel_no">
                        </div>

                        <!-- Email -->
                        <div class="col-md-4 mb-3">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>

                        <!-- PAN No -->
                        <div class="col-md-4 mb-3">
                            <label>PAN No</label>
                            <input type="text" class="form-control" name="pan_no" id="pan_no">
                        </div>

                        <!-- GSTIN -->
                        <div class="col-md-4 mb-3">
                            <label>GSTIN</label>
                            <input type="text" class="form-control" name="gstin" id="gstin">
                        </div>

                        <!-- State Code -->
                        <div class="col-md-4 mb-3">
                            <label>State Code</label>
                            <select class="form-control select2" name="state_code" id="state_code">
                                @if(isset($states))
                                @foreach ($states as $state)
                                <option value="{{$state->id}}">{{ $state->name  }}</option>	
                                @endforeach	
                                @endif
                            
                            </select>
                        </div>


                     

                          <div class="col-md-4 mb-3">
                            <label>Contact No</label>
                            <input type="text" class="form-control" name="contact_no" id="contact_no">
                        </div>
                    </div>
  </div>
</div>
 <!-- card -->
        </div> <!-- col -->
    </div> <!-- row -->
</div>
{{-- 🔷 Add Sales Product Details --}}
<div class="search-client-info mt-4">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong>Add Sales Product Details</strong>
                </div>
                <div class="card-body bg-light">
                    <div class="row">

                        {{-- Make --}}
                        <div class="col-md-4 mb-2">
                            <label>Make <span class="text-danger">*</span></label>
                            <div class="d-flex align-items-stretch">
                                <select class="form-control select2" name="make_id" id="sales_make_id">
                                    <option value="">Select</option>
                                    @foreach($makes as $make)
                                        <option value="{{ $make->id }}">{{ $make->name }}</option>
                                    @endforeach
                                </select>
                                <a href="{{ url('make-master') }}" class="btn btn-outline-light d-flex align-items-center justify-content-center ms-2" style="width:40px;">
                                    <i class="fa fa-plus text-success"></i>
                                </a>
                                <button type="button" class="btn btn-outline-light d-flex align-items-center justify-content-center ms-1" style="width:40px;">
                                    <i class="fa fa-refresh text-info"></i>
                                </button>
                            </div>
                        </div>

                        {{-- Model --}}
                        <div class="col-md-4 mb-2">
                            <label>Model <span class="text-danger">*</span></label>
                            <div class="d-flex align-items-stretch">
                                <select class="form-control select2" name="model_id" id="sales_model_id">
                                    <option value="">Select</option>
                                </select>
                                <a href="{{ url('model-master') }}" class="btn btn-outline-light d-flex align-items-center justify-content-center ms-2" style="width:40px;">
                                    <i class="fa fa-plus text-success"></i>
                                </a>
                                <button type="button" class="btn btn-outline-light d-flex align-items-center justify-content-center ms-1" style="width:40px;">
                                    <i class="fa fa-refresh text-info"></i>
                                </button>
                            </div>
                        </div>

                        {{-- Serial No --}}
                        <div class="col-md-4 mb-2">
                            <label>Serial No.</label>
                            <input type="text" class="form-control" name="serial_no" id="serial_no">
                        </div>

                        {{-- Type of Code --}}
                        <div class="col-md-4 mb-2">
                            <label>Type of Code</label>
                        
                              <div class="input-group">
                            <select class="form-control" name="code_type" id="sale_code_type">
                            <option value="HSN Code">HSN Code</option>
                            <option value="SAC Code">SAC Code</option>
                              </select>

                                <input type="text" class="form-control" name="sale_code_value" id="sale_code_value">
                             
                            </div>
                        </div>

                        {{-- Stock Checkbox --}}
                        <div class="col-md-4 mb-2 d-flex align-items-end">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="stock_demo" id="stock_demo">
                                <label class="form-check-label" for="stock_demo">Do not remove from stock</label>
                            </div>
                        </div>

                        {{-- Capacity --}}
                        <div class="col-md-4 mb-2">
                            <label>Capacity</label>
                            <input type="text" class="form-control" name="capacity" id="capacity">
                        </div>

                        {{-- Readability --}}
                        <div class="col-md-4 mb-2">
                            <label>Readability</label>
                            <input type="text" class="form-control" name="readability" id="readability">
                        </div>

                        {{-- Calibration --}}
                        <div class="col-md-4 mb-2">
                            <label>Calibration</label>
                            <input type="text" class="form-control" name="calibration" id="calibration">
                        </div>

                        {{-- Pan Size --}}
                        <div class="col-md-4 mb-2">
                            <label>Pan Size</label>
                            <input type="text" class="form-control" name="pan_size" id="pan_size">
                        </div>

                        {{-- VC No / Date --}}
                        <div class="col-md-4 mb-2">
                            <label>VC No / Date</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="vc_no" id="vc_no">
                                <input type="date" class="form-control" name="vc_date" id="vc_date">
                            </div>
                        </div>

                        {{-- Part Details --}}
                        <div class="col-md-4 mb-2">
                            <label>Part Details</label>
                            <textarea class="form-control" name="part_details" id="part_details" rows="1"></textarea>
                        </div>

                        {{-- Note --}}
                        <div class="col-md-4 mb-2">
                            <label>Note</label>
                            <textarea class="form-control" name="note" id="note" rows="1"></textarea>
                        </div>

                        {{-- Quantity --}}
                        <div class="col-md-2 mb-2">
                            <label>Quantity <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="sale_quantity" id="sale_quantity" value="1">
                        </div>

                        {{-- Rate/Amount --}}
                        <div class="col-md-2 mb-2">
                            <label>Rate / Amount <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="sale_rate" id="sale_rate" value="0">
                                <input type="number" class="form-control" name="sale_amount" id="sale_amount" value="0"readonly>
                            </div>
                        </div>
                    </div>

                    {{-- Add & Clear Buttons --}}
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary w-100" id="add_item">Add Item</button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-secondary w-100" id="clear_item">Clear Product</button>
                        </div>
                    </div>

                </div> {{-- card-body --}}
            </div>
        </div>
    </div>
</div>
<div class="search-client-info">
                            <div class="row">
							    <div class="col-lg-12 col-md-12">
							    	<div class="card">
							    		<div class="card-body">
                                         <div class="table-responsive mt-4">
    <table class="table table-bordered table-striped" id="product_table">
        <thead class="bg-dark text-white text-center">
            <tr>
                <th>ID</th>
                <th>Make</th>
                <th>Model</th>
                <th>Serial No.</th>
                <th>Type of Code</th>
                <th>Code</th>
                <th>Stock/Demo</th>
                <th>Capacity</th>
                <th>Readability</th>
                <th>Calibration</th>
                <th>Pan Size</th>
                <th>Part Details</th>
                <th>Description</th>
                <th>VC No</th>
                <th>VC Date</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="product_body">
            {{-- Dynamic rows will be appended here --}}
        </tbody>
    </table>
</div>

            
            </div>
        </div>
    </div>
</div>
</div>


{{-- //calculation  --}}
 <div class="search-client-info">
   <div class="search-client-info">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body py-3">
                   
                    <!-- Net Amount -->
                    <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Net Amount :</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control text-end" name="net_amount" id="net_amount" value="0.00" readonly>
                        </div>
                    </div>
                        <div class="row mb-2">
                    <label class="col-sm-4 col-form-label">Late fees :</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control text-end" name="late_fees" id="late_fees" value="0.00">
                    </div>
                </div>
                        <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Packing :</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control text-end" name="packing" id="packing" value="0.00" >
                        </div>
                    </div>

                      <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Discount :</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control text-end" name="discount" id="discount" value="0.00">
                        </div>
                    </div>

                      <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Taxable :</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control text-end" name="taxable_amount" id="taxable_amount" value="0.00" readonly>
                        </div>
                    </div>

                    <!-- Tax 1 -->
                    <div class="row mb-2 align-items-center">
                        <label class="col-sm-4 col-form-label">Tax 1 :</label>
                        <div class="col-sm-4">
                            <select class="form-control" name=" " id="tax1">
                                    <option value="0"> -</option> 
                                @foreach ($taxes as $taxe)
                                 <option value="{{ $taxe->tax_value }}"> {{ $taxe->tax_name }}</option>    
                                @endforeach
                               

                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="number" class="form-control text-end" name="tax_value_amount_1" id="tax1_amount" value="0.00" readonly>
                        </div>
                    </div>

                    <!-- Tax 2 -->
                    <div class="row mb-2 align-items-center">
                        <label class="col-sm-4 col-form-label">Tax 2 :</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="tax_value_2" id="tax2">
                                 <option value="0"> -</option> 
                                @foreach ($taxes as $taxe)
                                 <option value="{{ $taxe->tax_value }}"> {{ $taxe->tax_name }}</option>    
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="number" class="form-control text-end" name="tax_value_amount_2" id="tax2_amount" value="0.00" readonly>
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Total :</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control text-end" name="total_amount" id="total_data" value="0.00" readonly>
                        </div>
                    </div>

                    <!-- Round Off -->
                    <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Round off :</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control text-end" name="round_off" id="round_off_data" value="0.00">
                        </div>
                    </div>

                    <hr>

                    <!-- Grand Total -->
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label fw-bold text-purple">Grand Total :</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control text-end fw-bold text-purple" name="grand_total" id="grand_total" value="0.00" >
                        </div>
                    </div>
                    <!-- Advance -->
                <div class="row mb-2">
                    <label class="col-sm-4 col-form-label">Advance : (0)</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control text-end" name="advance" id="advance" value="0.00">
                    </div>
                </div>

                <!-- Balance Amount -->
                <div class="row mb-2">
                    <label class="col-sm-4 col-form-label">Balance Amount :</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control text-end" name="balance_amount" id="balance_amount" value="0.00" readonly>
                    </div>
                </div>

                    <!-- Buttons -->
                    <div class="row">
                        <div class="col-sm-6 d-flex justify-content-start">
                            <button  class="btn btn-primary w-50" id="add_proforma">Add</button>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-end">
                            <button type="reset" class="btn btn-secondary w-50">Clear</button>
                        </div>
                    </div>

                </div> <!-- card-body -->
            </div> <!-- card -->
        </div> <!-- col -->
    </div> <!-- row -->
</div>


                   {{-- // --}}

@endsection
	@push('scripts')
    <!-- Bootstrap Tags Input JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

<script>


$(document).ready(function () {
    $('#client_group').on('change', function () {
     
        let client_gr_id = $(this).val();
        $('#client_id').empty().append('<option value="">Loading...</option>');

        if (client_gr_id) {
            $.ajax({
                url: '{{ route("quatation.client_group") }}',
                type: 'POST',
                data: {
                    client_gr_id: client_gr_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    console.log(response.client_grp)
                
                    $('#client_id').empty().append('<option value="">Select Client Name</option>');
                    $.each(response.client_grp, function (key, client) {
                        $('#client_id').append('<option value="' + client.id + '">' + client.client_name + '</option>');
                    });

                  
                }
            });
        } else {
            $('#client_id').empty().append('<option value="">Select Client Name</option>');
        }
    });

      $('#client_group').trigger('change');
    let state_data = "";
      $('#client_id').on('change', function () {
        let client_add_id = $(this).val();
      

        if (client_add_id) {
            $.ajax({
                url: '{{ route("quatation.client_add") }}',
                type: 'POST',
                data: {
                    client_add_id: client_add_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                  
                    console.log(response)
                    state_data = response.client_add;
                  
                    $('#contact_person_id').empty();
                    $('#client_add').text(response.client_add.address);
                    $('#client_pan_no').val(response.client_add.pan_no);
                    $('#client_gst').val(response.client_add.gstin);
                    $('#client_no').val(response.client_add.contact_no1);
                    $('#client_email').val(response.client_add.email_id_1);

     $('#inwardTable tbody').empty();
    console.log(response);


// Attach click event using delegation
$(document).on('click', '.edit-btn', function () {
 
 const product = $(this).data('product');
    const inwardId = $(this).data('inward-id');

    // Fill form values like make_id, model_id, etc.

    // Store inward_id for the row you're editing
    $('#add_item_btn').data('inward-id', inwardId);

    editMode = true;
    editRowId = $(this).closest('tr').data('id');
    $('#add_item_btn').text('Update Item');

    // Fill form fields
    $('#serial_no').val(JSON.parse(product.serial_no)[0] || '');
    $('#part_detail').val(product.defect);
    $('#product_note').val(product.remark);

    // Accessories checkboxes
    let accessories = {
        'Adaptor': product.adaptor,
        'Draft Shield': product.draft_shield,
        'In-Use Cover': product.in_use_cover,
        'Batteries': product.batteries,
        'Pan': product.pan,
        'Pan Support': product.pan_support,
        'Weighing Pan': product.weighing_pan,
        'Calibration Wt': product.calibration_wt,
        'Cable': product.cable,
        'Other': product.other
    };

    for (let acc in accessories) {
        let checkboxId = "#acc_" + acc.toLowerCase().replace(/\s+/g, '-');
        $(checkboxId).prop("checked", accessories[acc] == 1);
    }

    $('#accessory_note').val(product.other_details);

    // Set Make and Model (you may need to trigger change if using dependent dropdown)
    $('#make_id').val(product.make).trigger('change'); // load models via AJAX
    setTimeout(() => {
        $('#model_id').val(product.model).trigger('change');
    }, 500); // wait for model dropdown to populate

    // You can also set amount/qty if present

});



                       $.each(response.ClientContactPerson, function (key, contact_person) {
                        
                         $('#client_contact_no').val(contact_person.contact_1);
                         $('#client_contact_person').val(contact_person.name);
                        $('#contact_person_id').append('<option value="' + contact_person.id + '">' + contact_person.name + '</option>');

                    });
                   
                }
            });
        }
    });


      $('#make_id').on('change', function () {
        let make_id = $(this).val();
      

        if (make_id) {
            $.ajax({
                url: '{{ route("quatation.make") }}',
                type: 'POST',
                data: {
                    make_id: make_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                
                      $.each(response, function (key, model) {
                    $('#model_id').append('<option value="' + model.id + '">' + model.model_name + '</option>');
                });

                   
                }
            });
        }
    });


      $('#sales_make_id').on('change', function () {
        let sales_make_id = $(this).val();
      

        if (sales_make_id) {
            $.ajax({
                url: '{{ route("quatation.make") }}',
                type: 'POST',
                data: {
                    make_id: sales_make_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    $('#sales_model_id').empty();
                      $.each(response, function (key, model) {
                    $('#sales_model_id').append('<option value="' + model.id + '">' + model.model_name + '</option>');
                });

                   
                }
            });
        }
    });

$('#same_address').change(function () {
    // Clear shipping fields first
    $('#shipping_client_name').val('');  
    $('#shipping_address').val(''); 
    $("#shipping_contact").val('');
    $("#pan_no").val('');
    $("#gstin").val('');
    $("#tel_no").val('');
    $("#email").val('');
    $("#contact_no").val('');
    $("#contact_person").val('');

    if (this.checked) {
        console.log(state_data);

        let groupText = $('#client_group option:selected').text(); 
        let add = $('#client_add').text();
        let contact_person = $('#contact_person_id option:selected').text();  
        let client_pan_no =  $('#client_pan_no').val();   
        let client_gst = $("#client_gst").val();
        let client_email = $("#client_email").val();
        let client_no = $("#client_no").val();
        let client_contact_no = $("#client_contact_no").val();
        let client_contact_person = $("#client_contact_person").val();

        // Set values in shipping fields
        $('#shipping_client_name').val(groupText);  
        $('#shipping_address').val(add); 
        $("#shipping_contact").val(contact_person);
        $("#pan_no").val(client_pan_no);
        $("#gstin").val(client_gst);
        $("#tel_no").val(client_no);
        $("#email").val(client_email);
        $("#contact_no").val(client_contact_no);
        $("#contact_person").val(client_contact_person);

        let stateId = state_data.state;

    if ($("#state_code option[value='" + stateId + "']").length > 0) {
        $("#state_code").val(stateId).trigger('change');  // Needed for Select2
    } else {
        $("#state_code").append('<option value="' + stateId + '">' + state_data.state + '</option>');
        $("#state_code").val(stateId).trigger('change');
    }
}

});


});


 
$(document).ready(function () {
    $('#financial_id').on('change', function () {
        let finYearId = $(this).val();

        if (finYearId) {
            $.ajax({
                url: "{{ route('proforma.generateQuotationNo') }}",
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    fin_year_id: finYearId
                },
                success: function (response) {
                    if (response.status) {
                        $('#pl_no').val(response.pl_no);
                    } else {
                        alert(response.message || 'Could not generate pl number.');
                    }
                },
                error: function () {
                    alert('Something went wrong. Please try again.');
                }
            });
        }
    });
});
      



$(document).ready(function () {
    $('#serial_no').tagsinput(); 
});

$(document).ready(function () {
  $(document).on('click', '.edit-btn', function () {
    const product = $(this).data('product');
    const inwardId = $(this).data('inward-id');

    // Fill form values like make_id, model_id, etc.

    // Store inward_id for the row you're editing
    $('#add_item_btn').data('inward-id', inwardId);

    editMode = true;
    editRowId = $(this).closest('tr').data('id');
    $('#add_item_btn').text('Update Item');

    // Basic check
   
    if (!product) return;
    console.log(product.make);
    if(product.model){
        $('#model_id').empty();
    }
    $('#make_id').val(product.make).trigger('change'); 
    $('#model_id').val(product.model).trigger('change');
    $('#serial_no').val(product.serial_no ? JSON.parse(product.serial_no).join(", ") : '');
    $('#capacity').val(product.capacity);
    $('#readability').val(product.readability);
    $('#calibration').val(product.calibration);
    $('#pan_size').val(product.pan_size);
    $('#vc_no').val(product.vc_no);
    $('#vc_date').val(product.vc_date);
    $('#part_details').val(product.part_details);
    $('#note').val(product.note);
    $('#quantity').val(product.quantity || 1);

    // Optional: code_type
    if (product.code_type) {
        $('#code_type').val(product.code_type);
    }

    // Optional: checkbox
    $('#stock_demo').prop('checked', product.stock_demo == 1);
});

 function calculateAmount() {
   
        let quantity = parseFloat($('#qty').val()) || 0;
        let rate     = parseFloat($('#rate').val()) || 0;
        let amount   = quantity * rate;

        console.log(rate)
        
        $('#amount').val(amount.toFixed(2)); 
    }

    // Trigger calculation on both input fields
    $('#qty, #rate').on('input', function () {
       
        calculateAmount();
    });
});
$(document).ready(function () {


let itemIndex = 1;
let editMode = false;
let editRowId = null;





$(document).on('input', '.qty, .rate, #tax_percentage', function () {
    calculateTotal();
});
function calculateTotal() {
    let total = 0;

    // 1. Calculate all product totals dah
    $('.product-row').each(function () {
        let rate = parseFloat($(this).find('.rate').val()) || 0;
        let qty = parseFloat($(this).find('.qty').val()) || 0;
        let amount = rate * qty;
        $(this).find('.amount').val(amount.toFixed(2));
        total += amount;
    });

    $('.sale_product_row').each(function () {
        let rate = parseFloat($(this).find('.sale_rate').val()) || 0;
        let qty = parseFloat($(this).find('.sale_quantity').val()) || 0;
        let amount = rate * qty;
        $(this).find('.sale_amount').val(amount.toFixed(2));
        total += amount;
    });

    // 2. Add additional charges
    const packing = parseFloat($('#packing').val()) || 0;
    const discount = parseFloat($('#discount').val()) || 0;
    const late_fees = parseFloat($('#late_fees').val()) || 0;

    const taxable = total + packing + late_fees - discount;
    $('#net_amount').val(total.toFixed(2));
    $('#taxable_amount').val(taxable.toFixed(2));

    // 3. Tax calculations
    const tax1 = parseFloat($('#tax1').val()) || 0;
    const tax2 = parseFloat($('#tax2').val()) || 0;

    const tax1Amount = (taxable * tax1) / 100;
    const tax2Amount = (taxable * tax2) / 100;

    $('#tax1_amount').val(tax1Amount.toFixed(2));
    $('#tax2_amount').val(tax2Amount.toFixed(2));

    // 4. Total and rounding
    let totalWithTax = taxable + tax1Amount + tax2Amount;
    $('#total_data').val(totalWithTax.toFixed(2));

    let roundedGrandTotal = Math.round(totalWithTax);
    let roundOff = roundedGrandTotal - totalWithTax;

    $('#round_off_data').val(roundOff.toFixed(2));
    $('#grand_total').val(roundedGrandTotal.toFixed(2));

    // 5. Balance amount = Grand Total - Advance
    const advance = parseFloat($('#advance').val()) || 0;
    const balance = roundedGrandTotal - advance;
    $('#balance_amount').val(balance.toFixed(2));
}



    $('#tax1, #tax2, #round_off_data ,#packing,#late_fees,#advance ,#discount').on('change keyup input', function () {
        calculateTotal();
    });
// Edit Row
$(document).on('click', '.edit_row', function () {
    let $tr = $(this).closest('tr');
    editRowId = $tr.data('id');
    editMode = true;

    // Fill form fields
    $('#make_id option').filter(function () {
        return $(this).text() === $tr.find('td:eq(1)').text();
    }).prop('selected', true);

    $('#model_id option').filter(function () {
        return $(this).text() === $tr.find('td:eq(2)').text();
    }).prop('selected', true);

    $('#serial_no').val($tr.find('td:eq(3)').text());
    $('#qty').val($tr.find('td:eq(15) input').val());
    $('#rate').val($tr.find('td:eq(16) input').val());
    $('#amount').val($tr.find('td:eq(17) input').val());
    $('#type_of_code').val($tr.find('td:eq(18)').text());
    $('#code_value').val($tr.find('td:eq(19)').text());
    $('#part_detail').val($tr.find('td:eq(20)').text());
    $('#product_note').val($tr.find('td:eq(21)').text());
    $('#Inward_Id').val($tr.find('td:eq(22)').text());


    // Accessories (get from hidden inputs)
    let accessoryKeys = [
        'Adaptor', 'Draft_Shield', 'In_Use_Cover', 'Batteries',
        'Pan', 'Pan_Support', 'Weighing_Pan', 'Calibration_Wt', 'Cable', 'Other'
    ];

    accessoryKeys.forEach((acc, i) => {
        let value = $tr.find(`td:eq(${4 + i}) input[data-key="${acc}"]`).val();
        $(`input[name="accessories[]"][value="${acc.replace(/_/g, ' ')}"]`).prop('checked', value == "1");
    });

    $('#accessory_note').val($tr.find('td:eq(14)').text());

    $('#add_item_btn').text('Update Item');
});


// Remove Row
$(document).on('click', '.remove_row', function () {
    $(this).closest('tr').remove();
    calculateTotal();
});

// Reset form
function resetOutwardForm() {
    $('#serial_no').val('');
    $('#qty').val(1);
    $('#rate').val(0);
    $('#amount').val(0);
    $('#type_of_code').val('');
    $('#code_value').val('');
    $('#part_detail').val('');
    $('#product_note').val('');
    $('#accessory_note').val('');
    $('input[name="accessories[]"]').prop('checked', false);
    $('#add_item_btn').text('Add Item');
    editMode = false;
    editRowId = null;
}


$('#add_proforma').on('click', function (e) {
    e.preventDefault();


      let product = [];
    
    $('#product_body tr.sale_product_row').each(function () {
        const row = $(this);

        const data = {
            make_id: row.find('.sale_make_id').val(),
            model_id: row.find('.sale_model_id').val(),
            make: row.find('td:eq(1)').text().trim(),
            model: row.find('td:eq(2)').text().trim(),
            serial_no: row.find('td:eq(3)').text().trim(),
            sale_code_type: row.find('td:eq(4)').text().trim(),
            sale_code_value: row.find('td:eq(5)').text().trim(),
            stock_demo: row.find('td:eq(6)').text().trim(),
            capacity: row.find('td:eq(7)').text().trim(),
            readability: row.find('td:eq(8)').text().trim(),
            calibration: row.find('td:eq(9)').text().trim(),
            pan_size: row.find('td:eq(10)').text().trim(),
            part_details: row.find('td:eq(11)').text().trim(),
            note: row.find('td:eq(12)').text().trim(),
            vc_no: row.find('td:eq(13)').text().trim(),
            vc_date: row.find('td:eq(14)').text().trim(),
            quantity: row.find('input[name="quantity[]"]').val(),
            rate: row.find('input[name="rate[]"]').val(),
            amount: row.find('input[name="amount[]"]').val(),
        };

        product.push(data);
    });
      const formData = {
        net_amount: parseFloat($('#net_amount').val()) || 0,
        tax1: parseFloat($('#tax1').val()) || 0,
        tax1_amount: parseFloat($('#tax1_amount').val()) || 0,
        tax2: parseFloat($('#tax2').val()) || 0,
        late_fees: parseFloat($('#late_fees').val()) || 0,
        adv: parseFloat($('#advance').val()) || 0,
        balance: parseFloat($('#balance_amount').val()) || 0,
        tax2_amount: parseFloat($('#tax2_amount').val()) || 0,
        total_amount: parseFloat($('#total_data').val()) || 0,
        round_off: parseFloat($('#round_off_data').val()) || 0,
        grand_total: parseFloat($('#grand_total').val()) || 0,
        discount : parseFloat($('#discount').val()) || 0,
        packing : parseFloat($('#packing').val()) || 0,
        balance_amount : parseFloat($('#balance_amount').val()) || 0,

        taxable_amount : parseFloat($('#taxable_amount').val()) || 0,
        _token: $('meta[name="csrf-token"]').attr('content'),
        company_id: $('#company_id').val(),
        fin_year_id: $('#financial_id').val(),
        pl_no: $('#pl_no').val(),
        pl_date: $('#pl_date').val(),
        po_no: $('#po_no').val(),
        po_date: $('#po_date').val(),
        quarter_id : $('#quarter_id').val(),
        challan_no: $('#challan_no').val(),
        challan_date: $('#challan_date').val(),
        proforma_type_id: $('#proforma_type_id').val(),
        proforma_type: $('input[name="proforma_type"]:checked').val() ,
        description: $('#description').val(),
        desp_through: $('#desp_through').val(),
        contract_start: $('#contract_start').val(),
        contract_end: $('#contract_end').val(),
        employee_id: $('#employee_id').val(),
        referred_by: $('#referred_by').val(),
        comment: $('#comment').val(),
        same_address: $("#same_address").val(),
        shipping_client_name: $("#shipping_client_name").val(),
        shipping_address: $("#shipping_address").val(),
        shipping_contact: $("#shipping_contact").val(),
        tel_no: $("#tel_no").val(),
        email: $("#email").val(),
        pan_no: $("#pan_no").val(),
        gstin: $("#gstin").val(),
        state_code: $("#state_code").val(),
        contact_no: $("#contact_no").val(),
        client_group_id: $('#client_group').val(),
        client_name_id: $('#client_id').val(),
        contact_person_id: $('#contact_person').val(),
        product: product,


    };

        $.ajax({
        url: '{{ route("proforma.store") }}',
        method: 'POST',
        data: JSON.stringify(formData),
        contentType: 'application/json',
        success: function (response) {
            alert('Proforma saved successfully!');
            // Optional: redirect or reset form
        },
        error: function (xhr) {
            const errors = xhr.responseJSON?.errors || {};
            let msg = '';
            Object.values(errors).forEach(arr => arr.forEach(e => msg += e + "\n"));
            alert(msg || 'Something went wrong.');
        }
    });

});


});

$(document).ready(function () {

let itemIndex = 0;
let editMode = false;
let editRowId = null;

$('#add_item').on('click', function () {
    const makeText = $('#sales_make_id option:selected').text();
    const modelText = $('#sales_model_id option:selected').text();
    let makeId = $('#sales_make_id').val();       // <== ID from selected option
    let modelId = $('#sales_model_id').val();     // <== ID from selected option
    const serialNo = $('#serial_no').val();
    const codeType = $('#sale_code_type').val();
    const sale_code_value = $('#sale_code_value').val();

    const stockDemo = $('#stock_demo').is(':checked') ? 'Yes' : 'No';
    const capacity = $('#capacity').val();
    const readability = $('#readability').val();
    const calibration = $('#calibration').val();
    const panSize = $('#pan_size').val();
    const vcNo = $('#vc_no').val();
    const vcDate = $('#vc_date').val();
    const partDetails = $('#part_details').val();
    const note = $('#note').val();
    const quantity = $('#sale_quantity').val();
    const rate = $('input[name="sale_rate"]').val();
    const amount = $('input[name="sale_amount"]').val();

    // Row template
    let rowHtml = `
        <td>${editMode ? editRowId : itemIndex}</td>
    <td>${makeText}<input type="hidden" class="sale_make_id" value="${makeId}"></td>
    <td>${modelText}<input type="hidden" class="sale_model_id" value="${modelId}"></td>
        <td>${serialNo}</td>
        <td>${codeType}</td>
        <td> ${sale_code_value} </td>
        <td>${stockDemo}</td>
        <td>${capacity}</td>
        <td>${readability}</td>
        <td>${calibration}</td>
        <td>${panSize}</td>
        <td>${partDetails}</td>
        <td>${note}</td>
        <td>${vcNo}</td>
        <td>${vcDate}</td>
        <td><input type="number" class="form-control sale_quantity" value="${quantity}" name="quantity[]" /></td>
        <td><input type="number" class="form-control sale_rate" value="${rate}" name="rate[]" /></td>
        <td><input type="number" class="form-control sale_amount" value="${amount}" name="amount[]" readonly /></td>
        <td>
            <button class="btn btn-sm btn-primary sale_edit_row">Edit</button>
            <button class="btn btn-sm btn-danger sale_remove_row">Delete</button>
        </td>
    `;

    if (editMode) {
        $(`#product_body tr[data-id="${editRowId}"]`).html(rowHtml);
        editMode = false;
        editRowId = null;
        $('#add_item').text('Add Item');
    } else {
        $('#product_body').append(`<tr class="sale_product_row"  data-id="${itemIndex}">${rowHtml}</tr>`);
        itemIndex++;
    }
    calculateTotal();
    clearProductForm();
});

function clearProductForm() {
    $('#sales_make_id, #sales_model_id, #serial_no, #code_type, #capacity, #readability, #calibration, #pan_size, #vc_no, #vc_date, #part_details, #note').val('');
    $('#stock_demo').prop('checked', false);
    $('input[name="rate"]').val(0);
    $('input[name="amount"]').val(0);
    $('#quantity').val(1);
}

// Delete Row
$(document).on('click', '.sale_remove_row', function () {
    $(this).closest('tr').remove();
});

// Edit Row
$(document).on('click', '.sale_edit_row', function () {
    const row = $(this).closest('tr');
    editRowId = row.data('id');

    $('#sales_make_id').val(row.find('td').eq(1).text()).trigger('change');
    $('#sales_model_id').val(row.find('td').eq(2).text()).trigger('change');
    $('#serial_no').val(row.find('td').eq(3).text());
    $('#code_type').val(row.find('td').eq(4).text());
    $('#stock_demo').prop('checked', row.find('td').eq(6).text() === 'Yes');
    $('#capacity').val(row.find('td').eq(7).text());
    $('#readability').val(row.find('td').eq(8).text());
    $('#calibration').val(row.find('td').eq(9).text());
    $('#pan_size').val(row.find('td').eq(10).text());
    $('#part_details').val(row.find('td').eq(11).text());
    $('#note').val(row.find('td').eq(12).text());
    $('#vc_no').val(row.find('td').eq(13).text());
    $('#vc_date').val(row.find('td').eq(14).text());
    $('#quantity').val(row.find('td').eq(15).find('input').val());
    $('input[name="rate"]').val(row.find('td').eq(16).find('input').val());
    $('input[name="amount"]').val(row.find('td').eq(17).find('input').val());

    editMode = true;
    $('#add_item').text('Update Item');
});
$(document).on('input', 'input[name="sale_rate"], #sale_quantity', function () {
    const qty = parseFloat($('#sale_quantity').val()) || 0;
    const rate = parseFloat($('input[name="sale_rate"]').val()) || 0;
    $('input[name="sale_amount"]').val((qty * rate).toFixed(2));
});


function calculateTotal() {
    let total = 0;

    // 1. Calculate all product totals
    $('.product-row').each(function () {
        let rate = parseFloat($(this).find('.rate').val()) || 0;
        let qty = parseFloat($(this).find('.qty').val()) || 0;
        let amount = rate * qty;
        $(this).find('.amount').val(amount.toFixed(2));
        total += amount;
    });

    $('.sale_product_row').each(function () {
        let rate = parseFloat($(this).find('.sale_rate').val()) || 0;
        let qty = parseFloat($(this).find('.sale_quantity').val()) || 0;
        let amount = rate * qty;
        $(this).find('.sale_amount').val(amount.toFixed(2));
        total += amount;
    });

    // 2. Add additional charges
    const packing = parseFloat($('#packing').val()) || 0;
    const discount = parseFloat($('#discount').val()) || 0;
    const late_fees = parseFloat($('#late_fees').val()) || 0;

    const taxable = total + packing + late_fees - discount;
    $('#net_amount').val(total.toFixed(2));
    $('#taxable_amount').val(taxable.toFixed(2));

    // 3. Tax calculations
    const tax1 = parseFloat($('#tax1').val()) || 0;
    const tax2 = parseFloat($('#tax2').val()) || 0;

    const tax1Amount = (taxable * tax1) / 100;
    const tax2Amount = (taxable * tax2) / 100;

    $('#tax1_amount').val(tax1Amount.toFixed(2));
    $('#tax2_amount').val(tax2Amount.toFixed(2));

    // 4. Total and rounding
    let totalWithTax = taxable + tax1Amount + tax2Amount;
    $('#total_data').val(totalWithTax.toFixed(2));

    let roundedGrandTotal = Math.round(totalWithTax);
    let roundOff = roundedGrandTotal - totalWithTax;

    $('#round_off_data').val(roundOff.toFixed(2));
    $('#grand_total').val(roundedGrandTotal.toFixed(2));

    // 5. Balance amount = Grand Total - Advance
    const advance = parseFloat($('#advance').val()) || 0;
    const balance = roundedGrandTotal - advance;
    $('#balance_amount').val(balance.toFixed(2));
}


// 
let proformaData = {};
$('#proforma_type_id').change(function () {
    proformaData = {};
    let selectedValue = $(this).val();
    let _token = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: '{{ route("proforma.proforma_type") }}',
        method: 'POST',
        data: {
            _token: _token,
            proforma_type_id: selectedValue
        },
        success: function (response) {
            console.log(response)
            proformaData = response; 
            console.log("Stored response: ", proformaData);

            // Optional: you can handle UI updates here
        },
        error: function (xhr) {
            const errors = xhr.responseJSON?.errors || {};
            let msg = '';
            Object.values(errors).forEach(arr => arr.forEach(e => msg += e + "\n"));
            alert(msg || 'Something went wrong.');
        }
    });
});

$('#type_stamp, #type_unstamp, #type_none').click(function () {
    
     let type = $(this).val();
    // console.log(proformaData);
    // console.log(type);
    $("#description").empty();
    if(type == 'Stamp'){
        $("#description").append(proformaData.stamp_description);
    } else if(type == 'Unstamp'){
         $("#description").append(proformaData.unstamp_description);
    }else{

    }

   
});
});


</script>
 
@endpush