@extends('master')

@section('main')

<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Purchase Entry</h4>
								<ol class="breadcrumb pl-0">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</div>
						</div>
						<!--End Page header-->

                        <!-- search-client-info -->
                        <div class="search-client-info">
                            <div class="row">
							    <div class="col-lg-12 col-md-12">
							    	<div class="card">
							    		<div class="card-body">
                                            <div class="row">
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Company Name <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" name="company_id" id="company_id" data-placeholder="Choose one (with searchbox)">
																<optgroup>
                                                                @if(isset($companies) && count($companies) > 0)
                                                                    @foreach($companies as $company)
                                                                        <option value="{{$company->id}}">{{$company->company_name}}</option>    
                                                                    @endforeach
                                                                @endif
																
																</optgroup>
															</select>
                                                	        <div class="input-group-append">
                                                	            <a href="{{url('company-details')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Financial Year <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" id="financial_year_id" name="financial_year_id" data-placeholder="Choose one (with searchbox)">
																<optgroup >

                                                                    @if(isset($financial) && count($financial) > 0)
                                                                   
                                                                        @foreach($financial as $value)
                                                                  
                                                                            <option value="{{$value->id}}">{{$value->financial_year}}</option>
                                                                        @endforeach
                                                                    @endif

																	
																
																</optgroup>
															</select>
                                                	        <div class="input-group-append">
                                                	          <a href="{{url('financial-year-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                            </div>
                                        
							    		</div>
							    	</div>
							    </div>
						    </div>
                        </div>
						<!-- End search-client-info -->

                        <!-- search-client-info -->
                        <div class="search-client-info">
                            <div class="row">
							    <div class="col-lg-12 col-md-12">
							    	<div class="card">
							    		<div class="card-header">
							    			<h3 class="card-title">Add Purchase Invoice</h3>
							    		</div>
							    		<div class="card-body">
                                            <div class="row">
                                            	<div class="col">
                                                    <input type="hidden" id="item_id" />

                                                    <input type="hidden" id="invoice_id" value="{{ $invoice->invoice_number }}">
                                            	    <div class="form-group">
                                            	        <label for="uname">Invoice No/Date :</label>
                                            	        <div class="input-group mb-3">
                                            	            <input type="text" name="invoice_number" id="invoice_number" class="form-control" placeholder="" value="{{ $invoice->invoice_number }}">
                                            	            <input type="date" 	name="invoice_date"	id="invoice_date" class="form-control" placeholder="" value="{{ $invoice->invoice_date }}">
                                            	        </div>
                                            	    </div>
                                            	</div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="uname">PO No/Date :</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" name="po_number" placeholder="" id="po_number" value="{{ $invoice->po_no }}">
                                                            <input type="date" class="form-control" name="po_date" placeholder="" id="po_date" value="{{ $invoice->po_date }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                            	        <label for="uname">Duty Paid Date :</label>
                                        	            <input type="date" class="form-control" placeholder="" id="duty_paid_date" name="duty_paid_date" value="{{ $invoice->duty_paid_date }}">
                                            	    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Buyer <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	      <select class="form-control select2-show-search" name="buyer_id" id="buyer_id" data-placeholder="Choose one (with searchbox)">
                                                                        <option value=""></option>
                                                                        @foreach($buyers as $buyer)
                                                                            <option value="{{ $buyer->id }}" {{ $invoice->buyer_id == $buyer->id ? 'selected' : '' }}>
                                                                                {{ $buyer->buyer_name }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                	        <div class="input-group-append">
                                                	            <a href="{{route('buyer.create')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Consignee <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	    <select class="form-control select2-show-search" name="consignee_id" id="consignee_id" data-placeholder="Choose one (with searchbox)">
                                                            <option value=""></option>
                                                            @foreach($consignees as $consignee)
                                                                <option value="{{ $consignee->id }}" {{ $invoice->consignee_id == $consignee->id ? 'selected' : '' }}>
                                                                    {{ $consignee->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                	        <div class="input-group-append">
                                                	          <a href="{{route('consignee.create')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                                <div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Inward Date <span class="text-danger">*</span> :</label>
                                            	        <input type="date" class="form-control" placeholder="" id="inward_date" name="inward_date" value="{{ $invoice->inward_date }}">
                                            	    </div>
                                            	</div>
                                            </div>
											
                                            <div class="row">
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Vendor Name <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	  <select class="form-control select2-show-search" id="vendor_id" name="vendor_id" data-placeholder="Choose one (with searchbox)">
                                                            <option value=""></option>
                                                            @foreach($vendors as $vendor)
                                                                <option value="{{ $vendor->id }}" {{ $invoice->vendor_id == $vendor->id ? 'selected' : '' }}>
                                                                    {{ $vendor->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                	        <div class="input-group-append">
                                                	            <a href="{{url('vendor-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                            	<div class="col">
                                            	    <div class="form-group">
                                                	    <label for="uname">Currency <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" id="currency_type" name="currency_type">
																
																	<option value="rupees">Rupee</option>
																	<option value="dollar">Dollar</option>									
															
															</select>
                                                	    </div>
                                                	</div>
                                            	</div>
                                                <div class="col">
                                            	    <div class="form-group">
                                                        <label for="uname">Value <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                            <input type="number" class="form-control" placeholder="" id="currency_value" name="value">
                                                            <div class="input-group-append">
                                                	            <a href="{{url('client-group-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Contact Person <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" name="contact_person" id="contact_person" data-placeholder="Choose one (with searchbox)">
																<optgroup label="Mountain Time Zone">
																	<option value="1">kapil</option>
																	<option value="2">demo</option>
																	
																
																</optgroup>
															</select>
                                                	    </div>
                                                	</div>
                                            	</div>
                                                <div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Make <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" id="product_id" name="product_id" data-placeholder="Choose one (with searchbox)">
																<optgroup label="Mountain Time Zone">
																	<option value="1">Arizona</option>
																	<option value="2">Colorado</option>
																	<option value="3">Idaho</option>
															
																</optgroup>
															</select>
                                                	        <div class="input-group-append">
                                                	            <a href="{{url('client-group-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                                <div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Model <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" name="model_id" id="model_select">
																<optgroup label="Mountain Time Zone">
																	<option value="AZ">Arizona</option>
																	<option value="CO">Colorado</option>
																	<option value="ID">Idaho</option>
																	<option value="MT">Montana</option><option value="NE">Nebraska</option>
																	<option value="NM">New Mexico</option>
																	<option value="ND">North Dakota</option>
																	<option value="UT">Utah</option>
																	<option value="WY">Wyoming</option>
																</optgroup>
															</select>
                                                	        <div class="input-group-append">
                                                	            <a href="{{url('client-group-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                            </div>

                                            <div class="row">
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Serial No <span class="text-danger">*</span> :</label>
                                            	        <input type="text" class="form-control" id="serial_no" placeholder="" name="serial_no">
                                            	    </div>
                                            	</div>
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">HSN Code <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" name="hsn_code" id="hsn_code" data-placeholder="Choose one (with searchbox)">
																
																	<option value="SAC Code">SAC Code</option>
																	<option value="HSN Code">HSN Code</option>
																	
															
															</select>
                                                	        <div class="input-group-append">
                                                                <input type="text" class="form-control" placeholder="" id="code_input">
                                                	        </div>
                                                	    </div>
                                                        
                                                	</div>
                                            	</div>
                                                <div class="col">
                                                    <label for="uname">Stamping :</label>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="stamping" name="stamp" value="option1">
                                                        <span class="custom-control-label">Select if yes</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">VC No/Date :</label>
                                            	        <div class="input-group mb-3">
                                            	            <input type="text" class="form-control" placeholder="" id="vc_no" name="vc_no">
                                            	            <input type="date" class="form-control" placeholder="" name="vc_date" id="vc_date"> 
                                            	        </div>
                                            	    </div>
                                            	</div>
                                                <div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Condition :</label>
                                            	        <input type="text" class="form-control"  placeholder="" name="condition" id="condition">
                                            	    </div>
                                            	</div>
                                                <div class="col">
                                                    <div class="form-group">
                                            	        <label for="uname">Stock Location :</label>
                                            	        <input type="text" class="form-control" placeholder="" name="stock_location" id="stock_location">
                                            	    </div>
                                                </div>
                                            </div>

                                            <div class="row" >
                                            <div class="form-group">
                                            <label for="quantity_input" >Quantity:</label>
                                            <input   type="number" id="quantity_input" class="form-control" value="1" min="1">
                                             </div>
                                                <div class="col">
                                                    <label for="uname">Price <span class="text-danger">*</span> :</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id ="currency_label">INR</span>
                                                        </div>
                                                      <input type="text" id="price_input" name="price" class="form-control" placeholder="Enter amount">
                                                    </div>
                                                </div>
                                                <div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Total <span class="text-danger">*</span> :</label>
                                            	        <input type="number"  class="form-control" id="total_price" placeholder="" name="total_amount">
                                            	    </div>
                                            	</div>
                                                <div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Price in INR <span class="text-danger">*</span> :</label>
                                            	      <input type="text" id="converted_price" name="converted_price" class="form-control" readonly>
                                            	    </div>
                                            	</div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                            	    <div class="form-group">
                                            	        <label for="comment">Description:</label>
                                            	        <textarea class="form-control" name="description" rows="3" id="description"></textarea>
                                            	    </div>
                                            	</div>
                                            </div>

                                             <button id="add_to_table" class="btn btn-primary mb-4">Add to Table</button>

                                             
                                           
                                                <button id="clear_form" class="btn btn-danger mb-4">Remove All</button>
                                           
							    		</div>
							    	</div>
							    </div>
						    </div>
                        </div>
						<!-- End search-client-info -->

                        <!-- search-client-info -->
                        <div class="search-client-info">
                            <div class="row">
							    <div class="col-lg-12 col-md-12">
							    	<div class="card">
							    		<div class="card-body">
                                            <div class="table-responsive">
                                                <table id="result_table" class="table table-striped table-bordered w-100">
                                                    <thead>
                                                        <tr>
                                                        
                                                            <th class="wd-15p">Make</th>
                                                            <th class="wd-15p">Model</th>
                                                            <th class="wd-15p">Serial No.</th>
                                                            <th class="wd-15p">Type of code</th>
                                                            <th class="wd-15p">Code</th>
                                                            <th class="wd-15p">Stamping</th>
                                                            <th class="wd-15p">Description</th>
                                                            <th class="wd-15p">Condition</th>
                                                            <th class="wd-15p">VC No</th>
                                                            <th class="wd-15p">VC Date</th>
                                                            <th class="wd-15p">Stock Location</th>
                                                            <th class="wd-15p">Quantity</th>
                                                            <th class="wd-15p">Price</th>
                                                            <th class="wd-15p">Total</th>
                                                            <th class="wd-15p">Price in INR</th>
                                                            <th class="wd-25p">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($items as $item)
                                                     <tr data-id="{{ $item->id }}">
                                                        <td data-value="{{ $item->product_id }}">{{ $item->product->name ?? '' }}</td>
                                                        <td data-value="{{ $item->model }}">{{ $item->model }}</td>
                                                        <td>{{ $item->serial_number }}</td>
                                                        <td>{{ $item->HSN_code }}</td>
                                                        <td>{{ $item->HSN_value }}</td>
                                                        <td>{{ $item->stamp ? 'Yes' : 'No' }}</td>
                                                        <td>{{ $item->description }}</td>
                                                        <td>{{ $item->condition }}</td>
                                                        <td>{{ $item->vc_no }}</td>
                                                        <td>{{ $item->vc_date }}</td>
                                                        <td>{{ $item->stock_location }}</td>
                                                        <td>{{ $item->quantity }}</td>
                                                        <td>{{ $item->price }}</td>
                                                        <td>{{ $item->price }}</td>
                                                        <td>{{ $item->price }}</td>
                                                        <td>
                                                            <a href="#" class="edit-row" id="edit_purchase"><i class="fa fa-edit"></i></a>
                                                            <a href="#" id="delete_purchase" class="text-danger"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                 @endforeach

                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                           
							    		</div>
							    	</div>
							    </div>
						    </div>
                        </div>

                          <!-- 4) CALCULATION PANEL (Net, Packing, Discount, Tax, Total, etc.) -->
            <div class="card shadow-sm rounded mb-4">
                <div class="card-body bg-light py-3">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <label class="form-label">Net Amount:</label>
                        
                            <input type="number" id="net_amount" class="form-control form-control-sm" value="{{ $invoice->net_amount }}" Readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Packing / Courier:</label>
                            <input type="number" id="packing" class="form-control form-control-sm" value="{{ $invoice->packing }}" step="0.01">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Discount:</label>
                            <input type="number" id="discount" class="form-control form-control-sm" value="{{ $invoice->discount }}" step="0.01">
                        </div>
                    </div>

                    <div class="row g-2 mt-2">
                        <div class="col-md-4">
                            <label class="form-label">Taxable Amount:</label>
                            <input type="text" id="taxable_amount" name="taxable_amount" value="{{ $invoice->taxable_amount }}"class="form-control form-control-sm" readonly>
                        </div>
                    <div class="col-md-4">
                                <label class="form-label" id="tax1_label">Tax 1:</label>
                                <select id="tax1_select" class="form-select form-select-sm">
                                @if(isset($taxes) && count($taxes) > 0)
                                @foreach($taxes as $tax)
                                    <option value="{{ $tax->tax_value }}"
                                        {{ $invoice->tax_type1_value == $tax->tax_value ? 'selected' : '' }}>
                                        {{ $tax->tax_name }}
                                    </option>
                                @endforeach
                                @endif
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" id="tax2_label">Tax 2:</label>
                                <select id="tax2_select" class="form-select form-select-sm">
                                @if(isset($taxes) && count($taxes) > 0)
                                @foreach($taxes as $tax)
                                    <option value="{{ $tax->tax_value }}"
                                        {{ $invoice->tax_type2_value == $tax->tax_value ? 'selected' : '' }}>
                                        {{ $tax->tax_name }}
                                    </option>
                                @endforeach
                        @endif
                                </select>
                            </div>
                    </div>

                    <div class="row g-2 mt-2">
                <div class="col-md-4">
                    <label class="form-label">Tax 1 Amount:</label>
                    <input type="number" id="tax1_amount" class="form-control form-control-sm"
                        value="{{ $invoice->tax1_amount ?? 0 }}" readonly>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Tax 2 Amount:</label>
                    <input type="number" id="tax2_amount" class="form-control form-control-sm"
                        value="{{ $invoice->tax2_amount ?? 0 }}" readonly>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Total:</label>
                    <input type="number" id="subtotal_amount" class="form-control form-control-sm"
                        value="{{ $invoice->total ?? 0 }}" readonly>
                </div>
            </div>

            <div class="row g-2 mt-2">
                <div class="col-md-4">
                    <label class="form-label">Round Off:</label>
                    <input type="number" id="round_off" class="form-control form-control-sm"
                        value="{{ $invoice->round_off ?? 0 }}" readonly>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-bold">Total:</label>
                    <input type="number" id="final_total" class="form-control form-control-sm fw-bold text-success"
                        value="{{ $invoice->final_total ?? 0 }}" readonly>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Advance:</label>
                    <input type="number" id="advance" class="form-control form-control-sm"
                        value="{{ $invoice->advance ?? 0 }}" step="0.01">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4 offset-md-4 text-center">
                    <label class="form-label fw-bold text-primary">Payable:</label>
                    <input type="number" id="payable" class="form-control form-control-sm fw-bold text-primary"
                        value="{{ $invoice->payable ?? 0 }}" readonly>
                </div>
            </div>


        <div class="row mt-4">
            <div class="col text-center">
                <button type="submit" id="save_invoice" class="btn btn-success btn-sm px-4 py-2 rounded-pill shadow-sm">
                    <i class="fa fa-save me-1"></i> Save Invoice
                </button>
            </div>
        </div>
    </div>
</div>

						

@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        const defaultRates = {
            rupees: 1.00,
            dollar: 85.7606
        };

        const currencyLabels = {
            rupees: 'INR',
            dollar: 'USD'
        };

        let userEdited = false;
        let editIndex = -1;

        function updateCurrencyFields() {
            const selectedCurrency = $('#currency_type').val();

            if (!userEdited) {
                $('#currency_value').val(defaultRates[selectedCurrency]);
            }
            $('#currency_label').text(currencyLabels[selectedCurrency]);

            if (selectedCurrency === 'dollar') {
                $('#tax1_label').text('Duty (%)');
                $('#tax2_label').text('CHA (%)');

                const tax1Val = $('#tax1_select').val() || '';
                const tax2Val = $('#tax2_select').val() || '';

                $('#tax1_select, #tax2_select').hide();

                if ($('#tax1_input').length === 0) {
                    $('<input type="text" id="tax1_input" class="form-control" />').insertAfter('#tax1_select');
                }
                if ($('#tax2_input').length === 0) {
                    $('<input type="text" id="tax2_input" class="form-control" />').insertAfter('#tax2_select');
                }

                $('#tax1_input').val(tax1Val);
                $('#tax2_input').val(tax2Val);

                $('#tax1_input, #tax2_input').off('input').on('input', function () {
                    recalcAll();
                });
            } else {
                $('#tax1_label').text('Tax1 (%)');
                $('#tax2_label').text('Tax2 (%)');
                $('#tax1_select, #tax2_select').show();
                $('#tax1_input, #tax2_input').remove();
            }

                 calculateLineItemTotals();
                 recalcAll();
        }

        function calculateLineItemTotals() {
            const selectedCurrency = $('#currency_type').val();
            const rate = parseFloat($('#currency_value').val());
            const price = parseFloat($('#price_input').val());
            const quantity = parseInt($('#quantity_input').val());
            

            if (isNaN(rate) || isNaN(price) || isNaN(quantity)) {
                $('#converted_price').val('');
                $('#total_price').val('');
                return;
            }

            const convertedPrice = selectedCurrency === 'dollar' ? price * rate : price;
            const total = convertedPrice * quantity;

            $('#converted_price').val(convertedPrice.toFixed(2));
            $('#total_price').val(total.toFixed(2));
        }

        function clearLineItemForm() {
            $('#product_id, #model_select, #serial_no, #hsn_code, #code_input, #description, #condition, #vc_no, #vc_date, #stock_location, #price_input, #quantity_input').val('');
            $('#stamping').prop('checked', false);
            $('#converted_price').val('');
            $('#total_price').val('');
            $('#item_id').val('');
            editIndex = -1;
            $('#add_to_table').text('Add to Table');
        }

        function addOrUpdateLineItem() {
            const selectedCurrency = $('#currency_type').val();
            const rate = parseFloat($('#currency_value').val());
            const price = parseFloat($('#price_input').val());
            const quantity = parseInt($('#quantity_input').val());

            if (isNaN(rate) || isNaN(price) || isNaN(quantity)) {
                alert('Please enter valid price and quantity.');
                return;
            }

            const convertedPrice = selectedCurrency === 'dollar' ? price * rate : price;
            const totalPrice = convertedPrice * quantity;
            const itemId = $('#item_id').val() || ''; 
                const newRow = `
                    <tr data-id="${itemId}">
                        <td data-value="${$('#product_id').val()}">${$('#product_id option:selected').text()}</td>
                        <td data-value="${$('#model_select').val()}">${$('#model_select option:selected').text()}</td>
                        <td>${$('#serial_no').val()}</td>
                        <td>${$('#hsn_code').val()}</td>
                        <td>${$('#code_input').val()}</td>
                        <td>${$('#stamping').is(':checked') ? 'Yes' : 'No'}</td>
                        <td>${$('#description').val()}</td>
                        <td>${$('#condition').val()}</td>
                        <td>${$('#vc_no').val()}</td>
                        <td>${$('#vc_date').val()}</td>
                        <td>${$('#stock_location').val()}</td>
                        <td>${quantity}</td>
                        <td>${price.toFixed(2)}</td>
                        <td>${totalPrice.toFixed(2)}</td>
                        <td>${convertedPrice.toFixed(2)}</td>
                        <td>
                            <a href="#" class="edit-row"><i class="fa fa-edit"></i></a>
                            <a href="#" class="delete-row text-danger"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                `;

            if (editIndex === -1) {
                $('#result_table tbody').append(newRow);
            } else {
                $('#result_table tbody tr').eq(editIndex).replaceWith(newRow);
            }

            clearLineItemForm();
            recalcAll();
        }

        function populateFormFromRow(row) {
            const itemId = row.data('id');
            $('#item_id').val(itemId);
             const cells = row.find('td');
            $('#product_id').val(cells.eq(0).data('value'));
            $('#model_select').val(cells.eq(1).data('value'));
            $('#serial_no').val(cells.eq(2).text());
            $('#hsn_code').val(cells.eq(3).text());
            $('#code_input').val(cells.eq(4).text());
            $('#stamping').prop('checked', cells.eq(5).text() === 'Yes');
            $('#description').val(cells.eq(6).text());
            $('#condition').val(cells.eq(7).text());
            $('#vc_no').val(cells.eq(8).text());
            $('#vc_date').val(cells.eq(9).text());
            $('#stock_location').val(cells.eq(10).text());
            $('#quantity_input').val(cells.eq(11).text());
            $('#price_input').val(cells.eq(12).text());

            calculateLineItemTotals();
            $('#add_to_table').text('Update Row');
        }

        function recalcAll() {
            let net = 0;
            $('#result_table tbody tr').each(function () {
                const rowTotal = parseFloat($(this).find('td:eq(13)').text()) || 0;
                net += rowTotal;
            });
           
            $('#net_amount').val(net.toFixed(2));
            const packing = parseFloat($('#packing').val()) || 0;
            const discount = parseFloat($('#discount').val()) || 0;
            const taxable = net + packing - discount;
            $('#taxable_amount').val(taxable.toFixed(2));

            const t1Rate = $('#tax1_input').length ? parseFloat($('#tax1_input').val()) || 0 : parseFloat($('#tax1_select').val()) || 0;
            const tax1Amt = (taxable * t1Rate) / 100;
            $('#tax1_amount').val(tax1Amt.toFixed(2));

            const t2Rate = $('#tax2_input').length ? parseFloat($('#tax2_input').val()) || 0 : parseFloat($('#tax2_select').val()) || 0;
            const tax2Amt = (taxable * t2Rate) / 100;
            $('#tax2_amount').val(tax2Amt.toFixed(2));

            const subtotal = taxable + tax1Amt + tax2Amt;
            $('#subtotal_amount').val(subtotal.toFixed(2));

            const rounded = Math.round(subtotal);
            const roundOff = rounded - subtotal;
            $('#round_off').val(roundOff.toFixed(2));

            $('#final_total').val(rounded.toFixed(2));

            const advance = parseFloat($('#advance').val()) || 0;
            const payable = rounded - advance;
            $('#payable').val(payable.toFixed(2));
        }

        // Event Bindings
        $('#currency_type').on('change', function () {
            userEdited = false;
            updateCurrencyFields();
        });

        $('#currency_value').on('input', function () {
            userEdited = true;
            calculateLineItemTotals();
            recalcAll();
        });

        $('#price_input, #quantity_input').on('input', function () {
            calculateLineItemTotals();
        });

        $('#add_to_table').on('click', function (e) {
            e.preventDefault();
            addOrUpdateLineItem();
        });

        $('#result_table').on('click', '.edit-row', function (e) {
            e.preventDefault();
            const row = $(this).closest('tr');
            editIndex = row.index();
            populateFormFromRow(row);
        });

        $('#result_table').on('click', '.delete-row', function (e) {
            e.preventDefault();
            $(this).closest('tr').remove();
            clearLineItemForm();
            recalcAll();
        });

        $('#packing, #discount, #tax1_select, #tax2_select, #advance').on('input change', function () {
            recalcAll();
        });
         let deletedItemIds = [];


            $('#result_table').on('click', '#delete_purchase', function (e) {
                e.preventDefault();
                const row = $(this).closest('tr');
                const itemId = row.data('id');

                if (itemId) {
                    deletedItemIds.push(itemId);
                }
            
                row.remove();
            
                recalcAll();
            });

            updateCurrencyFields();
            recalcAll();

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

    // Handle view button click

 $('#save_invoice').on('click', function (e) {
    e.preventDefault();
    let items = [];

$('#result_table tbody tr').each(function () {
    const row = $(this);
    const itemId = row.data('id') || null;

    const cells = row.find('td');

            items.push({
                id: itemId,
                product_id: cells.eq(0).data('value'),
                model_id: cells.eq(1).data('value'),
                serial_no: cells.eq(2).text(),
                hsn_code: cells.eq(3).text(),
                code: cells.eq(4).text(),
                stamping: cells.eq(5).text() === 'Yes' ? 1 : 0,
                description: cells.eq(6).text(),
                condition: cells.eq(7).text(),
                vc_no: cells.eq(8).text(),
                vc_date: cells.eq(9).text(),
                stock_location: cells.eq(10).text(),
                quantity: cells.eq(11).text(),
                price: cells.eq(12).text(),
                total_price: cells.eq(13).text(),
                converted_price: cells.eq(14).text(),
            });
});

    
        const invoice_number = $('#invoice_number').val();
        const invoice_date = $('#invoice_date').val();
        const vendor_id = $('#vendor_id').val();
        const buyer_id = $('#buyer_id').val();
        const consignee_id = $('#consignee_id').val();
        const duty_paid_date = $('#duty_paid_date').val();
        const inward_date = $('#inward_date').val();
        const po_date = $('#po_date').val();
        const po_number = $('#po_number').val();
        const contact_person = $('#contact_person').val();
        const company_id = $('#company_id').val();
        const financial_year_id = $('#financial_year_id').val();
        const currency_value = $('#currency_value').val();


         const Cal_data = {
         net_amount: $('#net_amount').val(),
         packing: $('#packing').val(),
         discount: $('#discount').val(),
         taxable_amount: $('#taxable_amount').val(),
         tax_type1: $('#tax1_select option:selected').text(),
         tax_type1_value: $('#tax1_select').val(),
         tax_type2: $('#tax2_select option:selected').text(),
         tax_type2_value: $('#tax2_select').val(),
        tax1_amount: $('#tax1_amount').val(),
        tax2_amount: $('#tax2_amount').val(),
        total: $('#subtotal_amount').val(),
        round_off: $('#round_off').val(),
        final_total: $('#final_total').val(),
        advance: $('#advance').val(),
        payable: $('#payable').val()
    };

    let invoice_id = $("#invoice_id").val(); 
            $.ajax({
                 
             url:"{{ url('/masters/purchase-invoice/update') }}/" + invoice_id,
             method: 'POST',
            data: {
            Cal_data,
            invoice_number,
            invoice_date,
            vendor_id: $('#vendor_id').val(),
            buyer_id: $('#buyer_id').val(),
            consignee_id: $('#consignee_id').val(),
            duty_paid_date: $('#duty_paid_date').val(),
            inward_date: $('#inward_date').val(),
            po_date: $('#po_date').val(),
            po_number: $('#po_number').val(),
            contact_person: $('#contact_person').val(),
            company_id: $('#company_id').val(),
            financial_year_id: $('#financial_year_id').val(),
            currency_value: $('#currency_value').val(),
            items, 
            deleted_items: deletedItemIds 
        },
        success: function (response) {
               alert('Invoice updated successfully!');
            location.reload(); 
        },
        error: function (xhr) {
            alert('Update failed.');
            console.log(xhr.responseText);
        }
    });
});


    });

   
  

</script>





@endpush