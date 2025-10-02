@extends('master')

@section('main')

<!--Page header-->
<div class="page-header">
	<div class="page-leftheader">
		<h4 class="page-title">Quotation Entry</h4>
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
                                                	            <a href="{{route('masters.company-details.company-details')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Financial Year <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" id="fin_year_id" name="fin_year_id" data-placeholder="Choose one (with searchbox)">
																<optgroup>
																	@if(isset($financial))
																	@foreach ($financial as $val)
																	<option value="{{ $val->id }}">{{ $val->financial_year }}</option>	
																	@endforeach
																	
																@endif
																</optgroup>
															</select>
                                                	        <div class="input-group-append">
                                                	          <a href="{{route('financial.create')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
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
							    			<h3 class="card-title">Sales Quotation Entry</h3>
							    		</div>
							    		<div class="card-body">
                                            <div class="row">
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Quot. No/Date  <span class="text-danger">*</span> :</label>
                                            	        <div class="input-group mb-3">
                                            	            <input type="text" class="form-control" id="quotation_no" name="quotation_no" value="{{ old('quotation_no', $quotationNumber ?? '') }}" readonly>

                                            	            <input type="date" class="form-control" placeholder="" name="quotation_date" id="quotation_date">
                                            	        </div>
                                            	    </div>
                                            	</div>
                                            	<div class="col">
											<div class="form-group">
												<label for="uname">Client Group <span class="text-danger">*</span> :</label>
												<div class="input-group mb-1 flex-nowrap">
													<select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" id="client_group" name="client_group_id">
														<optgroup>
															@if(isset($clients_grp))
																	<option value="0">Select Client Group </option>

																@foreach($clients_grp as $list)

																	<option value="{{ $list->id }}">{{ $list->name }}</option>
																	
																@endforeach
															@endif
														</optgroup>
													</select>
													<div class="input-group-append">
														<a href="{{ route('client.create') }}" class="btn btn-light" type="button"><i class="fa fa-plus text-success"></i></a>
													</div>
												</div>
												<span id="vendor_add" class="text-danger d-block mt-1"></span>
											</div>
										</div>

                                                <div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Employee Name <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" id="emp_id" name="emp_id">
																<optgroup >
																	<option value="0"> Select Employee Name</option>
																    @if(isset($emp))
																    @foreach($emp as $emp_list)
																    <option value="{{ $emp_list->id }}"> {{ $emp_list->name}} </option>
																    @endforeach
																    
																    @endif
																    

																</optgroup>
															</select>
														<div class="input-group-append">
												    		<a href="{{ route('employee.details.create') }}" class="btn btn-light" type="button"><i class="fa fa-plus text-success"></i></a>
													</div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Subject <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	    
                                                	         <input type="text" class="form-control" name="subject" >
                                                	    </div>
                                                	</div>
                                            	</div>
                                               <div class="col">
                                      <div class="form-group">
                                        <label for="client_name">Client Name <span class="text-danger">*</span> :</label>
                                        <div class="input-group mb-1 flex-nowrap">
                                            <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" id="client_name" name="client_name_id">
                                                <optgroup>
                                                    <option value="0"> Select Client Name</option>   
                                                </optgroup>
                                            </select>
                                            <div class="input-group-append">
                                                <a href="{{ route('client.name.create') }}" class="btn btn-light" type="button">
                                                    <i class="fa fa-plus text-success"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <span class="text-danger d-block mt-1" id="client_add"></span> {{-- Now properly aligned below --}}
                                            </div>
                                        </div>

                                                <div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Referred By<span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" name="ref_id">
																<optgroup label="select reference">
																   @if(isset($ref))
																    @foreach($ref as $ref_list)
																    <option value="{{ $ref_list->id }}"> {{ $ref_list->name}} </option>
																    @endforeach
																    
																    @endif
									
																</optgroup>
															</select>
                                                	        <div class="input-group-append">
                                                	            <a href="{{route('reference.create')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                            </div>

                                            <div class="row">
                                                 <div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Quarter<span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" name="quarter">
																<optgroup>
                                                                    @if(isset($Quarters))
                                                                  @foreach ($Quarters as $quater)
                                                                  <option value="{{ $quater->id }}">{{ $quater->name }}</option>    
                                                                  @endforeach
																	
                                                                    @endif
																</optgroup>
															</select>
                                                	        <div class="input-group-append">
                                                	            <a href="{{route('quarter.create')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>

                                             <div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Contact Person <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" id="contact_person" name="contact_person">
																<optgroup>
                                                               
                                                                     <option value="0"> Select Contact Person</option>   
                                                                  
																</optgroup>
															</select>
                                                	        <div class="input-group-append">
                                                	            <a href="{{ route('client.name.create') }}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>

                                               <div class="col">
                                    <div class="form-group">
                                        <label for="total">Note <span class="text-danger">*</span> :</label>
                                        <textarea class="form-control" id="note" name="note" rows="2" readonly></textarea>
                                    </div>
                                </div>
          
                                                
                                            </div>

                                                               <div class="row">
    <div class="col">
        <div class="form-group d-flex align-items-center" style="margin-top: 10px;">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" value="0" id="hallmarking" name="hallmarking_quotation" {{ old('hallmarking_quotation', $quotation->hallmarking_quotation ?? false) ? 'checked' : '' }}>
                <label class="custom-control-label" for="hallmarking">Hallmarking Quotation</label>
            </div>
        </div>
    </div>
