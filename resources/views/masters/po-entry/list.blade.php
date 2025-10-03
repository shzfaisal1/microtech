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

                    @if(session('invoice_delete'))
                    <div class="alert alert-danger">{{ session('invoice_delete') }}</div>
                    @endif

                    <h5 class="mb-3">Purchase Invoices</h5>
                    <div class="table-responsive">
                        <table id="po_entry" class="table table-bordered table-striped w-100">
                            <thead class="table-light">
                                <tr>
                                   <th>Sr.No</th>
                                        <th>Company</th>
                                        <th>Financial Year</th>
                                        <th>PO No</th>
                                        <th>PO Date</th>
                                        <th>Vendor</th>
                                        <th>Contact Person</th>
                                        <th>Contact Person Phone</th>
                                        <th>Quantity</th>
                                        <th>Total Amount</th>
                                        <th>INR Amount</th>
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
<div class="modal fade" id="poViewModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content" style="background: white">
      <div class="modal-header">
        <h5 class="modal-title">Invoice Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
      </div>
      <div class="modal-body" id="po-detail-body">
    
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
$(document).ready(function () {
  
  let table = $('#po_entry').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    scrollX: true,
    ajax: {
        url: "{{ route('po.index') }}",
        data: function(d) {
            d.company_id = $('#filter_company').val();
            d.financial_year = $('#filter_financial_year').val();
        }
    },
    order: [[0, 'desc']],
    columns: [
    { data: 'id', name: 'id' },
    { data: 'company_id', name: 'company_id' },
    { data: 'financial_year', name: 'financial_year' },
    { data: 'po_no', name: 'po_no' },
    { data: 'po_date', name: 'po_date' },
    { data: 'vendor_id', name: 'vendor_id' },
    { data: 'contact_person_name', name: 'contact_person_name' },
    { data: 'contact_person_contact', name: 'contact_person_contact' },
    { data: 'quantity', name: 'quantity' },
    { data: 'total', name: 'total' },
    { data: 'priceINR', name: 'priceINR' },
    { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center' }
]

});

// Re-draw table on filter change
$('#filter_company, #filter_financial_year').change(function() {
    table.draw();
});
$(document).on('click', '.view-po', function(e) {
    e.preventDefault();
    const id = $(this).data('id');
	

  $.ajax({
    url: '/po/' + id,
    type: 'GET',
    success: function (res) {
        if (res.length > 0) {
            const data = res[0];

            let html = `
                <h5 class="mb-3 fw-bold">PO No: ${data.po_no} <small class="text-muted">(${data.po_date})</small></h5>

                <div class="row mb-3">
                    <div class="col-md-6"><strong>Company Name:</strong> ${data.company_detail?.company_name || '-'}</div>
                    <div class="col-md-6"><strong>Vendor Name:</strong> ${data.vendor?.name || '-'}</div>
                    <div class="col-md-6"><strong>Financial Year:</strong> ${data.financial_year?.financial_year || '-'}</div>
                    <div class="col-md-6"><strong>Contact Person:</strong> ${data.contact_persons?.name || '-'}</div>
                    <div class="col-md-6"><strong>Currency / Value:</strong> ${data.currency_name || '-'} / ${data.currency_value || '-'}</div>
                </div>

                <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Price in INR</th>
                        </tr>
                    </thead>
                    <tbody>
            `;

            let totalQty = 0, totalPrice = 0, totalAmount = 0, totalINR = 0;

            data.po_entry.forEach(entry => {
                html += `
                    <tr>
                        <td>${entry.make_name || entry.make_id || '-'}</td>
                        <td>${entry.model_name || entry.model_id || '-'}</td>
                        <td>${parseFloat(entry.price).toFixed(2)}</td>
                        <td>${entry.quantity}</td>
                        <td>${parseFloat(entry.total).toFixed(2)}</td>
                        <td>${parseFloat(entry.priceINR).toFixed(2)}</td>
                    </tr>
                `;

                totalQty += parseFloat(entry.quantity);
                totalPrice += parseFloat(entry.price);
                totalAmount += parseFloat(entry.total);
                totalINR += parseFloat(entry.priceINR);
            });

            html += `
                    </tbody>
                    <tfoot class="table-light fw-bold">
                        <tr>
                            <td colspan="2" class="text-end">Total</td>
                            <td>${totalPrice.toFixed(2)}</td>
                            <td>${totalQty}</td>
                            <td>${totalAmount.toFixed(2)}</td>
                            <td>${totalINR.toFixed(2)}</td>
                        </tr>
                    </tfoot>
                </table>
                </div>
            `;

            $('#po-detail-body').html(html);
            $('#poViewModal').modal('show');
        }
    },
    error: function (xhr) {
        alert("Failed to load PO details.");
    }
});

});
   
});

</script>
@endpush
