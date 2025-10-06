@extends('master')

@section('main')

<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Vendor Details</h4>
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

                        <!-- Row -->
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body p-0">
										<div class="panel panel-primary">
											<div class="tab-menu-heading">
												<div class="tabs-menu ">
													<!-- Tabs -->
													<ul class="nav panel-tabs">
														<li class=""><a href="#tab1" class="active" data-toggle="tab">Add Vendor Details</a></li>
														<li><a href="#tab2" data-toggle="tab">View All Vendors</a></li>
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body">
												<div class="tab-content">
													<div class="tab-pane active " id="tab1">
                                                        <!-- search-client-info -->
                                                        <div class="search-client-info">
                                                            <div class="row">
						                                	    <div class="col-lg-12 col-md-12">
						                                	    	<div class="card">
						                                	    		<div class="card-header">
						                                	    			<h3 class="card-title">Add Vendor Information</h3>
						                                	    		</div>
						                                	    		<div class="card-body">
                                                                            <div class="row">
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
                                                                                	    </div>
                                                                                	</div>
                                                                            	</div>
                                                                            	<div class="col">
                                                                            	    <div class="form-group">
                                                                            	        <label for="uname">Print Name as <span class="text-danger">*</span> :</label>
                                                                            	        <input type="text" class="form-control" id="email" placeholder="" name="email">
                                                                            	    </div>
                                                                            	</div>
                                                                            	<div class="col">
                                                                            	    <div class="form-group">
                                                                            	        <label for="uname">Contact No :</label>
                                                                            	        <input type="password" class="form-control" placeholder="" name="pswd">
                                                                            	    </div>
                                                                            	</div>
                                                                            	
                                                                            </div>
                                                                        
                                                                            <div class="row">
                                                                                <div class="col">
                                                                            	    <div class="form-group">
                                                                            	        <label for="uname">Email ID :</label>
                                                                            	        <input type="password" class="form-control" placeholder="" name="pswd">
                                                                            	    </div>
                                                                            	</div>

                                                                                <div class="col">
                                                                            	    <div class="form-group">
                                                                            	        <label for="uname">VAT TIN No :</label>
                                                                            	        <input type="password" class="form-control" placeholder="" name="pswd">
                                                                            	    </div>
                                                                            	</div>
                                                                            	<div class="col">
                                                                            	    <div class="form-group">
                                                                            	        <label for="uname">CST TIN No :</label>
                                                                            	        <input type="password" class="form-control" placeholder="" name="pswd">
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

                                                                            <div class="row">
                                                                                <div class="col">
                                                                            	    <div class="form-group">
                                                                            	        <label for="uname">Bank Name :</label>
                                                                            	        <input type="password" class="form-control" placeholder="" name="pswd">
                                                                            	    </div>
                                                                            	</div>

                                                                                <div class="col">
                                                                            	    <div class="form-group">
                                                                            	        <label for="uname">Account No. :</label>
                                                                            	        <input type="password" class="form-control" placeholder="" name="pswd">
                                                                            	    </div>
                                                                            	</div>
                                                                            	<div class="col">
                                                                            	    <div class="form-group">
                                                                            	        <label for="uname">IFSC Code :</label>
                                                                            	        <input type="password" class="form-control" placeholder="" name="pswd">
                                                                            	    </div>
                                                                            	</div>
                                                                            </div>
                                                                            <div class="row">
                                                                            	<div class="col">
                                                                            	    <div class="form-group">
                                                                            	        <label for="comment">Bank Address:</label>
                                                                            	        <textarea class="form-control" rows="3" id="comment"></textarea>
                                                                            	    </div>
                                                                            	</div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                            	    <div class="form-group">
                                                                            	        <label for="uname">Branch Name :</label>
                                                                            	        <input type="password" class="form-control" placeholder="" name="pswd">
                                                                            	    </div>
                                                                            	</div>

                                                                                <div class="col">
                                                                            	    <div class="form-group">
                                                                            	        <label for="uname">Opening Balance :</label>
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
                                                                                <div class="col">
                                                                            	    <div class="form-group">
                                                                            	        <label for="uname">PAN No :</label>
                                                                            	        <input type="password" class="form-control" placeholder="" name="pswd">
                                                                            	    </div>
                                                                            	</div>
                                                                            	<div class="col">
                                                                            	    <div class="form-group">
                                                                            	        <label for="uname">GSTIN :</label>
                                                                            	        <input type="text" class="form-control" id="email" placeholder="" name="email">
                                                                            	    </div>
                                                                            	</div>
                                                                            	<div class="col">
                                                                            	    <div class="form-group">
                                                                            	        <label for="uname">Web Address :</label>
                                                                            	        <input type="password" class="form-control" placeholder="" name="pswd">
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

                                                    </div>
													<div class="tab-pane " id="tab2">
                                                        <div class="row">
                                                            <div class="col-md-12 col-lg-12">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <div class="card-title">Vendor List</div>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div class="table-responsive">
                                                                            <table id="example" class="table table-striped table-bordered w-100">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="wd-15p">name</th>
                                                                                        <th class="wd-15p">Print as</th>
                                                                                        <th class="wd-20p">Address</th>
                                                                                        <th class="wd-15p">contact no</th>
                                                                                        <th class="wd-10p">E-mail Id</th>
                                                                                        <th class="wd-25p">Action</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>Bella</td>
                                                                                        <td>Chloe</td>
                                                                                        <td>System Developer</td>
                                                                                        <td>2018/03/12</td>
                                                                                        <td>$654,765</td>
                                                                                        <td>
                                                                                            <a href=""><i class="fa fa-edit"></i></a>
                                                                                            <a href=""><i class="fa fa-trash"></i></a>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>Donna</td>
                                                                                        <td>Bond</td>
                                                                                        <td>Account Manager</td>
                                                                                        <td>2012/02/21</td>
                                                                                        <td>$543,654</td>
                                                                                        <td>
                                                                                            <a href=""><i class="fa fa-edit"></i></a>
                                                                                            <a href=""><i class="fa fa-trash"></i></a>
                                                                                        </td>
                                                                                    </tr>
                                                                                    
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <!-- table-wrapper -->
                                                                </div>
                                                                <!-- section-wrapper -->
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
						<!-- End Row -->

@endsection