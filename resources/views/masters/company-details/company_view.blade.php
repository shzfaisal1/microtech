@extends('master')

@section('main')
<div class="search-client-info">
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="card">
				<div class="card-body">

					{{-- Header with Add button --}}
					<div class="d-flex justify-content-between align-items-center mb-3">
						<h5 class="mb-0">Companies</h5>
						<a href="{{route('masters.company-details.store')}}" class="btn btn-primary btn-sm">
							<i class="fa fa-plus"></i> Add Company
						</a>
					</div>

					<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered w-100">
							<thead>
								<tr>
									<th class="wd-15p">Sr.No</th>
									<th class="wd-15p">Company Name</th>
									<th class="wd-15p">Print As</th>
									<th class="wd-15p">Company Prefix</th>
									<th class="wd-15p">EMAIL ID</th>
									<th class="wd-15p">Address</th>
									<th class="wd-15p">VAT No</th>
									<th class="wd-15p">VC Date</th>
									<th class="wd-15p">Stock Location</th>
									<th class="wd-15p">Price</th>
									<th class="wd-15p">Total</th>
									<th class="wd-15p">Price in INR</th>
									<th class="wd-25p">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($companies as $company)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $company->company_name }}</td>
									<td>
										{{ $company->print_as }}
										<br>
										{{ $company->print_as1 }}
									</td>
									<td>{{ $company->company_prefix }}</td>
									<td>
										{{ $company->email_id }}
										<br>
										{{ $company->email_id1 }}
									</td>
									<td>{{ $company->address }}</td>
									<td>{{ $company->vat_tin }}</td>
									<td>{{ $company->vat_tin_date }}</td>
									<td>{{ $company->pan_no }}</td>
									<td>{{ $company->cst_tin }}</td>
									<td>{{ $company->cst_tin_date }}</td>
									<td>{{ $company->pt_no }}</td>
									<td>
									

										{{-- Edit Button --}}
										<a href="{{ route('masters.company-details.edit', $company->id) }}" 
										   class="btn btn-success btn-sm btn-edit" 
										   data-id="{{ $company->id }}" 
										   title="Edit company">
											<i class="fa fa-edit"></i>
										</a>

										{{-- Delete Button --}}
										<form action="{{ route('masters.company-details.destroy', $company->id) }}" method="POST" style="display:inline-block;">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this company?');" title="Delete company">
												<i class="fa fa-trash"></i>
											</button>
										</form>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div> <!-- /.table-responsive -->
				
				</div> <!-- /.card-body -->
			</div> <!-- /.card -->
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
	// Initialize DataTable (if you have DataTables included)
	if (typeof $ !== 'undefined' && $.fn.dataTable) {
		$('#example').DataTable({
			responsive: true,
			// optional: change page length, ordering, etc
			pageLength: 10,
			order: []
		});
	}

	// Optional: small UX improvement - confirm before navigating to edit when needed
	// (Not necessary — kept as an example)
	// $('.btn-edit').on('click', function(e){
	//     // custom behavior if required
	// });
});
</script>
@endpush
