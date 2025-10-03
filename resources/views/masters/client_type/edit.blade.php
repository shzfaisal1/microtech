@extends('master')

@section('main')
<form action="{{ route('client-type.update', $clientType->id) }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-header"><h3>Edit Client Type</h3></div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error) <p>{{ $error }}</p> @endforeach
                </div>
            @endif

            <div class="form-group">
                <label>Client Type Name</label>
                <input type="text" name="name" class="form-control" value="{{ $clientType->name }}" required>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('client-type.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>
@endsection
