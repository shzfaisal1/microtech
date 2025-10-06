@extends('master')

@section('main')
<div class="search-client-info">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                     @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                     @if (session('delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('delete') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                    <div class="table-responsive">
                        <table id="quater" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Quarter</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
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
    $('#quater').DataTable({
     
        processing: true,
        serverSide: true,
        ajax: "{{ route('quarter.index') }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'from_date', name: 'from_date' },
            { data: 'to_date', name: 'to_date' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ],
       
    });
});



</script>
@endpush
