@extends('master')

@section('main')
<div class="search-client-info">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <a href="{{ route('client.create') }}" class="btn btn-primary mb-3">Add Client</a>

                    <div class="table-responsive">
                        <table id="client" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Client Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function () {
        $('#client').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('client.index') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });
</script>
@endpush
