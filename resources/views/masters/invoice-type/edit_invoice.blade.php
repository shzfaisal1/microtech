@extends('master')

@section('main')

<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Tax Details</h4>
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
<form action="{{route('invoice.update',$edit_val->id)}}" method="POST">
    @csrf
    <div class="search-client-info">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update Invoice Type</h3>

                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(session('update_invoice'))

                        <div class="alert alert-success">
                            {{session('update_invoice')}}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="uname">Invoice Type<span class="text-danger">*</span> :</label>
                                   
                                    <input type="text" class="form-control" id="invoice_type" placeholder="" name="invoice_type"  value="{{ $edit_val->invoice_type }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="uname">Stamp Description</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Stamp Description" value="{{ $edit_val->stamp_description }}" name="stamp_description" id="stamp_description" title="Please Stamp Description">
                                    </div>
                                </div>
                            </div>
                           
                             <div class="col">
                                <div class="form-group">
                                    <label for="uname">Unstamp Description</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Stamp Description" name="unstamp_description" value="{{ $edit_val->unstamp_description }}"id="unstamp_description" title="Please Unstamp Description">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col text-center">
                                <div class="d-inline-block">
                                    <button type="submit" class="btn btn-primary me-2">
                                        Update
                                    </button>
                                    <a href="/" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
<!-- End search-client-info -->

@endsection