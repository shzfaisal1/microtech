	@extends('master')

	@section('main')

	<!--Page header-->
	<div class="page-header">
		<div class="page-leftheader">
			<h4 class="page-title">Payment Details</h4>
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
										<select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" id="company_id">
											<optgroup>
												@if(isset($companies))
												@foreach ($companies as $list)
												<option value="{{ $list->id }}">{{ $list->company_name }}</option>    
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
										<select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" id="financial_id">
											<optgroup >
												@if(isset($financial_year))
												@foreach ($financial_year as $val)
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
						<h3 class="card-title">Payment Details</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col">
								<div class="form-group">
									<label for="uname">Voucher No/Date  <span class="text-danger">*</span> :</label>
									<div class="input-group mb-3">
										<input type="text" class="form-control" placeholder="">
										<input type="date" class="form-control" placeholder="">
									</div>
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<label for="uname">Vendor <span class="text-danger">*</span> :</label>
									<div class="input-group mb-3 flex-nowrap">
										<select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" id="vendor_id">
											<optgroup>
												@if(isset($vendors))
												@foreach ($vendors as $vendor)
													<option value="{{ $vendor->id }}"> {{ $vendor->name  }} </option>    
												@endforeach
												@endif
											</optgroup>
										</select>
										
										<div class="input-group-append">
											<a href="#" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
										</div>
									</div>
									<span id="vendor_balance" class="text-danger d-block mt-1"></span>
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<label for="uname">Payment Mode <span class="text-danger">*</span> :</label>
									<div class="input-group mb-3 flex-nowrap">
										<select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)">
											<optgroup>
												<option value="Cash">Cash</option>
												<option value="Cheque">Cheque</option>
												<option value="NEFT">NEFT</option>
												<option value="RTGS">RTGS</option>
												<option value="Other">Other</option>		
											</optgroup>
										</select>
									</div>
								</div>
							</div>
							
						</div>

						<div class="row">
						    <div class="col-lg-4">
								<div class="form-group">
									<label for="uname"> Remark <span class="text-danger">*</span> :</label>
									<div class="input-group mb-3 flex-nowrap">
									<input type="text" class="form-control" placeholder="">    
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label for="uname">Account <span class="text-danger">*</span> :</label>
									<div class="input-group mb-3 flex-nowrap">
										<select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)">
											<optgroup>
												@if(isset($accounts))
												@foreach ($accounts as $account)
												<option value="{{ $account->id }}">{{ $account->account_name }}</option>    
												@endforeach
												
												@endif
											</optgroup>
										</select>
										<div class="input-group-append">
											<a href="{{url('account-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
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
					<div class="card-body">
						<div class="table-responsive">
							<table id="invoice-body" class="table table-striped table-bordered w-100">
								<thead>
									<tr>
										<th class="wd-15p">#id</th>
										<th class="wd-15p">Invoice_No</th>
										<th class="wd-15p">Invoice_Date</th>
										<th class="wd-15p">Vendor</th>
										<th class="wd-15p">Company</th>
										<th class="wd-15p">Financial Year</th>
										<th class="wd-15p">Total</th>
										<th class="wd-15p">Balance</th>
										<th class="wd-25p">Amount</th>
										<th class="wd-25p">TDS</th>
									</tr>
								</thead>
								<tbody>
									
								</tbody>
							</table>
						</div>
						 <div class="row mt-3">
							<div class="col-md-6 text-right"><strong>Total Balance:</strong></div>
							<div class="col-md-2">
								<input type="text" readonly id="total-balance" class="form-control text-end">
							</div>
							<div class="col-md-2 text-right"><strong>Total Amount:</strong></div>
							<div class="col-md-2">
								<input type="text" readonly id="total-amount" class="form-control text-end">
							</div>
						</div>
						<div class="row">
							<div class="col mt-4">
								<button type="submit" class="btn btn-primary d-block m-auto ">Add</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End search-client-info -->

	@endsection
	@push('scripts')
	<script>
		$(document).ready(function () {

					$('#vendor_id').change(function () {
					
					let vendor_id = $(this).val();
					let company_id = $("#company_id").val();
					console.log(company_id)
					let financial_id = $("#financial_id").val();	

					$.ajax({
				type: 'POST',
				url: '{{ route("purchase.payment.get_balance") }}',
					data: {
					vendor_id: vendor_id,
					company_id : company_id,
					financial_id : financial_id,	
				
					_token: '{{ csrf_token() }}'
					},
				success: function (res) {
					          
					 let html = '';
    let total = 0, grandTotal = 0;

    res.forEach(function (invoice, index) {
        total += parseFloat(invoice.total || 0);
        grandTotal += parseFloat(invoice.balance || 0);

        html += `
        <tr>
            <td><input type="checkbox" class="form-check-input" name="invoice_ids[]" value="${invoice.id}" checked></td>
            <td>${invoice.invoice_number}</td>
            <td>${invoice.invoice_date}</td>
            <td>${invoice.vendor.name}</td>
            <td>${invoice.company_detail.company_name}</td>
            <td>${invoice.financial_year.financial_year}</td>
            <td class="text-end">${parseFloat(invoice.total).toFixed(2)}</td>
            <td class="text-end">${parseFloat(invoice.balance).toFixed(2)}</td>
            <td><input type="number" class="form-control amount-input" name="amount[${invoice.id}]" value="${parseFloat(invoice.balance).toFixed(2)}"></td>
            <td><input type="number" class="form-control tds-input" name="tds[${invoice.id}]" value="0.00"></td>
        </tr>
        `;
    });

    $('#invoice-body').html(html);
				
					}
				});


						})

		})

		$(document).ready(function () {

    function calculateTotals() {
        let totalAmount = 0;
        let totalBalance = 0;

        // Loop through each row
        $('#example tbody tr').each(function () {
            let isChecked = $(this).find('.row-check').prop('checked');
            if (isChecked) {
                let balance = parseFloat($(this).find('.balance').text()) || 0;
                let amount = parseFloat($(this).find('.amount').val()) || 0;

                totalBalance += balance;
                totalAmount += amount;
            }
        });

        $('#total-balance').val(totalBalance.toFixed(2));
        $('#total-amount').val(totalAmount.toFixed(2));
    }

    // Trigger calculation on change
    $('#example').on('input change', '.amount, .tds, .row-check', function () {
        calculateTotals();
    });

    // Trigger initial calculation on load (if rows are pre-filled)
    calculateTotals();
});
		</script>
		@endpush