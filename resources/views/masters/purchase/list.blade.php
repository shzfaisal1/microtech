@extends('master')

@section('main')
<style>
    .modal-fullscreen {
        max-width: 98%;
        margin: 1rem auto;
    }

    .dataTables_wrapper .dataTables_filter input,
    .dataTables_wrapper .dataTables_length select {
        font-size: 0.75rem;
        padding: 2px 4px;
        height: auto;
    }

    .table {
        font-size: 0.75rem;
        line-height: 1.1; /* reduced line-height */
    }

    .table thead th {
        background-color: #e9ecef;
        font-weight: 600;
        text-align: center;
        padding: 0.3rem 0.4rem;
        vertical-align: middle;
    }

    .table td {
        vertical-align: middle;
        padding: 0.2rem 0.4rem; /* reduce top-bottom padding */
        line-height: 1.1;
    }

    .table .action-buttons {
        display: flex;
        justify-content: center;
        gap: 0.25rem;
        flex-wrap: wrap;
    }

    .action-buttons .btn {
        padding: 0.2rem 0.4rem;
        font-size: 0.7rem;
    }

    .summary-fields input {
        font-size: 0.75rem;
        padding: 0.25rem 0.5rem;
    }

    @media (max-width: 768px) {
        .table thead {
            font-size: 0.7rem;
        }

        .table td,
        .table th {
            font-size: 0.65rem;
            padding: 0.2rem;
        }

        .summary-fields input {
            font-size: 0.65rem;
        }

        .action-buttons .btn {
            font-size: 0.6rem;
            padding: 0.2rem 0.4rem;
        }
    }
