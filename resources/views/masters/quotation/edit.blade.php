@extends('master')

@section('main')

<!--Page header-->
<div class="page-header">
	<div class="page-leftheader">
		<h4 class="page-title">Edit Quotation</h4>
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
																<option value="{{ $company->id }}" {{ $quotation->company_id == $company->id ? 'selected' : '' }}>{{ $company->company_name }}</option>

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
																<option value="{{ $val->id }}" {{ $quotation->fin_year_id == $val->id ? 'selected' : '' }}>{{ $val->financial_year }}</option>

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

                                            	            <input type="date" class="form-control" placeholder="" name="quotation_date" id="quotation_date" value="{{ $quotation->quotation_date }}">
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
																	<option value="0">Select Client Group</option>

																@foreach($clients_grp as $list)

																<option value="{{ $list->id }}" {{ $quotation->client_group_id == $list->id ? 'selected' : '' }}>{{ $list->name }}</option>

																	
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
																
																   @if(isset($emp))
																    @foreach($emp as $emp_list)
																    <option value="{{ $emp_list->id }}"  {{ $quotation->emp_name_id == $list->id ? 'selected' : '' }}> {{ $emp_list->name}} </option>
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
                                                	    
                                                	         <input type="text" class="form-control" name="subject"  value="{{ $quotation->subject }}">
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
                                @if(isset($clients_details))
                                    @foreach($clients_details as $client)
                                        <option value="{{ $client->id }}" {{ ($selectedClientId == $client->id) ? 'selected' : '' }}>
                                            {{ $client->client_name }}
                                        </option>
                                    @endforeach
                                @endif
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
																<optgroup>
																   @if(isset($ref))
																    @foreach($ref as $ref_list)
																    <option value="{{ $ref_list->id }}" {{ $quotation->ref_id == $ref_list->id ? 'selected' : '' }}> {{ $ref_list->name}} </option>
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
                                                                        <option value="0">Select Quarter</option>
                                                                        @if(isset($Quarters))
                                                                            @foreach ($Quarters as $quater)
                                                                                <option value="{{ $quater->id }}" {{ (isset($selectedQuarterId) && $selectedQuarterId == $quater->id) ? 'selected' : '' }}>
                                                                                    {{ $quater->name }}
                                                                                </option>    
                                                                            @endforeach
                                                                        @endif
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
                                                                <option value="0">Select Contact Person</option>
                                                                @foreach($ClientContactPerson as $person)
                                                                    <option value="{{ $person->id }}" {{ (isset($selectedContactPersonId) && $selectedContactPersonId == $person->id) ? 'selected' : '' }}>
                                                                        {{ $person->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                	        <div class="input-group-append">
                                                	            <a href="{{url('buyer-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>

                                               <div class="col">
                                                <div class="form-group">
                                                <label for="total">Note <span class="text-danger">*</span> :</label>
                                                <textarea class="form-control" id="note" name="note" rows="2" ></textarea>
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
    <input type="hidden" id="edit_item_id" value="">

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
    @if(isset($quotation->product_data) && count($quotation->product_data) > 0)
        @foreach ($quotation->product_data as $index => $item)
        <tr 
    id="{{ $item->id }}"
    data-id="{{ $item->id }}"
    data-make_id="{{ $item->make_id }}"
    data-model_id="{{ $item->model_id }}"
    data-capacity="{{ $item->capacity }}"
    data-readability="{{ $item->readability }}"
    data-calibration="{{ $item->calibration }}"
    data-calibration_charge="{{ $item->calibration_charge }}"
    data-pan_size="{{ $item->pan_size }}"
    data-price="{{ $item->price }}"
    data-part_details="{{ $item->part_details }}"
>
    <td>{{ $item->id }}</td>
    <td>{{ $item->make_data->name ?? '-' }}</td>
    <td>{{ $item->model_data->name ?? '-' }}</td>
    <td>{{ $item->capacity }}</td>
    <td>{{ $item->readability }}</td>
    <td>{{ $item->calibration }}</td>
    <td>{{ $item->calibration_charge }}</td>
    <td>{{ $item->pan_size }}</td>
    <td>{{ $item->price }}</td>
    <td>{{ $item->part_details }}</td>
    <td>
        <a class="text-primary edit-row" data-id="{{ $index + 1 }}"><i class="fa fa-edit" style="font-size:15px;"></i></a>
        <a class="text-danger remove-row" data-id="{{ $index + 1 }}" id="quotation_delete"><i class="fa fa-trash" style="font-size:15px;"></i></a>
    </td>
</tr>

        @endforeach
    @endif
</tbody>


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
                            <input type="number" class="form-control text-end" name="net_amount" id="net_amount" value="{{ $quotation->net_amount }}" readonly>
                        </div>
                    </div>

                    <!-- Tax 1 -->
                    <div class="row mb-2 align-items-center">
                        <label class="col-sm-4 col-form-label">Tax 1 :</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="tax_value_1" id="tax1">
                                        <option value="0"> -</option> 
                                 @foreach ($taxes as $taxe)
                                    <option value="{{ $taxe->tax_value }}"
                                        {{ (old('tax_value_1', $quotation->tax_value_1) == $taxe->tax_value) ? 'selected' : '' }}>
                                        {{ $taxe->tax_name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-sm-4">
                            <input type="number" class="form-control text-end" name="tax_value_amount_1" id="tax1_amount" value="{{ $quotation->tax_value_amount_1 }}" readonly>
                        </div>
                    </div>

                    <!-- Tax 2 -->
                    <div class="row mb-2 align-items-center">
                        <label class="col-sm-4 col-form-label">Tax 2 :</label>
                        <div class="col-sm-4">
                      <select class="form-control" name="tax_value_2" id="tax2">
                                <option value="0">-</option>
                                @foreach ($taxes as $taxe)
                                    <option value="{{ $taxe->tax_value }}"
                                        {{ (old('tax_value_2', $quotation->tax_value_2) == $taxe->tax_value) ? 'selected' : '' }}>
                                        {{ $taxe->tax_name }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-sm-4">
                            <input type="number" class="form-control text-end" name="tax_value_amount_2" id="tax2_amount" value="{{ $quotation->tax_value_amount_2 }}" readonly>
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Total :</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control text-end" name="total_amount" id="total_data" value="{{ $quotation->total_amount }}" readonly>
                        </div>
                    </div>

                    <!-- Round Off -->
                    <div class="row mb-2">
                        <label class="col-sm-4 col-form-label">Round off :</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control text-end" name="round_off"  value="{{ $quotation->round_off }}"id="round_off_data" value="0.00">
                        </div>
                    </div>

                    <hr>

                    <!-- Grand Total -->
                    <div class="row mb-3">
                        <label class="col-sm-4 col-form-label fw-bold text-purple">Grand Total :</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control text-end fw-bold text-purple" name="grand_total" id="grand_total" value="{{ $quotation->grand_total }}" >
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="row">
                        <div class="col-sm-6 d-flex justify-content-start">
                            <button class="btn btn-primary w-50" id="update_quotation">Update</button>
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
    let rowId = 1;
    let editId = null;

    // Fill form with data if it's an edit
    initializeEditTable();

    // Dependent dropdown - Client Group to Client Name
    $('#client_group').on('change', function () {
        let client_gr_id = $(this).val();
        $('#client_name').empty().append('<option value="">Loading...</option>');

        if (client_gr_id) {
            $.post("{{ route('quatation.client_group') }}", {
                client_gr_id,
                _token: '{{ csrf_token() }}'
            }, function (response) {
                $('#client_name').empty().append('<option value="">Select Client Name</option>');
                $.each(response.client_grp, function (_, client) {
                    $('#client_name').append(`<option value="${client.id}">${client.client_name}</option>`);
                });
            });
        }
    });

    // Dependent dropdown - Client Name to Contact Persons
    $('#client_name').on('change', function () {
        let client_add_id = $(this).val();
        $('#contact_person').empty().append('<option value="">Loading...</option>');

        if (client_add_id) {
            $.post("{{ route('quatation.client_add') }}", {
                client_add_id,
                _token: '{{ csrf_token() }}'
            }, function (response) {
                $('#client_add').text(response.client_add.address);
                $('#contact_person').empty().append('<option value="">Select Contact</option>');
                $.each(response.ClientContactPerson, function (_, contact) {
                    $('#contact_person').append(`<option value="${contact.id}">${contact.contact_1}</option>`);
                });
            });
        }
    });

    // Dependent dropdown - Make to Model
    $('#make_id').on('change', function () {
        let make_id = $(this).val();
        if (make_id) {
            $.post("{{ route('quatation.make') }}", {
                make_id,
                _token: '{{ csrf_token() }}'
            }, function (response) {
                $('#model_id').empty();
                $.each(response, function (_, model) {
                    $('#model_id').append(`<option value="${model.id}">${model.model_name}</option>`);
                });
            });
        }
    });

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
    const itemId = $('#edit_item_id').val(); // Hidden field (we'll add below)
    console.log(itemId);
    if (!makeVal || !modelVal || price === 0) {
        alert('Please fill required fields: Make, Model, Price.');
        return;
    }

    const currentId = editId || rowId;
    const rowHTML = `
        <tr id="row_${currentId}"
            data-id="${itemId || ''}"
            data-make_id="${makeVal}"
            data-model_id="${modelVal}"
            data-capacity="${capacity}"
            data-readability="${readability}"
            data-calibration="${calibration}"
            data-calibration_charge="${calibration_charge}"
            data-pan_size="${pan_size}"
            data-price="${price}"
            data-part_details="${part_details}"
        >
            <td>${itemId || currentId}</td>
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
                <button type="button" class="btn btn-warning btn-sm edit-row" data-id="${currentId}">Edit</button>
                <button type="button" class="btn btn-danger btn-sm remove-row" data-id="${currentId}" id="quotation_delete">Delete</button>
            </td>
        </tr>
    `;

    if (editId) {
        $(`#row_${editId}`).replaceWith(rowHTML);
        editId = null;
        $('#add_data').text('Add To Table');
    } else {
        $('#poentry_table tbody').append(rowHTML);
        rowId++;
    }

    $('#edit_item_id').val('');
    calculateTotal();
    clearInputs();
});


 $(document).on('click', '.edit-row', function () {
    const id = $(this).data('id');
    const row = $(`#row_${id}`);

    $('#make_id').val(row.data('make_id')).trigger('change');
    $('#model_id').val(row.data('model_id')).trigger('change');
    $('#capacity').val(row.data('capacity'));
    $('#readability').val(row.data('readability'));
    $('#calibration').val(row.data('calibration'));
    $('#calibration_charge').val(row.data('calibration_charge'));
    $('#pan_size').val(row.data('pan_size'));
    $('#item_price').val(row.data('price'));
    $('#part_details').val(row.data('part_details'));

    $('#edit_item_id').val(row.data('id') || ''); // Set hidden input value
    editId = id;
    $('#add_data').text('Update Row');
});


    $(document).on('click', '.remove-row', function () {
        const id = $(this).data('id');
        $(`#row_${id}`).remove();
        calculateTotal();
    });

    $('#tax1, #tax2, #round_off_data').on('input', function () {
        calculateTotal();
    });

    $('#update_quotation').on('click', function (e) {

        e.preventDefault();
           
        let items = [];
        $('#poentry_table tbody tr').each(function () {
            const row = $(this);
               
            items.push({
                 id: row.data('id') || null,
                make_id: row.data('make_id'),
                model_id: row.data('model_id'),
                capacity: row.data('capacity'),
                readability: row.data('readability'),
                calibration: row.data('calibration'),
                calibration_charge: row.data('calibration_charge'),
                pan_size: row.data('pan_size'),
                item_price: row.data('price'),
                part_details: row.data('part_details')
            });
        });

        const formData = {
            quotation_id: '{{ $quotation->id }}',
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

            net_amount: parseFloat($('#net_amount').val()) || 0,
            tax1: parseFloat($('#tax1').val()) || 0,
            tax1_amount: parseFloat($('#tax1_amount').val()) || 0,
            tax2: parseFloat($('#tax2').val()) || 0,
            tax2_amount: parseFloat($('#tax2_amount').val()) || 0,
            total_amount: parseFloat($('#total_data').val()) || 0,
            round_off: parseFloat($('#round_off_data').val()) || 0,
            grand_total: parseFloat($('#grand_total').val()) || 0,
            items,
            _token: $('meta[name="csrf-token"]').attr('content')
        };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
      $.ajax({
    url: '{{ route('quatation.update', $quotation->id) }}',
    method: 'PUT',
    contentType: 'application/json',
    data: JSON.stringify({
        formData: formData,
        deletedItemIds: deletedItemIds
    }),
    success: function () {
        alert('Quotation updated successfully!');
        window.location.reload();
    },
    error: function (xhr) {
        const errors = xhr.responseJSON?.errors || {};
        let msg = '';
        Object.values(errors).forEach(arr => arr.forEach(e => msg += e + "\n"));
        alert(msg || 'Something went wrong.');
    }
});

    });


           $(document).on('click', '.delete-row', function (e) {
        e.preventDefault();
        const row = $(this).closest('tr');
        row.remove();
     
    });
    function calculateTotal() {
        let total = 0;
        $("#poentry_table tbody tr").each(function () {
            const price = parseFloat($(this).data('price')) || 0;
            total += price;
        });
        $('#net_amount').val(total.toFixed(2));
        const tax1 = parseFloat($('#tax1').val()) || 0;
        const tax2 = parseFloat($('#tax2').val()) || 0;
        const tax1Amount = (total * tax1) / 100;
        const tax2Amount = (total * tax2) / 100;
        $('#tax1_amount').val(tax1Amount.toFixed(2));
        $('#tax2_amount').val(tax2Amount.toFixed(2));
        const totalWithTax = total + tax1Amount + tax2Amount;
        $('#total_data').val(totalWithTax.toFixed(2));
        const grandTotal = Math.round(totalWithTax);
        const roundOff = grandTotal - totalWithTax;
        $('#round_off_data').val(roundOff.toFixed(2));
        $('#grand_total').val(grandTotal.toFixed(2));
    }

    function clearInputs() {
        $('#capacity, #readability, #calibration, #calibration_charge, #pan_size, #item_price, #part_details').val('');
        $('#make_id, #model_id').val('').trigger('change');
    }

function initializeEditTable() {
    $('#poentry_table tbody tr').each(function (index) {
        $(this).attr('id', 'row_' + (index + 1));
      
        rowId = index + 2;
    });
}

});
    let deletedItemIds = [];
 $('#poentry_table').on('click', '#quotation_delete', function (e) {
        e.preventDefault();
        const row = $(this).closest('tr');
        const itemId = row.data('id');
        if (itemId) deletedItemIds.push(itemId);
        row.remove();
      alert(deletedItemIds);
    });



   
</script>
 
@endpush