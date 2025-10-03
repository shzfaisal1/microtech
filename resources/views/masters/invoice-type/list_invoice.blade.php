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
                        <table id="invoiceTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Invoice Type</th>
                                    <th>Stamp Description</th>
                                    <th>Unstamp Description</th>
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
    $('#invoiceTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('invoice.index') }}",
        columns: [
                { data: 'id', name: 'id' },
                { data: 'invoice_type', name: 'invoice_type' },
                { data: 'stamp_description', name: 'stamp_description' },
                { data: 'unstamp_description', name: 'unstamp_description' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });


    
});



</script>
@endpush
