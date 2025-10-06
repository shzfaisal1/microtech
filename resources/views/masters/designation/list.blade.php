@extends('master')
@section('main')
<div class="search-client-info">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    @if ($errors->any())                        
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>   
                    </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table id="designation" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Designation </th>
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
    $('#designation').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('designation.index') }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'designation', name: 'designation' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });


    
});



</script>
@endpush
