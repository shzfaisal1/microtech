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
														<li><a href="#tab2" data-toggle="tab">View All Vendors</a></li>
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body">
												<div class="tab-content">
													<div class="tab-pane active " id="tab1">
 <form action="{{ route('vendor.update', $vendor->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="card mt-4">
        <div class="card-header">
            <h4>Edit Vendor</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Vendor Name -->
                <div class="col">
                    <div class="form-group">
                        <label>Vendor Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ $vendor->name }}">
                    </div>
                </div>
                <!-- Print Name As -->
                <div class="col">
                    <div class="form-group">
                        <label>Print Name As <span class="text-danger">*</span></label>
                        <input type="text" name="print_name_as" class="form-control" value="{{ $vendor->print_name_as }}">
                    </div>
                </div>
                <!-- Phone -->
                <div class="col">
                    <div class="form-group">
                        <label>Contact No</label>
                        <div class="input-group">
                            <input type="text" name="phone1" class="form-control" value="{{ $vendor->phone1 }}">
                            <input type="text" name="phone2" class="form-control" value="{{ $vendor->phone2 }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Email -->
                <div class="col">
                    <div class="form-group">
                        <label>Email ID</label>
                        <div class="input-group">
                            <input type="email" name="email_id_1" class="form-control" value="{{ $vendor->email_id_1 }}">
                            <input type="email" name="email_id_2" class="form-control" value="{{ $vendor->email_id_2 }}">
                        </div>
                    </div>
                </div>
                <!-- VAT / CST -->
                <div class="col">
                    <label>VAT TIN</label>
                    <input type="text" name="vat_tin_no_1" class="form-control" value="{{ $vendor->vat_tin_no_1 }}">
                </div>
                <div class="col">
                    <label>CST TIN</label>
                    <input type="text" name="vat_tin_no_2" class="form-control" value="{{ $vendor->vat_tin_no_2 }}">
                </div>
            </div>

            <div class="row">
                <!-- Address -->
                <div class="col">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" value="{{ $vendor->address }}">
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Bank Details -->
                <div class="col">
                    <label>Bank Name</label>
                    <input type="text" name="bank_name" class="form-control" value="{{ $vendor->bank_name }}">
                </div>
                <div class="col">
                    <label>Account No</label>
                    <input type="text" name="bank_account_no" class="form-control" value="{{ $vendor->bank_account_no }}">
                </div>
                <div class="col">
                    <label>IFSC</label>
                    <input type="text" name="bank_ifsc_code" class="form-control" value="{{ $vendor->bank_ifsc_code }}">
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <label>Bank Address</label>
                    <input type="text" name="bank_add" class="form-control" value="{{ $vendor->bank_add }}">
                </div>
                <div class="col">
                    <label>Branch Name</label>
                    <input type="text" name="bank_branch_name" class="form-control" value="{{ $vendor->bank_branch_name }}">
                </div>
                <div class="col">
                    <label>Opening Balance</label>
                    <input type="number" name="balance" class="form-control" value="{{ $vendor->balance }}">
                </div>
                <div class="col">
                    <label>Service Tax No</label>
                    <input type="text" name="service_tax_no" class="form-control" value="{{ $vendor->service_tax_no }}">
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <label>PAN</label>
                    <input type="text" name="pan_no" class="form-control" value="{{ $vendor->pan_no }}">
                </div>
                <div class="col">
                    <label>GSTIN</label>
                    <input type="text" name="gst_no" class="form-control" value="{{ $vendor->gst_no }}">
                </div>
                <div class="col">
                    <label>Web Address</label>
                    <input type="text" name="web_address" class="form-control" value="{{ $vendor->web_address }}">
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Persons -->
    <div class="card mt-4">
        <div class="card-header">
            <h4>Contact Persons</h4>
        </div>
        <div class="card-body" id="contact-person-container">
            @foreach ($vendor->contactPersons as $index => $contact)
                <div class="row contact-person-row mb-3">
                    <div class="col"><input type="text" name="name[]" class="form-control" value="{{ $contact->name }}" placeholder="Name"></div>
                    <div class="col"><input type="text" name="designation[]" class="form-control" value="{{ $contact->designation }}" placeholder="Designation"></div>
                    <div class="col"><input type="text" name="contact1[]" class="form-control" value="{{ $contact->contact1 }}" placeholder="Contact 1"></div>
                    <div class="col"><input type="text" name="contact2[]" class="form-control" value="{{ $contact->contact2 }}" placeholder="Contact 2"></div>
                    <div class="col"><input type="email" name="email1[]" class="form-control" value="{{ $contact->email1 }}" placeholder="Email 1"></div>
                    <div class="col"><input type="email" name="email2[]" class="form-control" value="{{ $contact->email2 }}" placeholder="Email 2"></div>
                    <div class="col d-flex align-items-end">
                        <button type="button" class="btn btn-danger remove-contact mb-2">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="card-footer">
            <button type="button" id="add-contact-btn" class="btn btn-success">
                <i class="fa fa-plus-circle"></i> Add More
            </button>
        </div>
    </div>

    <center>
        <button type="submit" class="btn btn-primary">Update Vendor</button>
    </center>
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
            let html = `
                <div class="row contact-person-row mb-3">
                    <div class="col"><input type="text" name="contact_person_name[]" class="form-control" placeholder="Name"></div>
                    <div class="col"><input type="text" name="desg_person_name[]" class="form-control" placeholder="Designation"></div>
                    <div class="col"><input type="text" name="contact_person_no1[]" class="form-control" placeholder="Contact 1"></div>
                    <div class="col"><input type="text" name="contact_person_no2[]" class="form-control" placeholder="Contact 2"></div>
                    <div class="col"><input type="email" name="contact_person_email1[]" class="form-control" placeholder="Email 1"></div>
                    <div class="col"><input type="email" name="contact_person_email2[]" class="form-control" placeholder="Email 2"></div>
                    <div class="col d-flex align-items-end">
                        <button type="button" class="btn btn-danger remove-contact mb-2">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>
            `;
            $('#contact-person-container').append(html);
        });

        $(document).on('click', '.remove-contact', function () {
            $(this).closest('.contact-person-row').remove();
        });
    });
</script>
@endpush
