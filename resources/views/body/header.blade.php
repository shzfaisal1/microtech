<div class="header top-header">
	<div class="container">
		<div class="d-flex">
			<a id="horizontal-navtoggle" class="animated-arrow hor-toggle"><span></span></a><!-- sidebar-toggle-->
			<a class="header-brand" href="{{url('/')}}">
				<img src="{{asset('assets/images/brand/MT-LOGO-PNG.png')}}" class="header-brand-img desktop-lgo" alt="Aronox logo">
				<img src="{{asset('assets/images/brand/MT-LOGO-PNG.png')}}" class="header-brand-img mobile-logo" alt="Aronox logo">
			</a>
			<div class="mt-1">
				<form class="form-inline">
					<div class="search-element">
						<input type="search" class="form-control header-search" placeholder="Search…" aria-label="Search" tabindex="1">
						<button class="btn btn-primary-color" type="submit"><i class="fa fa-search"></i></button>
					</div>
				</form>
			</div><!-- SEARCH -->
			<div class="d-flex order-lg-2 ml-auto">
				<a href="#" data-toggle="search" class="nav-link nav-link-lg d-md-none navsearch"><i class="fa fa-search"></i></a>
				<div class="dropdown   header-fullscreen">
					<a class="nav-link icon full-screen-link" id="fullscreen-button">
						<i class="mdi mdi-arrow-collapse"></i>
					</a>
				</div>
				<div class="dropdown d-md-flex message">
					<a class="nav-link icon text-center" data-toggle="dropdown">
						<i class="mdi mdi-email-outline"></i>
						<span class="nav-unread bg-danger pulse"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow w-300  pt-0">
						<div class="dropdown-header mt-0 pt-0 border-bottom p-4">
							<h5 class="dropdown-title mb-1 font-weight-semibold text-drak">Messages</h5>
							<p class="dropdown-title-text subtext mb-0 pb-0 ">You have 4 unread messages</p>
						</div>
						<a href="#" class="dropdown-item d-flex pb-4 pt-4">
							<div class="avatar avatar-md  mr-3 d-block cover-image border-radius-4" data-image-src="{{asset('public/assets/images/users/5.jpg')}}">
								<span class="avatar-status bg-green"></span>
							</div>
							<div>
								<small class="dropdown-text">Madeleine</small>
								<p class="mb-0 fs-13 text-muted">Hey! there I' am available</p>
							</div>
						</a>
						<a href="#" class="dropdown-item d-flex pb-4 pt-4">
							<div class="avatar avatar-md  mr-3 d-block cover-image border-radius-4" data-image-src="{{asset('assets/images/users/8.jpg')}}">
								<span class="avatar-status bg-red"></span>
							</div>
							<div>
								<small class="dropdown-text">Anthony</small>
								<p class="mb-0 fs-13 text-muted ">New product Launching</p>
							</div>
						</a>
						<a href="#" class="dropdown-item d-flex pb-4 pt-4">
							<div class="avatar avatar-md  mr-3 d-block cover-image border-radius-4" data-image-src="{{asset('assets/images/users/11.jpg')}}">
								<span class="avatar-status bg-yellow"></span>
							</div>
							<div>
								<small class="dropdown-text">Olivia</small>
								<p class="mb-0 fs-13 text-muted">New Schedule Realease</p>
							</div>
						</a>
						<div class="dropdown-divider mt-0"></div>
						<a href="#" class="dropdown-item text-center">See all Messages</a>
					</div>
				</div><!-- MESSAGE-BOX -->
				<div class="dropdown header-notify">
					<a class="nav-link icon" data-toggle="dropdown">
						<i class="mdi mdi-bell-outline"></i>
						<span class=" bg-success pulse-success "></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow pt-0">
						<div class="dropdown-header border-bottom p-4 pt-0 mb-3 w-270">
							<div class="d-flex">
								<h5 class="dropdown-title float-left mb-1 font-weight-semibold text-drak">Notifications</h5>
								<a href="#" class="fe fe-align-justify text-right float-right ml-auto text-muted"></a>
							</div>
						</div>
						<a href="#" class="dropdown-item d-flex pb-2 pt-2">
							<div class="card box-shadow-0 mb-0">
								<div class="card-body p-3">
									<div class="notifyimg bg-gradient-primary border-radius-4">
										<i class="mdi mdi-email-outline"></i>
									</div>
									<div>
										<div>Message Sent.</div>
										<div class="small text-muted">3 hours ago</div>
									</div>
								</div>
							</div>
						</a>
						<a href="#" class="dropdown-item d-flex  pb-2">
							<div class="card box-shadow-0 mb-0 ">
								<div class="card-body p-3">
									<div class="notifyimg bg-gradient-danger border-radius-4 bg-danger">
										<i class="fe fe-shopping-cart"></i>
									</div>
									<div>
										<div> Order Placed</div>
										<div class="small text-muted">5 hour ago</div>
									</div>
								</div>
							</div>
						</a>
						<a href="#" class="dropdown-item d-flex pb-2">
							<div class="card box-shadow-0 mb-0">
								<div class="card-body p-3">
									<div class="notifyimg bg-gradient-success  border-radius-4 bg-success mr-2">
										<i class="fe fe-airplay"></i>
									</div>
									<div>
										<div>Your Admin launched</div>
										<div class="small text-muted">1 daya ago</div>
									</div>
								</div>
							</div>
						</a>
						<div class=" text-center p-2 border-top mt-3">
							<a href="#" class="">View All Notifications</a>
						</div>
					</div>
				</div>
				<div class="dropdown ">
					<a class="nav-link pr-0 leading-none" href="#" data-toggle="dropdown" aria-expanded="false">
						<div class="profile-details mt-2">
							<span class="mr-2 font-weight-semibold">Anna Sthesia</span>
							<!-- <small class="text-muted mr-3">appdeveloper</small> -->
						</div>
						<img class="avatar avatar-md brround" src="{{asset('assets/images/users/1.jpg')}}" alt="image">
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow w-250">
						<div class="user-profile border-bottom p-3">
							<div class="user-image"><img class="user-images" src="{{asset('public/assets/images/users/1.jpg')}}" alt="image"></div>
							<div class="user-details">
								<h4>Anna Sthesia</h4>
								<p class="mb-1 fs-13 text-muted">AnnaSthesia@gmail.com</p>
							</div>
						</div>
						<a href="#" class="dropdown-item pt-3 pb-3"><i class="dropdown-icon mdi mdi-account-outline text-primary "></i> My Profile</a>
						<!-- <a href="#" class="dropdown-item pt-3 pb-3"><i class="dropdown-icon mdi  mdi-message-outline text-primary"></i> Messages <span class="badge badge-pill badge-success">41</span></a>
										<a href="#" class="dropdown-item pt-3 pb-3"><i class="dropdown-icon  mdi mdi-settings text-primary"></i> Setting</a>
										<a href="#" class="dropdown-item pt-3 pb-3"><i class="dropdown-icon mdi mdi-help-circle-outline text-primary"></i> FAQ</a> -->
						<a href="#" class="dropdown-item pt-3 pb-3"><i class="dropdown-icon  mdi  mdi-logout-variant text-primary"></i>Sign Out</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Horizontal-menu -->
