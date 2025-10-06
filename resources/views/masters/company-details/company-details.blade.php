@extends('master')

@section('main')

<!--Page header-->
<div class="page-header d-flex justify-content-between align-items-center">
    <div class="page-leftheader">
        <h4 class="page-title">Company Details</h4>
        <ol class="breadcrumb pl-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>

    <div class="page-rightheader">
        {{-- View List button (change route if needed) --}}
        <a href="{{ route('masters.company-details.view-file') }}" class="btn btn-primary btn-sm">
            <i class="fa fa-list"></i> View List
        </a>
    </div>
</div>

<form action="{{ isset($company) ? route('masters.company-details.update', $company->id) : route('masters.company-details.store') }}" method="POST">
    @csrf
    @if(isset($company))
    @method('PUT')
    @endif

    <div class="search-client-info">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add Company Invoice</h3>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="uname">Company Name <span class="text-danger">*</span> :</label>
                                    <input type="hidden" name="id" id="company_id">
                                    <input type="text" class="form-control" id="company_name" placeholder="" name="company_name" value="{{ old('company_name', $company->company_name ?? '') }}">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="uname">Contact No :</label>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" placeholder="Contact Number" name="contact_num" id="contact_num" title="Please enter exactly 10 digits">
                                        <input type="number" class="form-control" placeholder="Contact Number 2" name="contact_num1" id="contact_num1" title="Please enter exactly 10 digits">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="uname">Print As :</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="" name="print_as" id="print_as" value="{{ old('print_as', $company->print_as ?? '') }}">
                                        <input type="text" class="form-control" placeholder="" name="print_as1" id="print_as1" value="{{ old('print_as1', $company->print_as1 ?? '') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                           <div class="col">
                         <div class="form-group">
                            <label for="company_prefix">Company Prefix <span class="text-danger">*</span>:</label>
                            <select class="form-control" id="company_prefix" name="company_prefix">
                                <option value="">-- Select Company Prefix --</option>
                                <option value="MIM" {{ old('company_prefix', $company->company_prefix ?? '') == 'MIM' ? 'selected' : '' }}>MIM</option>
                                <option value="MIC" {{ old('company_prefix', $company->company_prefix ?? '') == 'MIC' ? 'selected' : '' }}>MIC</option>
                            </select>
                        </div>
                         </div>


                            <div class="col">
                                <div class="form-group">
                                    <label for="uname">Email ID :</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="" name="email_id" id="email_id" value="{{ old('email_id', $company->email_id ?? '') }}">
                                        <input type="text" class="form-control" placeholder="" name="email_id1" id="email_id1" value="{{ old('email_id1', $company->email_id1 ?? '') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="comment">Address :</label>
                                    <textarea class="form-control" rows="3" name="address" id="address">{{ old('address', $company->address ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="uname">City :</label>
                                    <input type="text" class="form-control" id="city" placeholder="" name="city" value="{{ old('city', $company->city ?? '') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="uname">Country :</label>
                                    <input type="text" class="form-control" id="country" placeholder="" name="country" value="{{ old('country', $company->country ?? '') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="uname">Website</label>
                                    <input type="text" class="form-control" id="web_address" placeholder="" name="web_address" value="{{ old('web_address', $company->web_address ?? '') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="uname">State :</label>
                                    <input type="text" class="form-control" id="state" placeholder="" name="state" value="{{ old('state', $company->state ?? '') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="uname">PAN NO :</label>
                                    <input type="text" class="form-control" id="pan_no" placeholder="" name="pan_no" value="{{ old('pan_no', $company->pan_no ?? '') }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="uname">TAN No :</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="" name="cst_tin" id="cst_tin" value="{{ old('cst_tin', $company->cst_tin ?? '') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="uname">Subject Jurisdiction :</label>
                                    <input type="text" class="form-control" id="subject_jur" placeholder="" name="subject_jur" value="{{ old('subject_jur', $company->subject_jur ?? '') }}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="uname">lICENSE NO :</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="" name="license_no" id="license_no" value="{{ old('license_no', $company->license_no ?? '') }}">
                                        <input type="text" class="form-control" placeholder="" name="license_no1" id="license_no1" value="{{ old('license_no1', $company->license_no1 ?? '') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="uname">Sales invoice Heading :</label>
                                    <input type="text" class="form-control" id="sale_invoice" placeholder="" name="sale_invoice" value="{{ old('sale_invoice', $company->sale_invoice ?? '') }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col text-center">
                                <div class="d-inline-block">
                                    <button type="submit" class="btn btn-primary me-2">
                                        {{ isset($company) ? 'Update' : 'Add' }}
                                    </button>
                                    <a href="/" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </div>
                        <!-- @dump('Add'); -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>
<!-- End search-client-info -->

@endsection
