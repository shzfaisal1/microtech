@extends('master')

@section('main')

<!-- Row -->
<div class="row">
	<div class="col-xl-3 col-lg-5 col-md-12">
		<div class="card">
			<form method="post" action="{{ route('employee.details.store') }}" enctype="multipart/form-data"> 
				@csrf
				<div class="card-body">
					<div class="inner-all">
						<h5 class="text-center mb-3">Upload employee photo</h5>
						<ul class="list-unstyled">
							<li class="text-center border-bottom-0">
								<img class="img-circle img-responsive img-bordered-primary" src="{{ asset('assets/images/users/1.jpg') }}" alt="Profile">
							</li>
							<li><br></li>
							<li>
								<div class="form-group">
									<input type="file" name="image" class="form-control-file">
									@error('image') <small class="text-danger">{{ $message }}</small> @enderror
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


				<!--@if(session('success'))-->
				<!--	<div class="alert alert-success">{{ session('success') }}</div>-->
				<!--@endif-->
			</div>

			<div class="card-body">
				<div class="row">
					<div class="col">
						<div class="form-group">
							<label>Employee Name <span class="text-danger">*</span> :</label>
							<div class="input-group mb-3 flex-nowrap">
								<select class="form-control select2-show-search" name="title">
									<option value="">Select Title</option>
									<option value="1" {{ old('title') == 1 ? 'selected' : '' }}>Mr.</option>
									<option value="2" {{ old('title') == 2 ? 'selected' : '' }}>Mrs.</option>
									<option value="3" {{ old('title') == 3 ? 'selected' : '' }}>Ms</option>
								</select>
								<div class="input-group-append">
									<input type="text" class="form-control" name="name" placeholder="Enter name" value="{{ old('name') }}">
								</div>
							</div>
							@error('title') <small class="text-danger">{{ $message }}</small> @enderror
							@error('name') <small class="text-danger">{{ $message }}</small> @enderror
						</div>
					</div>

					<div class="col">
						<div class="form-group">
							<label>Gender <span class="text-danger">*</span> :</label>
							<select class="form-control select2-show-search" name="gender">
								<option value="">Select Gender</option>
								<option value="1" {{ old('gender') == 1 ? 'selected' : '' }}>Male</option>
								<option value="2" {{ old('gender') == 2 ? 'selected' : '' }}>Female</option>
								<option value="3" {{ old('gender') == 3 ? 'selected' : '' }}>Other</option>
							</select>
							@error('gender') <small class="text-danger">{{ $message }}</small> @enderror
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<div class="form-group">
							<label>Contact No <span class="text-danger">*</span> :</label>
							<input type="number" class="form-control" name="contact_no_1" placeholder="Enter contact no" value="{{ old('contact_no_1') }}">
							@error('contact_no_1') <small class="text-danger">{{ $message }}</small> @enderror
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label>Email ID <span class="text-danger">*</span> :</label>
							<input type="email" class="form-control" name="email1" placeholder="Enter email" value="{{ old('email1') }}">
							@error('email1') <small class="text-danger">{{ $message }}</small> @enderror
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<div class="form-group">
							<label>Date of Birth <span class="text-danger">*</span> :</label>
							<input type="date" class="form-control" name="dob" value="{{ old('dob') }}">
							@error('dob') <small class="text-danger">{{ $message }}</small> @enderror
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<div class="form-group">
							<label>Designation <span class="text-danger">*</span> :</label>
							<select class="form-control select2-show-search" name="deg_id">
								<option value="">Select Designation</option>
								@foreach($designations as $des)
									<option value="{{ $des->id }}" {{ old('deg_id') == $des->id ? 'selected' : '' }}>
										{{ $des->designation }}
									</option>
								@endforeach
							</select>
							@error('deg_id') <small class="text-danger">{{ $message }}</small> @enderror
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label>Role <span class="text-danger">*</span> :</label>
							<select class="form-control select2-show-search" name="role_id">
								<option value="">Select Role</option>
								@foreach($roles as $role)
									<option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
										{{ $role->name }}
									</option>
								@endforeach
							</select>
							@error('role_id') <small class="text-danger">{{ $message }}</small> @enderror
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<div class="form-group">
							<label>Address:</label>
							<textarea class="form-control" rows="3" name="add" placeholder="Enter address">{{ old('add') }}</textarea>
							@error('add') <small class="text-danger">{{ $message }}</small> @enderror
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<button type="submit" class="btn btn-primary d-block m-auto">Add</button>
					</div>
				</div>
			</div> <!-- End card-body -->
			</form>
		</div> <!-- End card -->
	</div> <!-- End col -->
</div> <!-- End row -->

@endsection
