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
                                                	    <div class="input-group flex-nowrap">
                                                	        <select class="form-control select2-show-search form-control-sm" name="company_id" id="company_id" data-placeholder="Choose one (with searchbox)">
																<optgroup>
                                                                @if(isset($companies) && count($companies) > 0)
                                                                    @foreach($companies as $company)
                                                                        <option value="{{$company->id}}">{{$company->company_name}}</option>    
                                                                    @endforeach
                                                                @endif
																
																</optgroup>
															</select>
                                                	        <div class="input-group-append">
                                                	            <a href="{{route('masters.company-details.company-details')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Financial Year <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group flex-nowrap">
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
                                                	          <a href="{{route('financial.create')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
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
							    			<h3 class="card-title">Add Purchase Order</h3>
							    		</div>
							    		<div class="card-body">
                                            <div class="row">
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">PO No/ Date :</label>
                                            	        <div class="input-group">
                                            	            <input type="text" name="invoice_number" id="po_no" class="form-control" placeholder="" value="{{ old('po_no', $po_no ?? '') }}" readonly>
                                            	            <input type="date" 	name="invoice_date"	id="po_date" class="form-control" placeholder="">
                                            	        </div>
                                            	    </div>
                                            	</div>
                                                
                                                <div class="col">
                                                    <div class="form-group">
                                            	        <label for="uname">Duty Paid Date :</label>
                                        	            <input type="date" class="form-control" placeholder="" id="duty_paid_date" name="duty_paid_date">
                                            	    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Buyer <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group flex-nowrap">
                                                	        <select class="form-control select2-show-search" name="buyer_id" id="buyer_id" data-placeholder="Choose one (with searchbox)">
																
																	@if(asset($buyers))
																		@foreach($buyers as $buyer)
																			<option value="{{$buyer->id}}">{{$buyer->buyer_name }}</option>
																		@endforeach	
																	@endif
																	
																	
															
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
                                                	    <div class="input-group flex-nowrap">
                                                	        <select class="form-control select2-show-search" name="consignee_id" id="consignee_id" data-placeholder="Choose one (with searchbox)">
																@if(isset($consignees) && count($consignees) > 0)
																		@foreach($consignees as $consignee)
																			<option value="{{$consignee->id}}"> {{ $consignee->name }}</option>
																		@endforeach
																	@endif
																
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
                                            	        <input type="date" class="form-control" placeholder="" id="inward_date" name="inward_date">
                                            	    </div>
                                            	</div>
                                            </div>
											
                                            <div class="row">
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Vendor Name <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group flex-nowrap">
                                                	        <select class="form-control select2-show-search" id="vendor_id" name="vendor_id" data-placeholder="Choose one (with searchbox)">
																
                                                                    @if(isset($vendors) && count($vendors) > 0)
                                                                        @foreach($vendors as $vendor)   
                                                                            <option value="{{$vendor->id}}">{{$vendor->name}}</option>   
                                                                        @endforeach
                                                                    @endif
																	
																
																	
															</select>
                                                	        <div class="input-group-append">
                                                	            <a href="{{route('vendor.create')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	    <span class="text-danger d-block mt-1" id="vendor_add"></span>
                                                	</div>
                                            	</div>
                                            	<div class="col">
                                            	    <div class="form-group">
                                                	    <label for="uname">Currency <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group flex-nowrap">
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
                                                	    <div class="input-group flex-nowrap">
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
                                                	    <div class="input-group flex-nowrap">
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
                                                	    <div class="input-group flex-nowrap">
                                                	        <select class="form-control select2-show-search" id="product_id" name="product_id" data-placeholder="Choose one (with searchbox)">
																<optgroup>
																    
																	<option value="1">Select Make</option>
																	    @foreach($makes as $make)
                                                                        <option value="{{ $make->id }}">{{ $make->name }}</option>
                                                                        @endforeach
																
															
																</optgroup>
															</select>
                                                	        <div class="input-group-append">
                                                	            <a href="{{route('make.create')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                                <div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Model <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group flex-nowrap">
                                                	        <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" name="model_id" id="model_select">
																<optgroup>
																	<option value="0">Select Model</option>
														
																</optgroup>
															</select>
                                                	        <div class="input-group-append">
                                                	            <a href="{{route('model.index')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
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
                                                	    <div class="input-group flex-nowrap">
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
                                            	        <div class="input-group">
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

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="quantity_input" >Quantity:</label>
                                                        <input   type="number" id="quantity_input" class="form-control" value="1" min="1">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label for="uname">Price <span class="text-danger">*</span> :</label>
                                                    <div class="input-group">
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
                                            <button id="add_to_table" class="btn btn-primary mb-0">Add to Table</button>
                                            <button id="clear_form" class="btn btn-danger mb-0">Remove All</button>
                                           
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
							        <!-- 1) SEARCH CLIENT INFO TABLE - MATCHED TO TEMPLATE STRUCTURE -->
                                    <div class="card shadow-sm rounded mb-4">
                                        <div class="card-header bg-light">
                                            <h6 class="mb-0">Search Client Info</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="result_table" class="table table-striped table-bordered table-sm w-100 mb-0">
                                                    <thead class="table-light">
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
                                                        <!-- Data will be dynamically inserted here -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

							    </div>
						    </div>
                        </div>

                        <div class="card shadow-sm rounded mb-4">
                            <div class="card-body">
                                <div class="row g-2">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="">Net Amount:</label>
                                            <input type="text" id="net_amount" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="">Packing / Courier:</label>
                                        <input type="number" id="packing" class="form-control form-control-sm" value="0" step="0.01">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="">Discount:</label>
                                        <input type="number" id="discount" class="form-control form-control-sm" value="0" step="0.01">
                                    </div>
                                </div>

                                <div class="row g-2 mt-2">
                                    <div class="col-md-4">
                                        <label class="">Taxable Amount:</label>
                                        <input type="text" id="taxable_amount" name="taxable_amount" class="form-control form-control-sm" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="" id="tax1_label">Tax 1:</label>
                                        <div class="input-group flex-nowrap">
                                            <select id="tax1_select" class="select2-show-search form-control">
                                                <option value="0">Select Tax</option>
                                                @if(isset($taxes) && count($taxes) > 0)
                                                    @foreach($taxes as $tax)
                                                        <option value="{{ $tax->tax_value }}">{{ $tax->tax_name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="" id="tax2_label">Tax 2:</label>
                                        <div class="input-group flex-nowrap">
                                            <select id="tax2_select" class="select2-show-search form-control">
                                                <option value="0">Select Tax</option>
                                                @if(isset($taxes) && count($taxes) > 0)
                                                    @foreach($taxes as $tax)
                                                        <option value="{{ $tax->tax_value }}">{{ $tax->tax_name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row g-2 mt-2">
                                    <div class="col-md-4">
                                        <label class="">Tax 1 Amount:</label>
                                        <input type="number" id="tax1_amount" class="form-control form-control-sm" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="">Tax 2 Amount:</label>
                                        <input type="number" id="tax2_amount" class="form-control form-control-sm" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="">Total:</label>
                                        <input type="number" id="subtotal_amount" class="form-control form-control-sm" readonly>
                                    </div>
                                </div>

                                <div class="row g-2 mt-2">
                                    <div class="col-md-4">
                                        <label class="">Round Off:</label>
                                        <input type="number" id="round_off" class="form-control form-control-sm" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="">Total:</label>
                                        <input type="number" id="final_total" class="form-control form-control-sm fw-bold text-success" readonly>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="">Advance:</label>
                                        <input type="number" id="advance" class="form-control form-control-sm" value="0" step="0.01">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label class="">Payable:</label>
                                        <input type="number" id="payable" class="form-control form-control-sm fw-bold text-primary" readonly>
                                    </div>
                                </div>

                                <div class="row mt-3">
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
        
        
        
        
          $('#product_id').on('change', function () {
        let sales_make_id = $(this).val();
      

        if (sales_make_id) {
            $.ajax({
                url: '{{ route("quatation.make") }}',
                type: 'POST',
                data: {
                    make_id: sales_make_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    $('#model_select').empty();
                      $.each(response, function (key, model) {
                    $('#model_select').append('<option value="' + model.id + '">' + model.model_name + '</option>');
                });

                   
                }
            });
        }
    });
    
    /// vendor 
    
     $('#vendor_id').on('change', function () {
        let vendor_id = $(this).val();
      

        if (vendor_id) {
            $.ajax({
                url: '{{ route("purchase-invoice.vendor") }}',
                type: 'POST',
                data: {
                    vendor_id: vendor_id,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                  
                    
                $("#vendor_add").text(response.address);






                      
                   
                }
            });
        }
    });
    
    
    ///
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

            const convertedPrice =  price * rate *quantity ;
            const total = price * quantity;

            
            $('#converted_price').val(convertedPrice.toFixed(2));
            $('#total_price').val(total.toFixed(2));



            
        }

        function clearLineItemForm() {
            $('#product_id, #model_select, #serial_no, #hsn_code, #code_input, #description, #condition, #vc_no, #vc_date, #stock_location, #price_input, #quantity_input').val('');
            $('#stamping').prop('checked', false);
            $('#converted_price').val('');
            $('#total_price').val('');
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

            
      


                   const convertedPrice =  price * rate *quantity ;
                 const totalPrice = price * quantity;

            
           

            const newRow = `
                <tr>
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

        updateCurrencyFields();
        recalcAll();
    });

   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Handle view button click


    $('#save_invoice').on('click', function (e) {
        e.preventDefault();

        const invoice_number = $('#invoice_number').val();
        const invoice_date = $('#invoice_date').val();
        const vendor_id = $('#vendor_id').val();
        const buyer_id = $('#buyer_id').val();
        const consignee_id = $('#consignee_id').val();
        const duty_paid_date = $('#duty_paid_date').val();
        const inward_date = $('#inward_date').val();
        const po_date = $('#po_date').val();
        const po_no = $('#po_no').val();
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
        payable: $('#payable').val(),
        }
        

        let items = [];
        $('#result_table tbody tr').each(function () {
            const row = $(this);
            items.push({
                product_id: row.find('td:eq(0)').data('value'),
                model: row.find('td:eq(1)').data('value'),
                serial_no: row.find('td:eq(2)').text(),
                hsn_code: row.find('td:eq(3)').text(),
                code: row.find('td:eq(4)').text(),
                stamping: row.find('td:eq(5)').text() === 'Yes' ? 1 : 0,
                description: row.find('td:eq(6)').text(),
                condition: row.find('td:eq(7)').text(),
                vc_no: row.find('td:eq(8)').text(),
                vc_date: row.find('td:eq(9)').text(),
                stock_location: row.find('td:eq(10)').text(),
                quantity: row.find('td:eq(11)').text(),
                price: row.find('td:eq(12)').text(),
                total_price: row.find('td:eq(13)').text(),
                converted_price: row.find('td:eq(14)').text()
            });
        });

        $.ajax({
         url: '{{route("purchase-invoice.store")}}',
            method: 'POST',
            data: {  
                      
                Cal_data,
                invoice_number,
                invoice_date,
                items,
                vendor_id,
                buyer_id,
                consignee_id,
                duty_paid_date,
                inward_date,
                po_date,
                po_no,
                company_id,
                contact_person,
                financial_year_id,
                currency_value,
                
            },
            success: function (response) {
                alert('Data saved successfully!');
                console.log(response);
            },
            error: function (xhr) {
                alert('Something went wrong.');
                console.log(xhr.responseText);
            }
        });
        
        
        
      


    });
</script>

<script>
$(document).on('change', '#financial_year_id', function () {
  const finYearId = $(this).val();
  if (!finYearId) return;

  const $select = $(this);
  const $poNo = $('#po_no');
  $select.prop('disabled', true);
  $poNo.prop('disabled', true);

  $.ajax({
    url: "{{ route('purchase-invoice.generateQuotationNo') }}",
    type: "POST",
    dataType: "json",
    data: {
      _token: '{{ csrf_token() }}',
      fin_year_id: finYearId
    },
    success: function (response) {
      if (response && response.status) {
        $poNo.val(response.po_no);
      } else {
        alert(response && response.message ? response.message : 'Could not generate po number.');
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.error('AJAX error:', textStatus, errorThrown, jqXHR.responseText);
      alert('Something went wrong. Please try again.');
    },
    complete: function () {
      $select.prop('disabled', false);
      $poNo.prop('disabled', false);
    }
  });
});
</script>



@endpush