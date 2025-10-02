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
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>

    </div>
@endif

                    <div class="table-responsive">
                        <table id="designation" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Name </th>
                                    <th>Print As</th>
                                    <th>Address</th>
                                    <th>Contact No</th>
                                    <th>Email ID</th>
                                    <th>Web Address</th>
                                    <th>PAN</th>
                                    <th>GSTIN</th>
                                    <th>VAT TIN NO</th>                              
                                    <th>CST TIN NO</th>
                                    <th>Service Tax No</th>
                                    <th>Bank Name</th>
                                    <th>Bank Address</th>
                                    <th>Account No</th>
                                    <th>IFSC Code</th>
                                    <th>Branch Name</th>
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
        ajax: "{{ route('vendor.index') }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'print_name_as', name: 'print_name_as' },
            { data: 'address', name: 'address' },
            { data: 'phone', name: 'phone' },
            { data: 'email', name: 'email' },
            { data: 'web_address', name: 'web_address' },
            { data: 'pan_no', name: 'pan_no' },
            { data: 'gst_no', name: 'gst_no' },
            { data: 'vat_no', name: 'vat_no' },
            { data: 'cst_no', name: 'cst_no' },
            { data: 'service_tax_no', name: 'service_tax_no' },
            { data: 'bank_name', name: 'bank_name' },
            { data: 'bank_add', name: 'bank_add' },
            { data: 'bank_account_no', name: 'bank_account_no' },
            { data: 'bank_ifsc_code', name: 'bank_ifsc_code' },
            { data: 'bank_branch_name', name: 'bank_branch_name' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });


    
});



</script>
@endpush
