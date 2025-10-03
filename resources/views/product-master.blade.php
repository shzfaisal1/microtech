@extends('master')

@section('main')

<!--Page header-->
<div class="page-header">
	<div class="page-leftheader">
		<h4 class="page-title">Make Details</h4>
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
                                        <div class="card-title">Make List</div>
                                        <div class="card-options ">
							    			<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addMakeDetails">Add Make Details</a>
							    		</div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered w-100">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p">Make Name</th>
                                                        <th class="wd-15p">Calculate Incentive</th>
                                                        <th class="wd-15p">Note</th>
                                                        <th class="wd-25p">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Stamping & verification Fees by Legal Metrology.</td>
                                                        <td>
                                                            <div class="form-group">
                                                                <label class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                                                    <span class="custom-control-label"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            <a href=""><i class="fa fa-edit"></i></a>
                                                            <a href=""><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Stamping & verification Fees by Legal Metrology.</td>
                                                        <td>
                                                            <div class="form-group">
                                                                <label class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                                                    <span class="custom-control-label"></span>
                                                                </label>
                                                            </div>
                                                        </td>
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