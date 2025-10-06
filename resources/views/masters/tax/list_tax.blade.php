@extends('master')

@section('main')
<div class="search-client-info">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">

                <div class="card-body">
                    @if(session('tax_delete'))
                    |<div class="alert alert-danger">
                        {{session('tax_delete')}}
                    </div>
                    @endif
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered w-100">
                            <thead>
                                <tr>
                                    <th class="wd-15p">Sr.No</th>
                                    <th class="wd-15p">Tax Name</th>
                                    <th class="wd-15p">Tax Value</th>
                                    <th class="wd-15p">Status</th>
                                    <th class="wd-15p">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($taxes as $tax)
                                <tr>
                                    <td>{{ $tax->id }}</td>
                                    <td>{{$tax->tax_name}}</td>
                                    <td>{{$tax->tax_value}}</td>

                                    <td>
                                        @if($tax->status == 0)
                                        <div class=""> Deactive</div>

                                        @else
                                        <div class=""> Active</div>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- Edit Button --}}
                                        <a href="{{route('tax.edit',$tax->id)}}" class="btn btn-success btn-edit" data-id="">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        {{-- Delete Button --}}

                                        <a href="{{route('tax.delete',$tax->id)}}"><button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this company?');">
                                                <i class="fa fa-trash"></i>
                                            </button></a>

                                    </td>
                                </tr>
                                @endforeach


                                <!-- Edit Company Modal -->
                                <div class="modal fade" id="editCompanyModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form id="editCompanyForm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Company</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" id="company_id">

                                                    <div class="mb-3">
                                                        <label>Company Name</label>
                                                        <input type="text" name="company_name" id="company_name" class="form-control" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Email</label>
                                                        <input type="email" name="email_id" id="email_id" class="form-control">
                                                    </div>

                                                    <!-- Add other fields as needed -->
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- <tr>
									<td>Donna</td>
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
								</tr> -->

                            </tbody>
                        </table>
                    </div>
                    <!-- <div class="row">
						<div class="col">
							<button type="submit" class="btn btn-primary d-block m-auto">Add</button>
						</div>
					</div> -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection