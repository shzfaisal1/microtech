@extends('master')

@section('main')
<div class="search-client-info">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">

                  
                      @if (session('add_account'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('add_account') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                     @if (session('delete_account'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('delete_account') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('update_account'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('update_account') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif


                    <div class="table-responsive">
                        <table id="account" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Account Holder Name</th>
                                    <th>Default</th>
                                    <th>Account Holder Address</th>
                                    <th>Account Number</th>
                                    <th>Bank Name</th>
                                    <th>Branch</th>
                                    <th>IFSC</th>                           
                                    <th>Bank Address</th>                                             
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
    $('#account').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('account.index') }}",
        columns: [
                { data: 'id', name: 'id' },
                { data: 'account_name', name: 'account_name' },
                { data: 'is_Default', name: 'is_Default', orderable: false, searchable: false },            
                { data: 'account_holder_name', name: 'account_holder_name' },
                { data: 'account_holder_add', name: 'account_holder_add' },
                { data: 'account_no', name: 'account_no' },
                { data: 'bank_name', name: 'bank_name' },
                { data: 'branch', name: 'branch' },
                { data: 'ifsc', name: 'ifsc' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });


    
});



</script>
@endpush
