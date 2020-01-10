@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h3>Show product</h3>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-link"><a href="{{ route('admin.products.index') }}"> Back</a></button>
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
                    <strong>Category:</strong>
                    {{ $product->productCategory->name }}
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Title:</strong>
                    {{ $product->title }}
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Price:</strong>
                    {{ $product->price }}
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Image:</strong>
                    {{ $product->image_name }}
                    <img src="{{ asset('storage/products/' . $product->id . '/' . $product->image_name) }}" alt="image" class="img-thumbnail" />
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Description:</strong>
                    {{ $product->description }}
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Rating:</strong>
                    {{ $product->rating }}
                </div>
            </div>
        </div>
    </div>
@endsection
