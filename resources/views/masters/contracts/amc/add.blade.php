@extends('master')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>

<style>
    .bootstrap-tagsinput {
        width: 100% !important;
        min-height: 38px;
    }
</style>

@section('main')

<!--Page header-->
<div class="page-header">
	<div class="page-leftheader">
		<h4 class="page-title">Edit AMC Contract</h4>
		<ol class="breadcrumb pl-0">
			<li class="breadcrumb-item"><a href="#">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
		</ol>
	</div>
</div>
<!--End Page header-->

<!-- search-client-info -->
        <div class="search-client-info">
                            <div class="row">
							    <div class="col-lg-12 col-md-12">
							    	<div class="card">
							    		<div class="card-body">
                                            <div class="row">
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Company Name <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" id="company_id" name="company_id" data-placeholder="Choose one (with searchbox)">
																<optgroup >
    
																	@if(!empty($companies))
																	@foreach ($companies as $company)
																	<option value="{{ $company->id }}">{{ $company->company_name }}</option>	
																	@endforeach
																	
																	@endif
																</optgroup>
															</select>
                                                	        <div class="input-group-append">
                                                	            <a href="{{url('company-details')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Financial Year <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" id="financial_id" name="financial_id" data-placeholder="Choose one (with searchbox)">
																<optgroup>
																	@if(isset($financial))
																	@foreach ($financial as $val)
																	<option value="{{ $val->id }}">{{ $val->financial_year }}</option>	
																	@endforeach
																	
																@endif
																</optgroup>
															</select>
                                                	        <div class="input-group-append">
                                                	          <a href="{{url('financial-year-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                            </div>
                                        
							    		</div>
							    	</div>
							    </div>
						    </div>
</div>
<!-- End search-client-info -->

