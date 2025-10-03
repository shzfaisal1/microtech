{{-- resources/views/quarters/edit.blade.php --}}
@extends('master')

@section('main')

<!-- Page Header -->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Edit Quarter Details</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>
</div>

<form action="{{ route('quarter.update', $quarter->id) }}" method="POST">
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
                        <h3 class="card-title">Update Quarter</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="quarter_name">Quarter Name <span class="text-danger">*</span> :</label>
                                    <input type="text" class="form-control" id="quarter_name" name="name"
                                           value="{{ old('quarter_name', $quarter->quarter_name) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="from_date">From Date <span class="text-danger">*</span> :</label>
                                    <input type="date" class="form-control" name="from_date" id="from_date"
                                           value="{{ old('from_date', $quarter->from_date) }}">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="to_date">To Date <span class="text-danger">*</span> :</label>
                                    <input type="date" class="form-control" name="to_date" id="to_date"
                                           value="{{ old('to_date', $quarter->to_date) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col text-center">
                                <div class="d-inline-block">
                                    <button type="submit" class="btn btn-primary me-2">Update</button>
                                    <a href="{{ route('quarter.index') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </div>

                    </div> <!-- card-body -->

                </div>
            </div>
        </div>
    </div>

</form>

@endsection
