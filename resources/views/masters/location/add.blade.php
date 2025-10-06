@extends('master')

@section('main')
<form action="{{ route('locations.store') }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Location</h3>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error) <p>{{ $error }}</p> @endforeach
                </div>
            @endif

            <div class="form-group">
                <label for="name">Location Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
            <a href="{{ route('location.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>
@endsection
