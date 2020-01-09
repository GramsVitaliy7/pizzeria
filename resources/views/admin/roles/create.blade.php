@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h3>Add New Permission</h3>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-link"><a href="{{ route('admin.roles.index') }}"> Back</a></button>
                </div>
            </div>
        </div>
        <form action="{{ route('admin.roles.store') }}" method="POST">
            @csrf
            <div class="row justify-content-md-center">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="input-group mb-3">
            @foreach($permissions as $permission)
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input value="{{ $permission->id }}" type="checkbox" aria-label="Checkbox for following text input">
                    </div>
                </div>
                <input type="text" value="{{ $permission->name }}" class="form-control" aria-label="Text input with checkbox" readonly>
            @endforeach
            </div>
            <div class="row justify-content-md-center">
                <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
@endsection
