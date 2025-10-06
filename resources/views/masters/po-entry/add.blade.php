@extends('master')

@section('main')

<!--Page header-->
<div class="page-header">
	<div class="page-leftheader">
		<h4 class="page-title">Create PO</h4>
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
                                                	        <select class="form-control select2-show-search" id="company_id" name="company_id" data-placeholder="Choose one (with searchbox)">
																<optgroup >
    
																	@if(!empty($companies))
																	@foreach ($companies as $company)
																	<option value="{{ $company->id }}">{{ $company->company_name }}</option>	
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
																<optgroup>
																	@if(isset($financial))
																	@foreach ($financial as $val)
																	<option value="{{ $val->id }}">{{ $val->financial_year }}</option>	
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
							    			<h3 class="card-title">Create PO</h3>
							    		</div>
							    		<div class="card-body">
                                            <div class="row">
                                            	<div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">PO No/Date  <span class="text-danger">*</span> :</label>
                                            	        <div class="input-group mb-3">
                                            	            <input type="text" class="form-control" placeholder="" name="po_no" id="po_no">
                                            	            <input type="date" class="form-control" placeholder="" name="po_date" id="po_date">
                                            	        </div>
                                            	    </div>
                                            	</div>
                                            	<div class="col">
											<div class="form-group">
												<label for="uname">Vendor Name <span class="text-danger">*</span> :</label>
												<div class="input-group mb-1 flex-nowrap">
													<select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" name="vendor_id" id="vendor_id">
														<optgroup>
															@if(isset($vendors))
																@foreach($vendors as $vendor)
																	<option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
																@endforeach
															@endif
														</optgroup>
													</select>
													<div class="input-group-append">
														<a href="{{ url('buyer-master') }}" class="btn btn-light" type="button"><i class="fa fa-plus text-success"></i></a>
													</div>
												</div>
												<span id="vendor_add" class="text-danger d-block mt-1"></span>
											</div>
										</div>

                                                <div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Contact Person <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" id="contact_person_id" name="contact_person_id">
																<optgroup >
																	<option value=""> Select Contact Person</option>
																	
																</optgroup>
															</select>
                                                	    </div>
                                                	</div>
                                            	</div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Currency/Value <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" id="currency_name">
																<optgroup label="Mountain Time Zone">
                                                                    @if(isset($currency))
                                                                    @foreach ($currency as $val)
                                                                    <option value="{{$val->id}}"> {{ $val->currency_name }}</option>     
                                                                    @endforeach
																	
																	@endif
																</optgroup>
															</select>
                                                	        <div class="input-group-append">
                                                                <input type="number" class="form-control" placeholder="" id="currency_value">
                                                	        </div>
                                                            <div class="input-group-append">
                                                	            <a href="{{url('buyer-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                                <div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Make <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" id="make_id" name="make_id">
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
                                                	            <a href="{{url('buyer-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                                <div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Model <span class="text-danger">*</span> :</label>
                                                	    <div class="input-group mb-3 flex-nowrap">
                                                	        <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" id="model_id" name="model_id">
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
                                                	            <a href="{{url('buyer-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Quantity <span class="text-danger">*</span> :</label>
                                            	        <input type="number" class="form-control" id="quantity" placeholder="" name="quantity">
                                            	    </div>
                                            	</div>
                                                <div class="col">
                                                    <label for="uname">Price <span class="text-danger">*</span> :</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="currency_label">INR</span>
                                                        </div>
                                                        <input type="number" name="price"  id="price" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Total <span class="text-danger">*</span> :</label>
                                            	        <input type="number" class="form-control" id="total" placeholder="" name="total" readonly>
                                            	    </div>
                                            	</div>
                                                <div class="col">
                                            	    <div class="form-group">
                                            	        <label for="uname">Price in INR <span class="text-danger">*</span> :</label>
                                            	        <input type="number" class="form-control" id="priceINR" placeholder="" name="priceINR" readonly>
                                            	    </div>
                                            	</div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <button  class="btn btn-primary d-block m-auto" id="add_data">Add To Table</button>
													    
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
							    		<div class="card-body">
                                            <div class="table-responsive">
                                                <table id="poentry_table" class="table table-striped table-bordered w-100">
                                                    <thead>
                                                        <tr>
                                                            <th class="wd-15p">ID</th>
                                                            <th class="wd-15p">Make</th>
                                                            <th class="wd-15p">Model</th>
                                                            <th class="wd-15p">Quantity</th>
                                                            <th class="wd-15p">Price</th>
                                                            <th class="wd-15p">Total</th>
                                                            <th class="wd-15p">Price In INR</th>
                                                            <th class="wd-25p">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      
                                                        
                                                    </tbody>
													<tfoot>
										<tr style="background-color: #f1ecff;">
											<th colspan="3" class="text-right">Total</th>
											<th><strong id="sum_quantity">0.00</strong></th>
											<th><strong id="sum_price">0.00</strong></th>
											<th><strong id="sum_total">0.00</strong></th>
											<th><strong id="sum_price_inr">0.00</strong></th>
											<th></th>
										</tr>
									</tfoot>

                                                </table>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <button type="submit" class="btn btn-primary d-block m-auto" id="add_po">Submit</button>
                                                </div>
                                            </div>
							    		</div>
							    	</div>
							    </div>
						    </div>
							</div>
		<!-- End search-client-info -->
					<div class="modal fade" id="poViewModal" tabindex="-1" aria-hidden="true">
					<div class="modal-dialog modal-xl">
						<div class="modal-content" style="background: white">
						<div class="modal-header">
							<h5 class="modal-title">Invoice Detail</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
						</div>
						<div class="modal-body" id="po-detail-body">
							<!-- Dynamic data will be injected here -->
						</div>
						</div>
					</div>
					</div>

