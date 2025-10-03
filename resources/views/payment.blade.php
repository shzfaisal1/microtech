@extends('master')

@section('main')

<!--Page header-->
<div class="page-header">
	<div class="page-leftheader">
		<h4 class="page-title">Payment Details</h4>
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
	    			<h3 class="card-title">Payment Details</h3>
	    		</div>
	    		<div class="card-body">
                    <div class="row">
                    	<div class="col">
                    	    <div class="form-group">
                    	        <label for="uname">Voucher No/Date  <span class="text-danger">*</span> :</label>
                    	        <div class="input-group mb-3">
                    	            <input type="text" class="form-control" placeholder="">
                    	            <input type="date" class="form-control" placeholder="">
                    	        </div>
                    	    </div>
                    	</div>
                    	<div class="col">
                        	<div class="form-group">
                        	    <label for="uname">Vendor <span class="text-danger">*</span> :</label>
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
                        	            <a href="#" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                        	        </div>
                        	    </div>
                        	</div>
                    	</div>
                        <div class="col">
                        	<div class="form-group">
                        	    <label for="uname">Payment Mode <span class="text-danger">*</span> :</label>
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
                        <div class="col-lg-4">
                        	<div class="form-group">
                        	    <label for="uname">Account <span class="text-danger">*</span> :</label>
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
                        	            <a href="{{url('account-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                        	        </div>
                        	    </div>
                        	</div>
                    	</div>
                        <div class="col-lg-4">
                            <div class="form-group">
                    	        <label for="uname">Quantity <span class="text-danger">*</span> :</label>
                    	        <input type="text" class="form-control" id="email" placeholder="" name="email">
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
	    		<div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered w-100">
                            <thead>
                                <tr>
                                    <th class="wd-15p"></th>
                                    <th class="wd-15p">Invoice_No</th>
                                    <th class="wd-15p">Invoice_Date</th>
                                    <th class="wd-15p">Vendor</th>
                                    <th class="wd-15p">Company</th>
                                    <th class="wd-15p">Financial Year</th>
                                    <th class="wd-15p">Total</th>
                                    <th class="wd-15p">Balance</th>
                                    <th class="wd-25p">Amount</th>
                                    <th class="wd-25p">TDS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td>APL/D/23-24/0157</td>
                                    <td>12/08/2023</td>
                                    <td>ACZET Pvt Ltd</td>
                                    <td>MIM</td>
                                    <td>23-24</td>
                                    <td>44840.00</td>
                                    <td>44840.00</td>
                                    <td><input type="number" class="form-control" placeholder="0.00" id="email"></td>
                                    <td><input type="number" class="form-control" placeholder="0.00" id="email"></td>
                                    
                                </tr>
                                
                            </tbody>
                        </table>
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