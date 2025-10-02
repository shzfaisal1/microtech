@extends('master')

@section('main')

<div class="page-header">
	<div class="page-leftheader">
		<h4 class="page-title">Edit AMC Quotation</h4>
		<ol class="breadcrumb pl-0">
			<li class="breadcrumb-item"><a href="#">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Edit Quotation</li>
		</ol>
	</div>
</div>

<div class="search-client-info">
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<form action="{{ route('amc.quatation.update', $quotation->id) }}" method="POST">
				@csrf
				<div class="card">
					<div class="card-body">

						<div class="row">
							<div class="col">
								<div class="form-group">
									<label>Company Name <span class="text-danger">*</span></label>
									<select class="form-control select2" name="company_id">
										@foreach ($companies as $company)
											<option value="{{ $company->id }}" {{ $quotation->company_id == $company->id ? 'selected' : '' }}>
												{{ $company->company_name }}
											</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="col">
								<div class="form-group">
									<label>Financial Year <span class="text-danger">*</span></label>
									<select class="form-control select2" name="fin_year_id">
										@foreach ($financial as $val)
											<option value="{{ $val->id }}" {{ $quotation->financial_id == $val->id ? 'selected' : '' }}>
												{{ $val->financial_year }}
											</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>

						<hr>

						<div class="row">
							<div class="col">
								<div class="form-group">
									<label>Quotation No/Date <span class="text-danger">*</span></label>
									<div class="input-group">
										<input type="text" class="form-control" name="amcquotation_no" value="{{ old('amcquotation_no', $quotation->quotation_no) }}" readonly>
										<input type="date" class="form-control" name="quotation_date" value="{{ old('quotation_date', $quotation->quotation_date) }}">
									</div>
								</div>
							</div>

							<div class="col">
								<div class="form-group">
									<label>Client Group <span class="text-danger">*</span></label>
									<select class="form-control select2" name="client_group_id" id="client_group">
										<option value="">Select Client Group</option>
										@foreach($clients_grp as $group)
											<option value="{{ $group->id }}" {{ $quotation->client_group_id == $group->id ? 'selected' : '' }}>{{ $group->name }}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="col">
								<div class="form-group">
									<label>Employee Name <span class="text-danger">*</span></label>
									<select class="form-control select2" name="emp_id">
										<option value="1" {{ $quotation->emp_name_id == 1 ? 'selected' : '' }}>Demo</option>
										<option value="2" {{ $quotation->emp_name_id == 2 ? 'selected' : '' }}>Test</option>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col">
								<div class="form-group">
									<label>Subject <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="subject" value="{{ old('subject', $quotation->subject) }}">
								</div>
							</div>

							<div class="col">
								<div class="form-group">
									<label>Client Name <span class="text-danger">*</span></label>
									<select class="form-control select2" name="client_name_id" id="client_name">
										<option value="">Select Client Name</option>
										@foreach($clients_details as $client)
											<option value="{{ $client->id }}" {{ $quotation->client_name_id == $client->id ? 'selected' : '' }}>
												{{ $client->client_name }}
											</option>
										@endforeach
									</select>
									<span id="client_add" class="text-danger d-block mt-1"></span>
								</div>
							</div>

							<div class="col">
								<div class="form-group">
									<label>Referred By <span class="text-danger">*</span></label>
									<select class="form-control select2" name="ref_id">
										<option value="1" {{ $quotation->ref_id == 1 ? 'selected' : '' }}>Abhi</option>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col">
								<div class="form-group">
									<label>Quarter <span class="text-danger">*</span></label>
									<select class="form-control select2" name="quarter">
										@foreach($Quarters as $q)
											<option value="{{ $q->id }}" {{ $quotation->quarter_id == $q->id ? 'selected' : '' }}>{{ $q->name }}</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="col">
								<div class="form-group">
									<label>Contact Person <span class="text-danger">*</span></label>
									<select class="form-control select2" name="contact_person" id="contact_person">
										<option value="">Select Contact Person</option>
										@foreach ($clients_details as $contact)
											<option value="{{ $contact->id }}" {{ $quotation->contact_person_id == $contact->id ? 'selected' : '' }}>
												{{ $contact->name ?? 'Person ' . $contact->id }}
											</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="col">
								<div class="form-group">
									<label>Price <span class="text-danger">*</span></label>
									<input type="number" class="form-control" name="price" value="{{ old('price', $quotation->price) }}">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-4">
								<div class="form-group">
									<label>Taxes <span class="text-danger">*</span></label>
									<select class="form-control select2" name="tax">
										@foreach ($taxes as $tax)
											<option value="{{ $tax->id }}" {{ $quotation->tax_id == $tax->id ? 'selected' : '' }}>
												{{ $tax->tax_name }}
											</option>
										@endforeach
									</select>
								</div>
							</div>

							<div class="col">
								<div class="form-group">
									<label>Type <span class="text-danger">*</span></label>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="quotation_type" value="AMC" {{ $quotation->quotation_type == 'amc' ? 'checked' : '' }}>
										<label class="form-check-label">AMC</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="quotation_type" value="Stamping" {{ $quotation->quotation_type == 'stamping' ? 'checked' : '' }}>
										<label class="form-check-label">Stamping</label>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col text-center">
								<button type="submit" class="btn btn-primary">Update Quotation</button>
							</div>
						</div>

					</div> {{-- card-body --}}
				</div> {{-- card --}}
			</form>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(document).ready(function () {
    // Fetch Client Names on Group Change
    $('#client_group').on('change', function () {
        let groupId = $(this).val();
        $('#client_name').html('<option>Loading...</option>');
        $.post("{{ route('quatation.client_group') }}", {
            client_gr_id: groupId,
            _token: "{{ csrf_token() }}"
        }, function (res) {
            $('#client_name').html('<option value="">Select Client Name</option>');
            $.each(res.client_grp, function (index, client) {
                $('#client_name').append('<option value="' + client.id + '">' + client.client_name + '</option>');
            });
        });
    });

    // Fetch Contact Person on Client Change
    $('#client_name').on('change', function () {
        let clientId = $(this).val();
        $('#contact_person').html('<option>Loading...</option>');
        $.post("{{ route('quatation.client_add') }}", {
            client_add_id: clientId,
            _token: "{{ csrf_token() }}"
        }, function (res) {
            $('#client_add').text(res.client_add.address);
            $('#contact_person').html('<option value="">Select Contact Person</option>');
            $.each(res.ClientContactPerson, function (index, contact) {
                $('#contact_person').append('<option value="' + contact.id + '">' + contact.name + '</option>');
            });
        });
    });
});
</script>
@endpush
