@extends('master')

@section('main')

<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Report Type Details</h4>
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
<form action="{{route('LUT.store')}}" method="POST">
    @csrf
    <div class="search-client-info">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">LUT Master</h3>

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
                     
                      <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="financial_year_id">Financial Year <span class="text-danger">*</span> :</label>
                            <select class="form-select w-100" name="financial_year_id" required>
                                @if($FinancialYear->count() > 0)
                                    @foreach ($FinancialYear as $year)
                                    <option value="{{ $year->id }}" {{ $year->is_Default == 1 ? 'selected' : '' }} > {{ $year->financial_year }} </option>                 
                                    @endforeach
                              @endif  
                                
                            </select>
                        </div>
                    </div>
                </div>

                     <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                           
                      <label for="description">LUT No <span class="text-danger">*</span> </label>
                   <textarea class="form-control" name="LUT_number" id="LUT_number" rows="3" placeholder="Enter description..."></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                           
                      <label for="LUT_note">LUT Note</label>
                   <input class="form-control" name="LUT_note" id="LUT_note" type="text" >
                        </div>
                    </div>
                </div>
                        <div class="row">
                            <div class="col text-center">
                                <div class="d-inline-block">
                                    <button type="submit" class="btn btn-primary me-2">
                                        Add
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