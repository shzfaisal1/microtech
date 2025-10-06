@extends('master')
@section('main')

    <!--Page header-->
	<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Client Information</h4>
								<ol class="breadcrumb pl-0">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</div>
							<!-- <div class="page-rightheader">
								<div class="ml-3 ml-auto d-flex">
									<div class="border-right pr-4 mt-2 d-xl-block">
										<p class="text-muted mb-1">Category</p>
										<h6 class="font-weight-semibold mb-0">All Categories</h6>
									</div>
									<div class="border-right pl-4 pr-4 mt-2 d-xl-block">
										<p class="text-muted mb-0">Customer Rating</p>
										<div class="wideget-user-rating">
											<a href="#">
												<i class="fa fa-star text-warning"></i>
											</a>
											<a href="#">
												<i class="fa fa-star text-warning"></i>
											</a>
											<a href="#">
												<i class="fa fa-star text-warning"></i>
											</a>
											<a href="#">
												<i class="fa fa-star text-warning"></i>
											</a>
											<a href="#">
												<i class="fa fa-star-o text-warning mr-1"></i>
											</a>
											<span class="">(4.5/5)</span>
										</div>
									</div>
									<span class="pg-header">
										<a href="#" class="btn btn-primary-gradient ml-4 mt-2 "><i class="typcn typcn-shopping-cart mr-1"></i>Buy Now</a>
									</span>
								</div>
							</div> -->
	</div>
	<!--End Page header-->

    <!-- search-client-info -->
    <div class="search-client-info">
                            <div class="row">
							    <div class="col-lg-12 col-md-12">
							    	<div class="card">
							    		<div class="card-header">
							    			<h3 class="card-title">Search Client Information</h3>
							    			<!-- <div class="card-options ">
							    				<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
							    				<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
							    			</div> -->
							    		</div>
							    		<div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="sel1">Client Name</label>
                                                        <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)">
															<optgroup label="Mountain Time Zone">
																<option value="AZ">Arizona</option>
																<option value="CO">Colorado</option>
																<option value="ID">Idaho</option>
																<option value="MT">Montana</option><option value="NE">Nebraska</option>
																<option value="NM">New Mexico</option>
																<option value="ND">North Dakota</option>
																<option value="UT">Utah</option>
																<option value="WY">Wyoming</option>
															</optgroup>
														</select>
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
							    			<h3 class="card-title">Add Client Information</h3>
							    		</div>
										<form action="{{ route('client.name.store') }}" method="post">
											@csrf
									
							    		<div class="card-body">
                                            <div class="row">
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Client Name <span class="text-danger">*</span> :</label>
                                            	        <input type="text" class="form-control" id="client_name" placeholder="" name="client_name">
                                            	    </div>
                                            	</div>
                                            	<div class="col">
           								<div class="form-group">
                                    	<label for="uname">Contact No :</label>
                                  
                                       <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="" name="phone1" id="phone1">
                                        <input type="text" class="form-control" placeholder="" name="phone2" id="phone2">
                                    </div>
									
                                			</div>
                                            	</div>
                                            <div class="col">
										<div class="form-group">
										<label for="uname">Email ID :</label>
									
										<div class="input-group mb-3">
											<input type="email" class="form-control" placeholder="" name="email_id_1" id="email_id_1">
											<input type="email" class="form-control" placeholder="" name="email_id_2" id="email_id_2">
										</div>
									</div>
                           			 </div>
                                            </div>

                                            <div class="row">
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Print Name as <span class="text-danger">*</span> :</label>
                                            	        <input type="text" class="form-control" placeholder="" name="print_name">
                                            	    </div>
                                            	</div>
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Client Group <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" name="client_group_id">
																<optgroup >
																  @if($clients_data['client_group'])
                                                                  @foreach ($clients_data['client_group'] as $list)
                                                                    <option value="{{ $list->id }}"> {{ $list->name }}</option>  
                                                                  @endforeach  
                                                                
                                                                    
                                                                @endif
																</optgroup>
															</select>
                                                	        <div class="input-group-append">
                                                	            <a href="{{url('client-group-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Zone Name <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" name="zone_id">
																<optgroup label="Mountain Time Zone">
                                                                    @if(isset( $clients_data['client_zone ']))
                                                                    @foreach ($clients_data['client_zone '] as $zone)
                                                                      <option value="{{ $zone->id }}"> {{ $zone->name }}</option>  
                                                                    @endforeach
																	
                                                                    @endif
																</optgroup>
															</select>
                                                	        <div class="input-group-append">
                                                	          <a href="{{route('zone.create')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                            </div>

                                            <div class="row">
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Location <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" name="location_id">
																<optgroup>
                                                                    @if(isset( $clients_data['location']))
                                                                    @foreach ($clients_data['location'] as $location)
                                                                     <option value="{{ $location->id }}">{{ $location->name }}</option>   
                                                                    @endforeach											
                                                                    @endif
																</optgroup>
															</select>
                                                	        <div class="input-group-append">
                                                	          	<a href="{{url('location-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Client Type <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	       	<select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" name="client_type_id">
																<optgroup>
																	
                                                                        @if(isset($clients_data['client_type'] )) 
                                                                        @foreach ($clients_data['client_type'] as $type)
                                                                         <option value="{{ $type->id }}">{{ $type->name }}</option>   
                                                                        @endforeach

                                                                        @endif
																</optgroup>
															</select>

                                                	        <div class="input-group-append">
                                                	          	<a href="{{route('client-type.create')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">State :</label>
                                                	    <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" name="state">
															<optgroup>
																<option value="Maharashtra">Maharashtra</option>
															<option value="punjab">Punjab </option>
															</optgroup>
														</select>
                                                	</div>
                                            	</div>
                                            </div>

                                            <div class="row">
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">PAN No :</label>
                                            	        <input type="text" class="form-control" id="email" placeholder="" name="pan_no">
                                            	    </div>
                                            	</div>
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">GSTIN :</label>
                                            	        <input type="text" class="form-control" placeholder="" name="gstin">
                                            	    </div>
                                            	</div>
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">FAX :</label>
                                            	        <input type="text" class="form-control" placeholder="" name="fax">
                                            	    </div>
                                            	</div>
                                            </div>

                                            <div class="row">
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">CST TIN No/Date :</label>
                                            	        <div class="input-group mb-3">
                                            	            <input type="text" class="form-control" placeholder="" name="vat_tin_no">
                                            	            <input type="date" class="form-control" placeholder="" name="vat_tin_date">
                                            	        </div>
                                            	    </div>
                                            	</div>
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">VAT TIN No/Date :</label>
                                            	        <div class="input-group mb-3">
                                            	            <input type="text" class="form-control" placeholder="" name="cst_tin_no">
                                            	            <input type="date" class="form-control" placeholder="" name="cst_tin_date">
                                            	        </div>
                                            	    </div>
                                            	</div>
                                            </div>

                                            <div class="row">
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Web Address :</label>
                                            	        <input type="text" class="form-control" placeholder="" name="web_add">
                                            	    </div>
                                            	</div>
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Service Tax No :</label>
                                            	        <input type="text" class="form-control" placeholder="" name="service_tax_no">
                                            	    </div>
                                            	</div>
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Related Vendor :</label>
														<div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" name="related_vendor_id">
																<optgroup>
																	<option value="1">demo</option>

																</optgroup>
															</select>
                                                	        <div class="input-group-append">
                                                	           <button class="btn btn-light" type="submit"><a href="{{url('vendor-master')}}"><i class="fa fa-plus text-success"></i></a></button>
                                                	        </div>
                                                	    </div>
                                            	    </div>
                                            	</div>
                                            </div>

                                            <div class="row">
                                            	
                                            </div>

                                            <div class="row">
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="comment">Address:</label>
                                            	        <textarea class="form-control" rows="3" id="comment" name="address"></textarea>
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
                    <h3 class="card-title">Add Contact Person Info</h3>
                </div>
                <div class="card-body">
                    <div id="contact-person-wrapper">
                        <div class="form-row contact-person-group align-items-end" style="display: grid;grid-template-columns: auto auto auto auto auto auto auto auto;gap: 10px;">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name[]" class="form-control" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label>Designation</label>
                                <input type="text" name="designation[]" class="form-control" placeholder="Enter designation">
                            </div>
                            <div class="form-group">
                                <label>Contact 1</label>
                                <input type="number" name="contact_1[]" class="form-control" placeholder="Enter contact">
                            </div>
                            <div class="form-group">
                                <label>Contact 2</label>
                                <input type="number" name="contact_2[]" class="form-control" placeholder="Enter contact">
                            </div>
                            <div class="form-group">
                                <label>Email 1</label>
                                <input type="email" name="email_1[]" class="form-control" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label>Email 2</label>
                                <input type="email" name="email_2[]" class="form-control" placeholder="Enter email">
                            </div>
                            <div class="form-group text-right">
                                <button type="button" class="btn btn-outline-danger remove-row d-none mt-4" title="Remove">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-outline-success" id="add-more-contact">
                                    <i class="fa fa-plus"></i> Add More
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Add More Button -->
                    <!--<div class="form-row mt-3">-->
                    <!--    <div class="col text-center">-->
                    <!--        <button type="button" class="btn btn-outline-success" id="add-more-contact">-->
                    <!--            <i class="fa fa-plus"></i> Add More-->
                    <!--        </button>-->
                    <!--    </div>-->
                    <!--</div>-->

                    <!-- Submit Button -->
                    <div class="form-row mt-3">
                        <div class="col text-center">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check"></i> Add
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
	</form>



	<!-- End search-client-info -->

@endsection
@push('scripts')

<script>
 $(document).ready(function () {
    $('#add-more-contact').click(function () {
        let newRow = `
        <div class="form-row contact-person-group align-items-end" style="display: grid;grid-template-columns: auto auto auto auto auto auto auto auto;gap: 10px;">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name[]" class="form-control" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label>Designation</label>
                <input type="text" name="designation[]" class="form-control" placeholder="Enter designation">
            </div>
            <div class="form-group">
                <label>Contact 1</label>
                <input type="number" name="contact_1[]" class="form-control" placeholder="Enter contact">
            </div>
            <div class="form-group">
                <label>Contact 2</label>
                <input type="number" name="contact_2[]" class="form-control" placeholder="Enter contact">
            </div>
            <div class="form-group">
                <label>Email 1</label>
                <input type="email" name="email_1[]" class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label>Email 2</label>
                <input type="email" name="email_2[]" class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group text-right">
                <button type="button" class="btn btn-outline-danger remove-row mt-4" title="Remove">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        </div>
        `;
        $('#contact-person-wrapper').append(newRow);
    });

    // Remove dynamically added rows
    $(document).on('click', '.remove-row', function () {
        $(this).closest('.contact-person-group').remove();
    });
});

</script>
@endpush
