@extends('master')

@section('main')

<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Financial Year</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>
</div>
<!--End Page header-->

<!-- search-client-info -->
<form action="{{ route('financial.store') }}" method="POST">
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
                        @if(session('Financial_Year'))

                        <div class="alert alert-success">
                            {{session('Financial_Year')}}
                        </div>
                        @endif
                    <div class="card-header">
                        <h3 class="card-title">Add Financial Year</h3>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="uname">Financial Year <span class="text-danger">*</span> :</label>
                                    <input type="text" class="form-control" id="financial_year" placeholder="" name="financial_year">


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
                                    <label for="from_date">From Date  <span class="text-danger">*</span> : </label>

                                    <input type="date" class="form-control" placeholder="" name="from_date" id="from_date">

                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="to_date">To Date  <span class="text-danger">*</span> :</label>
                                    <input type="date" class="form-control" placeholder="" name="to_date" id="to_date">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="description">Description :</label>
                                    <textarea class="form-control" rows="3" name="description" id="description"></textarea>
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