</div>
							    	</div>
      
							    </div>
           
						    </div>
                
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
                                        <a href="{{ route('make.create') }}" class="btn btn-light"><i class="fa fa-plus text-success"></i></a>
                                        
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
                                        <a href="{{ route('model.index') }}" class="btn btn-light"><i class="fa fa-plus text-success"></i></a>
                                       
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
                                <label for="readability">Readability :</label>
                                <input type="text" class="form-control" name="readability" id="readability">
                            </div>
                        </div>

                        <!-- Calibration -->
                        <div class="col">
                            <div class="form-group">
                                <label for="calibration">Calibration :</label>
                                <input type="text" class="form-control" name="calibration" id="calibration">
                            </div>
                        </div>

                        <!-- Calibration Charge -->
                        <div class="col">
                            <div class="form-group">
                                <label for="calibration_charge">Calibration Charge :</label>
                                <input type="text" class="form-control" name="calibration_charge" id="calibration_charge" value="0">
                            </div>
                        </div>
                    </div>

                    <!-- Row 3: Pan Size, Price, Part Details -->
                    <div class="row">
                        <!-- Pan Size -->
                        <div class="col">
                            <div class="form-group">
                                <label for="pan_size">Pan Size :</label>
                                <input type="text" class="form-control" name="pan_size" id="pan_size">
                            </div>
                        </div>

                        <!-- Price -->
                        <div class="col">
                            <div class="form-group">
                                <label for="price">Price <span class="text-danger">*</span> :</label>
                                <input type="number" class="form-control" name="item_price" id="item_price" value="0">
                            </div>
                        </div>

                        <!-- Part Details -->
                        <div class="col">
                            <div class="form-group">
                                <label for="part_details">Part Details :</label>
                                <textarea class="form-control" name="part_details" id="part_details" rows="2"></textarea>
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
</div> <!-- search-client-info -->

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
                                                            <th class="wd-15p">Capacity</th>
                                                            <th class="wd-15p">Readability</th>
                                                            <th class="wd-15p">Calibration</th>
                                                            <th class="wd-15p">Calibration Charge</th>
                                                            <th class="wd-15p">Pan Size</th>
                                                            <th class="wd-15p">Price</th>
                                                            <th class="wd-15p">Description</th>
                                                            <th class="wd-25p">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      
                                                        
                                                    </tbody>
													<tfoot>
										
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
                            <button  class="btn btn-primary w-50" id="add_quotation">Add</button>
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
<script>


