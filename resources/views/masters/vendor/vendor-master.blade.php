@extends('master')

@section('main')

<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Vendor Details</h4>
								<ol class="breadcrumb pl-0">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</div>
							
						</div>
						<!--End Page header-->

                        <!-- Row -->
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-body p-0">
										<div class="panel panel-primary">
											<div class="tab-menu-heading">
												       @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
												<div class="tabs-menu ">
													<!-- Tabs -->
													<ul class="nav panel-tabs">
														<li class=""><a href="#tab1" class="active" data-toggle="tab">Add Vendor Details</a></li>
														<!--<li><a href="#tab2" data-toggle="tab">View All Vendors</a></li>-->
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body">
												<div class="tab-content">
													<div class="tab-pane active " id="tab1">
                                                        <!-- search-client-info -->
         <form action="{{ route('vendor.store') }}" method="POST">
    @csrf

    <div class="search-client-info">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                     @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    <div class="card-header">
                        <h3 class="card-title">Add Vendor Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Vendor Name -->
                            <div class="col">
                                <div class="form-group">
                                    <label for="name">Vendor Name <span class="text-danger">*</span> :</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                            </div>
                            <!-- Print Name As -->
                            <div class="col">
                                <div class="form-group">
                                    <label for="print_name_as">Print Name as <span class="text-danger">*</span> :</label>
                                    <input type="text" class="form-control" id="print_name_as" name="print_name_as">
                                </div>
                            </div>
                            <!-- Contact No -->
                            <div class="col">
                                <div class="form-group">
                                    <label for="uname">Contact No :</label>
                                  
                                       <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="" name="phone1" id="phone1">
                                        <input type="text" class="form-control" placeholder="" name="phone2" id="phone2">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Email -->
                            <div class="col">
                                <div class="form-group">
                                    <label for="uname">Email ID :</label>
                                  
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="" name="email_id_1" id="email_id_1">
                                        <input type="text" class="form-control" placeholder="" name="email_id2" id="email_id2">
                                    </div>
                                </div>
                            </div>
                            <!-- VAT TIN -->
                            <div class="col">
                                <div class="form-group">
                                    <label for="uname">VAT TIN No :</label>
                                    <input type="text" class="form-control" name="vat_tin_no_1">
                                </div>
                            </div>
                            <!-- CST TIN -->
                            <div class="col">
                                <div class="form-group">
                                    <label for="uname">CST TIN No :</label>
                                    <input type="text" class="form-control" name="vat_tin_no_2">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Address -->
                            <div class="col">
                                <div class="form-group">
                                    <label for="address">Address:</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Bank Details -->
                            <div class="col">
                                <div class="form-group">
                                    <label>Bank Name :</label>
                                    <input type="text" class="form-control" name="bank_name">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Account No. :</label>
                                    <input type="text" class="form-control" name="bank_account_no">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>IFSC Code :</label>
                                    <input type="text" class="form-control" name="bank_ifsc_code">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Bank Address -->
                            <div class="col">
                                <div class="form-group">
                                    <label>Bank Address:</label>
                                    <input type="text" class="form-control" name="bank_add">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Branch Name, Balance, Service Tax -->
                            <div class="col">
                                <div class="form-group">
                                    <label>Branch Name :</label>
                                    <input type="text" class="form-control" name="bank_branch_name">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Opening Balance :</label>
                                    <input type="number" class="form-control" name="balance">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Service Tax No :</label>
                                    <input type="text" class="form-control" name="service_tax_no">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- PAN, GSTIN, Web Address -->
                            <div class="col">
                                <div class="form-group">
                                    <label>PAN No :</label>
                                    <input type="text" class="form-control" name="pan_no">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>GSTIN :</label>
                                    <input type="text" class="form-control" name="gst_no">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Web Address :</label>
                                    <input type="text" class="form-control" name="web_address">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Contact Person Info -->
        <div class="row mt-4">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Contact Person Info</h3>
                    </div>
                   <div class="card-body">
            <div id="contact-person-container">
                <div class="row contact-person-row">
                    <!-- Name -->
                    <div class="col">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="contact_person_name[]" class="form-control">
                        </div>
                    </div>
            <!-- Designation -->
                <div class="col">
                    <div class="form-group">
                        <label>Designation</label>
                        <input type="text" class="form-control" name="designation[]">
                    </div>
            </div>
            <!-- Contact1 -->
            <div class="col">
                <div class="form-group">
                    <label>Contact1</label>
                    <input type="number" class="form-control" name="contact1[]">
                </div>
            </div>
            <!-- Contact2 -->
            <div class="col">
                <div class="form-group">
                    <label>Contact2</label>
                    <input type="number" class="form-control" name="contact2[]">
                </div>
            </div>
            <!-- Email1 -->
            <div class="col">
                <div class="form-group">
                    <label>Email1</label>
                    <input type="email" class="form-control" name="email1[]">
                </div>
            </div>
            <!-- Email2 -->
            <div class="col">
                <div class="form-group">
                    <label>Email2</label>
                    <input type="email" class="form-control" name="email2[]">
                </div>
            </div>
            <!-- Remove Button -->
            <div class="col d-flex align-items-end">
                <a type="button" class="text-danger remove-contact mb-4">
                    <i class="fa fa-trash" style="font-size:16px;"></i> 
                </a>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <button type="button" id="add-contact-btn" class="btn btn-success">
                <i class="fa fa-plus-circle"></i> Add More
            </button>
        </div>
    </div>
</div>

                </div>
            </div>
        </div>

    </div>
  
          <center> <input type="submit" name="submit" id="" value="Add Vendor" class="btn btn-primary"></center>
            
</form>

						                                <!-- End search-client-info -->

                                                    </div>
												
													
												</div>
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</div>
						<!-- End Row -->

@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        $('#add-contact-btn').click(function () {
            let contactRow = `
                <div class="row contact-person-row mt-3">
                    <div class="col">
                        <input type="text" name="contact_person_name[]" class="form-control" placeholder="Name">
                    </div>
                    <div class="col">
                        <input type="text" name="desg_person_name[]" class="form-control" placeholder="Designation">
                    </div>
                    <div class="col">
                        <input type="number" name="contact_person_no1[]" class="form-control" placeholder="Contact 1">
                    </div>
                    <div class="col">
                        <input type="number" name="contact_person_no2[]" class="form-control" placeholder="Contact 2">
                    </div>
                    <div class="col">
                        <input type="email" name="contact_person_email1[]" class="form-control" placeholder="Email 1">
                    </div>
                    <div class="col">
                        <input type="email" name="contact_person_email2[]" class="form-control" placeholder="Email 2">
                    </div>
                    <div class="col d-flex align-items-end">
                        
                      <button type="button" class="btn btn-danger remove-contact mb-4">
                    <i class="fa fa-trash"></i> 
                </button>
                    </div>
                </div>
            `;
            $('#contact-person-container').append(contactRow);
        });

        
        $(document).on('click', '.remove-contact', function () {
            $(this).closest('.contact-person-row').remove();
        });
    });
</script>
@endpush
