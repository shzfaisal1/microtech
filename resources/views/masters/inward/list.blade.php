@extends('master')

@section('main')
<div class="search-client-info">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="filter_company">Company Name:</label>
                            <select id="filter_company" class="form-control">
                                <option value="">All</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="filter_financial_year">Financial Year:</label>
                            <select id="filter_financial_year" class="form-control">
                                <option value="">All</option>
                                @foreach ($financialYears as $fy)
                                    <option value="{{ $fy->id }}">{{ $fy->financial_year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <h5 class="mb-3">Inward List 00</h5>
                    <div class="table-responsive">
                        <table id="service_stamping" class="table table-bordered table-striped w-100">
                            <thead class="table-light">
                                <tr>
                                    <th>Sr No</th>
                                    <th>Inwarde No</th>
                                    <th>Receive Date</th>
                                    <th>Client Group</th>
                                    <th>Client Name</th>
                                    <th>Contact Person</th>
                                    <th>Company Name</th>
                                    <th>Financial Year</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- View Modal -->
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
    let table = $('#service_stamping').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        scrollX: true,
        language: {
            processing: '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>'
        },
        ajax: {
            url: "{{ route('inward.index') }}",
            data: function(d) {
                d.company_id = $('#filter_company').val();
                d.financial_year = $('#filter_financial_year').val();
            }
        },
        order: [[0, 'desc']],
        columns: [
            { data: 'id', name: 'id' },
            { data: 'inward_no', name: 'inward_no' },
            { data: 'recieve_date', name: 'recieve_date' },
            { data: 'client_group_id', name: 'client_group_id' },
            { data: 'client_name_id', name: 'client_name_id' },
            { data: 'contact_person_id', name: 'contact_person_id' },
            { data: 'company_name', name: 'company_name' },
            { data: 'finance_name', name: 'finance_name' },

            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });

    $('#filter_company, #filter_financial_year').change(function() {
        table.draw();
    });

    $(document).on('click', '.view-amc', function (e) {
        e.preventDefault();
        const id = $(this).data('id');

        $.ajax({
            url: "{{ url('/masters/contracts/service-contract/show/modal') }}/" + id,
            type: 'GET',
            success: function (res) {
                console.log(res)
                if (res.length > 0) {
                    const data = res[0];
                    let html = `
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div><strong>Company Name:</strong> ${data.company?.company_name || '-'}</div>
                            <div><strong>AMC No / Date:</strong> ${data.sc_no || '-'} / ${data.sc_date || '-'}</div>
                            <div><strong>Quarter:</strong> ${data.quarter?.name || '-'}</div>
                            <div><strong>Status:</strong> ${
                                data.status == 1 ? 'New' :
                                data.status == 2 ? 'Renew' :
                                data.status == 3 ? 'Terminate' : '-'
                            }</div>
                            <div><strong>Contract Period:</strong> ${data.contract_period_from || '-'} To ${data.contract_period_to || '-'}</div>
                        </div>
                        <div class="col-md-4">
                            <div><strong>Financial Year:</strong> ${data.finance?.financial_year || '-'}</div>
                            <div><strong>Remark:</strong> ${data.remark || '-'}</div>
                            <div><strong>Employee Name:</strong> ${data.employee_detail?.name || '-'}</div>
                        </div>
                        <div class="col-md-4">
                            <div><strong>Client Group:</strong> ${data.client_group?.name || '-'}</div>
                            <div><strong>Client Name:</strong> ${data.client_name?.client_name || '-'}</div>
                            <div><strong>Address:</strong> ${data.client_name?.address || '-'}</div>
                            <div><strong>Contact Person:</strong> ${data.contact_person?.name || '-'}</div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered text-center align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Make</th>
                                    <th>Model</th>
                                    <th>Serial No.</th>
                                    <th>Capacity</th>
                                    <th>Table Location</th>
                                    <th>Last St. Qtr</th>
                                    <th>Late Fees</th>
                                    <th>Contract Amount</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>`;

                    data.products.forEach(item => {
                        html += `
                            <tr>
                                <td>${item.make_data?.name || '-'}</td>
                                <td>${item.models?.model_name || '-'}</td>
                                <td>${item.serial_no ? JSON.parse(item.serial_no).join(', ') : '-'}</td>
                                <td>${item.capacity || '-'}</td>
                                <td>${item.table_location || '-'}</td>
                                <td>${item.quarter?.name || '-'}</td>
                                <td>${item.late_fees || '-'}</td>
                                <td>${parseFloat(item.contract_amount || 0).toFixed(2)}</td>
                                <td>${item.description || '-'}</td>
                            </tr>`;
                    });

                    html += `
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-md-6 offset-md-6">
                            <div class="p-2 border rounded bg-light">
                                <div class="d-flex justify-content-between py-1">
                                    <span>Net Amount:</span>
                                    <strong>${parseFloat(data.net_amount || 0).toFixed(2)}</strong>
                                </div>
                                <div class="d-flex justify-content-between py-1">
                                    <span>Tax 1 (${parseFloat(data.tax1 || 0)}%) :</span>
                                    <strong>${parseFloat(data.tax1_amount || 0).toFixed(2)}</strong>
                                </div>
                                <div class="d-flex justify-content-between py-1">
                                    <span>Tax 2 (${parseFloat(data.tax2 || 0)}%) :</span>
                                    <strong>${parseFloat(data.tax2_amount || 0).toFixed(2)}</strong>
                                </div>
                                <div class="d-flex justify-content-between py-1">
                                    <span>Total:</span>
                                    <strong>${parseFloat(data.total_amount || 0).toFixed(2)}</strong>
                                </div>
                                <div class="d-flex justify-content-between py-1">
                                    <span>Round Off:</span>
                                    <strong>${parseFloat(data.round_off || 0).toFixed(2)}</strong>
                                </div>
                                <hr class="my-2">
                                <div class="d-flex justify-content-between py-1">
                                    <strong class="text-primary">Grand Total:</strong>
                                    <strong class="text-primary">${parseFloat(data.grand_total || 0).toFixed(2)}</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer py-2">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                        <a href="{{ url('/masters/contract/amc/edit') }}/${data.id}" class="btn btn-primary btn-sm">Edit</a>
                    </div>`;

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