<!-- search-client-info -->
<div class="search-client-info">
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit AMC Contract</h3>
            </div>
            <div class="card-body">

  <div class="row">
    <!-- Quot. No/Date, Quarter, Status -->
    <div class="col-md-4">
        <!-- Quot. No/Date -->
        <div class="form-group">
            <label for="uname">Quot. No/Date <span class="text-danger">*</span> :</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" id="amc_no" name="quotation_no" value="{{ old('amc_no', $amc_no ?? '') }}" readonly>
              <input type="date" class="form-control" placeholder="" name="quotation_date" id="amc_date">
            </div>
        </div>

        <!-- Quarter -->
        <div class="form-group">
            <label for="quarter">Quarter <span class="text-danger">*</span> :</label>
            <div class="input-group mb-3 flex-nowrap">
                <select class="form-control select2" id="quarter" name="quarter">
                    @if(isset($Quarters))
                    @foreach ($Quarters as $quater)
                    <option value="{{ $quater->id }}">{{ $quater->name }}</option>    
                    @endforeach
                    
                    @endif
                </select>
                <div class="input-group-append">
                    <a href="{{url('buyer-master')}}" class="btn btn-light" type="button"><i class="fa fa-plus text-success"></i></a>
                </div>
            </div>
        </div>

        <!-- Status -->
        <div class="form-group">
            <label for="status">Status <span class="text-danger">*</span> :</label>
            <select class="form-control select2" name="status" id="status">
            <option value="1">New</option>
        <option value="2">Renew</option>    
        <option value="3">Terminate</option>  
            </select>
        </div>
    </div>

    <!-- Client Group, Client Name, Contact Person -->
    <div class="col-md-4">
        <!-- Client Group -->
        <div class="form-group">
            <label for="client_group">Client Group <span class="text-danger">*</span> :</label>
            <div class="input-group mb-2 flex-nowrap">
                <select class="form-control select2" id="client_group" name="client_group_id">
                    <option value="">Select Client Group</option>
                    @foreach ($clients_grp as $group)
                        <option value="{{ $group->id }}">
                            {{ $group->name }}
                        </option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <a href="{{ url('buyer-master') }}" class="btn btn-light" type="button"><i class="fa fa-plus text-success"></i></a>
                </div>
            </div>
        </div>

        <!-- Client Name -->
        <div class="form-group">
            <label for="client_name">Client Name <span class="text-danger">*</span> :</label>
            <div class="input-group mb-2 flex-nowrap">
                <select class="form-control select2" id="client_name" name="client_name_id">
                    <option value="">Select Client</option>
                    @foreach ($clients_details as $client)
                        <option value="{{ $client->id }}" >
                            {{ $client->client_name }}
                        </option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <a href="{{ url('buyer-master') }}" class="btn btn-light" type="button"><i class="fa fa-plus text-success"></i></a>
                </div>
            </div>
            <span class="text-danger d-block mt-1" id="client_add"></span>
        </div>

        <!-- Contact Person -->
        <div class="form-group">
            <label for="contact_person">Contact Person <span class="text-danger">*</span> :</label>
            <div class="input-group mb-2 flex-nowrap">
                <select class="form-control select2-show-search" id="contact_person" name="contact_person">
                    <option value="0">Select Contact Person</option>
                </select>
                <div class="input-group-append">
                    <a href="{{ url('buyer-master') }}" class="btn btn-light" type="button"><i class="fa fa-plus text-success"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Remark, Employee Name, Referred By -->
    <div class="col-md-4">
        <!-- Remark -->
        <div class="form-group">
            <label>Remark <span class="text-danger">*</span> :</label>
            <input type="text" class="form-control" name="remark" id="remark" >
        </div>

        <!-- Employee Name -->
        <div class="form-group">
            <label>Employee Name <span class="text-danger">*</span> :</label>
       <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" id="emp_id" name="emp_id">
        <optgroup >
            <option value=""> Select Employee Name</option>
            @if(isset($emp))
            @foreach ($emp as $emp_list)
            <option value="{{ $emp_list->id }}"> {{ $emp_list->name }}</option>    
            @endforeach
            
                @endif
        </optgroup>
        </select>
        </div>

        <!-- Referred By -->
        <div class="form-group">
            <label for="ref_id">Referred By <span class="text-danger">*</span> :</label>
            <div class="input-group mb-2 flex-nowrap">
      <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" name="ref_id">
                                    @if(isset($emp))
                                    @foreach ($ref as $ref_list)
                                    <option value="{{ $ref_list->id }}"> {{ $emp_list->name }}</option>    
                                    @endforeach
                                    
                                        @endif
                            </select>
                <div class="input-group-append">
                    <a href="{{url('buyer-master')}}" class="btn btn-light" type="button"><i class="fa fa-plus text-success"></i></a>
                </div>
            </div>
        </div>
    </div>

    
</div>

 <div class="row">
                                               <div class="col-4">
                                                        <div class="form-group">
                                            	        <label for="uname">Contract Period from/to  <span class="text-danger">*</span> :</label>
                                            	        <div class="input-group mb-3">
                                            	          <input type="date" class="form-control" placeholder="" name="from" id="from" >

                                            	            <input type="date" class="form-control" placeholder="" name="to" id="to" >
                                            	        </div>
                                            	    </div>
                                                  </div>

                                                
                                            </div>
            </div> <!-- card-body -->
        </div> <!-- card -->
    </div> <!-- col -->
</div>

<!-- End search-client-info -->

