@extends('master')

@section('main')

@php
     $make = App\Models\make::all();
        $attributes = App\Models\AttributeValue::with('attribute')->get();
    
           $models= App\Models\ModelDetail::with([
                'make',
                'attributeValues.attribute' 
        ])->get();
            
@endphp
<!-- Page Header -->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Model Details</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>
</div>

<!-- Form Start -->
<form action="{{ isset($model_details) ? route('model.update', $model_details->id) : route('model.store') }}" method="POST">
    @csrf
    @if(isset($model_details))
        @method('PUT')
    @endif

    <!-- Basic Info -->
    <div class="card">
        <div class="card-header"><h3 class="card-title">{{ isset($model_details) ? 'Edit' : 'Add' }} Model Details</h3></div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <label>Make Name <span class="text-danger">*</span></label>
                    <select class="form-control select2-show-search" name="make_id">
                        <option value="">Select Make</option>
                        @foreach ($make as $list)
                            <option value="{{ $list->id }}" {{ isset($model_details) && $model_details->make_id == $list->id ? 'selected' : '' }}>{{ $list->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label>Model Name <span class="text-danger">*</span></label>
                    <input type="text" name="model_name" class="form-control" value="{{ $model_details->model_name ?? '' }}">
                </div>
                <div class="col">
                    <label>Type of Code</label>
                    <select class="form-control" name="type_of_code">
                        <option value="HSN Code" {{ (isset($model_details) && $model_details->type_of_code == 'HSN Code') ? 'selected' : '' }}>HSN Code</option>
                        <option value="SAC Code" {{ (isset($model_details) && $model_details->type_of_code == 'SAC Code') ? 'selected' : '' }}>SAC Code</option>
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <label>Code</label>
                    <input type="text" name="code" class="form-control" value="{{ $model_details->code ?? '' }}">
                </div>
                <div class="col">
                    <label>Available Stock</label>
                    <input type="number" name="available_stock" class="form-control" value="{{ $model_details->available_stock ?? '' }}">
                </div>
                <div class="col">
                    <label>Reliance Item Code</label>
                    <input type="text" name="reliance_item_code" class="form-control" value="{{ $model_details->reliance_item_code ?? '' }}">
                </div>
            </div>
        </div>
    </div>

    <!-- Attribute Selection -->
    <div class="row mt-4">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Select Attributes</h3></div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" id="search-attribute" class="form-control" placeholder="Search by Attribute or Value">
                    </div>
                    <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                        <table class="table table-bordered table-hover text-nowrap" id="attribute-table">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width: 60px;">Check</th>
                                    <th>Attribute</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attributes as $attr)
                                    <tr class="{{ $loop->even ? 'bg-light' : '' }}">
                                        <td class="text-center">
                                            <input type="checkbox" name="attribute_ids[]" value="{{ $attr->id }}"
                                                {{ isset($selectedAttributes) && in_array($attr->id, $selectedAttributes) ? 'checked' : '' }}>
                                        </td>
                                        <td>{{ $attr->name }}</td>
                                        <td>{{ $attr->attribute->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Added Attributes -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Added Attributes</h3></div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped w-100">
                            <thead>
                                <tr>
                                    <th>Attribute</th>
                                    <th>Value</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="added-attributes">
                                @foreach ($attributes->toArray() as $attr)
                                
                                <tr>
                                 <td>   
                                {{$attr['name']}}
                                 </td> 
                                 <td>
                                 {{$attr['attribute']['name']}}
                                 </td>
                                   <td>
                                <a type="button" class="text-danger remove-attr">
                                    <i class="fa fa-trash" style="font-size:15px;"></i>
                                </a>
                               </td>
                                
                                @endforeach
                              </td>
                            </tr>  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Submit -->
    <div class="row mt-4">
        <div class="col">
            <button type="submit" class="btn btn-primary d-block m-auto">{{ isset($model_details) ? 'Update' : 'Add' }} Model</button>
        </div>
    </div>
</form>
<!-- Model List Table -->
<div class="card mt-5">
    <div class="card-header">
        <h3 class="card-title">Model List</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-nowrap">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Model Name</th>
                        <th>Make</th>
                        <th>Code Type</th>
                        <th>Code</th>
                        <th>Available Stock</th>
                        <th>Reliance Item Code</th>
                        <th>Action</th>
                    </tr>
                </thead>
               
            @php
             $sr_no = 1;   
            @endphp
                <tbody>
                  
                    @foreach($models as $list)
                   
                        <tr>
                            <td>{{$sr_no++}}</td>
                            <td>{{ $list->model_name }}</td>
                            <td>{{ $list->make->name ?? '-' }}</td>
                            <td>{{ $list->type_of_code }}</td>
                            <td>{{ $list->code }}</td>
                            <td>{{ $list->available_stock }}</td>
                            <td>{{ $list->reliance_item_code }}</td>
                            <td>
                                <a href="{{ route('model.edit', $list->id) }}" class="text-primary mr-1"><i class="fa fa-edit" style="font-size:15px;"></i></a>
                                <form action="{{ route('model.delete', $list->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <a type="submit" class="text-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fa fa-trash" style="font-size:15px;"></i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                   
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection


@push('scripts')
<style>
    #attribute-table thead th {
        background-color: #f5f5f5;
    }

    #attribute-table tbody tr:nth-child(even) {
        background-color: #f2f0ff;
    }

    #attribute-table tbody tr:hover {
        background-color: #e6f7ff;
    }
