@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h3>Edit Role</h3>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-link"><a href="{{ route('admin.roles.index') }}"> Back</a>
                    </button>
                </div>
            </div>
        </div>
        <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="row justify-content-md-center">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" value="{{ $role->name }}" class="form-control"
                               placeholder="Name">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-xs-6 col-sm-6 col-md-6">

                    @foreach($permissions as $permission)
                        <div class="row">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input value="{{ $permission->id }}" type="checkbox" name="permissions[]"
                                               aria-label="Checkbox for following text input"
                                               @if ($permission->checked)
                                                    checked
                                               @endif
                                        >
                                    </div>
                                </div>
                                <input type="text" value="{{ $permission->name }}" class="form-control"
                                       aria-label="Text input with checkbox" readonly>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
