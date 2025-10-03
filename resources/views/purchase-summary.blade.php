@extends('master')

@section('main')

<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Purchase Summary</h4>
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
                                            	        <div class="form-group">
                                                	        <label for="uname">Company Name  <span class="text-danger">*</span> :</label>
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
                                                	                <a href="{{url('buyer-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	            </div>
                                                	        </div>
                                                	    </div>
                                            	    </div>
                                            	</div>
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">From <span class="text-danger">*</span> :</label>
                                                	    <input type="date" class="form-control" id="email" placeholder="" name="email">
                                                	</div>
                                            	</div>
                                                <div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">To <span class="text-danger">*</span> :</label>
                                                	    <input type="date" class="form-control" id="email" placeholder="" name="email">
                                                	</div>
                                            	</div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Make <span class="text-danger">*</span> :</label>
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
                                                	            <a href="{{url('buyer-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                                <div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Vendor Name <span class="text-danger">*</span> :</label>
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
                                                	            <a href="{{url('buyer-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                                <div class="col">
                                                    <label for="uname">Search Condition <span class="text-danger">*</span> :</label>
                                                    <div>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optradio">Search by make
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optradio">Search by model
                                                        </label>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <button type="submit" class="btn btn-primary d-block m-auto">Search</button>
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
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example" class="table table-striped table-bordered w-100">
                                                    <thead>
                                                        <tr>
                                                            <th class="wd-15p">Invoice Date</th>
                                                            <th class="wd-15p">Invoice No</th>
                                                            <th class="wd-15p">Company</th>
                                                            <th class="wd-15p">Make</th>
                                                            <th class="wd-15p">Model</th>
                                                            <th class="wd-15p">Serial No</th>
                                                            <th class="wd-15p">Qty</th>
                                                            <th class="wd-15p">Rate</th>
                                                            <th class="wd-15p">Total</th>
                                                            <th class="wd-15p">Price In INR</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Bella</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <a href=""><i class="fa fa-edit"></i></a>
                                                                <a href=""><i class="fa fa-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Donna</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <a href=""><i class="fa fa-edit"></i></a>
                                                                <a href=""><i class="fa fa-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
							    		</div>
							    	</div>
							    </div>
						    </div>
                        </div>
						<!-- End search-client-info -->

@endsection