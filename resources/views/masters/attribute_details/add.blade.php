@extends('master')

@section('main')

<!-- Page Header -->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Attribute Details</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Attributes</li>
        </ol>
    </div>
</div>

<!-- List Table -->
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Attribute List</div>
                <div class="card-options">
                    <a href="javascript:void(0)" class="btn btn-primary" id="addAttributeBtn">Add Attribute</a>
                </div>
            </div>
            <div class="card-body">
                <table id="attributeTable" class="table table-bordered w-100">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Attribute Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="attributeModal" tabindex="-1" role="dialog" aria-labelledby="attributeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="attributeForm">
                @csrf
                <input type="hidden" name="_method" id="formMethod" value="POST">
                <input type="hidden" id="attribute_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="attributeModalLabel">Add Attribute</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="attribute_name">Attribute Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="attribute_name" name="name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Attribute</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
$(document).ready(function () {
    let table = $('#attributeTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("attribute.index") }}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });

    // Open Modal for Add
    $('#addAttributeBtn').on('click', function () {
        $('#attributeForm')[0].reset();
        $('#attribute_id').val('');
        $('#formMethod').val('POST');
        $('#attributeModalLabel').text('Add Attribute');
        $('#attributeModal').modal('show');
    });

    // Submit Form (Create or Update)
    $('#attributeForm').on('submit', function (e) {
        e.preventDefault();
        let id = $('#attribute_id').val();
        let url = id ? '/masters/attribute-details/update/' + id : '{{ route("attribute.store") }}';
        let method = id ? 'PUT' : 'POST';
        let data = {
            name: $('#attribute_name').val(),
            _token: '{{ csrf_token() }}',
            _method: method
        };

        $.ajax({
            url: url,
            method: 'POST',
            data: data,
            success: function () {
                $('#attributeModal').modal('hide');
                table.ajax.reload();
                alert('Attribute ' + (id ? 'updated' : 'added') + ' successfully!');
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                alert('Something went wrong.');
            }
        });
    });

    // Edit
    $(document).on('click', '.edit-btn', function () {
        let id = $(this).data('id');
        $.get('/masters/attribute-details/edit/' + id, function (data) {
            $('#attribute_name').val(data.name);
            $('#attribute_id').val(data.id);
            $('#formMethod').val('PUT');
            $('#attributeModalLabel').text('Edit Attribute');
            $('#attributeModal').modal('show');
        });
    });

    // Delete
    $(document).on('click', '.delete-btn', function () {
        if (!confirm('Are you sure you want to delete this?')) return;
        let id = $(this).data('id');
        $.ajax({
            url: '/masters/attribute-details/delete/' + id,
            method: 'DELETE',
            data: { _token: '{{ csrf_token() }}' },
            success: function () {
                table.ajax.reload();
                alert('Attribute deleted successfully!');
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                alert('Delete failed.');
            }
        });
    });
});
</script>
@endpush
