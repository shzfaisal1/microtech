@extends('master')

@section('main')

<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Purchase Summary</h4>
								<ol class="breadcrumb pl-0">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</div>
						</div>
						<!--End Page header-->

                        <!-- search-client-info -->
                      <div class="search-client-info">
 <div class="row justify-content-center">
    <div class="col-md-12"> <!-- Adjust width as needed (6 to 10) -->
        <div class="card shadow-sm">
            <div class="card-body">
                <form>
                    <div class="row">
                        <!-- From Date -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="from_date">From <span class="text-danger">*</span> :</label>
                                <input type="date" class="form-control" id="from_date" name="from_date">
                            </div>
                        </div>

                        <!-- To Date -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="to_date">To <span class="text-danger">*</span> :</label>
                                <input type="date" class="form-control" id="to_date" name="to_date">
                            </div>
                        </div>
                    </div>

                    <!-- Search Conditions -->
                  <div class="form-group mt-3">
    <label>Search Condition <span class="text-danger">*</span> :</label>
    <div class="d-flex flex-wrap gap-4">
        @php
            $conditions = ['Make', 'Model', 'Client', 'Reference', 'Employee', 'Quotation No'];
        @endphp
        @foreach($conditions as $key => $condition)
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input search-radio" name="search_condition"
                       id="condition_{{ $key }}" value="{{ $condition }}">
                <label class="form-check-label" for="condition_{{ $key }}">
                    Search by {{ $condition }}
                </label>
            </div>
        @endforeach
    </div>
</div>

<div class="row mt-2" id="client_section" style="display: none;">
    <div class="col-6">
        <div class="form-group">
            <label for="uname">Client Group <span class="text-danger">*</span> :</label>
            <div class="input-group mb-1 flex-nowrap">
                <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" id="client_group" name="client_group_id">
                    <optgroup>
                        @if(isset($clients_grp))
                            <option value="0">Select Client Group</option>
                            @foreach($clients_grp as $list)
                                <option value="{{ $list->id }}">{{ $list->name }}</option>
                            @endforeach
                        @endif
                    </optgroup>
                </select>
                <div class="input-group-append">
                    <a href="{{ url('buyer-master') }}" class="btn btn-light" type="button"><i class="fa fa-plus text-success"></i></a>
                </div>
            </div>
            <span id="vendor_add" class="text-danger d-block mt-1"></span>
        </div>
    </div>

    <div class="col-6">
        <div class="form-group">
            <label for="client_name">Client Name <span class="text-danger">*</span> :</label>
            <div class="input-group mb-1 flex-nowrap">
                <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" id="client_name" name="client_name_id">
                    <optgroup>
                        <option value="0"> Select Client Name</option>   
                    </optgroup>
                </select>
                <div class="input-group-append">
                    <a href="{{ url('buyer-master') }}" class="btn btn-light" type="button">
                        <i class="fa fa-plus text-success"></i>
                    </a>
                </div>
            </div>
            <span class="text-danger d-block mt-1" id="client_add"></span>
        </div>
    </div>
</div>
<!-- Quotation No Input (Hidden by default) -->
<div class="row mt-2" id="quotation_no_field" style="display: none;">
    <div class="col-md-6">
        <div class="form-group">
            <label for="quotation_no">Quotation No:</label>
            <input type="text" class="form-control" id="quotation_no" name="quotation_no">
        </div>
    </div>
</div>

<div class="row mt-2" id="ref_name_field" style="display: none;">
    <div class="col-md-6">
        <div class="form-group">
            <label for="employee_name">Reference Name:</label>
    
            <input type="text" class="form-control" id="ref_name" name="ref_name">

        </div>
    </div>
</div>
<!-- Employee Name Input (Hidden by default) -->
<div class="row mt-2" id="employee_field" style="display: none;">
    <div class="col-md-6">
        <div class="form-group">
            <label for="employee_name">Employee Name:</label>
    
            <input type="text" class="form-control" id="employee_name" name="employee_name">

        </div>
    </div>
</div>
 <!-- Make & Model Fields (Hidden by default) -->
