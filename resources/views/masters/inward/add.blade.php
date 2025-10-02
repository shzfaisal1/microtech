@extends('master')


<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet"/>
<style>
    .bootstrap-tagsinput {
        width: 100% !important;
        min-height: 38px;
    }

    label {
        font-weight: 600;
        font-size: 0.9rem;
    }

    .form-control, .form-select {
        font-size: 0.875rem;
        padding: 0.5rem 0.75rem;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .card-body .row > div[class*="col"] {
        margin-bottom: 1rem;
    }

    .input-group .btn-light {
        border: 1px solid #ced4da;
        border-left: none;
    }

    .form-check-label {
        font-weight: normal;
    }

    .card-header h5, .card-header h6 {
        font-weight: 600;
        font-size: 1rem;
    }

    #inward_table th, #inward_table td {
        font-size: 0.8rem;
        vertical-align: middle;
        text-align: center;
    }

    .table-responsive {
        margin-top: 1rem;
    }

    .btn.w-50 {
        font-size: 0.875rem;
        padding: 0.6rem;
    }

    .select2-container--default .select2-selection--single {
        height: 38px !important;
        padding: 6px 12px;
    }

    textarea.form-control {
        resize: none;
    }

    .form-check {
        margin-bottom: 0.5rem;
    }

    .form-check-input {
        cursor: pointer;
    }
</style>


@section('main')

<div class="search-client-info">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        {{-- Company --}}
                        <div class="col">
                            <label>Company Name <span class="text-danger">*</span></label>
                            <div class="input-group mb-3 flex-nowrap">
                                <select class="form-control select2-show-search" id="company_id" name="company_id" data-placeholder="Choose one">
                                    <optgroup>
                                        @foreach ($companies ?? [] as $company)
                                            <option value="{{ $company->id }}">{{ $company->company_name }}</option>	
                                        @endforeach
                                    </optgroup>
                                </select>
                                <div class="input-group-append">
                                    <a href="{{ url('company-details') }}" class="btn btn-light"><i class="fa fa-plus text-success"></i></a>
                                </div>
                            </div>
                        </div>

                        {{-- Financial Year --}}
                        <div class="col">
                            <label>Financial Year <span class="text-danger">*</span></label>
                            <div class="input-group mb-3 flex-nowrap">
                                <select class="form-control select2-show-search" id="financial_id" name="financial_id" data-placeholder="Choose one">
                                    <optgroup>
                                        @foreach ($financial ?? [] as $val)
                                            <option value="{{ $val->id }}">{{ $val->financial_year }}</option>	
                                        @endforeach
                                    </optgroup>
                                </select>
                                <div class="input-group-append">
                                    <a href="{{ url('financial-year-master') }}" class="btn btn-light"><i class="fa fa-plus text-success"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- row -->
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Main Form --}}
<div class="card">
    <div class="card-header">
        <h5><i class="fa fa-sign-in-alt"></i> Add Inward Entry</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <label>Inward No <span class="text-danger">*</span></label>
                <input type="text" name="inward_no" id="inward_no" class="form-control" value="{{ old('inward_no', $inward_no ?? '') }}" readonly>
            </div>
            <div class="col-md-4">
                <label>Received Date <span class="text-danger">*</span></label>
                <input type="date" name="received_date" id="received_date" class="form-control">
            </div>
            <div class="col-md-4">
                <label>Reference</label>
                <input type="text" name="reference" id="reference" class="form-control">
            </div>
            <div class="col-md-4">
                <label>Invoice Status</label>
                <select name="invoice_status" id="invoice_status" class="form-control">
                    <option value="">Select</option>
                    <option value="1">Approved</option>
                    <option value="2">Cancelled</option>
                </select>
            </div>
            <div class="col-md-4">
             
                <div class="form-group">
            <label for="client_group">Client Group <span class="text-danger">*</span> :</label>
            <div class="input-group mb-2 flex-nowrap">
                <select class="form-control select2" id="client_group" name="client_group_id">
                    <option value="">Select Client Group</option>
                    @foreach ($clients_grp as $group)
                        <option value="{{ $group->id }}">
                            {{ $group->name }}
                        </option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <a href="{{ url('buyer-master') }}" class="btn btn-light" type="button"><i class="fa fa-plus text-success"></i></a>
                </div>
            </div>
        </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
            <label for="client_name">Client Name <span class="text-danger">*</span> :</label>
            <div class="input-group mb-2 flex-nowrap">
                <select class="form-control select2" id="client_id" name="client_id">
                    <option value="">Select Client</option>
                    @foreach ($clients_details as $client)
                        <option value="{{ $client->id }}" >
                            {{ $client->client_name }}
                        </option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <a href="{{ url('buyer-master') }}" class="btn btn-light" type="button"><i class="fa fa-plus text-success"></i></a>
                </div>
            </div>
            <span class="text-danger d-block mt-1" id="client_add"></span>
        </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
            <label for="contact_person">Contact Person <span class="text-danger">*</span> :</label>
            <div class="input-group mb-2 flex-nowrap">
                <select class="form-control select2-show-search" id="contact_person_id" name="contact_person">
                    <option value="0">Select Contact Person</option>
                </select>
                <div class="input-group-append">
                    <a href="{{ url('buyer-master') }}" class="btn btn-light" type="button"><i class="fa fa-plus text-success"></i></a>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</div>

