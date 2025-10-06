@extends('master')

@section('main')

<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">View All Company</h4>
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
                                        <div class="card-title">Account List</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered w-100">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p">Account Holder Name</th>
                                                        <th class="wd-15p">Default Account</th>
                                                        <th class="wd-15p">Account Holder Address</th>
                                                        <th class="wd-15p">Account No</th>
                                                        <th class="wd-15p">Bank Name</th>
                                                        <th class="wd-15p">Branch</th>
                                                        <th class="wd-15p">IFSC</th>
                                                        <th class="wd-15p">Bank Address</th>
                                                        <th class="wd-25p">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Microtech Instruments Corporation - Surat</td>
                                                        <td>
                                                            <div class="form-group">
                                                                <label class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                                                    <span class="custom-control-label"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>MIS</td>
                                                        <td>101/102, Mavani Shopping Centre, Sardar Chowk, Mini Bazar, Varachha Road, Surat - 395006</td>
                                                        <td>Surat</td>
                                                        <td>India</td>
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
                                    <!-- table-wrapper -->
                                </div>
                                <!-- section-wrapper -->
                            </div>
                        </div>
						<!-- End Row -->

@endsection