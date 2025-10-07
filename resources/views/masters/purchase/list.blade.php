@extends('master')

@section('main')
<style>
  /* Small visual refinements */
.modal-header .modal-title { font-size: 1rem; }
.table td, .table th { vertical-align: middle; }
.table thead th { font-size: .85rem; }
.table tbody td { font-size: .9rem; }
.modal-body .small { font-size: .8rem; }

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
                                     <th>Sr No.</th>                          
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

<!-- Trigger not required if you open via JS -->
<div class="modal fade" id="invoiceModal" tabindex="-1" role="dialog" aria-labelledby="invoiceModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="invoiceModalLabel">Purchase Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>

      <div class="modal-body">
        <div class="row mb-2">
          <div class="col-md-7">
                <div class="font-weight-bold">Company Name</div>
            <div><strong id="company_name">&nbsp;</strong></div>
            <div class="small text-muted" id="company_extra">&nbsp;</div>
          </div>
          <div class="col-md-5 text-md-right">
            <div class="small text-muted">Invoice / PO</div>
            <div id="invoice_meta" class="font-weight-bold">&nbsp;</div>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <div class="font-weight-bold">Vendor</div>
            <div id="vendor_name">&nbsp;</div>
            <div class="small text-muted" id="vendor_contact">&nbsp;</div>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table table-sm table-bordered mb-0" id="invoice_items_table">
            <thead class="thead-light">
              <tr class="text-center">
                <th>Sr. No.</th>
                <th>Product Name</th>
                <th>Model</th>
                <th>Rate</th>
                <th>Disc</th>
                <th>Qty</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>

        <div class="row mt-3">
          <div class="col-md-7">
            <div class="small text-muted" id="notes">&nbsp;</div>
          </div>
          <div class="col-md-5">
                 <div class="d-flex justify-content-between"><div class="text-muted">Net Amount</div><div id="net_amount_bottom" class="font-weight-bold">0.00</div></div>
            <div class="d-flex justify-content-between"><div class="text-muted">Packing</div><div id="packing_amount">0.00</div></div>
            <div class="d-flex justify-content-between"><div class="text-muted">Discount</div><div id="discount_amount">0.00</div></div>
                   <div class="d-flex justify-content-between"><div class="text-muted">Taxable Amount</div><div id="taxable_amount">0.00</div></div>
                       <div class="d-flex justify-content-between"><div class="text-muted">Tax 1</div><div id="tax1">0.00</div></div>
                        <div class="d-flex justify-content-between"><div class="text-muted">Total</div><div id="total">0.00</div></div>
                      </div>
                    </div>
                  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-sm" id="printInvoiceBtn">Print</button>
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
    $('#invoiceTable').on('click', '', function () {
    const id = $(this).data('id');

    $('#invoiceDetailModal').modal('show');
    $('#invoiceDynamicInfo').html(`
        <div class="text-center my-3">
            <div class="spinner-border text-primary" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    `);

   
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
     
     
     // generate pdf 
     
     $('#invoiceTable').on('click', '.btn-print', function () {
        const id = $(this).data('id');

        alert(id);     

        $.ajax({
            url:  "{{ url('/masters/purchase-invoice/invoice-pdf') }}/" + id,
            method: 'GET',
            success: function (response) {
                if (response.status) {
                    
                
                } else {
                }
            },
            error: function () {
               
            }
        });
    });  
     //
     
     // to open modal//
// utility: safe text set
function setText(selector, value) {
  $(selector).text(value === undefined || value === null ? '' : value);
}

// format currency (simple)
function fmt(v) {
  if (v === undefined || v === null || v === '') return '0.00';
  var n = parseFloat(v);
  if (isNaN(n)) return v;
  return n.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 2 });
}

$('#invoiceTable').on('click', '.btn-view', function () {
  var id = $(this).data('id');

  $.ajax({
    url: "{{ url('/masters/purchase-invoice/show') }}/" + id,
    method: 'GET',
    dataType: 'json',
    success: function (response) {
        console.log(response);
      if (!response || !response.status) {
        $('#invoiceModal').modal('hide');
        alert('Invoice not found');
        return;
      }

      var invoice = response.invoice || {};
      var items = Array.isArray(response.items) ? response.items : [];
      var cal = response.cal || {};

      // Header / meta
      setText('#company_name', invoice.company_name || invoice.vendor_name || '');
      var meta = [];
      if (invoice.po_no) meta.push('PO: ' + invoice.po_no);
      if (invoice.po_date) meta.push('Date: ' + invoice.po_date);
      setText('#invoice_meta', meta.join(' | '));

      // Vendor
      setText('#vendor_name', invoice.vendor_name || '');
      setText('#vendor_contact', invoice.contact_person || ''); // adjust key if available

      // Notes
      setText('#notes', (cal && cal.notes) ? cal.notes : '');

      // Packing / discount / net amounts (use cal first, fallback to calculated)
      setText('#packing_amount', fmt(cal.packing || cal.packing_amount || 0));
      setText('#discount_amount', fmt(cal.discount || cal.discount_amount || 0));
    setText('#taxable_amount', fmt(cal.taxable_amount || cal.taxable_amount || 0));
    setText('#tax1', fmt(cal.tax1_amount || cal.tax1_amount || 0));
       setText('#total', fmt(cal.final_total || cal.final_total || 0));
    
      // Items: rebuild tbody
      var $tbody = $('#invoice_items_table tbody').empty();
      if (items.length === 0) {
        $tbody.append('<tr><td colspan="12" class="text-center">No items</td></tr>');
      } else {
        items.forEach(function (it, idx) {
          // adapt keys from your pop.*; common keys: product_name, model, serial_no, imei, specification, warranty, packing, rate, discount, quantity, price, tax, total
          var prod = it.make_name || it.make_name || '';
          var model = it.model_name || '';
          var rate = fmt(it.rate || it.price || 0);
          var discount = fmt(it.discount || 0);
          var qty = it.quantity || it.qty || 0;
          var total = fmt(it.amount || it.price_total || it.price || 0);

          var row = '<tr>' +
            '<td class="text-center align-middle">' + (idx + 1) + '</td>' +
            '<td class="align-middle">' + prod + '</td>' +
            '<td class="text-center align-middle">' + model + '</td>' +
            '<td class="text-right align-middle">' + rate + '</td>' +
            '<td class="text-right align-middle">' + discount + '</td>' +
            '<td class="text-center align-middle">' + qty + '</td>' +
            '<td class="text-right align-middle">' + total + '</td>' +
            '</tr>';
          $tbody.append(row);
        });
      }

      // Net amount: prefer cal.net_amount else compute sum of item totals
      if (cal && (cal.net_amount !== undefined && cal.net_amount !== null)) {
        setText('#net_amount', '₹' + fmt(cal.net_amount));
        setText('#net_amount_bottom', '₹' + fmt(cal.net_amount));
      } else {
        // compute from items
        var sum = 0;
        items.forEach(function(it){
          var t = parseFloat(it.total || it.price_total || it.price || 0);
          if (!isNaN(t)) sum += t;
        });
        sum += parseFloat(cal.packing || 0) - parseFloat(cal.discount || 0 || 0);
        setText('#net_amount', '₹' + fmt(sum));
        setText('#net_amount_bottom', '₹' + fmt(sum));
      }

      // show modal after filling
      $('#invoiceModal').modal('show');
    },
    error: function () {
      $('#invoiceDynamicInfo').html('<div class="alert alert-danger">Something went wrong. Please try again later.</div>');
    }
  });
});
     
     //
    
});


</script>
@endpush

