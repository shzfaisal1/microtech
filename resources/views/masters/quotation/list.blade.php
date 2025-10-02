
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
                        <select id="filter_company" class="form-control" name="company_id">
                            <option value="">All</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="filter_financial_year">Financial Year:</label>
                        <select id="filter_financial_year" class="form-control" name="financial_year">
                            <option value="">All</option>
                            @foreach ($financialYears as $fy)
                                <option value="{{ $fy->id }}">{{ $fy->financial_year }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                    @if(session('invoice_delete'))
                    <div class="alert alert-danger">{{ session('invoice_delete') }}</div>
                    @endif

                    <h5 class="mb-3">Quotation</h5>
                    <div class="table-responsive">
                        <table id="quotation" class="table table-bordered table-striped w-100">
                            <thead class="table-light">
                                <tr>
                                   <th>Sr.No</th>
                                        <th>Quotation No</th>
                                        <th>Quotation Date</th>
                                        <th>Client Name</th>
                                        <th>Subject</th>
                                        <th>Quarter</th>
                                        <th>Client Group</th>
                                        <th>Note</th>   
                                        <th>Net Amount</th>
                                        <th>Tax Value 1</th>
                                        <th>Tax Amount 1</th>
                                         <th>Tax Value 2</th>
                                        <th>Tax Amount 2</th>
                                        <th>Total Amount</th>
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

<!-- Invoice Detail Modal -->
<!-- Updated Modal -->
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
  
 let table = $('#quotation').DataTable({
     pageLength: 10,
    filter: true,
    deferRender: true,
    scrollY: 200,
    scrollCollapse: true,
    scroller: true,
    "searching": true,

    ajax: {
        url: "{{ route('quatation.index') }}",
        data: function(d) {
            d.company_id = $('#filter_company').val();
            d.financial_year = $('#filter_financial_year').val();
        }
    }, order: [[0, 'desc']],
    
  columns: [
    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
    { data: 'quotation_no', name: 'quotation_no' },
    { data: 'quotation_date', name: 'quotation_date' },
    { data: 'client_name_id', name: 'client_name_id' },
    { data: 'subject', name: 'subject' },
    { data: 'quarter', name: 'quarter' },
    { data: 'clientgroup', name: 'clientgroup' },
    { data: 'note', name: 'note' },
    { data: 'net_amount', name: 'net_amount' },
    { data: 'tax_value_1', name: 'tax_value_1' },
    { data: 'tax_value_amount_1', name: 'tax_value_amount_1' },
    { data: 'tax_value_2', name: 'tax_value_2' },
    { data: 'tax_value_amount_2', name: 'tax_value_amount_2' },
    { data: 'grand_total', name: 'grand_total' },
    { data: 'company', name: 'company' },
    { data: 'financial_year', name: 'financial_year' },
    { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center' }
]

});

// Re-draw table on filter change
$('#filter_company, #filter_financial_year').change(function() {
    table.draw();
});
$(document).on('click', '.view-po', function (e) {
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