{{-- model --}}
<div class="search-client-info">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    <!-- Row 1: Make, Model, Capacity -->
                    <div class="row">
                        <!-- Make -->
                        <div class="col">
                            <div class="form-group">
                                <label for="make_id">Make <span class="text-danger">*</span> :</label>
                                <div class="input-group mb-3 flex-nowrap">
                                    <select class="form-control select2-show-search" id="make_id" name="make_id" data-placeholder="Choose Make">
                                        <option value="">Select Make</option>
                                        @foreach($makes as $make)
                                        <option value="{{ $make->id }}">{{ $make->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <a href="{{ url('make-master') }}" class="btn btn-light"><i class="fa fa-plus text-success"></i></a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Model -->
                        <div class="col">
                            <div class="form-group">
                                <label for="model_id">Model <span class="text-danger">*</span> :</label>
                                <div class="input-group mb-3 flex-nowrap">
                                    <select class="form-control select2-show-search" id="model_id" name="model_id" data-placeholder="Choose Model">
                                        <option value="">Select Model</option>
                                     
                                    
                                    
                                    </select>
                                    <div class="input-group-append">
                                        <a href="{{ url('model-master') }}" class="btn btn-light"><i class="fa fa-plus text-success"></i></a>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Capacity -->
                        <div class="col">
                            <div class="form-group">
                                <label for="capacity">Capacity :</label>
                                <input type="text" class="form-control" name="capacity" id="capacity">
                            </div>
                        </div>
                    </div>

                    <!-- Row 2: Readability, Calibration, Calibration Charge -->
                    <div class="row">
                        <!-- Readability -->
                        <div class="col">

                                    <div class="form-group">
                                <label for="serial_no">Serial No. <span class="text-danger">*</span> :</label>
                                <input type="text" name="serial_no" id="serial_no" class="form-control" data-role="tagsinput" value="{{ old('serial_no') }}">
                            </div>


                        </div>

                        <!-- Calibration -->
                        <div class="col">
                            <div class="form-group">
                                <label for="calibration">Table Location </label>
                                <input type="text" class="form-control" name="table_location" id="table_location">
                            </div>
                        </div>

                        <!-- Calibration Charge -->
                        <div class="col">
                            <div class="form-group">
                                <label for="calibration_charge">Last St. Qtr. </label>
                                 <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" name="st_qtr" id="st_qtr">
																<optgroup>
                                                                    @if(isset($Quarters))
                                                                  @foreach ($Quarters as $quater)
                                                                  <option value="{{ $quater->id }}">{{ $quater->name }}</option>    
                                                                  @endforeach
																	
                                                                    @endif
																</optgroup>
															</select>
                            
                            </div>
                        </div>
                    </div>

                    <!-- Row 3: Pan Size, Price, Part Details -->
                    <div class="row">
                        <!-- Pan Size -->
                        <div class="col">
                            <div class="form-group">
                                <label for="pan_size">Late Fees</label>
                                <input type="number" class="form-control" name="late_fees" id="late_fees">
                            </div>
                        </div>

                        <!-- Price -->
                        <div class="col">
                            <div class="form-group">
                                <label for="price">Contract Amount <span class="text-danger">*</span> :</label>
                                <input type="number" class="form-control" name="contract_amount" id="contract_amount" value="0">
                            </div>
                        </div>

                        <!-- Part Details -->
                        <div class="col">
                            <div class="form-group">
                                <label for="part_details">Description </label>
                                <textarea class="form-control" name="description" id="description" rows="1"></textarea>
                            </div>
                        </div>
                    </div>
                                <div class="row">
                                    <div class="col">
                                        <button  class="btn btn-primary d-block m-auto" id="add_data">Add To Table</button>
                                            
                                </div>
                            
                            </div>
                </div> <!-- card-body -->
            </div> <!-- card -->
        </div> <!-- col -->
    </div> <!-- row -->
</div>

<!-- search-client-info -->

{{-- // --}}
<!-- search-client-info -->
<div class="search-client-info">
                            <div class="row">
							    <div class="col-lg-12 col-md-12">
							    	<div class="card">
							    		<div class="card-body">
                                            <div class="table-responsive">
                                                <table id="poentry_table" class="table table-striped table-bordered w-100">
                                                    <thead>
                                                        <tr>
                                                            <th class="wd-15p">ID</th>
                                                            <th class="wd-15p">Make</th>
                                                            <th class="wd-15p">Model</th>
                                                            <th class="wd-15p">Serial No.</th>
                                                            <th class="wd-15p">Capacity</th>
                                                            <th class="wd-15p">Table Location</th>
                                                            <th class="wd-15p">Quarter</th>
                                                            <th class="wd-15p">	Late Fees</th>
                                                            <th class="wd-15p">Contract Amount</th>
    
                                                            <th class="wd-15p">Description</th>
                                                            <th class="wd-25p">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      
                                                        
                                                   <tfoot class="bg-light-purple text-dark font-weight-bold">
                                                <tr>
                                                    <td colspan="7" class="text-right">Total</td>
                                                    <td class="text-right"><span id="total_late_fee">0.00</span></td>
                                                    <td class="text-right"><span id="total_amount">0.00</span></td>
                                                    <td colspan="2"></td>
                                                </tr>
                                            </tfoot>



                                                </table>
                                            </div>
                                      
							    		</div>
							    	</div>
							    </div>
						    </div>
							</div>
		<!-- End search-client-info -->
					<div class="modal fade" id="poViewModal" tabindex="-1" aria-hidden="true">
					<div class="modal-dialog modal-xl">
						<div class="modal-content" style="background: white">
						<div class="modal-header">
							<h5 class="modal-title">Invoice Detail</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
						</div>
						<div class="modal-body" id="po-detail-body">
							<!-- Dynamic data will be injected here -->
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

                    <!-- Tax 1 -->
                    <div class="row mb-2 align-items-center">
                        <label class="col-sm-4 col-form-label">Tax 1 :</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="tax_value_1" id="tax1">
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

                    <!-- Buttons -->
                    <div class="row">
                        <div class="col-sm-6 d-flex justify-content-start">
                            <button  class="btn btn-primary w-50" id="add_amc">Add</button>
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
        $('#client_name').empty().append('<option value="">Loading...</option>');

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
                    $('#client_name').empty().append('<option value="">Select Client Name</option>');
                    $.each(response.client_grp, function (key, client) {
                        $('#client_name').append('<option value="' + client.id + '">' + client.client_name + '</option>');
                    });
                }
            });
        } else {
            $('#client_name').empty().append('<option value="">Select Client Name</option>');
        }
    });



      $('#client_name').on('change', function () {
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
                    $('#client_add').text(response.client_add.address);
                       $.each(response.ClientContactPerson, function (key, contact_person) {

                        $('#contact_person').append('<option value="' + contact_person.id + '">' + contact_person.name + '</option>');

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
                  $('#model_id').empty().append('<option value="">Select Model</option>');
                      $.each(response, function (key, model) {
                    $('#model_id').append('<option value="' + model.id + '">' + model.model_name + '</option>');
                });

                   
                }
            });
        }
    });



});

