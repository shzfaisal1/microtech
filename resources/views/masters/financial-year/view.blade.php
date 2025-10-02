@extends('master')

@section('main')
<div class="search-client-info">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    @if(session('invoice_delete'))
                    <div class="alert alert-danger">
                        {{ session('invoice_delete') }}
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table id="financial_year" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Financial Year</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Description</th>
                                    <th>Default</th>

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
    $('#financial_year').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('financial.index') }}",
        columns: [
           { data: 'id', name: 'id' },
                { data: 'financial_year', name: 'financial_year' },
                { data: 'from_date', name: 'from_date' },
                { data: 'to_date', name: 'to_date' },
                { data: 'description', name: 'description' },
                 { data: 'is_Default', name: 'is_Default', orderable: false, searchable: false },            
                { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });


    
});



</script>
@endpush
