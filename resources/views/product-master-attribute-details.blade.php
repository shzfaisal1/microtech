@extends('master')

@section('main')

<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Attribute Details</h4>
								<ol class="breadcrumb pl-0">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</div>
						</div>
						<!--End Page header-->

                        <!-- Row -->
						<div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Attribute List</div>
                                        <div class="card-options ">
							    			<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addAttributeDetails">Add Make Details</a>
							    		</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered w-100">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p">Attribute Name</th>
                                                        <th class="wd-25p">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>100 ct</td>
                                                        <td>
                                                            <a href=""><i class="fa fa-edit"></i></a>
                                                            <a href=""><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>MIC50K</td>
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
						<!-- End Row -->

@endsection