@extends('master')

@section('main')

<!--Page header-->
<div class="page-header">
	<div class="page-leftheader">
		<h4 class="page-title">Sales Quotation</h4>
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
                                                	            <a href="{{url('company-details')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Financial Year <span class="text-danger">*</span> :</label>
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
                                            	        <label for="uname">Quot. No*/Date <span class="text-danger">*</span> :</label>
                                            	        <div class="input-group mb-3">
                                            	            <input type="text" class="form-control" placeholder="">
                                            	            <input type="date" class="form-control" placeholder="">
                                            	        </div>
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
                                                	    <label for="uname">Employee Name <span class="text-danger">*</span> :</label>
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
                                                	            <a href="{{url('employee-details')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Subject <span class="text-danger">*</span> :</label>
                                            	        <input type="text" class="form-control" id="email" placeholder="" name="email">
                                            	    </div>
                                            	</div>
                                                <div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Client Name <span class="text-danger">*</span> :</label>
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
                                                	    <label for="uname">Referred By <span class="text-danger">*</span> :</label>
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

                                            <div class="row">
                                                <div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Quarter <span class="text-danger">*</span> :</label>
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
                                                	    <label for="uname">Contact Person <span class="text-danger">*</span> :</label>
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
                                                    <label for="uname">Hallmarking Quotation :</label>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                                        <span class="custom-control-label">Hallmarking Quotation</span>
                                                    </label>
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="comment">Note:</label>
                                                        <textarea class="form-control" rows="3" id="comment"></textarea>
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
                                            	        <label for="uname">Readability <span class="text-danger">*</span> :</label>
                                            	        <input type="text" class="form-control" id="email" placeholder="" name="email">
                                            	    </div>
                                            	</div>
                                                <div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Pan Size <span class="text-danger">*</span> :</label>
                                            	        <input type="text" class="form-control" id="email" placeholder="" name="email">
                                            	    </div>
                                            	</div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Model <span class="text-danger">*</span> :</label>
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
                                            	        <label for="uname">Calibration <span class="text-danger">*</span> :</label>
                                            	        <input type="text" class="form-control" id="email" placeholder="" name="email">
                                            	    </div>
                                            	</div>
                                                <div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Price <span class="text-danger">*</span> :</label>
                                            	        <input type="text" class="form-control" id="email" placeholder="" name="email">
                                            	    </div>
                                            	</div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Capacity <span class="text-danger">*</span> :</label>
                                            	        <input type="text" class="form-control" id="email" placeholder="" name="email">
                                            	    </div>
                                            	</div>
                                                <div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Calibration Charge <span class="text-danger">*</span> :</label>
                                            	        <input type="text" class="form-control" id="email" placeholder="" name="email">
                                            	    </div>
                                            	</div>
                                                <div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Part Details <span class="text-danger">*</span> :</label>
                                            	        <input type="text" class="form-control" id="email" placeholder="" name="email">
                                            	    </div>
                                            	</div>
                                            </div>

                                            <!-- <div class="row">
                                                <div class="col">
                                                    <button type="submit" class="btn btn-primary d-block m-auto">Add</button>
                                                </div>
                                            </div> -->
                                        
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
                                                            <td></td>
                                                            <td>
                                                                <a href=""><i class="fa fa-edit"></i></a>
                                                                <a href=""><i class="fa fa-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>

                                            <table id="example" class="table w-100 table-bordered mt-5">
                                                <!-- <thead>
                                                    <tr>
                                                        <th class="wd-15p">ID</th>
                                                        <th class="wd-15p">ID</th>
                                                    </tr>
                                                </thead> -->
                                                <tbody style="float: right;">
                                                    <tr>
                                                        <td>Net Amount</td>
                                                        <td>
                                                            <input type="text" class="form-control" id="email" placeholder="" name="email">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tax 1 (0%)</td>
                                                        <td>
                                                            <div class="form-group mb-0">
                                                	            <div class="input-group flex-nowrap">
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
                                                                        <input type="text" class="form-control" placeholder="">
                                                	                </div>
                                                	            </div>
                                                	        </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tax 2 (0%)</td>
                                                        <td>
                                                            <div class="form-group mb-0">
                                                	            <div class="input-group flex-nowrap">
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
                                                                        <input type="text" class="form-control" placeholder="">
                                                	                </div>
                                                	            </div>
                                                	        </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total </td>
                                                        <td>
                                                            <input type="text" class="form-control" id="email" placeholder="" name="email">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Round off</td>
                                                        <td>
                                                            <input type="text" class="form-control" id="email" placeholder="" name="email">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Grand Total</b></td>
                                                        <td>
                                                            <input type="text" class="form-control" id="email" placeholder="" name="email">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

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