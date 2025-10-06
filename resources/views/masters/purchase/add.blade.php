@extends('master')

@section('main')

<!--Page header-->
						<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Purchase Entry</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>
</div>
<!-- End Page header -->

<!-- search-client-info -->
<div class="search-client-info">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="company_id">Company Name <span class="text-danger">*</span> :</label>
                                <div class="input-group flex-nowrap">
                                    <select class="form-control select2-show-search form-control-sm" name="company_id" id="company_id" data-placeholder="Choose one (with searchbox)">
                                        <optgroup>
                                            @if(isset($companies) && count($companies) > 0)
                                                @foreach($companies as $company)
                                                    <option value="{{$company->id}}">{{$company->company_name}}</option>    
                                                @endforeach
                                            @endif
                                        </optgroup>
                                    </select>
                                    <div class="input-group-append">
                                        <a href="{{route('masters.company-details.company-details')}}" class="btn btn-light">
                                            <i class="fa fa-plus text-success"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="financial_year_id">Financial Year <span class="text-danger">*</span> :</label>
                                <div class="input-group flex-nowrap">
                                    <select class="form-control select2-show-search" id="financial_year_id" name="financial_year_id" data-placeholder="Choose one (with searchbox)">
                                        <optgroup>
                                            @if(isset($financial) && count($financial) > 0)
                                                @foreach($financial as $value)
                                                    <option value="{{$value->id}}">{{$value->financial_year}}</option>
                                                @endforeach
                                            @endif
                                        </optgroup>
                                    </select>
                                    <div class="input-group-append">
                                        <a href="{{route('financial.create')}}" class="btn btn-light">
                                            <i class="fa fa-plus text-success"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- row -->
                </div> <!-- card-body -->
            </div> <!-- card -->
        </div> <!-- col -->
    </div> <!-- row -->
</div>
<!-- End search-client-info -->

