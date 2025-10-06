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
                     @if(session('add_expenseType'))

                        <div class="alert alert-success">
                            {{session('add_expenseType')}}
                        </div>
                        @endif

                        @if(session('update_expenseType'))

                        <div class="alert alert-success">
                            {{session('update_expenseType')}}
                        </div>
                        @endif
                    <div class="table-responsive">
                        <table id="expense" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Expense Type</th>
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
    $('#expense').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('expense.index') }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'expense', name: 'expense' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });


    
});



</script>
@endpush
