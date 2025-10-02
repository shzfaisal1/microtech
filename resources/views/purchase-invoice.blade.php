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
                                                	        <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)">
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
                                                	            <a href="{{url('company-details')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Financial Year <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)">
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
                                            	    <div class="form-group">
                                            	        <label for="uname">Invoice No/Date :</label>
                                            	        <div class="input-group mb-3">
                                            	            <input type="text" name="invoice_number" id="" class="form-control" placeholder="">
                                            	            <input type="date" 	name="invoice_date"	class="form-control" placeholder="">
                                            	        </div>
                                            	    </div>
                                            	</div>
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">PO No/Date :</label>
                                            	        <div class="input-group mb-3">
                                            	            <input type="text" class="form-control" name="po_number" placeholder="">
                                            	            <input type="date" class="form-control"  name="po_date" placeholder="">
                                            	        </div>
                                            	    </div>
                                            	</div>
                                                <div class="col">
                                                    <div class="form-group">
                                            	        <label for="uname">Duty Paid Date :</label>
                                        	            <input type="date" class="form-control" placeholder="" name="duty_paid_date">
                                            	    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Buyer <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control" >
																
																
																		
																		@foreach($buyers as $buyer)
																		<option value="{{$buyer->id}}"> {{ $buyer->buyer_name }}</option>
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
                                                	        <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)">
																	@if(isset($consignees) && count($consignees) > 0)
																		@foreach($consignees as $consignee)
																			<option value="{{$consignee->id}}"> {{ $consignee->name }}</option>
																		@endforeach
																	@endif
																
																
															</select>
                                                	        <div class="input-group-append">
                                                	          <a href="{{url('consignee-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                                <div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Inward Date <span class="text-danger">*</span> :</label>
                                            	        <input type="date" class="form-control" placeholder="" name="inward_date">
                                            	    </div>
                                            	</div>
                                            </div>
											
                                            <div class="row">
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Vendor Name <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)">
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
                                                	        <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)">
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
                                                	    </div>
                                                	</div>
                                            	</div>
                                                <div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Make <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" id="product_id" data-placeholder="Choose one (with searchbox)">
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
                                                <div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Model <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)">
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
                                            	        <input type="text" class="form-control" id="email" placeholder="" name="email">
                                            	    </div>
                                            	</div>
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">HSN Code <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)">
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
                                                                <input type="text" class="form-control" placeholder="">
                                                	        </div>
                                                	    </div>
                                                        
                                                	</div>
                                            	</div>
                                                <div class="col">
                                                    <label for="uname">Stamping :</label>
                                                    <label class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1">
                                                        <span class="custom-control-label">Select if yes</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">VC No/Date :</label>
                                            	        <div class="input-group mb-3">
                                            	            <input type="text" class="form-control" placeholder="">
                                            	            <input type="date" class="form-control" placeholder="">
                                            	        </div>
                                            	    </div>
                                            	</div>
                                                <div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Condition :</label>
                                            	        <input type="text" class="form-control" id="email" placeholder="" name="email">
                                            	    </div>
                                            	</div>
                                                <div class="col">
                                                    <div class="form-group">
                                            	        <label for="uname">Stock Location :</label>
                                            	        <input type="text" class="form-control" id="email" placeholder="" name="email">
                                            	    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <label for="uname">Price <span class="text-danger">*</span> :</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id ="currency_label">INR</span>
                                                        </div>
                                                      <input type="text" id="price_input" class="form-control" placeholder="Enter amount">
                                                    </div>
                                                </div>
                                                <div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Total <span class="text-danger">*</span> :</label>
                                            	        <input type="text"  class="form-control" id="total_price" placeholder="" name="total_price">
                                            	    </div>
                                            	</div>
                                                <div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Price in INR <span class="text-danger">*</span> :</label>
                                            	      <input type="text" id="converted_price" class="form-control" readonly>
                                            	    </div>
                                            	</div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                            	    <div class="form-group">
                                            	        <label for="comment">Description:</label>
                                            	        <textarea class="form-control" rows="3" id="comment"></textarea>
                                            	    </div>
                                            	</div>
                                            </div>
                                          <button id="add_to_table" class="btn btn-primary mb-4">Add to Table</button>
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
                                                            <th class="wd-15p">Sr.No</th>
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
                                                        <tr>
                                                            <td>Bella</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <a href=""><i class="fa fa-edit"></i></a>
                                                                <a href=""><i class="fa fa-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                         
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <a href=""><i class="fa fa-edit"></i></a>
                                                                <a href=""><i class="fa fa-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <button type="submit" class="btn btn-primary d-block m-auto">Add</button>
                                                </div>
                                            </div>
							    		</div>
							    	</div>
							    </div>
						    </div>
                        </div>
						

@endsection
@push('scripts')
<script>
    const defaultRates = {
        rupees: 1.00,
        dollar: 85.7606
    };

    const currencyLabels = {
        rupees: 'INR',
        dollar: 'USD'
    };

    let userEdited = false;

    function updateCurrencyFields() {
        const selectedCurrency = $('#currency_type').val();

        if (!userEdited) {
            $('#currency_value').val(defaultRates[selectedCurrency]);
        }

        $('#currency_label').text(currencyLabels[selectedCurrency]);
    }

    // Add data to table
    function addToTable() {
        const selectedCurrency = $('#currency_type').val();
        const rate = parseFloat($('#currency_value').val());
        const price = parseFloat($('#price_input').val());
        const quantity = parseInt($('#quantity_input').val());
        const product_id = $('#product_id').text();


      
        const convertedPrice = (selectedCurrency === 'dollar') ? (price * rate) : price;
        const totalAmount = convertedPrice * quantity;

        const newRow = `
            <tr>
               
                <td>${product_id}</td>
                
            </tr>
        `;

        $('#result_table tbody').append(newRow);
    }

    $(document).ready(function() {
        updateCurrencyFields();

        $('#currency_type').on('change', function() {
            userEdited = false;
            updateCurrencyFields();
        });

        $('#currency_value').on('input', function() {
            userEdited = true;
        });

        $('#add_to_table').on('click', function(e) {
            e.preventDefault();
            addToTable();
        });
    });
</script>
@endpush