@extends('master')

@section('main')

<!-- Row -->
<div class="row">
	<div class="col-xl-3 col-lg-5 col-md-12">
		<div class="card ">
            <form method="post" action="{{ route('reference.details.store') }}" enctype="multipart/form-data"> 
                @csrf
			<div class="card-body">
				<div class="inner-all">
                    <h5 class="text-center mb-3">Upload employee photo</h5>
					<ul class="list-unstyled">
						<li class="text-center border-bottom-0">
							<img data-no-retina="" class="img-circle img-responsive img-bordered-primary" src="{{ asset('assets/images/users/1.jpg') }}" alt="John Doe">
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
								<a  class="btn btn-outline-primary"> <input type="file" name="image" id=""><i class="fe fe-upload mr-2"></i>Upload<i class="fe fe-upload mr-2"></i>Upload</a>
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
				<h3 class="card-title"> Add Reference </h3>
			</div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="uname">Reference Name <span class="text-danger">*</span> :</label>
                            <div class="input-group mb-3 flex-nowrap" >
                                <select class="form-control select2-show-search"  data-placeholder="Choose one (with searchbox)" name="title" >
					        		<optgroup>
					        			<option value="1">Mr.</option>
					        			<option value="2">Mrs.</option>
					        			<option value="3">Ms</option>
					        	
					        		</optgroup>
					        	</select>
                                <div class="input-group-append">
                                    <input type="text" class="form-control" placeholder="" name="name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                    	<div class="form-group">
                    	    <label for="uname">Gender <span class="text-danger">*</span> :</label>
                    	    <div class="input-group mb-3 flex-nowrap" >
                    	        <select class="form-control select2-show-search" name="gender" data-placeholder="Choose one (with searchbox)">
									<optgroup label="Mountain Time Zone">
										<option value="1">Male</option>
										<option value="2">Female</option>
										<option value="3">Other</option>
								
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
                            <input type="number" class="form-control" id="email" placeholder="" name="contact_number1">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="uname">Email ID Group <span class="text-danger">*</span> :</label>
                            <input type="email" class="form-control" id="email" placeholder="" name="email1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="uname">Date of Birth <span class="text-danger">*</span> :</label>
                            <input type="date" class="form-control" id="email" placeholder="" name="dob">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="comment">Address:</label>
                            <textarea class="form-control" rows="3" id="comment" name="address"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary d-block m-auto">Add</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
	</div>
</div>

@endsection