<div class="row mt-2" id="make_model_section" style="display: none;">
    <!-- Make -->
    <div class="col">
        <div class="form-group">
            <label for="make_id">Make <span class="text-danger">*</span> :</label>
            <div class="input-group mb-3 flex-nowrap">
                <select class="form-control select2-show-search" id="make_id" name="make_id" data-placeholder="Choose Make">
                    <option value="">Select Make</option>
                    @foreach($makes as $make)
                        <option value="{{ $make->id }}">{{ $make->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <!-- Model -->
    <div class="col">
        <div class="form-group">
            <label for="model_id">Model <span class="text-danger">*</span> :</label>
            <div class="input-group mb-3 flex-nowrap">
                <select class="form-control select2-show-search" id="model_id" name="model_id" data-placeholder="Choose Model">
                    <option value="">Select Model</option>
                </select>
            </div>
        </div>
    </div>
</div>




                    <!-- Submit Button -->
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary px-5">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>

						<!-- End search-client-info -->

                        <!-- search-client-info -->
                        <div class="search-client-info">
                            <div class="row">
							    <div class="col-lg-12 col-md-12">
							    	<div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="quot_summary" class="table table-striped table-bordered w-100">
                                                  <thead>
                                                        <tr>
                                                            <th>#Sr No</th>
                                                            <th>Quot No 0</th>
                                                            <th>Client</th>
                                                            <th>Reference</th>
                                                            <th>Employee</th>
                                                            <th>Make</th>
                                                            <th>Model</th>
                                                            <th>Capacity</th>
                                                            <th>Readability</th>
                                                            <th>Calibration</th>
                                                            <th>Calibration Charge</th>
                                                            <th>Pan Size</th>
                                                            <th>Price</th>
                                                            <th>Description</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                    
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
							    		</div>
							    	</div>
							    </div>
						    </div>
                        </div>
						<!-- End search-client-info -->
<div class="modal fade" id="quotationViewModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" style="max-width: 50%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Quotation Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
      </div>
      <div class="modal-body" id="quotation-detail-body"></div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
$(document).ready(function () {

    // Initialize DataTable with filters
    let table = $('#quot_summary').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
    pageLength: 10,
    filter: true,
    deferRender: true,
    scrollY: 200,
    scrollCollapse: true,
    scroller: true,
    "searching": true,
        ajax: {
            url: "{{ route('quatation.search') }}",
            type: "GET",
            data: function (d) {
                d.from_date = $('#from_date').val();
                d.to_date = $('#to_date').val();
                d.search_condition = $('input[name="search_condition"]:checked').val();
                d.client_group_id = $('#client_group').val();
                d.client_name_id = $('#client_name').val();
                d.quotation_no = $('#quotation_no').val();
                d.ref_name = $('#ref_name').val();
                d.employee_name = $('#employee_name').val();
                d.make_id = $('#make_id').val();
                d.model_id = $('#model_id').val();
            }
        },
        order: [[0, 'desc']],
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'quotation_no', name: 'quotation_no' },
            { data: 'clientgroup', name: 'clientgroup' },
            { data: 'reference', name: 'reference' },
            { data: 'emp_name_id', name: 'emp_name_id' },
            { data: 'make', name: 'make' },
            { data: 'model', name: 'model' },
            { data: 'capacity', name: 'capacity' },
            { data: 'readability', name: 'readability' },
            { data: 'calibration', name: 'calibration' },
            { data: 'calibration_charge', name: 'calibration_charge' },
            { data: 'pan_size', name: 'pan_size' },
            { data: 'price', name: 'price' },
            { data: 'description', name: 'description' },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,
                className: 'text-center'
            }
        ]
    });

    // Search form submission
    $('form').on('submit', function (e) {
        e.preventDefault();
        table.ajax.reload();
    });

    // Show/Hide inputs based on radio selection
    $('.search-radio').on('change', function () {
        let selectedValue = $('input[name="search_condition"]:checked').val();
        $('#quotation_no_field, #employee_field, #client_section, #make_model_section, #ref_name_field').slideUp();

        switch (selectedValue) {
            case "Quotation No":
                $('#quotation_no_field').slideDown();
                break;
            case "Employee":
                $('#employee_field').slideDown();
                break;
            case "Client":
                $('#client_section').slideDown();
                break;
            case "Make":
            case "Model":
                $('#make_model_section').slideDown();
                break;
            case "Reference":
                $('#ref_name_field').slideDown();
                break;
        }
    });

    // Load clients based on group
    $('#client_group').on('change', function () {
        let client_gr_id = $(this).val();
        $('#client_name').empty().append('<option value="">Loading...</option>');

        if (client_gr_id) {
            $.ajax({
                url: '{{ route("quatation.client_group") }}',
                type: 'POST',
                data: {
                    client_gr_id: client_gr_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    $('#client_name').empty().append('<option value="">Select Client Name</option>');
                    $.each(response.client_grp, function (key, client) {
                        $('#client_name').append('<option value="' + client.id + '">' + client.client_name + '</option>');
                    });
                }
            });
        } else {
            $('#client_name').empty().append('<option value="">Select Client Name</option>');
        }
    });

    // Load models based on make
    $('#make_id').on('change', function () {
        let make_id = $(this).val();

        if (make_id) {
            $.ajax({
                url: '{{ route("quatation.make") }}',
                type: 'POST',
                data: {
                    make_id: make_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    $('#model_id').empty().append('<option value="">Select Model</option>');
                    $.each(response, function (key, model) {
                        $('#model_id').append('<option value="' + model.id + '">' + model.model_name + '</option>');
                    });
                }
            });
        }
    });

    $(document).on('click', '#view_quo', function (e) {
    e.preventDefault();
    const id = $(this).data('id');

    $.ajax({
        url: "{{ url('/masters/quatation/show/modal') }}/" + id,
        type: 'GET',
        success: function (res) {
          
            console.log(res);
            if (res.length > 0) {
                const data = res[0];

                let html = `
                    <div class="row mb-3">
                        <div class="col-md-6"><strong>Company Name :</strong> ${data.company?.company_name || '-'}</div>
                        <div class="col-md-6"><strong>Financial Year :</strong> ${data.finance?.financial_year || '-'}</div>
                        <div class="col-md-6"><strong>Employee Name :</strong> ${data.employee?.name || '-'}</div>
                        <div class="col-md-6"><strong>Client Group :</strong> ${data.client_group?.name || '-'}</div>
                        <div class="col-md-6"><strong>Client Name :</strong> ${data.client_name?.client_name || '-'}</div>
                        <div class="col-md-6"><strong>Contact Person :</strong> ${data.contact_person?.name || '-'}</div>
                        <div class="col-md-12"><strong>Address :</strong> ${data.client_name?.address || '-'}</div>
                        <div class="col-md-6"><strong>Quot. No/Date :</strong> ${data.quotation_no || '-'} / ${data.quotation_date || '-'}</div>
                        <div class="col-md-6"><strong>Subject :</strong> ${data.subject || '-'}</div>
                        <div class="col-md-6"><strong>Quarter :</strong> ${data.quarter?.name || '-'}</div>
                        <div class="col-md-6"><strong>Note :</strong> ${data.note || '-'}</div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered text-center align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Make</th>
                                    <th>Model</th>
                                    <th>Capacity</th>
                                    <th>Readability</th>
                                    <th>Calibration</th>
                                    <th>Pan Size</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                `;

                let totalPrice = 0;

                data.product_data.forEach(item => {
                    html += `
                        <tr>
                          <td>${item.make_data?.name || '-'}</td>
                            <td>${item.model_data?.model_name || '-'}</td>
                            <td>${item.capacity || '-'}</td>
                            <td>${item.readability || '-'}</td>
                            <td>${item.calibration || '-'}</td>
                            <td>${item.pan_size || '-'}</td>
                            <td>${parseFloat(item.price || 0).toFixed(2)}</td>
                            <td>${item.description || '-'}</td>
                        </tr>
                    `;
                    totalPrice += parseFloat(item.item_price || 0);
                });
html += `
</tbody>
</table>
</div>

<!-- Amount Summary & Footer -->
<div class="row">
    <div class="col-md-6 offset-md-6">
        <div class="p-2 border rounded bg-light">
            <div class="d-flex justify-content-between py-1">
                <span>Net Amount:</span>
                <strong>${parseFloat(data.net_amount || 0).toFixed(2)}</strong>
            </div>
            <div class="d-flex justify-content-between py-1">
                <span>Tax 1 (${parseFloat(data.tax_value_1 || 0)}%) :</span>
                <strong>${parseFloat(data.tax_value_amount_1 || 0).toFixed(2)}</strong>
            </div>
            <div class="d-flex justify-content-between py-1">
                <span>Tax 2 (${parseFloat(data.tax_value_2 || 0)}%) :</span>
                <strong>${parseFloat(data.tax_value_amount_2 || 0).toFixed(2)}</strong>
            </div>
            <div class="d-flex justify-content-between py-1">
                <span>Total :</span>
                <strong>${parseFloat(data.total_amount || 0).toFixed(2)}</strong>
            </div>
            <div class="d-flex justify-content-between py-1">
                <span>Round Off :</span>
                <strong>${parseFloat(data.round_off || 0).toFixed(2)}</strong>
            </div>
            <hr class="my-2">
            <div class="d-flex justify-content-between py-1">
                <strong class="text-primary">Grand Total :</strong>
                <strong class="text-primary">${parseFloat(data.grand_total || 0).toFixed(2)}</strong>
            </div>
        </div>
    </div>
</div>

<!-- Modal Footer -->
<div class="modal-footer py-2">
    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
    <a href="{{ url('/masters/quatation/edit') }}/${data.id}" class="btn btn-primary btn-sm">Edit</a>
</div>
`;

                $('#quotation-detail-body').html(html);
                $('#quotationViewModal').modal('show');
            }
        },
        error: function () {
            alert("Failed to load quotation details.");
        }
    });
});

});
</script>
@endpush