</style>

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
                        <table id="invoiceTable" class="table table-bordered table-striped w-100">
                            <thead class="table-light">
                                <tr>
                                     <th>ID</th>                          
                                    <th>PO No</th>
                                    <th>PO Date</th>
                                    <th>Vendor</th>
                                    <th>Company</th>
                                    <th>Location</th>
                                    <th>Items</th>
                                    <th>Total</th>
                                    <th>Net</th>
                                    <th>Actions</th>
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
<div class="modal fade" id="invoiceDetailModal" tabindex="-1" role="dialog" aria-labelledby="invoiceDetailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="max-width: 95%;">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Invoice Details</h5>
             <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>

            </div>
            <div class="modal-body" id="invoiceDetailContent">
                <div id="invoiceDynamicInfo" class="mb-4"></div>

                <div class="bg-light p-3 rounded shadow-sm summary-fields">
                    <div class="row g-2">
                        @php
                        $fields = [
                            'Net Amount' => 'net_amount',
                            'Packing / Courier' => 'packing_courier',
                            'Discount' => 'discount',
                            'Duty (%)' => 'duty',
                            'CHA (%)' => 'cha',
                            'Taxable Amount' => 'taxable_amount',
                            'Tax 1 (%)' => 'tax1',
                            'Tax 2 (%)' => 'tax2',
                            'Total' => 'total',
                            'Round Off' => 'round_off',
                        ];
                        @endphp

                        @foreach($fields as $label => $id)
                        <div class="col-md-3 mb-2">
                            <label class="small text-muted">{{ $label }}</label>
                            <input type="text" id="{{ $id }}" class="form-control form-control-sm bg-white" readonly>
                        </div>
                        @endforeach

                        <div class="col-12 text-end mt-2">
                           
                              <a href="" id="link"> <button class="btn btn-sm btn-outline-primary">  <i class="fas fa-edit"></i> Edit Summary Fields  </button></a>
                          
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function () {

    let table = $('#invoiceTable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        scrollX: true,
        ajax: {
            url: "{{ route('purchase-invoice.index') }}",
            data: function(d) {
                d.company_id = $('#filter_company').val();
                d.financial_year = $('#filter_financial_year').val();
            }
        },
        order: [[0, 'desc']],
        columns: [
            { data: 'id', name: 'id' },
            { data: 'po_no', name: 'po_no' },
            { data: 'po_date', name: 'po_date' },
            { data: 'vendor', name: 'vendor' },
            { data: 'company', name: 'company' },
            { data: 'location', name: 'location' },
            { data: 'items_count', name: 'items_count', orderable: false, searchable: false },
            { data: 'products_total', name: 'products_total', orderable: false, searchable: false },
            { data: 'net_amount', name: 'net_amount', orderable: false, searchable: false },
            { data: 'actions', name: 'actions', orderable: false, searchable: false, className: 'text-center' }
        ]
    });

    // Re-draw table on filter change
    $('#filter_company, #filter_financial_year').change(function() {
        table.draw();
    });

    // View button -> opens modal and loads invoice details
    $('#invoiceTable').on('click', '.btn-view', function () {
        const id = $(this).data('id');

        $('#invoiceDetailModal').modal('show');
        $('#invoiceDynamicInfo').html(`<div class="text-center my-3">
            <div class="spinner-border text-primary" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
        </div>`);

        $.ajax({
            url:  "{{ url('/masters/purchase-invoice/show') }}/" + id,
            method: 'GET',
            success: function (response) {
                if (response.status) {
                    const invoice = response.invoice;
                    const items = response.items;

                    let editUrl = `/masters/purchase-invoice/edit/${id}`;
                    // set edit link (the <a id="link"> wraps the Edit button)
                    $("#link").attr("href", editUrl);

                    // populate summary fields
                    $('#net_amount').val(invoice.net_amount ?? '');
                    $('#packing_courier').val(invoice.packing ?? '');
                    $('#discount').val(invoice.discount ?? '');
                    $('#duty').val(invoice.duty ?? '');
                    $('#cha').val(invoice.cha ?? '');
                    $('#taxable_amount').val(invoice.taxable_amount ?? '');
                    $('#tax1').val(invoice.tax1_amount ?? '');
                    $('#tax2').val(invoice.tax2_amount ?? '');
                    $('#total').val(invoice.total ?? '');
                    $('#round_off').val(invoice.round_off ?? '');

                    // build header + items table HTML
                    let html = `
                        <div class="mb-3">
                            <div class="row gy-2">
                                <div class="col-md-6"><strong>Company:</strong> ${invoice.company_detail?.company_name ?? ''}</div>
                                <div class="col-md-6"><strong>FY:</strong> ${invoice.financial_year?.financial_year ?? ''}</div>
                                <div class="col-md-6"><strong>Vendor:</strong> ${invoice.vendor?.name ?? ''}</div>
                                <div class="col-md-6"><strong>Invoice No / Date:</strong> ${invoice.invoice_number} / ${invoice.invoice_date}</div>
                                <div class="col-md-6"><strong>PO No / Date:</strong> ${invoice.po_no ?? '-'} / ${invoice.po_date ?? '-'}</div>
                                <div class="col-md-6"><strong>Currency / Value:</strong> ${invoice.currency ?? ''} / ${invoice.net_amount ?? ''}</div>
                                <div class="col-md-6"><strong>Buyer:</strong> ${invoice.buyer?.buyer_name ?? ''}</div>
                                <div class="col-md-6"><strong>Consignee:</strong> ${invoice.consignee?.name ?? ''}</div>
                                <div class="col-md-6"><strong>Inward No/Date:</strong> ${invoice.invoice_number ?? ''} / ${invoice.inward_date ?? ''}</div>
                            </div>
                        </div>
                        <table class="table table-bordered table-sm table-hover">
                            <thead class="table-light text-center">
                                <tr>
                                    <th>Make</th>
                                    <th>Model</th>
                                    <th>Serial No</th>
                                    <th>Condition</th>
                                    <th>VC No</th>
                                    <th>VC Date</th>
                                    <th>Stock Location</th>
                                    <th>Qty</th>
                                    <th>Price In INR</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>`;

                    items.forEach(item => {
                        html += `<tr>
                            <td>${item.product_id ?? ''}</td>
                            <td>${item.model ?? ''}</td>
                            <td>${item.serial_number ?? ''}</td>
                            <td>${item.condition ?? ''}</td>
                            <td>${item.vc_no ?? ''}</td>
                            <td>${item.vc_date ?? ''}</td>
                            <td>${item.stock_location ?? ''}</td>
                            <td>${item.qty ?? 1}</td>
                            <td>${item.price_in_INR ?? ''}</td>
                            <td>${item.total ?? ''}</td>
                        </tr>`;
                    });

                    html += `</tbody></table>`;
                    $('#invoiceDynamicInfo').html(html);

                } else {
                    $('#invoiceDynamicInfo').html('<div class="alert alert-danger">Could not load invoice data.</div>');
                }
            },
            error: function () {
                $('#invoiceDynamicInfo').html('<div class="alert alert-danger">Something went wrong. Please try again later.</div>');
            }
        });
    });
    
     $('#invoiceTable').on('click', '.btn-delete', function () {
         
         let id = $(this).data('id');
     
             $.ajax({
              url: '{{route("purchase-invoice.delete")}}',
              method: 'GET', 
              data: { id: id }, 
              dataType: 'json', 
              success: function(response) {
              
               $('#invoiceTable').DataTable().ajax.reload();
              },
              error: function(xhr, status, error) {
              
                console.error('Error:', error);
              },
              complete: function() {
               
                console.log('Request complete.');
              }
            });  
          
     });
    
});
</script>
@endpush

