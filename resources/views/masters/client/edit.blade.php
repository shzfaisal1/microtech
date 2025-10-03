@extends('master')

@section('main')
<form action="{{ route('client.update', $client->id) }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Clientv Group</h3>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error) <p>{{ $error }}</p> @endforeach
                </div>
            @endif

            <div class="form-group">
                <label for="name">  Client Group Name  </label>
                <input type="text" name="name" class="form-control" value="{{ $client->name }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('client.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>
@endsection
