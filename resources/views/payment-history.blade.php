@extends('master')

@section('main')

<!--Page header-->
<div class="page-header">
	<div class="page-leftheader">
		<h4 class="page-title">Payment History</h4>
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
							    			<h3 class="card-title">Payment History</h3>
							    		</div>
							    		<div class="card-body">
                                            <div class="table-responsive">
                                                <table id="example" class="table table-striped table-bordered w-100">
                                                    <thead>
                                                        <tr>
                                                            <th class="wd-15p">Action</th>
                                                            <th class="wd-15p">Voucher No</th>
                                                            <th class="wd-15p">Payment Date</th>
                                                            <th class="wd-15p">Vendor</th>
                                                            <th class="wd-15p">Account</th>
                                                            <th class="wd-15p">Paid Amount</th>
                                                            <th class="wd-15p">Return Amount</th>
                                                            <th class="wd-15p">Against Opening</th>
                                                            <th class="wd-15p">Advance</th>
                                                            <th class="wd-15p">Payment Mode</th>
                                                            <th class="wd-15p">Details</th>
                                                            <th class="wd-15p">Bank Details</th>
                                                            <th class="wd-15p">Cheque No</th>
                                                            <th class="wd-15p">Cheque Date</th>
                                                            <th class="wd-15p">Ref No.</th>
                                                            <th class="wd-15p">Ref Date</th>
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

                        <!-- search-client-info -->
                        <div class="search-client-info">
                            <div class="row">
							    <div class="col-lg-12 col-md-12">
							    	<div class="card">
                                        <div class="card-header">
							    			<h3 class="card-title">Missing Voucher No List</h3>
							    		</div>
							    		<div class="card-body">
                                            <div class="table-responsive">
                                                <table id="examples" class="table table-striped table-bordered w-100">
                                                    <thead>
                                                        <tr>
                                                            <th class="wd-15p">ID</th>
                                                            <th class="wd-25p">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Bella</td>
                                                            <td>
                                                                <a href=""><i class="fa fa-edit"></i></a>
                                                                <a href=""><i class="fa fa-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Donna</td>
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