@endsection
@push('scripts')
  <script>
        $(document).ready(function () {

			$('#vendor_id').change(function () {
    let vendor_id = $(this).val();

    if (vendor_id) {
        $.ajax({
            type: 'POST',
            url: '{{ route("vendor.contact") }}',
            data: {
                vendor_id: vendor_id,
                _token: '{{ csrf_token() }}'
            },
            success: function (res) {
                console.log(res);         
                $("#vendor_add").text(res.vendor?.address || '');               
                $('#contact_person_id').empty().append('<option value="">Select Contact Person</option>');
                $.each(res.contact_persons, function (index, person) {
                    $('#contact_person_id').append(
                        '<option value="' + person.id + '">' + person.name + '</option>'
                    );
                });
            }
        });
    }
});



            $("#currency_name").change(function(){
                	updateCurrencyField();
                	calculation();
           			 let currency_id = $(this).val();
            $.ajax({
                        type: 'POST',
                        url: '{{ route("currency.value") }}',
                        data: {
                            currency_id : currency_id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (res) {
                           
                        $("#currency_value").val(res.value)  ;
                            
                        }
                    });
                
            })


       	 function calculation() {

					let currency_label = $("#currency_name option:selected").text().trim().toLowerCase();
					let quantity = parseInt($("#quantity").val()) || 0;
					let price = parseFloat($("#price").val()) || 0;
					let rate = parseFloat($("#currency_value").val()) || 1;
					updateCurrencyField();
				
					let total = quantity * price;
					$("#total").val(total.toFixed(2));


					if (currency_label.includes('dollar')) {
					
						let convertPrice = price *quantity * rate;

						$("#priceINR").val(convertPrice.toFixed(2));

					} else {
						let convertPrice = price *quantity * rate;

						$("#priceINR").val(convertPrice.toFixed(2));
					}
				}


            $('#price, #quantity').on('input', function () {
               calculation();
         
             });

             function updateCurrencyField(){
                let currency_label = $("#currency_name option:selected").text();
                  $('#currency_label').text(currency_label);

             }


	let editIndex = -1;	

$('#add_data').on('click', function (e) {
    e.preventDefault();
    addOrUpdateLineItem();
});		    
function addOrUpdateLineItem() {
    let currency_label = $("#currency_name option:selected").text().trim().toLowerCase();
    let quantity = parseInt($("#quantity").val()) || 0;
    let price = parseFloat($("#price").val()) || 0;
    let rate = parseFloat($("#currency_value").val()) || 1;

    updateCurrencyField();

    if (isNaN(rate) || isNaN(price) || isNaN(quantity)) {

        alert('Please enter valid price and quantity.');
        return;
		
    }

		let total = quantity * price;
		$("#total").val(total.toFixed(2));

		let convertPrice = price * quantity * rate;
		$("#priceINR").val(convertPrice.toFixed(2));

		let serialNo = (editIndex === -1) 
			? $('#poentry_table tbody tr').length + 1 
			: $('#poentry_table tbody tr').eq(editIndex).find('td:first').text();

		const newRow = `
			<tr>
				<td>${serialNo}</td>
				<td data-value="${$('#make').val()}">${$('#make option:selected').text()}</td>
				<td data-value="${$('#model').val()}">${$('#model option:selected').text()}</td>
				<td>${quantity}</td>
				<td>${price.toFixed(2)}</td>
				<td>${total.toFixed(2)}</td>
				<td>${convertPrice.toFixed(2)}</td>
				<td>
					<a href="#" class="edit-row"><i class="fa fa-edit"></i></a>
					<a href="#" class="delete-row text-danger"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
		`;

		if (editIndex === -1) {
			$('#poentry_table tbody').append(newRow);
		}
		 else {
			$('#poentry_table tbody tr').eq(editIndex).replaceWith(newRow);
			editIndex = -1;
			$('#add_data').text('Add'); 
		}
		clearFormFields();
		updateTableTotals();
}


$(document).on('click', '.edit-row', function (e) {
    e.preventDefault();

    const row = $(this).closest('tr');
    editIndex = row.index();

    $('#make').val(row.find('td:eq(1)').attr('data-value'));
    $('#model').val(row.find('td:eq(2)').attr('data-value'));
    $('#quantity').val(row.find('td:eq(3)').text());
    $('#price').val(row.find('td:eq(4)').text());
    $('#total').val(row.find('td:eq(5)').text());
    $('#priceINR').val(row.find('td:eq(6)').text());
    $('#add_data').text('Update'); 
});
$(document).on('click', '.delete-row', function (e) {
    e.preventDefault();
    $(this).closest('tr').remove();
    updateTableTotals();
});
function updateTableTotals() {
    let totalQuantity = 0;
    let totalPrice = 0;
    let totalTotal = 0;
    let totalPriceInr = 0;

    $('#poentry_table tbody tr').each(function () {
        const quantity = parseFloat($(this).find('td').eq(3).text()) || 0;
        const price = parseFloat($(this).find('td').eq(4).text()) || 0;
        const total = parseFloat($(this).find('td').eq(5).text()) || 0;
        const priceInr = parseFloat($(this).find('td').eq(6).text()) || 0;

        totalQuantity += quantity;
        totalPrice += price;
        totalTotal += total;
        totalPriceInr += priceInr;
    });

		$('#sum_quantity').text(totalQuantity.toFixed(2));
		$('#sum_price').text(totalPrice.toFixed(2));
		$('#sum_total').text(totalTotal.toFixed(2));
		$('#sum_price_inr').text(totalPriceInr.toFixed(2));
}

			function clearFormFields() {
				$('#make').val('');
				$('#model').val('');
				$('#quantity').val('');
				$('#price').val('');
				$('#total').val('');
				$('#priceINR').val('');
			}
					
         $('#add_po').on('click', function() {
			
			
		const header = {
			po_no:             $('#po_no').val(),
			po_date:           $('#po_date').val(),
			vendor_id:         $('#vendor_id').val(),
			contact_person_id: $('#contact_person_id').val(),
			currency_id:       $('#currency_name').val(),
			currency_value:    $('#currency_value').val(),
			financial_year_id :  $('#financial_year_id').val(),
			company_id :  $('#company_id').val(),


		};

		console.log(header)
 
 
  		const items = [];
$('#poentry_table tbody tr').each(function() {
 	 const td = $(this).find('td');
	const make_id   = td.eq(1).data('value');
	const model_id = td.eq(2).data('value');
	const qty   = parseFloat(td.eq(3).text()) || 0;
	const price = parseFloat(td.eq(4).text()) || 0;
	const total = parseFloat(td.eq(5).text()) || 0;
	const inr   = parseFloat(td.eq(6).text()) || 0;

  items.push({
    make_id:   make_id,
    model_id:  model_id,
    quantity:  qty,
    price:     price,
    total:     total,
    price_inr: inr  
  });
});

  
  const summary = {
    total_quantity:   parseFloat($('#sum_quantity').text()),
    total_price:      parseFloat($('#sum_price').text()),
    total_amount:     parseFloat($('#sum_total').text()),
    total_price_inr:  parseFloat($('#sum_price_inr').text())
  };


  $.ajax({
    url: '{{ route("po.store") }}',  
    method: 'POST',
    data: {
      header,
      items,
      summary,
      _token: $('meta[name="csrf-token"]').attr('content')
    },
    success(response) {
    
      alert('PO saved successfully!');

    },
    error(xhr) {
 
      const errors = xhr.responseJSON.errors || {};
      let msg = '';
      Object.values(errors).forEach(arr => arr.forEach(e => msg += e + "\n"));
      alert(msg || 'Something went wrong.');
    }
  });
});
   


$(document).on('click', '.view-po', function(e) {
    e.preventDefault();
    const id = $(this).data('id');
	alert(id)

    $.ajax({
        url: '/po/' + id,
        type: 'GET',
        success: function(res) {
            if (res.length > 0) {
                const data = res[0];
                let html = `
                    <h5 class="mb-3">Invoice no : ${data.po_no} (${data.po_date})</h5>
                    <div class="row mb-3">
                        <div class="col-md-6"><strong>Company Name :</strong> ${data.company_detail?.company_name}</div>
                        <div class="col-md-6"><strong>Vendor Name :</strong> ${data.vendor?.name}</div>
                        <div class="col-md-6"><strong>Financial Year :</strong> ${data.financial_year?.financial_year}</div>
                        <div class="col-md-6"><strong>Contact Person :</strong> ${data.contact_persons?.name || ''}</div>
                        <div class="col-md-6"><strong>Currency/Value :</strong> ${data.currency_name} / ${data.currency_value}</div>
                    </div>

                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Price In INR</th>
                            </tr>
                        </thead>
                        <tbody>
                `;

                let totalQty = 0, totalAmt = 0, totalInr = 0;

                data.po_entry.forEach(entry => {
                    html += `
                        <tr>
                            <td>${entry.make_name || ''}</td>
                            <td>${entry.model_name || ''}</td>
                            <td>${entry.price}</td>
                            <td>${entry.quantity}</td>
                            <td>${entry.total}</td>
                            <td>${entry.price_inr}</td>
                        </tr>
                    `;
                    totalQty += parseFloat(entry.quantity);
                    totalAmt += parseFloat(entry.total);
                    totalInr += parseFloat(entry.price_inr);
                });

                html += `
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-end">Total</th>
                                <th>${totalQty}</th>
                                <th>${totalAmt.toFixed(2)}</th>
                                <th>${totalInr.toFixed(2)}</th>
                            </tr>
                        </tfoot>
                    </table>
                `;

                $('#po-detail-body').html(html);
                $('#poViewModal').modal('show');
            }
        },
        error: function(xhr) {
            alert("Failed to load PO details.");
        }
    });
});

     })

	

    </script>  
@endpush