@extends('master')

@section('main')

<!--Page header-->
<div class="page-header">
	<div class="page-leftheader">
		<h4 class="page-title">Create PO</h4>
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
                                    <form action="{{ route('amc.quatation.store') }}" method="post">
                                        @csrf
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
							    			<h3 class="card-title">Sales Quotation Entry</h3>
							    		</div>
							    		<div class="card-body">
                                            <div class="row">
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Quot. No/Date  <span class="text-danger">*</span> :</label>
                                            	        <div class="input-group mb-3">
                                            	            <input type="text" class="form-control" id="amcquotation_no" name="amcquotation_no" value="{{ old('amcquotation_no', $quotationamcNo ?? '') }}" readonly>

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
																	<option value="0">Select Client Group</option>

																@foreach($clients_grp as $list)

																	<option value="{{ $list->id }}">{{ $list->name }}</option>
																	
																@endforeach
															@endif
														</optgroup>
													</select>
													<div class="input-group-append">
														<a href="{{ url('buyer-master') }}" class="btn btn-light" type="button"><i class="fa fa-plus text-success"></i></a>
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
																	<option value="1"> demo</option>
																	<option value="2"> test</option>

																</optgroup>
															</select>
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
                                                <a href="{{ url('buyer-master') }}" class="btn btn-light" type="button">
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
																<optgroup label="Mountain Time Zone">
																	<option value="1">abhi</option>
									
																</optgroup>
															</select>
                                                	        <div class="input-group-append">
                                                	            <a href="{{url('buyer-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
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
                                                	            <a href="{{url('buyer-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
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
                                                	            <a href="{{url('buyer-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>

                                               <div class="col">
                                            <div class="form-group">
                                            <label for="price">Price <span class="text-danger">*</span> :</label>
                                            <input type="number" class="form-control" name="price" id="item_price" value="0">
                                             </div>
                                             </div>

                                                
                                            </div>


                                                                                        <div class="row">
                                                 <div class="col-4">
                                                	<div class="form-group">
                                                	    <label for="uname">Taxes<span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" name="tax">
																<optgroup>
                                                                    @if(isset($taxes))
                                                                  @foreach ($taxes as $taxe)
                                                                  <option value="{{ $taxe->id }}">{{ $taxe->tax_name }}</option>    
                                                                  @endforeach
																	
                                                                    @endif
																</optgroup>
															</select>
                                                	        <div class="input-group-append">
                                                	            <a href="{{url('buyer-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>

                                            <div class="col">
    <div class="form-group">
        <label for="type">Type <span class="text-danger">*</span> :</label>
        <div class="input-group mb-3 flex-nowrap">

            <div class="form-check mr-3">
                <input class="form-check-input" type="radio" name="quotation_type" id="amc" value="AMC" required>
                <label class="form-check-label" for="amc">
                    AMC
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" name="quotation_type" id="stamping" value="Stamping">
                <label class="form-check-label" for="stamping">
                    Stamping
                </label>
            </div>

        </div>
    </div>
</div>




                                                
                                            </div>

                                    <div class="row">
                                    <div class="col">
                                         <input  class="btn btn-primary d-block m-auto" type="submit" value="Submit">
                                        </div>
                            
							    	</div>
                                   </form>
                            </div>
							    </div>
                                   
						    </div>
                        
</div>


@endsection
	@push('scripts')
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





});






</script>
 
@endpush