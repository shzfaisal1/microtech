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
							    		<div class="card-body">
                                            <div class="row">
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Client Name <span class="text-danger">*</span> :</label>
                                            	        <input type="text" class="form-control" id="email" placeholder="" name="email">
                                            	    </div>
                                            	</div>
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Contact No :</label>
                                            	        <input type="password" class="form-control" placeholder="" name="pswd">
                                            	    </div>
                                            	</div>
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Email ID :</label>
                                            	        <input type="password" class="form-control" placeholder="" name="pswd">
                                            	    </div>
                                            	</div>
                                            </div>

                                            <div class="row">
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Print Name as <span class="text-danger">*</span> :</label>
                                            	        <input type="password" class="form-control" placeholder="" name="pswd">
                                            	    </div>
                                            	</div>
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Client Group <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
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
                                                	        <div class="input-group-append">
                                                	          <a href="{{url('zone-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
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

                                                	        <div class="input-group-append">
                                                	          	<a href="{{url('client-type-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">State :</label>
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

                                            <div class="row">
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">PAN No :</label>
                                            	        <input type="text" class="form-control" id="email" placeholder="" name="email">
                                            	    </div>
                                            	</div>
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">GSTIN :</label>
                                            	        <input type="password" class="form-control" placeholder="" name="pswd">
                                            	    </div>
                                            	</div>
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">FAX :</label>
                                            	        <input type="password" class="form-control" placeholder="" name="pswd">
                                            	    </div>
                                            	</div>
                                            </div>

                                            <div class="row">
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">CST TIN No/Date :</label>
                                            	        <div class="input-group mb-3">
                                            	            <input type="text" class="form-control" placeholder="">
                                            	            <input type="date" class="form-control" placeholder="">
                                            	        </div>
                                            	    </div>
                                            	</div>
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">VAT TIN No/Date :</label>
                                            	        <div class="input-group mb-3">
                                            	            <input type="text" class="form-control" placeholder="">
                                            	            <input type="date" class="form-control" placeholder="">
                                            	        </div>
                                            	    </div>
                                            	</div>
                                            </div>

                                            <div class="row">
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Web Address :</label>
                                            	        <input type="password" class="form-control" placeholder="" name="pswd">
                                            	    </div>
                                            	</div>
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Service Tax No :</label>
                                            	        <input type="password" class="form-control" placeholder="" name="pswd">
                                            	    </div>
                                            	</div>
                                            </div>

                                            <div class="row">
                                            	<div class="col-lg-6">
                                            	    <div class="form-group">
                                            	        <label for="uname">Related Vendor :</label>
														<div class="input-group mb-3 flex-nowrap">
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
                                                	        <div class="input-group-append">
                                                	           <button class="btn btn-light" type="submit"><a href="{{url('vendor-master')}}"><i class="fa fa-plus text-success"></i></a></button>
                                                	        </div>
                                                	    </div>
                                            	    </div>
                                            	</div>
                                            </div>

                                            <div class="row">
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="comment">Address:</label>
                                            	        <textarea class="form-control" rows="3" id="comment"></textarea>
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
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="email">Name</label>
                                                        <input type="email" class="form-control" placeholder="Enter email" id="email">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="email">Designation</label>
                                                        <input type="email" class="form-control" placeholder="Enter email" id="email">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="email">Contact</label>
                                                        <input type="email" class="form-control" placeholder="Enter email" id="email">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control" placeholder="Enter email" id="email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <button type="submit" class="btn btn-primary d-block m-auto">Add</button>
                                                </div>
                                            </div>
							    		</div>
							    	</div>
							    </div>
						    </div>
    </div>
	<!-- End search-client-info -->

@endsection