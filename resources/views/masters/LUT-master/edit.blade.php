@extends('master')

@section('main')
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Edit LUT Details</h4>
    </div>
</div>

<form action="{{ route('LUT.update', $lut->id) }}" method="POST">
    @csrf
    <div class="search-client-info">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit LUT</h3>
                    </div>
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

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="financial_year_id">Financial Year<span class="text-danger">*</span> :</label>
                                    <select class="form-select w-100" name="financial_year_id" required>
                                        @foreach ($FinancialYear as $year)
                                            <option value="{{ $year->id }}" {{ $lut->financial_year_id == $year->id ? 'selected' : '' }}>
                                                {{ $year->financial_year }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="LUT_number">LUT Number <span class="text-danger">*</span>:</label>
                                    <textarea class="form-control" name="LUT_number" rows="3">{{ $lut->LUT_number }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="LUT_note">LUT Note</label>
                                    <input class="form-control" name="LUT_note" type="text" value="{{ $lut->LUT_note }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('LUT.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
