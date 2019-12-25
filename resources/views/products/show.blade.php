@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h3>{{ $product->title }}</h3>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-link"><a href="{{ route('products.index') }}"> Back</a></button>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <p>Price: {{ $product->price }} </p>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <img src="{{ asset('storage/products/' . $product->id . '/' . $product->image_name) }}" alt="image" class="img-thumbnail" />
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <p>Description: {{ $product->description }} </p>
            </div>
        </div>
    </div>
@endsection