{{-- Product Entry --}}
<div class="card mt-3">
    <div class="card-header">
        <h6><i class="fa fa-box"></i> Add Inward Product Details</h6>
    </div>
    <div class="card-body">
        <div class="row">
            {{-- Make --}}
            <div class="col-md-4">
                 <div class="form-group">
                                <label for="make_id">Make <span class="text-danger">*</span> :</label>
                                <div class="input-group mb-3 flex-nowrap">
                                    <select class="form-control select2-show-search" id="make_id" name="make_id" data-placeholder="Choose Make">
                                        <option value="">Select Make</option>
                                        @foreach($makes as $make)
                                        <option value="{{ $make->id }}">{{ $make->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <a href="{{ url('make-master') }}" class="btn btn-light"><i class="fa fa-plus text-success"></i></a>
                                        
                                    </div>
                                </div>
                            </div>
            </div>
            {{-- Model --}}
            <div class="col-md-4">
               <div class="form-group">
                                <label for="model_id">Model <span class="text-danger">*</span> :</label>
                                <div class="input-group mb-3 flex-nowrap">
                                    <select class="form-control select2-show-search" id="model_id" name="model_id" data-placeholder="Choose Model">
                                        <option value="">Select Model</option>
                                     
                                    
                                    
                                    </select>
                                    <div class="input-group-append">
                                        <a href="{{ url('model-master') }}" class="btn btn-light"><i class="fa fa-plus text-success"></i></a>
                                       
                                    </div>
                                </div>
                            </div>
            </div>
            {{-- Serial No --}}
            <div class="col-md-4">
                <label>Serial No.</label>
                <input type="text" name="serial_no" id="serial_no" class="form-control" data-role="tagsinput" value="{{ old('serial_no') }}">
            </div>

            {{-- Accessories --}}
            <div class="col-md-12">
                <label>Accessories List</label>
                <div class="card p-2">
                    <div class="row">
                        @php
                            $accessoryMap = [
                                'Adaptor' => 'adaptor',
                                'Draft Shield' => 'draft_shield',
                                'In-Use Cover' => 'in_use_cover',
                                'Batteries' => 'batteries',
                                'Pan' => 'pan',
                                'Pan Support' => 'pan_support',
                                'Weighing Pan' => 'weighing_pan',
                                'Calibration Wt' => 'calibration_wt',
                                'Cable' => 'cable',
                                'Other' => 'other',
                            ];
                        @endphp

                        @foreach ($accessoryMap as $label => $column)
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input 
                                        type="checkbox" 
                                        class="form-check-input" 
                                        name="accessories[]" 
                                        value="{{ $label }}" 
                                        id="acc_{{ Str::slug($label) }}"
                                        {{ isset($item) && $item->$column ? 'checked' : '' }}>
                                    <label class="form-check-label" for="acc_{{ Str::slug($label) }}">{{ $label }}</label>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-md-12 mt-2">
                            <input 
                                type="text" 
                                name="other_accessories" 
                                id="other_accessories" 
                                class="form-control" 
                                placeholder="Other Accessories Details"
                                value="{{ old('other_accessories', $item->other_details ?? '') }}">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Defect and Remark --}}
            <div class="col-md-6 mt-2">
                <label>Nature of Defect</label>
                <textarea name="defect" id="defect" class="form-control" rows="1"></textarea>
            </div>
            <div class="col-md-6 mt-2">
                <label>Remark</label>
                <textarea name="remark" id="remark" class="form-control" rows="1"></textarea>
            </div>
        </div>

        {{-- Buttons --}}
 <div class="row mt-3">
    <div class="col-md-12 d-flex justify-content-start">
        <button type="button" class="btn btn-dark px-4 mr-2" id="add_item_btn">Add Item</button>
        <button type="reset" class="btn btn-secondary px-4">Clear Product</button>
    </div>
