@extends('master')

@section('main')
<div class="search-client-info">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    @if(session('report_delete'))
                    <div class="alert alert-danger">
                        {{ session('report_delete') }}
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table id="report" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Report Type</th>
                                    <th>Report</th>
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
    $('#report').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('report.index') }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'report_type', name: 'report_type' },
            { data: 'report', name: 'report', orderable: false, searchable: false },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });


    
});



</script>
@endpush
