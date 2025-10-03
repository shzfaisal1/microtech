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
                <div class="card-title">Company List</div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered w-100">
                        <thead>
                            <tr>
                                <th class="wd-15p">Name</th>
                                <th class="wd-15p">Print As</th>
                                <th class="wd-15p">Prefix</th>
                                <th class="wd-15p">Address</th>
                                <th class="wd-15p">City</th>
                                <th class="wd-15p">Country</th>
                                <th class="wd-15p">State</th>
                                <th class="wd-15p">Pan</th>
                                <th class="wd-15p">PT No</th>
                                <th class="wd-15p">	Subject Juridisction</th>
                                <th class="wd-15p">Contact</th>
                                <th class="wd-15p">Email Id</th>
                                <th class="wd-15p">FAX</th>
                                <th class="wd-15p">Web Address</th>
                                <th class="wd-15p">VAT TIN No</th>
                                <th class="wd-15p">VAT TIN Date</th>
                                <th class="wd-15p">GST TIN No</th>
                                <th class="wd-15p">GST TIN Date</th>
                                <th class="wd-15p">Service Tax No</th>
                                <th class="wd-15p">Licence No</th>
                                <th class="wd-15p">Sales Invoice Heading</th>
                                <th class="wd-25p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Microtech Instruments Corporation - Surat</td>
                                <td>MICROTECH INSTRUMENTS CORPORATION</td>
                                <td>MIS</td>
                                <td>101/102, Mavani Shopping Centre, Sardar Chowk, Mini Bazar, Varachha Road, Surat - 395006</td>
                                <td>Surat</td>
                                <td>India</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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