@extends('master')

@section('main')

<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Edit Account Master</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>
</div>
<!--End Page header-->

<!-- Edit form -->
<form action="{{ route('account.update', $account->id) }}" method="POST">
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
                        <h3 class="card-title">Edit Account Master Details</h3>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="account_name">Account Name <span class="text-danger">*</span> :</label>
                                    <input type="text" class="form-control" name="account_name"
                                        value="{{ old('account_name', $account->account_name) }}">

                                    <div class="mt-2">
                                        <input type="checkbox" name="is_Default" id="financial_year" value="1"
                                            {{ old('is_Default', $account->is_Default) ? 'checked' : '' }}>
                                        <label for="financial_year">Set as current financial year</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="account_holder_name">Account Holder Name <span class="text-danger">*</span> :</label>
                                    <input type="text" class="form-control" name="account_holder_name"
                                        value="{{ old('account_holder_name', $account->account_holder_name) }}">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="account_holder_add">Account Holder Address <span class="text-danger">*</span> :</label>
                                    <input type="text" class="form-control" name="account_holder_add"
                                        value="{{ old('account_holder_add', $account->account_holder_add) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="account_no">Account Number <span class="text-danger">*</span> :</label>
                                    <input type="number" class="form-control" name="account_no"
                                        value="{{ old('account_no', $account->account_no) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="bank_name">Bank Name <span class="text-danger">*</span> :</label>
                                    <input type="text" class="form-control" name="bank_name"
                                        value="{{ old('bank_name', $account->bank_name) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="branch">Branch <span class="text-danger">*</span> :</label>
                                    <input type="text" class="form-control" name="branch"
                                        value="{{ old('branch', $account->branch) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="ifsc">IFSC <span class="text-danger">*</span> :</label>
                                    <input type="text" class="form-control" name="ifsc"
                                        value="{{ old('ifsc', $account->ifsc) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="bank_add">Bank Address <span class="text-danger">*</span> :</label>
                                    <input type="text" class="form-control" name="bank_add"
                                        value="{{ old('bank_add', $account->bank_add) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col text-center">
                                <div class="d-inline-block">
                                    <button type="submit" class="btn btn-success me-2">
                                        Update
                                    </button>
                                    <a href="{{ route('account.index') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </div>

                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->
            </div>
        </div>
    </div>
</form>

@endsection
