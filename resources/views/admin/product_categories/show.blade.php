@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h3>Show Category</h3>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-link"><a href="{{ route('admin.product_categories.index') }}"> Back</a></button>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There are some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-md-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Title:</strong>
                    {{ $productCategory->name }}
                </div>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Created On:</strong>
                    {{ $productCategory->created_at->format('d-m-Y h:i:s') }}
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Last Updated:</strong>
                    {{ $productCategory->updated_at->format('d-m-Y h:i:s') }}
                </div>
            </div>
        </div>
    </div>
@endsection
