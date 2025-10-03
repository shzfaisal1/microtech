
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

                    <h5 class="mb-3">Sales Payment List</h5>
                    <div class="table-responsive">
                        <table id="sale_payment_table" class="table table-bordered table-striped w-100">
                            <thead class="table-light">
                                <tr>
                                     <th>Sr.No</th>
                                        <th>Voucher No</th>
                                        <th>Voucher Date</th>
                                        <th>Client Name</th>
                                        <th>Account</th>
                                        <th>Type</th>
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
<div class="modal fade" id="challanViewModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" style="max-width: 50%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Proforma Detail</h5>
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
  
 let table = $('#sale_payment_table').DataTable({
     pageLength: 10,
    filter: true,
    deferRender: true,
    scrollY: 200,
    scrollCollapse: true,
    scroller: true,
    "searching": true,

    ajax: {
        url: "{{ route('sale.payment.index') }}",
        data: function(d) {
            d.company_id = $('#filter_company').val();
            d.financial_year = $('#filter_financial_year').val();
        }
    }, order: [[0, 'desc']],
    
  columns: [
    { data: 'id', name: 'id', orderable: false, searchable: false },
    { data: 'voucher_no', name: 'voucher_no' },
    { data: 'voucher_date', name: 'voucher_date' },
    { data: 'clientName', name: 'clientName' },
    { data: 'account', name: 'account' },
    { data: 'gst_type', name: 'gst_type' },


    { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center' }
]

});

// Re-draw table on filter change
$('#filter_company, #filter_financial_year').change(function() {
    table.draw();
});
$(document).on('click', '.view-challan', function (e) {
    e.preventDefault();
    const id = $(this).data('id');
    alert(id);
    $.ajax({
        url: "{{ url('/masters/challan/show/modal') }}/" + id,
        type: 'GET',
        success: function (res) {
            console.log(res);
            if (res.length > 0) {
                const data = res[0];
                const transportMethods = {
                    '1': 'By Courier',
                    '2': 'By Hand',
                    '3': 'By Transport',
                    };

                    const remarkText = transportMethods[data.desp_through_id] || '-';
                    console.log(remarkText)
                let html = `
                     <div class="row mb-3">
    <div class="col-md-4"><strong>Company Name :</strong> ${data.company?.company_name || '-'}</div>
    <div class="col-md-4"><strong>Financial Year :</strong> ${data.finance?.financial_year || '-'}</div>
    <div class="col-md-4"><strong>Desp Through :</strong> ${remarkText}</div>

    <div class="col-md-4"><strong>Challan No/ Date :</strong> ${data.challan_no || '-'} / ${data.challan_date || '-'}</div>
    <div class="col-md-4"><strong>Challan Status :</strong> ${data.challan_status || '-'}</div>
    <div class="col-md-4"><strong>Remark :</strong> ${data.remarks || '-'}</div>

    <div class="col-md-4"><strong>Quarter :</strong> ${data.quarter?.name || '-'}</div>
    <div class="col-md-4"><strong>PO No/ Date :</strong> ${data.po_no || '-'} / ${data.po_date || '-'}</div>
    <div class="col-md-4"><strong>Invoice No/ Date :</strong> ${data.invoice_no || '-'} / ${data.invoice_date || '-'}</div>
  </div>

  <hr class="my-2">

  <div class="row mb-3">
    <div class="col-md-4"><strong>Client Group :</strong> ${data.client_group?.name || '-'}</div>
    <div class="col-md-4"><strong>Client Name :</strong> ${data.client_name?.client_name || '-'}</div>
    <div class="col-md-4"><strong>Contact Person :</strong> ${data.contact_person?.name || '-'}</div>
    <div class="col-md-4"><strong>LUT No/ ARN No :</strong> ${data.lut_no || '-'}</div>
    <div class="col-md-4"><strong>LUT Note :</strong> ${data.lut_note || '-'}</div>
  </div>

  <hr class="my-2">

  <div class="row mb-3">
    <div class="col-md-4"><strong>Shipping Address :</strong> ✅ Same as Client Address</div>
    <div class="col-md-4"><strong>Client Name :</strong> ${data.client_name?.client_name || '-'}</div>
    <div class="col-md-4"><strong>Contact Person :</strong> ${data.contact_person?.name || '-'}</div>
    <div class="col-md-8"><strong>Client Address :</strong> ${data.client_name?.address || '-'}</div>
    <div class="col-md-4"><strong>Contact No :</strong> ${data.contact_person?.contact_1 || '-'}</div>
    <div class="col-md-4"><strong>Email :</strong> ${data.contact_person?.email || '-'}</div>
    <div class="col-md-4"><strong>PAN No :</strong> ${data?.pan_no || '-'}</div>
    <div class="col-md-4"><strong>GSTIN :</strong> ${data?.gstin || '-'}</div>
    <div class="col-md-4"><strong>State Code :</strong> ${data?.state.name || '-'}</div>
  </div>

                    <div class="table-responsive">
                        <table class="table table-bordered text-center align-middle">
                               <thead class="table-light">
      <tr>
        <th>Serial No.</th>
        <th>Adaptor</th>
        <th>Draft Shield</th>
        <th>In-Use Cover</th>
        <th>Batteries</th>
        <th>Pan</th>
        <th>Pan Support</th>
        <th>Weighing Pan</th>
        <th>Calibration Wt</th>
        <th>Cable</th>
        <th>Other</th>
        <th>Other Details</th>
        <th>Quantity</th>
        <th>Rate</th>
        <th>Amount</th>
        <th>Type of SAC</th>
      </tr>
    </thead>
                            <tbody>
                `;

                let totalPrice = 0;

                data.product_sale.forEach(item => {
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
    <a href="{{ url('/masters/challan/edit') }}/${data.id}" class="btn btn-primary btn-sm">Edit</a>
</div>
`;

                $('#quotation-detail-body').html(html);
                $('#challanViewModal').modal('show');
            }
        },
        error: function () {
            alert("Failed to load quotation details.");
        }
    });
});


   
});
// $(document).on('click', '.print-challan', function () {
//     let challanId = $(this).data('id');
    
//     // // Option 1: Open print preview page
//     window.open('/challan/print/' + challanId, '_blank');

//     // Option 2 (PDF): Download PDF directly
//     window.location.href = '/challan/print-pdf/';
// });
$(document).on('click', '.print-challan', function () {
    const challanId = $(this).data('id');
    window.open('/challan/preview/' + challanId, '_blank'); // open preview in new tab
});
</script>
@endpush
