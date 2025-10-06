<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>

		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="Aronox – Admin Bootstrap4 Responsive Webapp Dashboard Templat" name="description">
		<meta content="Spruko Technologies Private Limited" name="author">
		<meta name="keywords" content="admin site template, html admin template,responsive admin template, admin panel template, bootstrap admin panel template, admin template, admin panel template, bootstrap simple admin template premium, simple bootstrap admin template, best bootstrap admin template, simple bootstrap admin template, admin panel template,responsive admin template, bootstrap simple admin template premium"/>
         <meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Title -->
		<title>Microtech</title>

		<!--Favicon -->
		<link rel="icon" href="{{asset('assets/images/brand/MT-LOGO-PNG.png')}}" type="image/x-icon"/>

		<!-- Style css -->
		<link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/css/external.css')}}" rel="stylesheet" />

        <!-- Select2 css -->
		<link href="{{asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />

		<!--Horizontal css -->
        <link id="effect" href="{{asset('assets/plugins/horizontal-menu/dropdown-effects/fade-up.css')}}" rel="stylesheet" />
        <link href="{{asset('assets/plugins/horizontal-menu/horizontal.css')}}" rel="stylesheet" />

		<!-- P-scroll bar css-->
		<link href="{{asset('assets/plugins/p-scroll/perfect-scrollbar.css')}}" rel="stylesheet" />

		<!---Icons css-->
		<link href="{{asset('assets/plugins/iconfonts/icons.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/plugins/iconfonts/font-awesome/font-awesome.min.css')}}" rel="stylesheet">
		<link href="{{asset('assets/plugins/iconfonts/plugin.css')}}" rel="stylesheet" />

		<!-- Skin css-->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('assets/skins/hor-skin/hor-skin1.css')}}" />

		<!-- Data table css -->
		<link href="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />

         <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

	</head>

	<body class="app">

		<!---Global-loader-->
		<div id="global-loader" >
			<img src="{{asset('assets/images/svgs/loader.svg')}}" alt="loader">
		</div>

		<div class="page">
			<div class="page-main">
				
            <!--  -->
            @include('body.header')
            <!--  -->

				<div class="app-content page-body">
					<div class="container">

                    <!--  -->
                    @yield('main')
                    <!--  -->
						
					</div>
				</div><!-- end app-content-->
			</div>

			<!--Footer-->
			@include('body.footer')
			<!-- End Footer-->

		</div>

		<!--  -->
		<!-- addLocationDetails -->
        <div class="modal client-information-model" id="addLocationDetails">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Location Details</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
          
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="">
                            <div class="form-group">
                                <label for="email">Location Name <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" placeholder="" id="email">
                            </div>
                            <div class="btn-div">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <!-- <button type="submit" class="btn btn-success">View List</button> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end addLocationDetails -->

		<!-- addLocationDetails -->
        <div class="modal client-information-model" id="addClientTypeDetails">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Client Type Details</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
          
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="">
                            <div class="form-group">
                                <label for="email">Client Type Name <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" placeholder="" id="email">
                            </div>
                            <div class="btn-div">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <!-- <button type="submit" class="btn btn-success">View List</button> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end addLocationDetails -->

		<!-- addClientGroup -->
        <div class="modal client-information-model" id="addClientGroup">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Client Group Details</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
          
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="">
                            <div class="form-group">
                                <label for="email">Client Group Name <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" placeholder="" id="email">
                            </div>
                            <div class="btn-div">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <!-- <button type="submit" class="btn btn-success">View List</button> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end addClientGroup -->

		<!-- addClientGroup -->
        <div class="modal client-information-model" id="addClientGroup">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Client Group Details</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
          
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="">
                            <div class="form-group">
                                <label for="email">Client Group Name <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" placeholder="" id="email">
                            </div>
                            <div class="btn-div">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <!-- <button type="submit" class="btn btn-success">View List</button> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end addClientGroup -->

		<!-- addClientGroup -->
        <div class="modal client-information-model" id="addCurrencyDetails">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Currency Details</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
          
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">Currency Name <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" placeholder="" id="email">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email"></label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                            <span class="custom-control-label">Set as default currency</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">Value (Against 1 INR) <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="" id="email">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">Symbol <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="" id="email">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="btn-div">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <!-- <button type="submit" class="btn btn-success">View List</button> -->
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end addClientGroup -->

		<!-- addClientGroup -->
       
        <!-- end addClientGroup -->

		<!-- addClientGroup -->
        <div class="modal client-information-model" id="addClientGroup">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Client Group Details</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
          
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="">
                            <div class="form-group">
                                <label for="email">Client Group Name <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" placeholder="" id="email">
                            </div>
                            <div class="btn-div">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <!-- <button type="submit" class="btn btn-success">View List</button> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end addClientGroup -->

		<!-- addClientGroup -->
        
        <!-- end addClientGroup -->

		<!-- addClientGroup -->
      
        <!-- end addClientGroup -->

		<!-- addClientGroup -->
        <div class="modal client-information-model" id="addBuyer">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Buyer</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
          
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="">
                            <div class="form-group">
                                <label for="email">Buyer Name <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" placeholder="" id="email">
                            </div>
                            <div class="btn-div">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <!-- <button type="submit" class="btn btn-success">View List</button> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end addClientGroup -->

		<!-- addClientGroup -->
        <div class="modal client-information-model" id="addConsignee">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Consignee</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
          
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="">
                            <div class="form-group">
                                <label for="email">Consignee Name <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" placeholder="" id="email">
                            </div>
                            <div class="btn-div">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <!-- <button type="submit" class="btn btn-success">View List</button> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end addClientGroup -->

		<!-- addClientGroup -->
        <div class="modal client-information-model" id="addFinancialYear">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Financial Year</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
          
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">Financial Year <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" placeholder="" id="email">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email"></label>
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                            <span class="custom-control-label">Set as current financial year</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">From Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" placeholder="" id="email">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">To Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" placeholder="" id="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="email">Description </label>
                                        <textarea class="form-control" rows="3" id="comment"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="btn-div">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <!-- <button type="submit" class="btn btn-success">View List</button> -->
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end addClientGroup -->

		<!-- addClientGroup -->
        <div class="modal client-information-model" id="addClientGroup">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Client Group Details</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
          
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="">
                            <div class="form-group">
                                <label for="email">Client Group Name <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" placeholder="" id="email">
                            </div>
                            <div class="btn-div">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <!-- <button type="submit" class="btn btn-success">View List</button> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end addClientGroup -->

		<!-- addZoneDetails -->
        <div class="modal client-information-model" id="addZoneDetails">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add Zone Details</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
      
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="">
                            <div class="form-group">
                                <label for="email">Zone Name <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" placeholder="" id="email">
                            </div>
                            <div class="btn-div">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <!-- <button type="submit" class="btn btn-success">View List</button> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end addZoneDetails -->

		<!--  -->


		<!-- Back to top -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

		<!-- Jquery js-->
		<script src="{{asset('assets/js/vendors/jquery-3.4.0.min.js')}}"></script>

		<!-- Bootstrap4 js-->
		<script src="{{asset('assets/plugins/bootstrap/popper.min.js')}}"></script>
		<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

		<!--Othercharts js-->
		<script src="{{asset('assets/plugins/othercharts/jquery.sparkline.min.js')}}"></script>

		<!-- Circle-progress js-->
		<script src="{{asset('assets/js/vendors/circle-progress.min.js')}}"></script>

		<!-- Jquery-rating js-->
		<script src="{{asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>

		<!--Horizontal js-->
		<script src="{{asset('assets/plugins/horizontal-menu/horizontal.js')}}"></script>

		<!-- P-scroll js-->
		<script src="{{asset('assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>

		<!-- ECharts js -->
		<script src="{{asset('assets/plugins/echarts/echarts.js')}}"></script>

		<!-- CHARTJS CHART -->
		<script src="{{asset('assets/plugins/chart/chart.bundle.js')}}"></script>
		<script src="{{asset('assets/plugins/chart/utils.js')}}"></script>

		<!-- Peitychart js-->
		<script src="{{asset('assets/plugins/peitychart/jquery.peity.min.js')}}"></script>
		<script src="{{asset('assets/plugins/peitychart/peitychart.init.js')}}"></script>

		<!-- Index js-->
		<script src="{{asset('assets/js/index1.js')}}"></script>

		<!-- Apexchart js-->
		<script src="{{asset('assets/js/apexcharts.js')}}"></script>

		<!-- Custom js-->
		<script src="{{asset('assets/js/custom.js')}}"></script>

		<!--Select2 js -->
		<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
		<script src="{{asset('assets/js/formelements.js')}}"></script>

		<!-- Data tables js-->
		<script src="{{asset('assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
		<script src="{{asset('assets/js/datatables.js')}}"></script>
         @stack('scripts')

	</body>
</html>