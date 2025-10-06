@extends('master')

@section('main')

<!-- Page header -->
<div class="page-header">
	<div class="page-leftheader">
		<h4 class="page-title">Edit PO</h4>
		<ol class="breadcrumb pl-0">
			<li class="breadcrumb-item"><a href="#">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Edit PO</li>
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
                        <!-- Company Name -->
                        <div class="col">
                            <div class="form-group">
                                <label>Company Name <span class="text-danger">*</span> :</label>
                                <div class="input-group mb-3 flex-nowrap">
                                    <select class="form-control select2-show-search" id="company_id" name="company_id">
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}" {{ $company->id == $po->company_id ? 'selected' : '' }}>
                                                {{ $company->company_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <a href="{{ url('company-details') }}" class="btn btn-light"><i class="fa fa-plus text-success"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Financial Year -->
                        <div class="col">
                            <div class="form-group">
                                <label>Financial Year <span class="text-danger">*</span> :</label>
                                <div class="input-group mb-3 flex-nowrap">
                                    <select class="form-control select2-show-search" id="financial_year_id" name="financial_year_id">
                                        @foreach ($financial as $val)
                                            <option value="{{ $val->id }}" {{ $val->id == $po->financial_year_id ? 'selected' : '' }}>
                                                {{ $val->financial_year }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <a href="{{ url('financial-year-master') }}" class="btn btn-light"><i class="fa fa-plus text-success"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- row end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End search-client-info -->

<!-- PO Header Form -->
<div class="search-client-info">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit PO</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                         <input type="hidden" id="po_entry_id" value="{{ $po->id }}">
                        <!-- PO No/Date -->
                        <div class="col">
                            <div class="form-group">
                                <label>PO No/Date <span class="text-danger">*</span> :</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="po_no" id="po_no" value="{{ $po->po_no }}">
                                    <input type="date" class="form-control" name="po_date" id="po_date" value="{{ $po->po_date }}">
                                </div>
                            </div>
                        </div>

                        <!-- Vendor Name -->
                        <div class="col">
                            <div class="form-group">
                                <label>Vendor Name <span class="text-danger">*</span> :</label>
                                <div class="input-group mb-1 flex-nowrap">
                                    <select class="form-control select2-show-search" name="vendor_id" id="vendor_id">
                                        @foreach ($vendors as $vendor)
                                            <option value="{{ $vendor->id }}" {{ $vendor->id == $po->vendor_id ? 'selected' : '' }}>
                                                {{ $vendor->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <a href="{{ url('buyer-master') }}" class="btn btn-light"><i class="fa fa-plus text-success"></i></a>
                                    </div>
                                </div>
                                <span id="vendor_add" class="text-danger d-block mt-1">{{ $po->vendor->address ?? '' }}</span>
                            </div>
                        </div>

                        <!-- Contact Person -->
                        <div class="col">
                            <div class="form-group">
                                <label>Contact Person <span class="text-danger">*</span> :</label>
                                <div class="input-group mb-3 flex-nowrap">
                                    <select class="form-control select2-show-search" id="contact_person_id" name="contact_person_id">
                                        <option value="">Select Contact Person</option>
                                        @foreach ($contact_persons as $person)
                                            <option value="{{ $person->id }}" {{ $person->id == $po->contact_person_id ? 'selected' : '' }}>
                                                {{ $person->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Currency / Make / Model -->
                    <div class="row">
                        <!-- Currency -->
                        <div class="col">
                            <div class="form-group">
                                <label>Currency/Value <span class="text-danger">*</span> :</label>
                                <div class="input-group mb-3 flex-nowrap">
                                    <select class="form-control select2-show-search" id="currency_name">
                                        @foreach ($currency as $val)
                                            <option value="{{ $val->id }}" {{ $val->id == $po->currency_id ? 'selected' : '' }}>
                                                {{ $val->currency_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <input type="number" class="form-control" id="currency_value" value="{{ $po->currency_value }}">
                                    </div>
                                    <div class="input-group-append">
                                        <a href="{{ url('buyer-master') }}" class="btn btn-light"><i class="fa fa-plus text-success"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Make -->
                        <div class="col">
                            <div class="form-group">
                                <label>Make <span class="text-danger">*</span> :</label>
                                <div class="input-group mb-3 flex-nowrap">
                                    <select class="form-control select2-show-search" id="make_id" name="make_id">
                                        <!-- Options populated dynamically -->
                                    </select>
                                    <div class="input-group-append">
                                        <a href="{{ url('buyer-master') }}" class="btn btn-light"><i class="fa fa-plus text-success"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Model -->
                        <div class="col">
                            <div class="form-group">
                                <label>Model <span class="text-danger">*</span> :</label>
                                <div class="input-group mb-3 flex-nowrap">
                                    <select class="form-control select2-show-search" id="model_id" name="model_id">
                                        <!-- Options populated dynamically -->
                                    </select>
                                    <div class="input-group-append">
                                        <a href="{{ url('buyer-master') }}" class="btn btn-light"><i class="fa fa-plus text-success"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quantity / Price -->
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label>Quantity <span class="text-danger">*</span> :</label>
                                <input type="number" class="form-control" id="quantity" name="quantity">
                            </div>
                        </div>
                        <div class="col">
                            <label>Price <span class="text-danger">*</span> :</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="currency_label">INR</span>
                                </div>
                                <input type="number" name="price" id="price" class="form-control">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Total <span class="text-danger">*</span> :</label>
                                <input type="number" class="form-control" id="total" name="total" >
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Price in INR <span class="text-danger">*</span> :</label>
                                <input type="number" class="form-control" id="priceINR" name="priceINR" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <button class="btn btn-primary d-block m-auto" id="add_data">Add To Table</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Items Table -->
<div class="search-client-info">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="edit_poentry_table" class="table table-striped table-bordered w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Make</th>
                                    <th>Model</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                    <th>Price In INR</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($po->poEntry as $index => $entry)
                                <tr data-id="{{ $entry->id }}">
                            <td>{{ $entry->id }}</td> <!-- This line added -->
                            <td data-value="{{ $entry->make_id }}">{{ $entry->make_name }}</td>
                            <td data-value="{{ $entry->model_id }}">{{ $entry->model_name }}</td>
                            <td>{{ $entry->quantity }}</td>
                            <td>{{ number_format($entry->price, 2) }}</td>
                            <td>{{ number_format($entry->total, 2) }}</td>
                            <td>{{ number_format($entry->priceINR, 2) }}</td>
                            <td>
                                <a href="#" class="edit-row"><i class="fa fa-edit"></i></a>
                                <a href="#" id="delte_po" class="delete-row text-danger"><i class="fa fa-trash"></i></a>
                            </td>
                            </tr>

                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr style="background-color: #f1ecff;">
                                    <th colspan="3" class="text-right">Total</th>
                                    <th><strong id="sum_quantity">{{ $po->quantity }}</strong></th>
                                    <th><strong id="sum_price">{{ $po->price }}</strong></th>
                                    <th><strong id="sum_total">{{ $po->total }}</strong></th>
                                    <th><strong id="sum_price_inr">{{ $po->priceINR }}</strong></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary d-block m-auto" id="add_po">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- PO View Modal -->
<div class="modal fade" id="poViewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" style="background: white">
            <div class="modal-header">
                <h5 class="modal-title">Invoice Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body" id="po-detail-body">
                <!-- Dynamic data will be injected here -->
            </div>
        </div>
    </div>
</div>

<!-- JS Config and Link -->
<script>
    const token = '{{ csrf_token() }}';
    const vendorContactRoute = '{{ route("vendor.contact") }}';
    const currencyValueRoute = '{{ route("currency.value") }}';
</script>



@endsection

@push('scripts')
<script>
$(document).ready(function () {
    $('#vendor_id').change(function () {
        let vendor_id = $(this).val();
        if (vendor_id) {
            $.ajax({
                type: 'POST',
                url: vendorContactRoute,
                data: {
                    vendor_id: vendor_id,
                    _token: token
                },
                success: function (res) {
                    $("#vendor_add").text(res.vendor?.address || '');
                    $('#contact_person_id').empty().append('<option value="">Select Contact Person</option>');
                    $.each(res.contact_persons, function (index, person) {
                        $('#contact_person_id').append(
                            `<option value="${person.id}">${person.name}</option>`
                        );
                    });
                }
            });
        }
    });

    $("#currency_name").change(function () {
        updateCurrencyField();
        calculation();
        let currency_id = $(this).val();
        $.ajax({
            type: 'POST',
            url: currencyValueRoute,
            data: { currency_id: currency_id, _token: token },
            success: function (res) {
                $("#currency_value").val(res.value);
            }
        });
    });

    function updateCurrencyField() {
        let currency_label = $("#currency_name option:selected").text();
        $('#currency_label').text(currency_label);
    }

    function calculation() {
        let currency_label = $("#currency_name option:selected").text().trim().toLowerCase();
        let quantity = parseFloat($("#quantity").val()) || 0;
        let price = parseFloat($("#price").val()) || 0;
        let rate = parseFloat($("#currency_value").val()) || 1;

        updateCurrencyField();
        let total = quantity * price;
        $("#total").val(total.toFixed(2));
        let convertPrice = price * quantity * rate;
        $("#priceINR").val(convertPrice.toFixed(2));
    }

    $('#price, #quantity').on('input', function () {
        calculation();
    });

    let editIndex = -1;

    $('#add_data').on('click', function (e) {
        e.preventDefault();
        addOrUpdateLineItem();
    });

    function addOrUpdateLineItem() {
        let make_id = $('#make_id').val();
        let make_text = $('#make_id option:selected').text();
        let model_id = $('#model_id').val();
        let model_text = $('#model_id option:selected').text();
        let quantity = parseFloat($('#quantity').val()) || 0;
        let price = parseFloat($('#price').val()) || 0;
        let total = parseFloat($('#total').val()) || 0;
        let priceINR = parseFloat($('#priceINR').val()) || 0;
        
       let existingId = editIndex !== -1
    ? $('#edit_poentry_table tbody tr').eq(editIndex).data('id') || ''
    : '';

    let row = `
        <tr data-id="${existingId}">
            <td>${existingId || $('#edit_poentry_table tbody tr').length + 1}</td>
            <td data-value="${make_id}">${make_text}</td>
            <td data-value="${model_id}">${model_text}</td>
            <td>${quantity}</td>
            <td>${price.toFixed(2)}</td>
            <td>${total.toFixed(2)}</td>
            <td>${priceINR.toFixed(2)}</td>
            <td>
                <a href="#" class="edit-row"><i class="fa fa-edit"></i></a>
                <a href="#" class="delete-row text-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
    `;

        if (editIndex === -1) {
            $('#edit_poentry_table tbody').append(row);
        } else {
            $('#edit_poentry_table tbody tr').eq(editIndex).replaceWith(row);
            editIndex = -1;
            $('#add_data').text('Add To Table');
        }

        clearFormFields();
        updateTableTotals();
    }

   $(document).on('click', '.edit-row', function (e) {
    e.preventDefault();
    const row = $(this).closest('tr');
    editIndex = row.index();

    // Read and parse clean values
    const make_id = row.find('td:eq(1)').data('value');
    const model_id = row.find('td:eq(2)').data('value');
    const quantity = parseFloat(row.find('td:eq(3)').text()) || 0;
    const price = parseFloat(row.find('td:eq(4)').text()) || 0;
    const total = parseFloat(row.find('td:eq(5)').text()) || 0;
    const priceINR = parseFloat(row.find('td:eq(6)').text()) || 0;

    // Set clean values in inputs
    $('#make_id').val(make_id);
    $('#model_id').val(model_id);
    $('#quantity').val(quantity);
    $('#price').val(price.toFixed(2));
    $('#total').val(total.toFixed(2));
    $('#priceINR').val(priceINR.toFixed(2));

    $('#add_data').text('Update');
});


    $(document).on('click', '.delete-row', function (e) {
        e.preventDefault();
        const row = $(this).closest('tr');
        row.remove();
        updateTableTotals();
    });

    function updateTableTotals() {
        let totalQuantity = 0, totalPrice = 0, totalTotal = 0, totalPriceInr = 0;

        $('#edit_poentry_table tbody tr').each(function () {
            const td = $(this).find('td');
            totalQuantity += parseFloat(td.eq(3).text()) || 0;
            totalPrice += parseFloat(td.eq(4).text()) || 0;
            totalTotal += parseFloat(td.eq(5).text()) || 0;
            totalPriceInr += parseFloat(td.eq(6).text()) || 0;
        });

        $('#sum_quantity').text(totalQuantity.toFixed(2));
        $('#sum_price').text(totalPrice.toFixed(2));
        $('#sum_total').text(totalTotal.toFixed(2));
        $('#sum_price_inr').text(totalPriceInr.toFixed(2));
    }

    function clearFormFields() {
        $('#make_id').val('');
        $('#model_id').val('');
        $('#quantity').val('');
        $('#price').val('');
        $('#total').val('');
        $('#priceINR').val('');
    }

    let deletedItemIds = [];

    $('#edit_poentry_table').on('click', '#delte_po', function (e) {
        e.preventDefault();
        const row = $(this).closest('tr');
        const itemId = row.data('id');
        if (itemId) deletedItemIds.push(itemId);
        row.remove();
        updateTableTotals();
    });

    $('#add_po').on('click', function () {
        let po_id = $("#po_entry_id").val();

        const header = {
            po_no: $('#po_no').val(),
            po_date: $('#po_date').val(),
            vendor_id: $('#vendor_id').val(),
            contact_person_id: $('#contact_person_id').val(),
            currency_id: $('#currency_name').val(),
            currency_value: $('#currency_value').val(),
            financial_year_id: $('#financial_year_id').val(),
            company_id: $('#company_id').val(),
        };

            const items = [];
$('#edit_poentry_table tbody tr').each(function () {
    const tr = $(this);
    const td = tr.find('td');

    items.push({
        id: tr.data('id') || null, 
        make_id: td.eq(1).data('value'),
        model_id: td.eq(2).data('value'),
        quantity: parseFloat(td.eq(3).text()) || 0,
        price: parseFloat(td.eq(4).text()) || 0,
        total: parseFloat(td.eq(5).text()) || 0,
        price_inr: parseFloat(td.eq(6).text()) || 0
    });
});

console.log(items);



        const summary = {
            total_quantity: parseFloat($('#sum_quantity').text()),
            total_price: parseFloat($('#sum_price').text()),
            total_amount: parseFloat($('#sum_total').text()),
            total_price_inr: parseFloat($('#sum_price_inr').text())
        };

        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': token }
        });

        $.ajax({
            url: `/masters/po-entry/update/${po_id}`,
            method: 'POST',
            data: {
            _method: 'PUT',
                header,
                items,
                summary,
                po_id,
                deleted_items: deletedItemIds
            },
            success: function (res) {
                alert('PO Entry updated successfully!');
                location.reload();
            },
            error: function (xhr) {
                alert('Update failed.');
                console.log(xhr.responseText);
            }
        });
    });
});

</script>
@endpush