<div class="horizontal-main hor-menu clearfix">
	<div class="horizontal-mainwrapper container clearfix">
		<nav class="horizontalMenu clearfix">
			<ul class="horizontalMenu-list">
				<li aria-haspopup="true"><a href="{{url('/')}}" class="sub-icon active"><i class="typcn typcn-device-desktop hor-icon"></i> Dashboard </a></li>
				<!--  -->
				<!-- <li aria-haspopup="true"><a href="#" class=""><i class="typcn typcn-book hor-icon"></i> Client</a></li> -->
					

				<li aria-haspopup="true"><a href="#" class="sub-icon "><i class="typcn typcn-tabs-outline hor-icon"></i> Purchase <i class="fa fa-angle-down horizontal-icon"></i></a>
					<ul class="sub-menu">
						<li aria-haspopup="true" class="sub-menu-sub"><a href="{{route('purchase-invoice.create')}}">Purchase Invoice</a>
							<ul class="sub-menu">
								<li aria-haspopup="true"><a href="{{route('purchase-invoice.index')}}">All Purchase Invoice</a></li>
								<li aria-haspopup="true"><a href="{{route('purchase-invoice.search')}}">Purchase Summary</a></li>
							</ul>
						</li>
						<li aria-haspopup="true" class="sub-menu-sub"><a href="{{route('purchase.payment.create')}}">Purchase Payment</a>
							<ul class="sub-menu">
								<li aria-haspopup="true"><a href="{{route('purchase.payment.create')}}">Add Payment Details</a></li>
								<li aria-haspopup="true"><a href="{{url('payment-history')}}">Payment History</a></li>
								<li aria-haspopup="true"><a href="{{url('purchase-invoice-wise-payment')}}">Purchase Invoice Wise Payment</a></li>
							</ul>
						</li>
						<li aria-haspopup="true" class="sub-menu-sub"><a href="#">Product Master</a>
							<ul class="sub-menu">
								<li aria-haspopup="true"><a href="{{route('make.index')}}">Make Details</a></li>
								<li aria-haspopup="true"><a href="{{route('attribute.index')}}">Attribute Details</a></li>
								<li aria-haspopup="true"><a href="{{route('attribute.value.index')}}">Attribute Value</a></li>
								<li aria-haspopup="true"><a href="{{route('model.index')}}">Add Model Details</a></li>
							</ul>
						</li>
						<li aria-haspopup="true" class="sub-menu-sub"><a href="#">Vendor Master</a>
							<ul class="sub-menu">
								<li aria-haspopup="true"><a href="{{route('vendor.create')}}">Vendor Details</a></li>
								<li aria-haspopup="true"><a href="{{route('vendor.index')}}">View All Vendors</a></li>
							</ul>
						</li>
						<li aria-haspopup="true" class="sub-menu-sub"><a href="#">PO Entry</a>
							<ul class="sub-menu">
								<li aria-haspopup="true"><a href="{{route('po.create')}}">Create PO</a></li>
								<li aria-haspopup="true"><a href="{{route('po.index')}}">View All PO Entry</a></li>
								<li aria-haspopup="true"><a href="{{url('po-summary')}}">PO Summary</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="typcn typcn-chart-pie  hor-icon"></i> Quotations <i class="fa fa-angle-down horizontal-icon"></i></a>
					<ul class="sub-menu">
						<li aria-haspopup="true"><a href="{{ route('quatation.create') }}">Sales Quotation</a>
							<ul class="sub-menu">
								<li aria-haspopup="true"><a href="{{route('quatation.index')}}">View All Quotation</a></li>
								<li aria-haspopup="true"><a href="{{route('quatation.search')}}">Search Quotation Details</a></li>
							</ul>
						</li>
						<li aria-haspopup="true"><a href="{{ route('amc.quatation.create') }}">AMC Stamping Quotation</a>
						<ul class="sub-menu">
								<li aria-haspopup="true"><a href="{{route('amc.quatation.index')}}">View All Quotation</a></li>
							
							</ul>
						</li>
					</ul>
				</li>
				<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="typcn typcn-chart-pie  hor-icon"></i> Sales <i class="fa fa-angle-down horizontal-icon"></i></a>
					<ul class="sub-menu">
						<li aria-haspopup="true"><a href="{{ route('proforma.create') }}">Proforma Invoice</a>
						<ul class="sub-menu">
						<li aria-haspopup="true"><a href="{{route('proforma.index')}}">View All Proforma</a></li>
						<li aria-haspopup="true"><a href="{{route('quatation.search')}}">Search Quotation Details</a></li>
						</ul>
						</li>
						<li aria-haspopup="true"><a href="#">Sales Invoice</a></li>
						<li aria-haspopup="true"><a href="#">Sales Payment</a></li>
					</ul>
				</li>
				<!-- <li aria-haspopup="true"><a href="#" class=""><i class="typcn typcn-book hor-icon"></i> Challan</a></li> -->
				<li aria-haspopup="true">
    <a href="#" class="sub-icon">
        <i class="typcn typcn-chart-pie hor-icon"></i> 
        Contracts 
        <i class="fa fa-angle-down horizontal-icon"></i>
    </a>
    <ul class="sub-menu">

        <!-- AMC -->
        <li aria-haspopup="true">
            <a href="{{ route('contract.amc.create') }}">AMC</a>
            <ul class="sub-menu">
                <li><a href="{{ route('contract.amc.index') }}">List</a></li>
            </ul>
        </li>

        <!-- Other contract types -->
        <li aria-haspopup="true">
            <a href="{{ route('service-charges.create') }}">Service Contract (Only Stamping)

			</a>
				<ul class="sub-menu">
                <li><a href="{{ route('service-charges.index') }}">List</a></li>
            </ul>
        </li>
        <li aria-haspopup="true">
            <a href="{{ route('service-contract.create') }}">Service Contract (Only Service)</a>
			<ul class="sub-menu">
                <li><a href="{{ route('service-contract.index') }}">List</a></li>
            </ul>
        </li>

    </ul>
