@extends('master')

@section('main')
<div class="search-client-info">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                    @if(session('reminder_delete'))
                    <div class="alert alert-danger">
                        {{ session('reminder_delete') }}
                    </div>
                    @endif
                     @if(session('add_reminder'))

                        <div class="alert alert-success">
                            {{session('add_reminder')}}
                        </div>
                        @endif

                        @if(session('update_reminder'))

                        <div class="alert alert-success">
                            {{session('update_reminder')}}
                        </div>
                        @endif

                    <div class="table-responsive">
                        <table id="reminder" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Reminder Value </th>
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
    $('#reminder').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('reminder.index') }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'reminder_value', name: 'reminder_value' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });


    
});



</script>
@endpush