$(document).ready(function () {
 let rowId = 1;
let editId = null;

 // Add or Update Row
   $('#add_data').click(function (e) {
    e.preventDefault();

    const makeText = $('#make_id option:selected').text();
    const makeId = $('#make_id').val();
    const modelText = $('#model_id option:selected').text();
    const modelId = $('#model_id').val();
    const serial_no = $('#serial_no').val();
    const capacity = $('#capacity').val();
    const table_location = $('#table_location').val();
    const st_qtr_id = $('#st_qtr').val();
    const st_qtr_text = $('#st_qtr option:selected').text();
    const late_fees = $('#late_fees').val();
    const contract_amount = parseFloat($('#contract_amount').val()) || 0;
    const description = $('#description').val();

    
    if (!makeId) {
        alert('Make is required.');
        $('#make_id').focus();
        return;
    }

    if (!modelId) {
        alert('Model is required.');
        $('#model_id').focus();
        return;
    }

   if (!contract_amount || contract_amount <= 0) {
    alert('Contract amount must be greater than 0.');
    $('#contract_amount').focus();
    return;
}

    // HTML Row
    let rowHtml = `
        <td>${editId !== null ? editId : rowId}</td>
        <td>${makeText}</td>
        <td>${modelText}</td>
        <td>${serial_no}</td>
        <td>${capacity}</td>
        <td>${table_location}</td>
        <td>${st_qtr_text}</td>
        <td>${late_fees}</td>
        <td>${contract_amount}</td>
        <td>${description}</td>
        <td>
            <button type="button" class="btn btn-warning btn-sm edit-row" data-id="${editId !== null ? editId : rowId}">Edit</button>
            <button type="button" class="btn btn-danger btn-sm remove-row" data-id="${editId !== null ? editId : rowId}">Delete</button>
        </td>
    `;

    if (editId !== null) {
        const updatedRow = $('#row_' + editId);
        updatedRow.html(rowHtml);
        updatedRow
            .attr('data-make_id', makeId)
            .attr('data-model_id', modelId)
            .attr('data-serial_no', serial_no)
            .attr('data-capacity', capacity)
            .attr('data-table_location', table_location)
            .attr('data-st_qtr', st_qtr_id)
            .attr('data-late_fees', late_fees)
            .attr('data-contract_amount', contract_amount)
            .attr('data-description', description)
            .removeData();
        editId = null;
        $('#add_data').text('Add To Table');
    } else {
        const newRow = `<tr id="row_${rowId}"
            data-make_id="${makeId}"
            data-model_id="${modelId}"
            data-serial_no="${serial_no}"
            data-capacity="${capacity}"
            data-table_location="${table_location}"
            data-st_qtr="${st_qtr_id}"
            data-late_fees="${late_fees}"
            data-contract_amount="${contract_amount}"
            data-description="${description}"
        >${rowHtml}</tr>`;
        $('#poentry_table tbody').append(newRow);
        rowId++;
    }

    calculateTotal();

    // Clear fields
    $('#capacity, #readability, #calibration, #calibration_charge, #pan_size, #item_price, #part_details').val('');
    $('#make_id, #model_id').val('').trigger('change');
});


    $(document).on('click', '.remove-row', function () {
        const id = $(this).data('id');
        $('#row_' + id).remove();
        calculateTotal();
    });

  $(document).on('click', '.edit-row', function () {
        const id = $(this).data('id');
        const row = $('#row_' + id);

        $('#make_id').val(row.attr('data-make_id')).trigger('change');
        $('#model_id').val(row.attr('data-model_id')).trigger('change');
        $('#capacity').val(row.attr('data-capacity'));
        $('#readability').val(row.attr('data-readability'));
        $('#calibration').val(row.attr('data-calibration'));
        $('#calibration_charge').val(row.attr('data-calibration_charge'));
        $('#pan_size').val(row.attr('data-pan_size'));
        $('#item_price').val(row.attr('data-price'));
        $('#part_details').val(row.attr('data-part_details'));

        editId = id;
        $('#add_data').text('Update Row');
    });


function calculateTotal() {
    let total = 0;
    let totalLateFee = 0;
    let totalAmount = 0;

    $("#poentry_table tbody tr").each(function () {
        let price = parseFloat($(this).data('contract_amount')) || 0;
        let late_fees = parseFloat($(this).data('late_fees')) || 0;

        totalAmount += price;
        totalLateFee += late_fees;

        total += price + late_fees;
    });

    // Update table footer totals
    $('#total_late_fee').text(totalLateFee.toFixed(2));
    $('#total_amount').text(totalAmount.toFixed(2));

    // Set taxable/net amount
    $('#net_amount').val(total.toFixed(2));

    // Tax calculations
    const tax1 = parseFloat($('#tax1').val()) || 0;
    const tax2 = parseFloat($('#tax2').val()) || 0;

    const tax1Amount = (total * tax1) / 100;
    const tax2Amount = (total * tax2) / 100;

    $('#tax1_amount').val(tax1Amount.toFixed(2));
    $('#tax2_amount').val(tax2Amount.toFixed(2));

    // Total before round off
    let totalWithTax = total + tax1Amount + tax2Amount;
    $('#total_data').val(totalWithTax.toFixed(2));

    // Round off and grand total
    let roundedGrandTotal = Math.round(totalWithTax);
    let roundOff = roundedGrandTotal - totalWithTax;

    $('#round_off_data').val(roundOff.toFixed(2));
    $('#grand_total').val(roundedGrandTotal.toFixed(2));
}


  		


    $('#tax1, #tax2, #round_off_data').on('change keyup input', function () {
        calculateTotal();
    });

$('#add_amc').on('click', function (e) {
    e.preventDefault();

    // Step 1: Collect table data from rows
    let items = [];

$('#poentry_table tbody tr').each(function () {
    const row = $(this);
    const item = {
        
        make_id: row.data('make_id'),
        model_id: row.data('model_id'),
        capacity: row.data('capacity'),
        serial_no: row.data('serial_no'),
        readability: row.data('readability'),
        calibration: row.data('calibration'),
        calibration_charge: row.data('calibration_charge'),
        pan_size: row.data('pan_size'),
        item_price: row.data('price'),
        part_details: row.data('part_details'),
        table_location: row.data('table_location'),
        late_fees: row.data('late_fees'),
        description: row.data('description'),
        table_location: row.data('table_location'),
        contract_amount: row.data('contract_amount'),
        st_qtr: row.data('st_qtr'),

    };
    items.push(item);
});


    // Step 2: Create formData object
    const formData = {
        // Summary Values
        net_amount: parseFloat($('#net_amount').val()) || 0,
        tax1: parseFloat($('#tax1').val()) || 0,
        tax1_amount: parseFloat($('#tax1_amount').val()) || 0,
        tax2: parseFloat($('#tax2').val()) || 0,
        tax2_amount: parseFloat($('#tax2_amount').val()) || 0,
        total_amount: parseFloat($('#total_data').val()) || 0,
        round_off: parseFloat($('#round_off_data').val()) || 0,
        grand_total: parseFloat($('#grand_total').val()) || 0,

        // Header Info
        company_id: $('#company_id').val(),
        fin_year_id: $('#financial_id').val(),
        amc_no: $('#amc_no').val(),
        amc_date: $('#amc_date').val(),
        contract_period_from: $('#from').val(),
        contract_period_to: $('#to').val(),
        status: $('#status').val(),
        remark: $('#remark').val(),
        client_group_id: $('#client_group').val(),
        emp_id: $('#emp_id').val(),
        subject: $('input[name="subject"]').val(),
        client_name_id: $('#client_name').val(),
        ref_id: $('select[name="ref_id"]').val(),
        quarter: $('select[name="quarter"]').val(),
        contact_person_id: $('#contact_person').val(),
        description: $('#description').val(),
        items: items,

        
        _token: $('meta[name="csrf-token"]').attr('content')
    };


    $.ajax({
        url: '{{ route("contract.amc.store") }}',
        method: 'POST',
        data: JSON.stringify(formData),
        contentType: 'application/json',
        success: function (response) {
            alert('Quotation saved successfully!');
        },
        error: function (xhr) {
            const errors = xhr.responseJSON?.errors || {};
            let msg = '';
            Object.values(errors).forEach(arr => arr.forEach(e => msg += e + "\n"));
            alert(msg || 'Something went wrong.');
        }
    });
});




$(document).ready(function () {
    $('#financial_id').on('change', function () {
        let finYearId = $(this).val();

        if (finYearId) {
            $.ajax({
                url: "{{ route('contract.amc.generateQuotationNo') }}",
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    fin_year_id: finYearId
                },
                success: function (response) {
                    if (response.status) {
                        $('#amc_no').val(response.quotation_no);
                    } else {
                        alert(response.message || 'Could not generate quotation number.');
                    }
                },
                error: function () {
                    alert('Something went wrong. Please try again.');
                }
            });
        }
    });
});
      
});


$(document).ready(function () {
    $('#serial_no').tagsinput(); 
});

</script>
 
@endpush