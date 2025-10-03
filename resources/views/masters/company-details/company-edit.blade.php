@extends('master')

@section('main')

<!--Page header-->
<div class="page-header">
    <div class="page-leftheader">
        <h4 class="page-title">Company Details</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>
</div>
<!--End Page header-->

<form action="{{ route('masters.company-details.update', $company->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="search-client-info">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Company Invoice</h3>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Company Name <span class="text-danger">*</span> :</label>
                                    <input type="text" class="form-control" name="company_name" value="{{ old('company_name', $company->company_name) }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Contact No :</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="contact_num" value="{{ $company->contact_num }}">
                                        <input type="text" class="form-control" name="contact_num1" value="{{ $company->contact_num1 }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Print As :</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="print_as" value="{{ $company->print_as }}">
                                        <input type="text" class="form-control" name="print_as1" value="{{ $company->print_as1 }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Company Prefix <span class="text-danger">*</span>:</label>
                                    <input type="text" class="form-control" name="company_prefix" value="{{ $company->company_prefix }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Email ID :</label>
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control" name="email_id" value="{{ $company->email_id }}">
                                        <input type="email" class="form-control" name="email_id1" value="{{ $company->email_id1 }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Address :</label>
                                    <textarea class="form-control" rows="3" name="address">{{ $company->address }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>City :</label>
                                    <input type="text" class="form-control" name="city" value="{{ $company->city }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>FAX :</label>
                                    <input type="text" class="form-control" name="fax" value="{{ $company->fax }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Country :</label>
                                    <input type="text" class="form-control" name="country" value="{{ $company->country }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Web Address :</label>
                                    <input type="text" class="form-control" name="web_address" value="{{ $company->web_address }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>State :</label>
                                    <input type="text" class="form-control" name="state" value="{{ $company->state }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>VAT TIN No/Date :</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="vat_tin" value="{{ $company->vat_tin }}">
                                        <input type="date" class="form-control" name="vat_tin_date" value="{{ $company->vat_tin_date }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>PAN NO :</label>
                                    <input type="text" class="form-control" name="pan_no" value="{{ $company->pan_no }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>CST TIN No/Date :</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="cst_tin" value="{{ $company->cst_tin }}">
                                        <input type="date" class="form-control" name="cst_tin_date" value="{{ $company->cst_tin_date }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>PT NO :</label>
                                    <input type="text" class="form-control" name="pt_no" value="{{ $company->pt_no }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Service Tax No :</label>
                                    <input type="text" class="form-control" name="service_tax" value="{{ $company->service_tax }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Subject Jurisdiction :</label>
                                    <input type="text" class="form-control" name="subject_jur" value="{{ $company->subject_jur }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>LICENSE NO :</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="license_no" value="{{ $company->license_no }}">
                                        <input type="text" class="form-control" name="license_no1" value="{{ $company->license_no1 }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Sales invoice Heading :</label>
                                    <input type="text" class="form-control" name="sale_invoice" value="{{ $company->sale_invoice }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col text-center">
                                <div class="d-inline-block">
                                    <button type="submit" class="btn btn-primary me-2">Update</button>
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
