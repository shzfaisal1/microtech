@extends('master')

@section('main')

<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Account Master</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>
</div>
<!--End Page header-->

<!-- search-client-info -->
<form action="{{ route('account.store') }}" method="POST">
    @csrf

    <div class="search-client-info">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                       @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                      
                    <div class="card-header">
                        <h3 class="card-title">Add Account Master Details</h3>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="account_name">Account Name <span class="text-danger">*</span> :</label>
                                    <input type="text" class="form-control" id="account_name" placeholder="" name="account_name">


                                    <div>
                                        <br>
                                        <input type="checkbox" name="is_Default" id="financial_year" value="1" />
                                        <label for="is_current">Set as current financial year</label>
                                    </div>

                                </div>
                            </div>
                        </div>


                     <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="from_date"> Account Holder Name <span class="text-danger">*</span> : </label>

                                    <input type="text" class="form-control" placeholder="" name="account_holder_name" id="from_date">

                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="account_holder_add">Account Holder Address<span class="text-danger">*</span> :</label>
                                    <input type="text" class="form-control" placeholder="" name="account_holder_add" id="account_holder_add">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="account_no">Account Number<span class="text-danger">*</span>  :</label>
                                        <input type="number" class="form-control" placeholder="" name="account_no" id="account_no">

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="bank_name">Bank Name<span class="text-danger">*</span>  :</label>
                                        <input type="text" class="form-control" placeholder="" name="bank_name" id="bank_name">

                                </div>
                            </div>
                        </div>

                          <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="branch">Branch<span class="text-danger">*</span>  :</label>
                                        <input type="text" class="form-control" placeholder="" name="branch" id="branch">

                                </div>
                            </div>
                        </div>

                        
                          <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="ifsc">IFSC<span class="text-danger">*</span>  :</label>
                                        <input type="text" class="form-control" placeholder="" name="ifsc" id="branch">

                                </div>
                            </div>
                        </div>

                         <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="bank_add">Bank Address<span class="text-danger">*</span>  :</label>
                                        <input type="text" class="form-control" placeholder="" name="bank_add" id="bank_add">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <div class="d-inline-block">
                                    <button type="submit" class="btn btn-primary me-2">
                                        Add
                                    </button>
                                    <a href="/" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>

@endsection