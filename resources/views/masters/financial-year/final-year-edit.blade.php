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

<form action="{{ route('financial.update', $financialYear->id) }}" method="POST">
    @csrf
    @method('POST')

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
                            {{ session('Financial_Year') }}
                        </div>
                    @endif

                    <div class="card-header">
                        <h3 class="card-title">Edit Financial Year</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Financial Year <span class="text-danger">*</span> :</label>
                                    <input type="text" class="form-control" name="financial_year"
                                        value="{{ old('financial_year', $financialYear->financial_year) }}">

                                    <div class="mt-2">
                                        <input type="checkbox" name="is_Default" value="1"
                                            {{ $financialYear->is_Default == 1 ? 'checked' : '' }}>
                                        <label for="is_Default">Set as current financial year</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>From Date <span class="text-danger">*</span> :</label>
                                    <input type="date" class="form-control" name="from_date"
                                        value="{{ old('from_date', $financialYear->from_date) }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>To Date <span class="text-danger">*</span> :</label>
                                    <input type="date" class="form-control" name="to_date"
                                        value="{{ old('to_date', $financialYear->to_date) }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Description:</label>
                            <textarea class="form-control" name="description" rows="3">{{ old('description', $financialYear->description) }}</textarea>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('financial.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


@endsection