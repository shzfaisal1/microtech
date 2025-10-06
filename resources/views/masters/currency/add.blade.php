@extends('master')

@section('main')

<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">
            Currency
        </h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>
</div>
<!--End Page header-->

<!-- search-client-info -->
<form action="{{ route('currency.store') }}" method="POST">
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
                        <h3 class="card-title">Add Currency Name</h3>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="currency_name">Currency Name<span class="text-danger">*</span> :</label>
                                    <input type="text" class="form-control" id="currency_name" placeholder="" name="currency_name">


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
                                    <label for="value">Value (Against 1 INR) <span class="text-danger">*</span> :</label>
                                    <input type="number" class="form-control" placeholder="" name="value" id="value">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col">
                                <div class="form-group">
                                    <label for="symbol">Symbol <span class="text-danger">*</span> :</label>
                                    <input type="text" class="form-control" placeholder="" name="symbol" id="symbol">
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