</li>

				<!-- <li aria-haspopup="true"><a href="#" class=""><i class="typcn typcn-book hor-icon"></i> Inward</a></li> -->
				<!-- <li aria-haspopup="true"><a href="#" class=""><i class="typcn typcn-book hor-icon"></i> Stock Mgnt</a></li> -->
				<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="typcn typcn-chart-pie  hor-icon"></i> Service Calls <i class="fa fa-angle-down horizontal-icon"></i></a>
					<ul class="sub-menu">
						<li aria-haspopup="true"><a href="#">Service Type Master</a></li>
						<li aria-haspopup="true"><a href="#">Nature of Job Master</a></li>
						<li aria-haspopup="true"><a href="#">Action Master</a></li>
						<li aria-haspopup="true"><a href="#">Service Call Entry</a></li>
					</ul>
				</li>
				<!-- <li aria-haspopup="true"><a href="#" class=""><i class="typcn typcn-book hor-icon"></i> Reminder</a></li> -->
				<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="typcn typcn-folder hor-icon"></i> Report <i class="fa fa-angle-down horizontal-icon"></i></a>
					<ul class="sub-menu">
						<li aria-haspopup="true"><a href="#">GSTR1 Report</a></li>
						<li aria-haspopup="true" class="sub-menu-sub"><a href="#">Ledger</a>
							<ul class="sub-menu">
								<li aria-haspopup="true"><a href="#">Client</a></li>
								<li aria-haspopup="true"><a href="#">Vendor</a></li>
								<li aria-haspopup="true"><a href="#">Combine Ledger</a></li>
							</ul>
						</li>
						<li aria-haspopup="true" class="sub-menu-sub"><a href="#">Outstanding</a>
							<ul class="sub-menu">
								<li aria-haspopup="true"><a href="#">Client</a></li>
								<li aria-haspopup="true"><a href="#">Vendor</a></li>
							</ul>
						</li>
						<li aria-haspopup="true"><a href="#">Incentive/Commission</a></li>
					</ul>
				</li>
				<!-- <li aria-haspopup="true"><a href="#" class=""><i class="typcn typcn-book hor-icon"></i> Global Search</a></li> -->
				<li aria-haspopup="true"><a href="#" class="sub-icon "><i class="typcn typcn-tabs-outline hor-icon"></i> Administration <i class="fa fa-angle-down horizontal-icon"></i></a>
					<ul class="sub-menu">
						<li aria-haspopup="true" class="sub-menu-sub"><a href="#">Company</a>
							<ul class="sub-menu">
								<li aria-haspopup="true"><a href="javascript:void(0);">Company Details</a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{url('masters/company-details/company-details')}}">Add Company Details</a></li>
										<li aria-haspopup="true"><a href="{{url('masters/company-details/view-file')}}">View All Company</a></li>
									</ul>
								</li>
								<li aria-haspopup="true"><a href="#">Financial Year Master</a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('financial.create')}}">Financial Year</a></li>
										<li aria-haspopup="true"><a href="{{route('financial.index')}}">Financial Year list</a></li>
									</ul>
								</li>
								<li aria-haspopup="true"><a href="#">Header Details</a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{url('masters/header_details')}}">Add Company Details</a></li>
										<li aria-haspopup="true"><a href="#">View All Company</a></li>
									</ul>
								</li>
								<li aria-haspopup="true"><a href="#">Invoice Type Master</a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('invoice.create')}}">Invoice Type</a></li>
										<li aria-haspopup="true"><a href="{{ route('invoice.index') }}">Invoice Type List</a></li>
									</ul>
								</li>
								<li aria-haspopup="true"><a href="#">Report Type Master</a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('report.create')}}">Report Type</a></li>
										<li aria-haspopup="true"><a href="{{ route('report.index') }}">Report Type List</a></li>
									</ul>
								</li>
								<li aria-haspopup="true"><a href="#">Term & Condition</a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{url('masters/challan_entry')}}">Challan Entry</a></li>
										<li aria-haspopup="true"><a href="#">View All Challan Invoice</a></li>
									</ul>
								</li>
								<li aria-haspopup="true"><a href="#">Reminder Value master</a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('reminder.create')}}">Add Reminder Value</a></li>
										<li aria-haspopup="true"><a href="{{route('reminder.index')}}">Reminder Value List</a></li>
									</ul>
								</li>
								<li aria-haspopup="true"><a href="#">Tax Master</a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('tax.index')}}">Add Tax Details</a></li>
										<li aria-haspopup="true"><a href="{{route('tax.list')}}">Tax List</a></li>
									</ul>
								</li>
								<li aria-haspopup="true"><a href="#">Account Master</a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('account.create')}}">Add Client</a>
										</li>
										<li aria-haspopup="true"><a href="{{route('account.index')}}">View All Accounts</a></li>
									</ul>
								</li>
								<li aria-haspopup="true"><a href="#">Expense Type Master</a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('expense.create')}}">Add Expense Type Details</a>
										</li>
										<li aria-haspopup="true"><a href="{{route('expense.index')}}">Expense Type List</a></li>
									</ul>
								</li>
								<li aria-haspopup="true"><a href="#">Office Expense</a></li>
								<li aria-haspopup="true"><a href="#">Buyer Master</a>

									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('buyer.create')}}">Add Buyer</a>
										</li>
										<li aria-haspopup="true"><a href="{{route('buyer.index')}}">Buyer List</a></li>
									</ul>
								</li>
								<li aria-haspopup="true"><a href="#">Consignee Master</a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('consignee.create')}}">Add Consignee</a>
										</li>
										<li aria-haspopup="true"><a href="{{route('consignee.index')}}">Consignee List</a></li>
									</ul>
								</li>
								<li aria-haspopup="true"><a href="#">Qurter Master</a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('quarter.create')}}">Add Quarter Details</a>
										</li>
										<li aria-haspopup="true"><a href="{{route('quarter.index')}}">Quarter List</a></li>
									</ul>

								</li>
								<li aria-haspopup="true"><a href="#">Currency Master</a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('currency.create')}}">Add Currency Details</a>
										</li>
										<li aria-haspopup="true"><a href="{{route('currency.index')}}">Currency List</a></li>
									</ul>
								</li>
								<li aria-haspopup="true"><a href="#">Stock Location Master</a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('location.create')}}">Add Currency Details</a>
										</li>
										<li aria-haspopup="true"><a href="{{route('location.index')}}">Stock Location List</a></li>
									</ul>

								</li>
								<li aria-haspopup="true"><a href="#">LUT Master</a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('LUT.create')}}">LUT Master</a>
										</li>
										<li aria-haspopup="true"><a href="{{route('LUT.index')}}">LUT List</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li aria-haspopup="true" class="sub-menu-sub"><a href="#">Employee</a>
							<ul class="sub-menu">
								<li aria-haspopup="true"><a href="#">Employee Destination</a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('designation.create')}}">Add Employee Designation</a>
										</li>
										<li aria-haspopup="true"><a href="{{route('designation.index')}}">Employee Designation List</a></li>
									</ul>
								</li>
								<li aria-haspopup="true"><a href="#">Employee Details</a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('employee.details.create')}}">Employee Entry</a>
										</li>
										<li aria-haspopup="true"><a href="#">View All Employee List</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li aria-haspopup="true" class="sub-menu-sub"><a href="#">Refrence</a>
							<ul class="sub-menu">
								<li aria-haspopup="true"><a href="">Refrence Master</a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('reference.create')}}">Refrence Entry</a>
										</li>
										<li aria-haspopup="true"><a href="{{route('reference.index')}}">View All Refrence List</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li aria-haspopup="true" class="sub-menu-sub"><a href="#">Client</a>
							<ul class="sub-menu">
								<li aria-haspopup="true"><a href="#">Zone Master</a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('zone.create')}}">Add Zone Details</a>
										</li>
										<li aria-haspopup="true"><a href="{{route('zone.index')}}">Zone List</a></li>
									</ul>
								</li>
								<li aria-haspopup="true"><a href="#">Location Master</a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('locations.create')}}">Add Location Details</a>
										</li>
										<li aria-haspopup="true"><a href="{{route('locations.index')}}">Location List</a></li>
									</ul>
								</li>
								<li aria-haspopup="true"><a href="#">Client Group Master</a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('client.create')}}">Add Client Group Details</a>
										</li>
										<li aria-haspopup="true"><a href="{{route('client.index')}}">Client group List</a></li>
									</ul>
								</li>
								<li aria-haspopup="true"><a href="#">Client Type Master</a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('client-type.create')}}">Add Client Type Details</a>
										</li>
										<li aria-haspopup="true"><a href="{{route('client-type.index')}}">Client Type List</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li aria-haspopup="true" class="sub-menu-sub"><a href="#">Authentication</a>
							<ul class="sub-menu">
								<li aria-haspopup="true"><a href="#">Roll Master</a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="{{route('role.create')}}">Add Role</a>
										</li>
										<li aria-haspopup="true"><a href="{{route('role.index')}}">Role List</a></li>
									</ul>
								</li>
								<li aria-haspopup="true"><a href="#">Add User</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<!-- <li aria-haspopup="true"><a href="" class=""><i class="typcn typcn-book hor-icon"></i> Daily Backup</a></li> -->

				<li aria-haspopup="true">
    <a href="#" class="sub-icon">
        <i class="typcn typcn-chart-pie hor-icon"></i> More 
        <i class="fa fa-angle-down horizontal-icon"></i>
    </a>
    <ul class="sub-menu">
        <li aria-haspopup="true">
            <a href="{{ route('client.name.create') }}">Client</a>
        </li>
        <li aria-haspopup="true">
            <a href="{{ route('client.name.index') }}">Client List</a>
        </li>
        <li aria-haspopup="true">
            <a href="{{ route('challan.create') }}">Challan</a>
			<ul class="sub-menu">
	
			<li aria-haspopup="true"><a href="{{ route('challan.index') }}">View All Challan Invoice</a></li>
				</ul>
        </li>
        <li aria-haspopup="true">
            <a href="{{ route('inward.create') }}">Inward</a>
			<ul class="sub-menu">
			<li aria-haspopup="true"><a href="{{route('inward.index')}}">View All Inward Details</a></li>
			<li aria-haspopup="true"><a href="{{route('inward.search')}}">Search Inward Details</a></li>
		</ul>
        </li>
        <li aria-haspopup="true">
            <a href="#">Stock Mgmt</a>
        </li>
        <li aria-haspopup="true">
            <a href="#">Reminder</a>
        </li>
        <li aria-haspopup="true">
            <a href="#">Global Search</a>
        </li>
        <li aria-haspopup="true">
            <a href="#">Daily Backup</a>
        </li>
    </ul>
</li>

				<!--  -->

			</ul>
		</nav>
		<!--Nav end -->
	</div>
</div>
<!-- Horizontal-menu end -->