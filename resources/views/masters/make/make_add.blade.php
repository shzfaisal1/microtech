@extends('master')

@section('main')

<!-- Page header -->
<div class="page-header">
	<div class="page-leftheader">
		<h4 class="page-title">Make Details</h4>
		<ol class="breadcrumb pl-0">
			<li class="breadcrumb-item"><a href="#">Home</a></li>
			<li class="breadcrumb-item active">Dashboard</li>
		</ol>
	</div>
</div>
<!-- End Page header -->

<!-- Row -->
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Make List</div>
                <div class="card-options">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addMakeDetails">Add Make Details</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="makeTable" class="table table-striped table-bordered w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Make Name</th>
                                <th>Calculate Incentive</th>
                                <th>Note</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal client-information-model" id="addMakeDetails">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Make Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <form id="addMakeForm" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Make Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="make_id">
                    </div>

                    <div class="form-group">
                        <label>Note</label>
                        <textarea class="form-control" name="note" id="comment" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Calculate Incentive</label><br>
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="calculate_incentive" value="1">
                            <span class="custom-control-label">Check if yes</span>
                        </label>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary" id="submitBtn">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
let table;

$(document).ready(function () {

   
    table = $('#makeTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route("make.index") }}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'calculate_incentive', name: 'calculate_incentive', orderable: false, searchable: false },
            { data: 'note', name: 'note' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });

    
    $('#addMakeForm').on('submit', function (e) {
        e.preventDefault();

        let id = $(this).data('id');
        let url = id ? '/masters/make/update/' + id : '{{ route("make.store") }}';
        let method = id ? 'PUT' : 'POST';

        let formData = {
            name: $('#make_id').val(),
            note: $('#comment').val(),
            calculate_incentive: $('input[name="calculate_incentive"]').is(':checked') ? 1 : 0,
            _token: '{{ csrf_token() }}'
        };

        if (id) formData._method = 'PUT';

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            success: function () {
                alert(id ? 'Updated successfully' : 'Added successfully');
                $('#addMakeForm')[0].reset();
                $('#addMakeForm').removeAttr('data-id');
                $('#addMakeDetails .modal-title').text('Add Make Details');
                $('#submitBtn').text('Add');
                $('#addMakeDetails').modal('hide');
                table.ajax.reload();
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                alert('Something went wrong.');
            }
        });
    });

    $(document).on('click', '.edit-btn', function () {
        let id = $(this).data('id');

        $.get('/masters/make/edit/' + id, function (data) {
            $('#make_id').val(data.name);
            $('#comment').val(data.note);
            $('input[name="calculate_incentive"]').prop('checked', data.calculate_incentive == 1);
            $('#addMakeForm').attr('data-id', id);
            $('#addMakeDetails .modal-title').text('Update Make Details');
            $('#submitBtn').text('Update');
            $('#addMakeDetails').modal('show');
        });
    });

   
    $(document).on('click', '.delete-btn', function () {
        if (!confirm('Are you sure you want to delete this?')) return;

        let id = $(this).data('id');

        $.ajax({
            url: '/masters/make/delete/' + id,
            method: 'get',
            data: { _token: '{{ csrf_token() }}' },
            success: function () {
                alert('Deleted successfully');
                table.ajax.reload();
            },
            error: function (xhr) {
                console.log(xhr.responseText);
                alert('Delete failed.');
            }
        });
    });

    // Reset modal on close
    $('#addMakeDetails').on('hidden.bs.modal', function () {
        $('#addMakeForm')[0].reset();
        $('#addMakeForm').removeAttr('data-id');
        $('#addMakeDetails .modal-title').text('Add Make Details');
        $('#submitBtn').text('Add');
    });
});
</script>
@endpush
