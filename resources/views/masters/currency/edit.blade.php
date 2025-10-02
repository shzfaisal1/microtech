@extends('master')

@section('main')
    <div class="page-header">
        <div class="page-leftheader">
            <h4 class="page-title">Edit Currency</h4>
            <ol class="breadcrumb pl-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('currency.index') }}">Currency</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </div>
    </div>

    <form action="{{ route('currency.update', $currency->id) }}" method="POST">
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
                            <h3 class="card-title">Edit Currency Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="currency_name">Currency Name <span class="text-danger">*</span> :</label>
                                        <input type="text" class="form-control" id="currency_name" name="currency_name" value="{{ old('currency_name', $currency->currency_name) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="value">Value (Against 1 INR) <span class="text-danger">*</span> :</label>
                                        <input type="number" class="form-control" id="value" name="value" value="{{ old('value', $currency->value) }}">
                                    </div>
                                </div>
                            </div>
                                 <div class="mt-2">
                                        <input type="checkbox" name="is_Default" id="financial_year" value="1"
                                            {{ old('is_Default', $currency->is_Default) ? 'checked' : '' }}>
                                        <label for="financial_year">Set as current financial year</label>
                                    </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="symbol">Symbol <span class="text-danger">*</span> :</label>
                                        <input type="text" class="form-control" id="symbol" name="symbol" value="{{ old('symbol', $currency->symbol) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col text-center">
                                    <div class="d-inline-block">
                                        <button type="submit" class="btn btn-primary me-2">Update</button>
                                        <a href="{{ route('currency.index') }}" class="btn btn-secondary">Cancel</a>
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
