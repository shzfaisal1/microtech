@extends('master')

@section('main')

<!-- Row -->
<div class="row">
	<div class="col-xl-3 col-lg-5 col-md-12">
		<div class="card ">
			<div class="card-body">
				<div class="inner-all">
                    <h5 class="text-center mb-3">Upload employee photo</h5>
					<ul class="list-unstyled">
						<li class="text-center border-bottom-0">
							<img data-no-retina="" class="img-circle img-responsive img-bordered-primary" src="../assets/images/users/1.jpg" alt="John Doe">
						</li>
						<!-- <li class="text-center">
							<h4 class="text-capitalize mt-3 mb-0">Anna Sthesia</h4>
							<p class="text-muted text-capitalize">App Developer</p>
						</li> -->
						<!-- <li>
							<a href="" class="btn btn-primary text-center btn-block">UserAccount</a>
						</li> -->
						<li><br></li>
						<li>
							<div class="btn-group-vertical btn-block border-top-0">
								<a href=""  class="btn btn-outline-primary"><i class="fe fe-upload mr-2"></i>Upload</a>
								<!-- <a href="" class="btn btn-primary"><i class="fe fe-settings mr-2"></i>Edit Account</a>
								<a href=""  class="btn btn-outline-primary"><i class="fe fe-alert-circle mr-2"></i>Logout</a> -->
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xl-9 col-lg-7 col-md-12">
		<div class="card">
            <div class="card-header">
				<h3 class="card-title">Add Employee Details</h3>
			</div>
            <div class="card-body">
                <div class="row">
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
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                    	<div class="form-group">
                    	    <label for="uname">Gender <span class="text-danger">*</span> :</label>
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
                            <label for="uname">Contact No <span class="text-danger">*</span> :</label>
                            <input type="text" class="form-control" id="email" placeholder="" name="email">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="uname">Email ID Group <span class="text-danger">*</span> :</label>
                            <input type="text" class="form-control" id="email" placeholder="" name="email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="uname">Date of Birth <span class="text-danger">*</span> :</label>
                            <input type="date" class="form-control" id="email" placeholder="" name="email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                    	<div class="form-group">
                    	    <label for="uname">Designation <span class="text-danger">*</span> :</label>
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
                    	    <label for="uname">Role <span class="text-danger">*</span> :</label>
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
                            <label for="comment">Address:</label>
                            <textarea class="form-control" rows="3" id="comment"></textarea>
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

@endsection