$(document).ready(function () {

     $('#fin_year_id').on('change', function () {
     
        let finYearId = $(this).val();
       
        if (finYearId) {
            $.ajax({
                url: "{{ route('quatation.generateQuotationNo') }}",
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    fin_year_id: finYearId
                },
                success: function (response) {
                    if (response.status) {
                        $('#quotation_no').val(response.quotation_no);
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
        const makeVal = $('#make_id').val();
        const modelText = $('#model_id option:selected').text();
        const modelVal = $('#model_id').val();
        const capacity = $('#capacity').val();
        const readability = $('#readability').val();
        const calibration = $('#calibration').val();
        const calibration_charge = $('#calibration_charge').val();
        const pan_size = $('#pan_size').val();
        const price = parseFloat($('#item_price').val()) || 0;
        const part_details = $('#part_details').val();

        if (!makeVal || !modelVal || price === 0) {
            alert('Please fill required fields: Make, Model, Price.');
            return;
        }

        let rowHtml = `
            <td>${editId !== null ? editId : rowId}</td>
            <td>${makeText}</td>
            <td>${modelText}</td>
            <td>${capacity}</td>
            <td>${readability}</td>
            <td>${calibration}</td>
            <td>${calibration_charge}</td>
            <td>${pan_size}</td>
            <td>${price}</td>
            <td>${part_details}</td>
            <td>
                <button type="button" class="btn btn-warning btn-sm edit-row" data-id="${editId !== null ? editId : rowId}">Edit</button>
                <button type="button" class="btn btn-danger btn-sm remove-row" data-id="${editId !== null ? editId : rowId}">Delete</button>
            </td>
        `;

        if (editId !== null) {
            const updatedRow = $('#row_' + editId);
            updatedRow.html(rowHtml);
            updatedRow
                .attr('data-make_id', makeVal)
                .attr('data-model_id', modelVal)
                .attr('data-capacity', capacity)
                .attr('data-readability', readability)
                .attr('data-calibration', calibration)
                .attr('data-calibration_charge', calibration_charge)
                .attr('data-pan_size', pan_size)
                .attr('data-price', price)
                .attr('data-part_details', part_details)
                .removeData(); // clear .data() cache
            editId = null;
            $('#add_data').text('Add To Table');
        } else {
            const newRow = `<tr id="row_${rowId}"
                data-make_id="${makeVal}"
                data-model_id="${modelVal}"
                data-capacity="${capacity}"
                data-readability="${readability}"
                data-calibration="${calibration}"
                data-calibration_charge="${calibration_charge}"
                data-pan_size="${pan_size}"
                data-price="${price}"
                data-part_details="${part_details}"
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

  
    $("#poentry_table tbody tr").each(function () {
       let price = parseFloat($(this).data('price')) || 0;
        if (!isNaN(price)) {
            total += price;
        }
    });

   
    $('#net_amount').val(total.toFixed(2));

   
    const tax1 = parseFloat($('#tax1').val()) || 0;
    const tax2 = parseFloat($('#tax2').val()) || 0;

    const tax1Amount = (total * tax1) / 100;
    const tax2Amount = (total * tax2) / 100;

    $('#tax1_amount').val(tax1Amount.toFixed(2));
    $('#tax2_amount').val(tax2Amount.toFixed(2));

    // 4. Total before round off
    let totalWithTax = total + tax1Amount + tax2Amount;
    $('#total_data').val(totalWithTax.toFixed(2));

    // 5. Round off and grand total
    let roundedGrandTotal = Math.round(totalWithTax);
    let roundOff = roundedGrandTotal - totalWithTax;

    $('#round_off_data').val(roundOff.toFixed(2));
    $('#grand_total').val(roundedGrandTotal.toFixed(2));
}


  		


    $('#tax1, #tax2, #round_off_data').on('change keyup input', function () {
        calculateTotal();
    });

$('#add_quotation').on('click', function (e) {
    e.preventDefault();

    // Step 1: Collect table data from rows
    let items = [];

$('#poentry_table tbody tr').each(function () {
    const row = $(this);
    const item = {
        make_id: row.data('make_id'),
        model_id: row.data('model_id'),
        capacity: row.data('capacity'),
        readability: row.data('readability'),
        calibration: row.data('calibration'),
        calibration_charge: row.data('calibration_charge'),
        pan_size: row.data('pan_size'),
        item_price: row.data('price'),
        part_details: row.data('part_details')
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
        fin_year_id: $('#fin_year_id').val(),
        quotation_no: $('#quotation_no').val(),
        quotation_date: $('#quotation_date').val(),
        client_group_id: $('#client_group').val(),
        emp_id: $('#emp_id').val(),
        subject: $('input[name="subject"]').val(),
        client_name_id: $('#client_name').val(),
        ref_id: $('select[name="ref_id"]').val(),
        quarter: $('select[name="quarter"]').val(),
        contact_person_id: $('#contact_person').val(),
        note: $('#note').val(),
        hallmarking :$("#hallmarking").val(),
        items: items,

        
        _token: $('meta[name="csrf-token"]').attr('content')
    };


    $.ajax({
        url: '{{ route("quatation.store") }}',
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





      
});




</script>
 
@endpush