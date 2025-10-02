@extends('master')

@section('main')
<div class="search-client-info">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    @if(session('buyer_delete'))
                    <div class="alert alert-danger">
                        {{ session('buyer_delete') }}
                    </div>
                    @endif
                     @if(session('add_buyer'))

                        <div class="alert alert-success">
                            {{session('add_buyer')}}
                        </div>
                        @endif
                         @if(session('update_buyer'))

                        <div class="alert alert-success">
                            {{session('update_buyer')}}
                        </div>
                        @endif

                    <div class="table-responsive">
                        <table id="buyer" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Buyer </th>
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
    $('#buyer').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('buyer.index') }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'buyer_name', name: 'buyer_name' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });


    
});



</script>
@endpush
