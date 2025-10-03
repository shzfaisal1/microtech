@extends('master')

@section('main')
<div class="search-client-info">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    @if(session('expense_delete'))
                    <div class="alert alert-danger">
                        {{ session('expense_delete') }}
                    </div>
                    @endif
                    
                       @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                        @if(session('update_expenseType'))

                        <div class="alert alert-success">
                            {{session('update_expenseType')}}
                        </div>
                        @endif
                    <div class="table-responsive">
                        <table id="location" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Stock Location</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')



<script>
 $(document).ready(function() {
    $.fn.dataTable.ext.errMode = 'throw';
    $('#location').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('location.index') }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'location_name', name: 'location_name' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });


    
});



</script>
@endpush
