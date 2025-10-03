@extends('master')

@section('main')

<!-- Page Header -->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Attribute Value</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Attribute Value</li>
        </ol>
    </div>
</div>

<!-- Attribute Value List -->
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Attribute Value List</div>
                <div class="card-options">
                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" data-target="#addAttributeValueList">Add Attribute Value</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="attributeValueTable" class="table table-striped table-bordered w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Attribute Name</th>
                                <th>Attribute Value</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Add/Edit -->
<div class="modal fade" id="addAttributeValueList" tabindex="-1" role="dialog" aria-labelledby="attributeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="attributeForm">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">
               <input type="hidden" id="attribute_value_id">

                <div class="modal-header">
                    <h5 class="modal-title" id="attributeModalLabel">Add Attribute Value</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Attribute Dropdown -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="attr_val_id">Attribute Name <span class="text-danger">*</span></label>
                          
                                    <select name="attr_val_id" id="attr_val_id" class="form-control" required>

                                    <option value="">-- Select Attribute --</option>
                                    @if(isset($AttributeDetail))
                                        @foreach ($AttributeDetail as $val)
                                            <option value="{{ $val->id }}">{{ $val->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <!-- Attribute Value Text -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Attribute Value <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" id="name" name="name" required>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-right">
                    <button type="submit" class="btn btn-primary">Save Attribute Value</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
$(document).ready(function () {
    // Initialize DataTable
    let table = $('#attributeValueTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("attribute.value.index") }}',
        columns: [
            { data: 'id', name: 'id', orderable: false, searchable: false },
            { data: 'attribute_name', name: 'attributeDetails.name' },
            { data: 'name', name: 'name' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });

    // Reset modal on open
    $('#addAttributeValueList').on('show.bs.modal', function () {
        $('#attributeForm')[0].reset();
        $('#formMethod').val('POST');
        $('#attribute_value_id').val('');
        $('#attributeModalLabel').text('Add Attribute Value');
    });

    // Handle Submit
    $('#attributeForm').on('submit', function (e) {
        e.preventDefault();
        let id = $('#attribute_value_id').val();
        let url = id ? '/masters/attribute-value/update/' + id : '{{ route("attribute.value.store") }}';
        let method = id ? 'PUT' : 'POST';

        let formData = {
            name: $('#name').val(),
            attr_val_id: $('#attr_val_id').val(),
            _token: '{{ csrf_token() }}',
            _method: method
        };

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            success: function (res) {
                $('#addAttributeValueList').modal('hide');
                table.ajax.reload();
                alert(id ? 'Updated successfully!' : 'Added successfully!');
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                alert('Something went wrong.');
            }
        });
    });

    // Edit Handler
  $(document).on('click', '.edit-btn', function () {
    let id = $(this).data('id');

    $.get('/masters/attribute-value/edit/' + id, function (data) {
     
        $('#attributeModalLabel').text('Edit Attribute Value');
        $('#addAttributeValueList').modal('show');
        // Fill values in form
        $('#name').val(data.name);
        $('#attr_val_id').val(data.attr_val_id);
        $('#attribute_value_id').val(data.id);

        // Set form to update mode
        $('#formMethod').val('PUT');
  
    });
});


    // Delete Handler
    $(document).on('click', '.delete-btn', function () {
        if (!confirm('Are you sure you want to delete this record?')) return;
        let id = $(this).data('id');
        $.ajax({
            url: '/masters/attribute-value/delete/' + id,
            method: 'DELETE',
            data: { _token: '{{ csrf_token() }}' },
            success: function () {
                table.ajax.reload();
                alert('Deleted successfully!');
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                alert('Failed to delete.');
            }
        });
    });
});
</script>
@endpush