</style>

<script>
$(document).ready(function () {
    // Checkbox click to add/remove attribute to/from summary table
    $('#attribute-table').on('change', 'input[type="checkbox"]', function () {
        const row = $(this).closest('tr');
        const attrId = $(this).val();
        const attrName = row.find('td').eq(1).text();
        const attrValue = row.find('td').eq(2).text();

        if ($(this).is(':checked')) {
            if ($('#added-attributes tr[data-id="' + attrId + '"]').length === 0) {
                $('#added-attributes').append(`
                    <tr data-id="${attrId}">
                        <td>${attrName}</td>
                        <td>${attrValue}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-danger remove-attr">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `);
            }
        } else {
            $('#added-attributes tr[data-id="' + attrId + '"]').remove();
        }
    });

    // Remove from summary and uncheck
    $(document).on('click', '.remove-attr', function () {
        const row = $(this).closest('tr');
        const attrId = row.data('id');
        $('#attribute-table input[type="checkbox"][value="' + attrId + '"]').prop('checked', false);
        row.remove();
    });

    // Search filter on attribute/value
    $('#search-attribute').on('keyup', function () {
        let value = $(this).val().toLowerCase();
        $('#attribute-table tbody tr').filter(function () {
            $(this).toggle(
                $(this).find('td').eq(1).text().toLowerCase().indexOf(value) > -1 ||
                $(this).find('td').eq(2).text().toLowerCase().indexOf(value) > -1
            );
        });
    });

    // Prefill summary table on edit
    @if(old('attribute_ids') || isset($modelAttributeIds))
        let selectedIds = @json(old('attribute_ids', $modelAttributeIds ?? []));
        selectedIds.forEach(function(attrId) {
            let checkbox = $('#attribute-table input[type="checkbox"][value="' + attrId + '"]');
            checkbox.prop('checked', true);
            let row = checkbox.closest('tr');
            let attrName = row.find('td').eq(1).text();
            let attrValue = row.find('td').eq(2).text();
            if ($('#added-attributes tr[data-id="' + attrId + '"]').length === 0) {
                $('#added-attributes').append(`
                    <tr data-id="${attrId}">
                        <td>${attrName}</td>
                        <td>${attrValue}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-danger remove-attr">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `);
            }
        });
    @endif
});
</script>
@endpush

