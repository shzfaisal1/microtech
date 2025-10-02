@extends('master')

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>

<style>
    .bootstrap-tagsinput {
        width: 100% !important;
        min-height: 38px;
    }
    .scrollable-select {
        max-height: 150px;
        overflow-y: auto;
    }
    #pendingInvoiceTable { table-layout: fixed; }
    #pendingInvoiceTable th,
    #pendingInvoiceTable td {
        vertical-align: middle;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    #pendingInvoiceTable .form-control-sm {
        padding: .25rem .4rem;
        font-size: .875rem;
    }
    #pendingInvoiceTable input.text-end {
        text-align: right !important;
    }
    #pendingInvoiceTable tfoot th,
    #pendingInvoiceTable tfoot td {
        padding: .45rem .6rem;
    }
    #return_amount_input {
        font-weight: 500;
    }
</style>

@section('main')

<!-- Page Header -->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Proforma Entry</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Challan</li>
        </ol>
    </div>
</div>

<!-- Search Client Info -->
<div class="search-client-info">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        
                        <!-- Company -->
                        <div class="col-md-6 mb-3">
                            <label>Company Name <span class="text-danger">*</span> :</label>
                            <select class="form-control select2" id="company_id" name="company_id">
                                <option value="">Select Company</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Financial Year -->
                        <div class="col-md-6 mb-3">
                            <label>Financial Year <span class="text-danger">*</span> :</label>
                            <select class="form-control select2" id="financial_id" name="financial_id">
                                <option value="">Select Year</option>
                                @foreach($financial as $fy)
                                    <option value="{{ $fy->id }}">{{ $fy->financial_year }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Receipt Details -->
<div class="card">
    <div class="card-header bg-light-green">
        <h5 class="mb-0">Receipt Details</h5>
    </div>
    <div class="card-body">
        <div class="row">
            
            <!-- Voucher No/Date -->
            <div class="col-md-4 mb-3">
                <label>Voucher No/Date <span class="text-danger">*</span></label>
                <div class="input-group">
                    <input type="text" class="form-control" id="vc_no" value="{{ $vc_no }}">
                    <input type="date" class="form-control" value=""  id="vc_date">
                </div>
            </div>

            <!-- Client Group -->
            <div class="col-md-4 mb-3">
                <label>Client Group <span class="text-danger">*</span></label>
                <div class="input-group">
                    <select class="form-control" id="client_group">
                        @foreach($clients_grp as $group)
                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                        <a href="{{ url('/masters/company-details') }}" class="btn btn-light">
                            <i class="fa fa-plus text-success"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Client -->
            <div class="col-md-4 mb-3">
                <label>Client <span class="text-danger">*</span></label>
                <div class="input-group">
                    <select class="form-control" id="client_id">
                        <option value="">Select</option>
                    </select>
                    <div class="input-group-append">
                        <a href="{{ url('/masters/company-details') }}" class="btn btn-light">
                            <i class="fa fa-plus text-success"></i>
                        </a>
                    </div>
                </div>
                <small class="text-danger" id="current_balance">Current Balance :</small>
            </div>

            <!-- Account -->
            <div class="col-md-4 mb-3">
                <label>Account <span class="text-danger">*</span></label>
                <div class="input-group">
                    <select class="form-control" id="account_id">
                        @if(isset($Accounts))
                            @foreach ($Accounts as $ac)
                                <option value="{{ $ac->id }}">{{ $ac->account_name }}</option>  
                            @endforeach
                        @endif
                    </select>
                    <div class="input-group-append">
                        <a href="{{ url('/masters/company-details') }}" class="btn btn-light">
                            <i class="fa fa-plus text-success"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Payment Mode -->
            <div class="col-md-4 mb-3">
                <label>Payment Mode <span class="text-danger">*</span></label>
                <select class="form-control" id="payment_mode">
                    <option value="1">Cash</option>
                    <option value="2">Cheque</option>
                    <option value="3">NEFT</option>
                    <option value="4">RTGS</option>
                    <option value="5">Other</option>       
                </select>
            </div>

            <!-- Remark -->
            <div class="col-md-4 mb-3">
                <label>Remark</label>
                <input type="text" class="form-control" id="remark">
            </div>

            <!-- Payment Mode Extra Fields -->
            <div class="nfet"></div>

        </div>

        <!-- Invoice Table -->
     <div class="mt-3">
    <table class="table table-bordered table-striped table-sm" id="pendingInvoiceTable" style="table-layout:fixed;">
        <thead class="bg-dark text-white">
            <tr>
                <th style="width:3%;"><input type="checkbox" id="select_all_invoices"></th>
                <th style="width:15%;">Invoice No</th>
                <th style="width:10%;">Invoice Date</th>
                <th style="width:12%;">Client</th>
                <th style="width:12%;">Company</th>
                <th style="width:8%;">Financial Year</th>
                <th style="width:6%;">Type</th>
                <th style="width:8%;" class="text-end">Total</th>
                <th style="width:8%;" class="text-end">Balance</th>
                <th style="width:11%;">Amount</th>
                <th style="width:7%;">TDS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="11" class="text-center">No data available in table</td>
            </tr>
        </tbody>

        <tfoot>
            <!-- Advanced Paid row: keeps columns = 11 -->
            <tr class="align-middle">
                <th colspan="8" class="text-end">Advanced Paid</th>
                <th class="text-end">-</th> <!-- under Balance column -->
                <th> <!-- under Amount column -->
                    <input type="number" step="0.01" id="advanced_paid_input" class="form-control form-control-sm text-end" value="">
                </th>
                <th></th> <!-- TDS column -->
            </tr>

            <!-- Total row -->
            <tr>
                <th colspan="8" class="text-end">Total</th>
                <th class="text-end" id="total_balance_display">-</th>
                <th>
                    <input type="text" id="total_amount_input" class="form-control form-control-sm text-end" readonly value="0.00">
                </th>
                <th></th>
            </tr>
        </tfoot>
    </table>

  
</div>

        <!-- Return Amount -->
        <div class="row mt-2">
            <div class="col-md-3">
                <label class="form-label">Return Amount</label>
                <input type="text" id="return_amount_input" class="form-control form-control-sm text-end" value="0.00">
            </div>
        </div>

        <!-- Buttons -->
        <div class="text-end mt-3">
          <button type="button" id="btn_add_receipt" class="btn btn-primary">Add</button>

            <button type="reset" class="btn btn-secondary">Clear</button>
        </div>

    </div>
</div>

@endsection
	@push('scripts')
    <!-- Bootstrap Tags Input JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

<script>

    
$(document).ready(function () {

$("#payment_mode").change(function() {
    let payment_id = $(this).val();
    $(".nfet").empty(); // Clear previous content first

    if (payment_id == 3) {
        $(".nfet").html(`
            <div class="col-md-4 mb-3">
                <label>Ref No/Date <span class="text-danger">*</span></label>
                <div class="input-group">
                    <input type="text" class="form-control" id="ref_no" value="">
                    <input type="date" class="form-control" id="ref_date" value="">
                </div>
            </div>
        `);
    }
});


      $('#client_group').on('change', function () {
     
        let client_gr_id = $(this).val();
        $('#client_id').empty().append('<option value="">Loading...</option>');

        if (client_gr_id) {
            $.ajax({
                url: '{{ route("quatation.client_group") }}',
                type: 'POST',
                data: {
                    client_gr_id: client_gr_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    console.log(response.client_grp)
                
                    $('#client_id').empty().append('<option value="">Select Client Name</option>');
                    $.each(response.client_grp, function (key, client) {
                        $('#client_id').append('<option value="' + client.id + '">' + client.client_name + '</option>');
                    });

                  
                }
            });
        } else {
            $('#client_id').empty().append('<option value="">Select Client Name</option>');
        }
    });


      $('#financial_id').on('change', function () {
        let finYearId = $(this).val();

        if (finYearId) {
            $.ajax({
                url: "{{ route('sale.payment.generateQuotationNo') }}",
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    fin_year_id: finYearId
                },
                success: function (response) {
                    if (response.status) {
                        $('#vc_no').val(response.vc_no);
                    } else {
                        alert(response.message || 'Could not generate voucher number.');
                    }
                },
                error: function () {
                    alert('Something went wrong. Please try again.');
                }
            });
        }
    });


 // when client dropdown changes
$("#client_id").change(function(){
    $("#current_balance").empty();
    var id = $(this).val();
    if(!id) {
        return;
    }

    $.ajax({
        url: "{{ url('/masters/sale-payment/get-client-data') }}/" + id,
        type: 'GET',
        success: function(response) {
            var $tbody = $('#pendingInvoiceTable tbody');
            $tbody.empty();

            if(!response || response.length === 0){
                $tbody.append('<tr><td colspan="11" class="text-center">No invoices found</td></tr>');
                recalcFooterTotal();
                return;
            }

            // Build invoice rows
            response.forEach(function(row){
                // update current balance (you may want aggregated value instead)
                $("#current_balance").text("Current Balance : " + (row.balance_amount || 0));

                var invoiceNo = row.invoice_no || '';
                var invoiceDate = row.invoice_date || '';
                var client = row.client_name || '';
                var company = row.company_name || '';
                var finYear = row.fy || '';
                var type = row.gst_type || '';
                var total = parseFloat(row.total || 0).toFixed(2);
                var balance = parseFloat(row.balance_amount || 0).toFixed(2);

                var tr = '<tr data-id="'+ (row.id || '') +'">' +
                    '<td class="text-center"><input type="checkbox" class="select-invoice"></td>' +
                    '<td>' + escapeHtml(invoiceNo) + '</td>' +
                    '<td>' + escapeHtml(invoiceDate) + '</td>' +
                    '<td>' + escapeHtml(client) + '</td>' +
                    '<td>' + escapeHtml(company) + '</td>' +
                    '<td>' + escapeHtml(finYear) + '</td>' +
                    '<td>' + escapeHtml(type) + '</td>' +
                    '<td class="text-end">' + total + '</td>' +
                    '<td class="text-end">' + balance + '</td>' +
                    // Amount input (default to balance)
                    '<td><input type="number" step="0.01" class="form-control amount-input" value=""></td>' +
                    // TDS input
                    '<td><input type="number" step="0.01" class="form-control tds-input" value="0.00"></td>' +
                    '</tr>';

                $tbody.append(tr);
            });

            // after building rows, recalc
            recalcFooterTotal();
            updateBalanceDisplay();
        },
        error: function(xhr) {
            console.error(xhr.responseText);
        }
    });
});
// Checkbox click handler
$(document).on('change', '.select-invoice', function() {
    var $row = $(this).closest('tr');
    var balance = parseFloat($row.find('td:eq(8)').text()) || 0; // 8 = Balance column index
    var $amountInput = $row.find('.amount-input');

    if ($(this).is(':checked')) {
        $amountInput.val(balance.toFixed(2)); // Set amount = balance
    } else {
        $amountInput.val(''); // Clear amount
    }

    recalcFooterTotal(); // Optional: recalculate totals
});


function parseNumberSafe(val) {
    if (val === null || val === undefined) return 0;
    val = String(val).replace(/,/g, '').trim();
    return val === '' ? 0 : parseFloat(val) || 0;
}

// compute sum of Balance column and write to #total_balance_display
function updateBalanceDisplay() {
    var totalBalance = 0;
    $('#pendingInvoiceTable tbody tr').each(function() {
        // skip "no data" row
        if ($(this).find('td').length <= 1) return;

        // balance is the 9th column (0-based index 8)
        var balText = $(this).find('td').eq(8).text();
        // if balance is inside element (like <span>) this still works because text() collects it
        totalBalance += parseNumberSafe(balText);
    });

    // set total balance display (right aligned cell already)
    $('#total_balance_display').text(totalBalance.toFixed(2));

    // optional: update the Current Balance small text too (if you want aggregated)
    $('#current_balance').text('Current Balance : ' + totalBalance.toFixed(2));
}
updateBalanceDisplay(); // <
$(document).on('change', '#pendingInvoiceTable .select-invoice', function(){
    recalcFooterTotal();
});

// delegate input events (works for dynamic rows)
$(document).on('input change', '#pendingInvoiceTable .amount-input, #pendingInvoiceTable .tds-input, #advanced_paid_input, #pendingInvoiceTable .select-invoice', function() {
    // keep existing recalc
    recalcFooterTotal();
    // then update balance summary (in case DOM balance cells changed)
    updateBalanceDisplay();
});
// recalc footer total of Amount column and optionally do other checks
function recalcFooterTotal(){
    var total = 0;

    // sum only checked rows
    $('#pendingInvoiceTable tbody tr').each(function(){
        var $tr = $(this);
        var $chk = $tr.find('.select-invoice');
        if($chk.length && $chk.is(':checked')){
            var v = parseFloat($tr.find('.amount-input').val()) || 0;
            total += v;
        }
    });

    var advancedPaid = parseFloat($('#advanced_paid_input').val()) || 0;

    var net = total - advancedPaid;
    if(net < 0) net = 0;

    // update footer total
    $('#total_amount_input').val(net.toFixed(2));
}

// simple HTML escape for safety
function escapeHtml(text) {
    if(!text) return '';
    return String(text)
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;')
      .replace(/'/g, '&#039;');
}
// store //

// Add button click -> collect header + selected rows -> POST via AJAX
// Send all rows to server (use when Add button clicked)
$(document).on('click', '#btn_add_receipt', function(e){
    e.preventDefault();

    // Header fields (adjust selectors if needed)
    var payload = {
        company_id: $('#company_id').val(),
        financial_id: $('#financial_id').val(),
        vc_no: $('#vc_no').val(),
        vc_date: $('#vc_date').val() || null, // if you have this input
        client_grp: $('#client_group').val(),
        client: $('#client_id').val(),
        payment_mode: $('#payment_mode').val(),
        account_id: $('#account_id').val(),
        advanced_paid: parseFloat($('#advanced_paid_input').val()) || 0,
        total_amount: parseFloat($('#total_amount_input').val()) || 0,
        return_amount: parseFloat($('#return_amount_input').val()) || 0,
        items: []
    };

    // Iterate over all rows in tbody
    $('#pendingInvoiceTable tbody tr').each(function(){
        var $tr = $(this);

        // skip placeholder row
        if ($tr.find('td').length <= 1) return;

        var invoiceId = $tr.data('id') || $tr.attr('data-id') || null;
        var invoiceNo = $tr.find('td').eq(1).text().trim();
        var invoiceDate = $tr.find('td').eq(2).text().trim();
        var clientName = $tr.find('td').eq(3).text().trim();
        var companyName = $tr.find('td').eq(4).text().trim();
        var finYear = $tr.find('td').eq(5).text().trim();
        var type = $tr.find('td').eq(6).text().trim();
        var total = parseFloat($tr.find('td').eq(7).text().replace(/,/g,'').trim()) || 0;
        var balance = parseFloat($tr.find('td').eq(8).text().replace(/,/g,'').trim()) || 0;
        var amount = parseFloat($tr.find('.amount-input').val()) || 0;
        var tds = parseFloat($tr.find('.tds-input').val()) || 0;
        var checked = !!$tr.find('.select-invoice').is(':checked');

        // push row object
        payload.items.push({
            invoice_id: invoiceId,
            invoice_no: invoiceNo,
            invoice_date: invoiceDate,
            client_name: clientName,
            company_name: companyName,
            financial_year: finYear,
            type: type,
            total: total,
            balance: balance,
            amount: amount,
            tds: tds,
            checked: checked
        });
    });

    // optional quick validation
    if (!payload.client) {
        alert('Please select client before saving.');
        return;
    }
    if (payload.items.length === 0) {
        alert('No invoice rows found.');
        return;
    }

    // disable button while saving
    var $btn = $(this);
    $btn.prop('disabled', true).text('Saving...');

    $.ajax({
        url: "{{ route('sale.payment.store') }}", // your route
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            payload: payload
        },
        success: function(res) {
            if (res.success) {
                alert('Saved successfully. Receipt ID: ' + res.receipt_id);
                // optional: reset form or reload page
                // location.reload();
            } else {
                alert('Error: ' + (res.message || 'Unable to save'));
            }
            $btn.prop('disabled', false).text('Add');
        },
        error: function(xhr) {
            console.error(xhr.responseText);
            alert('Server error. See console.');
            $btn.prop('disabled', false).text('Add');
        }
    });
});


//
});

</script>
 
@endpush