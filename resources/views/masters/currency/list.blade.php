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
                        <table id="currency" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Currency Name</th>
                                    <th>Currency Value</th>
                                    <th>Symbol Currency</th>                              
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
    $('#currency').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('currency.index') }}",
        columns: [
           { data: 'id', name: 'id' },
                { data: 'currency_name', name: 'currency_name' },
                { data: 'value', name: 'value' },
                { data: 'symbol', name: 'symbol' },
                 { data: 'is_Default', name: 'is_Default', orderable: false, searchable: false },            
                { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });


    
});



</script>
@endpush
