@extends('master')

@section('main')

<!--Page header-->
						<div class="page-header">
							<div class="page-leftheader">
								<h4 class="page-title">Purchase Summary</h4>
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
                                            	        <div class="form-group">
                                                	        <label for="uname">Company Name  <span class="text-danger">*</span> :</label>
                                                	        <div class="input-group mb-3 flex-nowrap">
                                                	          <select id="company_id" name="company_id" class="form-control select2-show-search">
                                                                <option value="">All</option>
                                                                @foreach ($companies as $company)
                                                                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                                                @endforeach
                                                            </select>
                                                	            <div class="input-group-append">
                                                	                <a href="{{url('buyer-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	            </div>
                                                	        </div>
                                                	    </div>
                                            	    </div>
                                            	</div>
                                            	<div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">From <span class="text-danger">*</span> :</label>
                                                	<input type="date" class="form-control" id="from_date" name="from_date">
                                                	</div>
                                            	</div>
                                                <div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">To <span class="text-danger">*</span> :</label>
                                                	   <input type="date" class="form-control" id="to_date" name="to_date">
                                                	</div>
                                            	</div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                	<div class="form-group">
                                                	    <label for="uname">Make <span class="text-danger">*</span> :</label>
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
                                                	            <a href="{{url('buyer-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
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
                                                	            <a href="{{url('buyer-master')}}" class="btn btn-light" type="submit"><i class="fa fa-plus text-success"></i></a>
                                                	        </div>
                                                	    </div>
                                                	</div>
                                            	</div>
                                                <div class="col">
                                                    <label for="uname">Search Condition <span class="text-danger">*</span> :</label>
                                                    <div>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optradio">Search by make
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="optradio">Search by model
                                                        </label>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col">
                                                    <button type="submit" class="btn btn-primary d-block m-auto">Search</button>
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
                                                <table id="search_data" class="table table-striped table-bordered w-100">
                                                    <thead>
                                                        <tr>
                                                            <th class="wd-15p">Invoice Date</th>
                                                            <th class="wd-15p">Invoice No</th>
                                                            <th class="wd-15p">Company</th>
                                                           
                                                            
                                                            <th class="wd-15p">Serial No</th>
                                                           
                                                       
                                                            <th class="wd-15p">Total</th>
                                                            <th class="wd-15p">Price In INR</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       
                                                        
                                                    </tbody>
                                                </table>
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
    let table = $('#search_data').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('purchase-invoice.summary-data') }}",
            data: function(d) {
                d.company_id = $('#company_id').val();
                d.from_date = $('#from_date').val();
                d.to_date = $('#to_date').val();
                d.make_id = $('#make_id').val();
                d.vendor_id = $('#vendor_id').val();
                d.search_condition = $('input[name="search_condition"]:checked').val();
            }
        },
        columns: [
                { data: 'invoice_date', name: 'invoice_date' },
                { data: 'invoice_number', name: 'invoice_number' },
                { data: 'company_name', name: 'company_name' },              
                 { data: 'serial_no', name: 'serial_number' },      
                { data: 'price', name: 'price' },
                { data: 'price_in_INR', name: 'price_in_INR' }
        ]
    });

    // Redraw on Search button click
    $('.btn-primary').on('click', function (e) {
        e.preventDefault();
        table.draw();
    });
});
</script>
@endpush