</div>





    </div>

    {{-- Table --}}
    <div class="table-responsive">
        <table class="table table-bordered table-striped text-nowrap mb-0" id="inward_table">
            <thead class="bg-dark text-white">
                <tr>
                    <th>ID</th>
                    <th>Make</th>
                    <th>Model</th>
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
                    <th>Nature of Defect</th>
                    <th>Remark</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
    

<div class="row mt-3">
    <div class="col-md-12 d-flex justify-content-center">
        <button type="submit" class="btn btn-dark px-4 mr-2 mb-3" id="add_sc">Submit</button>
    
    </div>
</div>

</div>

{{-- Final Buttons --}}


@endsection

@push('scripts')
    <!-- Bootstrap Tags Input JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

<script>
$(document).ready(function () {
    $('#financial_id').on('change', function () {
        let finYearId = $(this).val();

        if (finYearId) {
            $.ajax({
                url: "{{ route('inward.generateQuotationNo') }}",
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    fin_year_id: finYearId
                },
                success: function (response) {
                    console.log(response)
                    if (response.status) {
                        $('#inward_no').val(response.inward_no);
                    } else {
                        alert(response.message || 'Could not generate quotation number.');
                    }
                },
                error: function () {
                    alert('Something went wrong. Please try again.');
                }
            });
        }
    });



     $('#client_group_id').on('change', function () {
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
    })


       $('#client_id').on('change', function () {
        let client_add_id = $(this).val();
      

        if (client_add_id) {
            $.ajax({
                url: '{{ route("quatation.client_add") }}',
                type: 'POST',
                data: {
                    client_add_id: client_add_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    console.log(response)
                    $('#client_add').text(response.client_add.address);
                       $.each(response.ClientContactPerson, function (key, contact_person) {

                        $('#contact_person_id').append('<option value="' + contact_person.id + '">' + contact_person.name + '</option>');

                    });
                   
                }
            });
        }
    });


    
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


    //
let editIndex = null;

$('#add_item_btn').on('click', function () {

  
    const $tableBody = $('table tbody').length ? $('table tbody') : $('<tbody>').appendTo('table');
    const modelId = $('#model_id').val();
    const makeId = $('#make_id').val();
    const makeText = $('#make_id option:selected').text() || '';
    const modelText = $('#model_id option:selected').text() || '';
    const serials = $('#serial_no').val();
    const defect = $('#defect').val();
    const remark = $('#remark').val();
    const otherAccessories = $('#other_accessories').val();

    const accessories = ['Adaptor', 'Draft Shield', 'In-Use Cover', 'Batteries', 'Pan', 'Pan Support', 'Weighing Pan', 'Calibration Wt', 'Cable', 'Other'];
    const accState = accessories.map(acc => {
        const id = `#acc_${acc.toLowerCase().replace(/ /g, '-')}`;
        return $(id).is(':checked') ? '✔' : '';
    });

       if (!makeId) {
        alert('Make is required.');
        $('#make_id').focus();
        return;
    }

    if (!modelId) {
        alert('Model is required.');
        $('#model_id').focus();
        return;
    }
    const rowHTML = `
        <td>#</td>
        <td>${makeText}</td>
        <td>${modelText}</td>
        <td>${serials}</td>
        ${accState.map(val => `<td>${val}</td>`).join('')}
        <td>${otherAccessories}</td>
        <td>${defect}</td>
        <td>${remark}</td>
        <td>
            <button class="btn btn-sm btn-primary edit-item">Edit</button>
            <button class="btn btn-sm btn-danger remove-item">Delete</button>
        </td>
    `;

    const $newRow = $('<tr>').html(rowHTML).attr({
        'data-make': makeId,
        'data-model': modelId,
        'data-serial_no': serials,
        'data-other_accessories': otherAccessories,
        'data-defect': defect,
        'data-remark': remark
    });

    // Store accessory states as data attributes 
    accessories.forEach(acc => {
        const key = acc.toLowerCase().replace(/ /g, '_'); // e.g., draft_shield
        const id = `#acc_${key.replace(/ /g, '-')}`;       // #acc_draft-shield
        const isChecked = $(id).is(':checked');
        $newRow.attr(`data-${key}`, isChecked ? 1 : 0);
    });

    // Edit or append row
    if (editIndex !== null) {
        $tableBody.children().eq(editIndex).replaceWith($newRow);
        editIndex = null;
    } else {
        $tableBody.append($newRow);
    }

    $('form')[0].reset(); // optional: reset form after add
});


// Delegate edit and delete button actions
$(document).on('click', '.remove-item', function () {
    $(this).closest('tr').remove();
});

$(document).on('click', '.edit-item', function () {
    const $row = $(this).closest('tr');
    const $cells = $row.children();
    const $tableBody = $('table tbody');

    editIndex = $tableBody.children().index($row);

    $('#make_id').val(findSelectValue($('#make_id'), $cells.eq(1).text()));
    $('#model_id').val(findSelectValue($('#model_id'), $cells.eq(2).text()));
    $('#serial_no').val($cells.eq(3).text());
    
    // Accessory checkboxes
    const accessories = ['Adaptor', 'Draft Shield', 'In-Use Cover', 'Batteries', 'Pan', 'Pan Support', 'Weighing Pan', 'Calibration Wt', 'Cable', 'Other'];
    accessories.forEach((acc, i) => {
        const id = `#acc_${acc.toLowerCase().replace(/ /g, '-')}`;
        $(id).prop('checked', $cells.eq(4 + i).text() === '✔');
    });

    $('#other_accessories').val($cells.eq(13).text());
    $('#defect').val($cells.eq(14).text());
    $('#remark').val($cells.eq(15).text());
});

// Helper to get value from select based on visible text
function findSelectValue($select, text) {
    const $option = $select.find('option').filter(function () {
        return $(this).text().trim() === text.trim();
    });
    return $option.length ? $option.val() : '';
}


 $('#add_sc').on('click', function (e) {
      
    e.preventDefault();

    
    let items = [];

$('#inward_table tbody tr').each(function () {
   const row = $(this);

    const item = {
        make: row.data('make'),
        model: row.data('model'),
        serial_no: row.data('serial_no'),
        adaptor: row.data('adaptor') === 1,
        batteries: row.data('batteries') === 1,
        draft_shield: row.data('draft_shield') === 1,
        in_use_cover: row.data('in_use_cover') === 1,
        pan: row.data('pan') === 1,
        pan_support: row.data('pan_support') === 1,
        weighing_pan: row.data('weighing_pan') === 1,
        calibration_wt: row.data('calibration_wt') === 1,
        cable: row.data('cable') === 1,
        other: row.data('other') === 1,
        other_details: row.data('other_accessories'),
        defect: row.data('defect'),
        remark: row.data('remark'),
    };

  
    items.push(item);
});


    // Step 2: Create formData object
    const formData = {

        company_id: $('#company_id').val(),
        fin_year_id: $('#financial_id').val(),
        inward_no: $('#inward_no').val(),
        received_date: $('#received_date').val(),
        reference: $('#reference').val(),
        invoice_status: $('#invoice_status').val(),
        client_group_id: $('#client_group_id').val(),
        client_id: $('#client_id').val(),
        contact_person_id: $('#contact_person_id').val(),
        items: items,     
        _token: $('meta[name="csrf-token"]').attr('content')
    };


    $.ajax({
        url: '{{ route("inward.store") }}',
        method: 'POST',
        data: JSON.stringify(formData),
        contentType: 'application/json',
        success: function (response) {
            alert('Quotation saved successfully!');
        },
        error: function (xhr) {
            const errors = xhr.responseJSON?.errors || {};
            let msg = '';
            Object.values(errors).forEach(arr => arr.forEach(e => msg += e + "\n"));
            alert(msg || 'Something went wrong.');
        }
    });
});
});

</script>
@endpush

