@extends('master')
@section('main')

    <!--Page header-->
	<div class="page-header">
		<div class="page-leftheader">
			<h4 class="page-title">Microtech</h4>
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

	<!--Row-->
	<div class="row">
							<div class="col-xl-12 col-md-12 col-lg-12">
								<div class="card">
                                    <div class="card-body">
										<div class="row">
											<div class=" col-xl-3 col-sm-6 d-flex mb-5 mb-xl-0">
												<div class="feature">
													<i class="si si-briefcase primary feature-icon bg-primary"></i>
												</div>
												<div class="ml-3">
													<small class=" mb-0">Total Orders</small><br>
													<h3 class="font-weight-semibold mb-0">5,643</h3>
													<small class="mb-0 text-muted"><span class="text-success font-weight-semibold"><i class="fa fa-caret-up  mr-1"></i> 0.67%</span> Last month</small>
												</div>
											</div>
											<div class=" col-xl-3 col-sm-6 d-flex mb-5 mb-xl-0">
												<div class="feature">
													<i class="si si-layers danger feature-icon bg-danger"></i>
												</div>
												<div class=" d-flex flex-column  ml-3"> <small class=" mb-0">Total Product</small>
													<h3 class="font-weight-semibold mb-0">2,536</h3>
													<small class="mb-0 text-muted"><span class="text-success font-weight-semibold"><i class="fa fa-caret-up  mr-1"></i> 0.25%</span> Last month</small>
												</div>
											</div>
											<div class=" col-xl-3 col-sm-6 d-flex  mb-5 mb-sm-0">
												<div class="feature">
													<i class="si si-note secondary feature-icon bg-secondary"></i>
												</div>
												<div class=" d-flex flex-column ml-3"> <small class=" mb-0">Total Feedback</small>
													<h3 class="font-weight-semibold mb-0">12,863</h3>
													<small class="mb-0 text-muted"><span class="text-success font-weight-semibold"><i class="fa fa-caret-up  mr-1"></i> 0.67%</span> Last month</small>
												</div>
											</div>
											<div class=" col-xl-3 col-sm-6 d-flex">
												<div class="feature">
													<i class="si si-basket-loaded success feature-icon bg-success"></i>
												</div>
												<div class=" d-flex flex-column  ml-3"> <small class=" mb-0">Total sold</small>
													<h3 class="font-weight-semibold mb-0">7,836</h3>
													<small class="mb-0 text-muted"><span class="text-danger font-weight-semibold"><i class="fa fa-caret-down  mr-1"></i> 0.32%</span> Last month</small>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
	</div>
	<!--End row-->

	<!--Row-->
	<div class="row">
							<div class="col-xl-5 col-md-12 col-lg-5">
								<div class="card">
								    <div class="card-header">
									    <h3 class="card-title mb-0">Sales Funnel & Avg. Length of Sales Stages</h3>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-4 text-center mb-4 mb-md-0">
												<p class="data-attributes mb-0">
													<span class="donut" data-peity='{ "fill": ["#4a32d4", "#e5e9f2"]}'>4/5</span>
												</p>
												<h4 class=" mb-0 font-weight-semibold">3,678</h4>
												<p class="mb-0 text-muted">Opportunities</p>
											</div>
											<div class="col-md-4 text-center mb-4 mb-md-0">
												<p class="data-attributes mb-0">
													<span class="donut" data-peity='{ "fill": ["#fb1c52", "#e5e9f2"]}'>226/360</span>
												</p>
												<h4 class=" mb-0 font-weight-semibold">398</h4>
												<p class="mb-0 text-muted">Proposal</p>
											</div>
											<div class="col-md-4 text-center">
												<p class="data-attributes mb-0">
													<span class="donut" data-peity='{ "fill": ["#f7be2d", "#e5e9f2"]}'>4,4</span>
												</p>
												<h4 class=" mb-0 font-weight-semibold">289</h4>
												<p class="mb-0 text-muted">Negotiation</p>
											</div>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-body">
										<div class=" ">
											<h5>Total earnings of this year</h5>
										</div>
										<h2 class="mb-2 font-weight-semibold">$6,3825<span class="sparkline_bar31 float-right"></span></h2>
										<div class="text-muted mb-0">
											<i class="fa fa-arrow-circle-o-up text-success"></i>
											<span>12.3% higher vs previous month</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-7 col-md-12 col-lg-7">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Yearly Sales Report</h3>
										<!-- <div class="card-options ">
											<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
											<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
										</div> -->
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-xl-4 col-lg-4 col-md-12 mb-5">
												<p class=" mb-0 "> Total Sales</p>
												<h2 class="mb-0 font-weight-semibold">35,789<span class="fs-12 text-muted"><span class="text-danger mr-1"><i class="fe fe-arrow-down ml-1"></i>0.9%</span>last year</span></h2>
											</div>
											<div class="col-xl-4 col-lg-4 col-md-12 mb-5">
												<p class=" mb-0 ">Total Income</p>
												<h2 class="mb-0 font-weight-semibold">$9,265<span class="fs-12 text-muted"><span class="text-success mr-1"><i class="fe fe-arrow-up ml-1"></i>0.15%</span>last year</span></h2>
											</div>
											<div class="col-xl-4 col-lg-4 col-md-12 mb-5">
												<p class=" mb-0 "> Total Profits</p>
												<h2 class="mb-0 font-weight-semibold">32%<span class="fs-12 text-muted"><span class="text-danger mr-1"><i class="fe fe-arrow-down ml-1"></i>1.04%</span>last year</span></h2>
											</div>
										</div>
										<div class="chart-wrapper">
											<canvas id="sales" class=" chartjs-render-monitor chart-dropshadow2 h-184"></canvas>
									    </div>
									</div>
								</div>
							</div>
	</div>
	<!--End row-->



@endsection