<div class="search-client-info">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Purchase Order</h3>
                </div>
                <div class="card-body">

                    <!-- PO No / Date -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="po_no">PO No / Date :</label>
                                <div class="input-group">
                                    <input type="text" name="invoice_number" id="po_no" class="form-control" value="{{ old('po_no', $po_no ?? '') }}" readonly>
                                    <input type="date" name="invoice_date" id="po_date" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Vendor Name / Stock Location -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="vendor_id">Vendor Name <span class="text-danger">*</span> :</label>
                                <div class="input-group flex-nowrap">
                                    <select class="form-control select2-show-search" id="vendor_id" name="vendor_id" data-placeholder="Choose one (with searchbox)">
                                        @if(isset($vendors) && count($vendors) > 0)
                                            @foreach($vendors as $vendor)
                                                <option value="{{$vendor->id}}">{{$vendor->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <div class="input-group-append">
                                        <a href="{{route('vendor.create')}}" class="btn btn-light">
                                            <i class="fa fa-plus text-success"></i>
                                        </a>
                                    </div>
                                </div>
                                <span class="text-danger d-block mt-1" id="vendor_add"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="stock_location">Stock Location :</label>
                                <input type="text" class="form-control" name="stock_location" id="stock_location">
                            </div>
                        </div>
                    </div>

                    <!-- Product Rows -->
                    <div id="product-rows">
                        <div class="row product-row mb-2">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Make <span class="text-danger">*</span> :</label>
                                    <select class="form-control select2-show-search product-select" name="product_id[]" id="product_id">
                                        <option value="">Select Make</option>
                                        @foreach($makes as $make)
                                            <option value="{{ $make->id }}">{{ $make->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Model <span class="text-danger">*</span> :</label>
                                    <select class="form-control select2-show-search model-select" name="model_id[]" id="model_select">
                                        <option value="">Select Model</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity[]" class="form-control quantity-input" value="1" min="1">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Rate</label>
                                    <input type="number" name="rate[]" class="form-control rate-input" value="1" min="1">
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="form-group">
                                    <label>Amount <span class="text-danger">*</span> :</label>
                                    <input type="number" name="amount[]" class="form-control amount-input">
                                </div>
                            </div>

                            <div class="col-md-auto d-flex align-items-end">
                                <button type="button" class="btn btn-danger remove-row">Delete</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" id="add-more" class="btn btn-primary">Add More</button>
                        </div>
                    </div>

                </div> <!-- card-body -->
            </div> <!-- card -->
        </div> <!-- col -->
    </div> <!-- row -->
</div>

<!-- Summary / Totals -->
<div class="card shadow-sm rounded mb-4">
    <div class="card-body">
        <div class="row g-2">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Net Amount:</label>
                    <input type="text" id="net_amount" class="form-control" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <label>Packing / Courier:</label>
                <input type="number" id="packing" class="form-control form-control-sm" value="0" step="0.01">
            </div>
            <div class="col-md-4">
                <label>Discount:</label>
                <input type="number" id="discount" class="form-control form-control-sm" value="0" step="0.01">
            </div>
        </div>

        <div class="row g-2 mt-2">
            <div class="col-md-4">
                <label>Taxable Amount:</label>
                <input type="text" id="taxable_amount" name="taxable_amount" class="form-control form-control-sm" readonly>
            </div>
            <div class="col-md-4">
                <label id="tax1_label">Tax 1:</label>
                <div class="input-group flex-nowrap">
                    <select id="tax1_select" class="select2-show-search form-control">
                        <option value="0">Select Tax</option>
                        @if(isset($taxes) && count($taxes) > 0)
                            @foreach($taxes as $tax)
                                <option value="{{ $tax->tax_value }}">{{ $tax->tax_name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <label id="tax2_label">Tax 2:</label>
                <div class="input-group flex-nowrap">
                    <select id="tax2_select" class="select2-show-search form-control">
                        <option value="0">Select Tax</option>
                        @if(isset($taxes) && count($taxes) > 0)
                            @foreach($taxes as $tax)
                                <option value="{{ $tax->tax_value }}">{{ $tax->tax_name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>

        <div class="row g-2 mt-2">
            <div class="col-md-4">
                <label>Tax 1 Amount:</label>
                <input type="number" id="tax1_amount" class="form-control form-control-sm" readonly>
            </div>
            <div class="col-md-4">
                <label>Tax 2 Amount:</label>
                <input type="number" id="tax2_amount" class="form-control form-control-sm" readonly>
            </div>
            <div class="col-md-4">
                <label>Total:</label>
                <input type="number" id="subtotal_amount" class="form-control form-control-sm" readonly>
            </div>
        </div>

        <div class="row g-2 mt-2">
            <div class="col-md-4">
                <label>Round Off:</label>
                <input type="number" id="round_off" class="form-control form-control-sm" readonly>
            </div>
            <div class="col-md-4">
                <label>Total:</label>
                <input type="number" id="final_total" class="form-control form-control-sm fw-bold text-success" readonly>
            </div>
            <div class="col-md-4">
                <label>Advance:</label>
                <input type="number" id="advance" class="form-control form-control-sm" value="0" step="0.01">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4">
                <label>Payable:</label>
                <input type="number" id="payable" class="form-control form-control-sm fw-bold text-primary" readonly>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col text-center">
                <button type="submit" id="save_invoice" class="btn btn-success btn-sm px-4 py-2 rounded-pill shadow-sm">
                    <i class="fa fa-save me-1"></i> Save Invoice
                </button>
            </div>
        </div>
    </div>
</div>

						

@endsection
@push('scripts')

<script>
$(document).ready(function() {

    // ===== Helper functions =====
    function toNum(val) { return Number(String(val || '').replace(/,/g, '')) || 0; }

    function recalcRow($row) {
        const qty = toNum($row.find('.quantity-input').val());
        const rate = toNum($row.find('.rate-input').val());
        const amount = +(qty * rate).toFixed(2);
        $row.find('.amount-input').val(amount);
        return amount;
    }

    function calculateInvoice() {
        let netAmount = 0;
        $('#product-rows .product-row').each(function() {
            netAmount += recalcRow($(this));
        });
        $('#net_amount').val(netAmount.toFixed(2));

        const packing = toNum($('#packing').val());
        const discount = toNum($('#discount').val());
        const taxableAmount = netAmount + packing - discount;
        $('#taxable_amount').val(taxableAmount.toFixed(2));

        const tax1Percent = toNum($('#tax1_select').val());
        const tax2Percent = toNum($('#tax2_select').val());

        const tax1Amount = taxableAmount * tax1Percent / 100;
        const tax2Amount = taxableAmount * tax2Percent / 100;

        $('#tax1_amount').val(tax1Amount.toFixed(2));
        $('#tax2_amount').val(tax2Amount.toFixed(2));

        const total = taxableAmount + tax1Amount + tax2Amount;
        $('#subtotal_amount').val(total.toFixed(2));

        const roundOff = Math.round(total) - total;
        $('#round_off').val(roundOff.toFixed(2));

        const finalTotal = total + roundOff;
        $('#final_total').val(finalTotal.toFixed(2));

        const advance = toNum($('#advance').val());
        $('#payable').val((finalTotal - advance).toFixed(2));
    }

    function addProductRow() {
        let html = `
        <div class="row product-row mb-2">
            <div class="col-md">
                <div class="form-group">
                    <label>Make <span class="text-danger">*</span> :</label>
                    <select class="form-control select2-show-search product-select" name="product_id[]">
                        <option value="">Select Make</option>
                        @foreach($makes as $make)
                        <option value="{{ $make->id }}">{{ $make->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label>Model <span class="text-danger">*</span> :</label>
                    <select class="form-control select2-show-search model-select" name="model_id[]">
                        <option value="">Select Model</option>
                    </select>
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity[]" class="form-control quantity-input" value="1" min="1">
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label>Rate</label>
                    <input type="number" name="rate[]" class="form-control rate-input" value="1" min="1">
                </div>
            </div>
            <div class="col-md">
                <div class="form-group">
                    <label>Amount <span class="text-danger">*</span> :</label>
                    <input type="number" name="amount[]" class="form-control amount-input" readonly>
                </div>
            </div>
            <div class="col-md-auto d-flex align-items-end">
                <button type="button" class="btn btn-danger remove-row">Delete</button>
            </div>
        </div>`;
        $('#product-rows').append(html);
        $('#product-rows .product-row:last .select2-show-search').select2({ placeholder: "Select", allowClear: true });
    }

    // ===== Initializations =====
    $('.select2-show-search').select2({ placeholder: "Select", allowClear: true });

    // ===== Event Listeners =====
    $('#add-more').click(function() {
        addProductRow();
        calculateInvoice();
    });

    $(document).on('click', '.remove-row', function() {
        if ($('.product-row').length > 1) {
            $(this).closest('.product-row').remove();
            calculateInvoice();
        } else alert('At least one product row is required.');
    });

    $(document).on('input change', '.quantity-input, .rate-input, #packing, #discount, #advance', function() {
        calculateInvoice();
    });

    $(document).on('change', '#tax1_select,#tax2_select', function() {
        calculateInvoice();
    });

    // Dynamic Model dropdown by Make
    $(document).on('change', '.product-select', function() {
        const makeId = $(this).val();
        const $row = $(this).closest('.product-row');
        const $model = $row.find('.model-select');

        if (makeId) {
            $.ajax({
                url: '{{ route("quatation.make") }}',
                type: 'POST',
                data: { make_id: makeId, _token: '{{ csrf_token() }}' },
                success: function(resp) {
                    $model.empty().append('<option value="">Select Model</option>');
                    $.each(resp, function(_, model) {
                        $model.append(`<option value="${model.id}">${model.model_name}</option>`);
                    });
                }
            });
        } else $model.html('<option value="">Select Model</option>');
    });

    // Vendor Address auto-fill
    $('#vendor_id').change(function() {
        const vendor_id = $(this).val();
        if (!vendor_id) return;
        $.post('{{ route("purchase-invoice.vendor") }}', { vendor_id, _token: '{{ csrf_token() }}' }, function(resp) {
            $('#vendor_add').text(resp.address || '');
        });
    });

    // Financial Year → Generate PO No
    $('#financial_year_id').change(function() {
        const finYearId = $(this).val();
        if (!finYearId) return;
        const $poNo = $('#po_no');
        $poNo.prop('disabled', true);
        $.post('{{ route("purchase-invoice.generateQuotationNo") }}', { fin_year_id: finYearId, _token: '{{ csrf_token() }}' }, function(resp) {
            if (resp && resp.status) $poNo.val(resp.po_no);
            else alert(resp.message || 'Could not generate PO No.');
        }).always(() => { $poNo.prop('disabled', false); });
    });

    // ===== Save / Update Invoice =====
    $('#save_invoice').click(function(e) {
        e.preventDefault();

        // Validation
        if (!$('#vendor_id').val()) { alert('Select Vendor'); return; }
        if (!$('#po_date').val()) { alert('Select PO Date'); return; }

        calculateInvoice();

        // Build items array
        const items = [];
        $('#product-rows .product-row').each(function() {
            const $r = $(this);
            items.push({
                product_id: $r.find('.product-select').val(),
                model_id: $r.find('.model-select').val(),
                quantity: toNum($r.find('.quantity-input').val()),
                rate: toNum($r.find('.rate-input').val()),
                amount: toNum($r.find('.amount-input').val())
            });
        });

        if (items.length === 0) { alert('Add at least one product'); return; }

        const payload = {
            vendor_id: $('#vendor_id').val(),
            po_no: $('#po_no').val(),
            po_date: $('#po_date').val(),
            company_id: $('#company_id').val(),
            financial_year_id: $('#financial_year_id').val(),
            contact_person: $('#contact_person').val(),
            stock_location: $('#stock_location').val(),
            cal_data: {
                net_amount: toNum($('#net_amount').val()),
                packing: toNum($('#packing').val()),
                discount: toNum($('#discount').val()),
                taxable_amount: toNum($('#taxable_amount').val()),
                tax_type1_value: toNum($('#tax1_select').val()),
                tax_type2_value: toNum($('#tax2_select').val()),
                tax1_amount: toNum($('#tax1_amount').val()),
                tax2_amount: toNum($('#tax2_amount').val()),
                subtotal: toNum($('#subtotal_amount').val()),
                round_off: toNum($('#round_off').val()),
                final_total: toNum($('#final_total').val()),
                advance: toNum($('#advance').val()),
                balance: toNum($('#payable').val())
            },
            items: items
        };

        const $btn = $(this);
        $btn.prop('disabled', true).text('Saving...');

        $.ajax({
            url: '{{ route("purchase-invoice.store") }}', // use same route for store & update
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(payload),
            dataType: 'json',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(res) {
                $btn.prop('disabled', false).text('Save Invoice');
                if (res.success) {
                    alert('Invoice saved successfully! ID: ' + res.purchase_invoice_id);
                    // Optional: redirect to edit/view
                    // window.location.href = '/purchase-invoice/' + res.purchase_invoice_id + '/edit';
                } else alert('Error: ' + (res.message || 'Unknown'));
            },
            error: function(xhr) {
                $btn.prop('disabled', false).text('Save Invoice');
                if (xhr.status === 422) {
                    const errors = xhr.responseJSON.errors || {};
                    let msg = '';
                    Object.keys(errors).forEach(k => { msg += errors[k].join(', ') + '\n'; });
                    alert('Validation Error:\n' + msg);
                } else alert('Server error. Check console.');
            }
        });

    });

});
</script>




@endpush