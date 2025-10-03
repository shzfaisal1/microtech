@extends('master')

@section('main')

<!--Page header-->
<div class="page-header">
	<div class="page-leftheader">
		<h4 class="page-title">Model Details</h4>
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
							    		<div class="card-header">
							    			<h3 class="card-title">Add Model Details</h3>
							    		</div>
							    		<div class="card-body">

                                            <div class="row">
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Make Name <span class="text-danger">*</span> :</label>
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
                                                	    </div>
                                                	</div>
                                            	</div>
                                                <div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Model Name <span class="text-danger">*</span> :</label>
                                            	        <input type="text" class="form-control" placeholder="" name="pswd">
                                            	    </div>
                                            	</div>
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Type of Code :</label>
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
                                                	    </div>
                                                	</div>
                                            	</div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Code :</label>
                                            	        <input type="text" class="form-control" placeholder="" name="pswd">
                                            	    </div>
                                            	</div>
                                                <div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Available Stock :</label>
                                            	        <input type="text" class="form-control" placeholder="" name="pswd">
                                            	    </div>
                                            	</div>
                                                <div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Relience Item Code :</label>
                                            	        <input type="text" class="form-control" placeholder="" name="pswd">
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
                            <div class="card">
                            <div class="card-body">
                                <div class="row">
							        <div class="col-lg-6 col-md-12">
							    	<div class="card">
							    		<div class="card-header">
							    			<h3 class="card-title">Select Attributes</h3>
							    		</div>
							    		<div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example" class="table table-striped table-bordered w-100">
                                                    <thead>
                                                        <tr>
                                                            <th class="wd-15p">Check</th>
                                                            <th class="wd-15p">Attribute</th>
                                                            <th class="wd-25p">Value</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                                                        <span class="custom-control-label"></span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>Calibration</td>
                                                            <td>External</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                                                        <span class="custom-control-label"></span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>Calibration</td>
                                                            <td>External</td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
							    		</div>
							    	</div>
							        </div>
                                    <div class="col-lg-6 col-md-12">
							    	<div class="card">
							    		<div class="card-header">
							    			<h3 class="card-title">Added Attributes</h3>
							    		</div>
							    		<div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered w-100">
                                                    <thead>
                                                        <tr>
                                                            <th class="wd-15p">Attribute</th>
                                                            <th class="wd-15p">Value</th>
                                                            <th class="wd-25p">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Calibration</td>
                                                            <td>External</td>
                                                            <td><a href=""><i class="fa fa-trash"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Calibration</td>
                                                            <td>External</td>
                                                            <td><a href=""><i class="fa fa-trash"></i></a></td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>

							    		</div>
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
<!-- End search-client-info -->

<!-- search-client-info -->
<div class="search-client-info">
                            <div class="row">
							    <div class="col-lg-12 col-md-12">
							    	<div class="card">
                                        <div class="card-header">
							    			<h3 class="card-title">Model List</h3>
							    		</div>
							    		<div class="card-body">
                                            <div class="table-responsive">
                                                <table id="examples" class="table table-striped table-bordered w-100">
                                                    <thead>
                                                        <tr>
                                                            <th class="wd-15p">Model Name</th>
                                                            <th class="wd-15p">Make</th>
                                                            <th class="wd-15p">Type of code</th>
                                                            <th class="wd-15p">Code</th>
                                                            <th class="wd-15p">Item Code</th>
                                                            <th class="wd-15p">Available Stock</th>
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