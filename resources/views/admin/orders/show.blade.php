@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h3>Show product</h3>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-link"><a href="{{ route('admin.orders.index') }}"> Back</a>
                    </button>
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
                    <strong>User:</strong>
                    {{ $order->user->name }}
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Phone:</strong>
                    {{ $order->user->phone }}
                </div>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Delivery address:</strong>
                    {{ $order->delivery_address }}
                </div>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Total:</strong>
                    {{ $order->total }}
                </div>
            </div>
        </div>


        <div class="row justify-content-md-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Created At:</strong>
                    {{ $order->created_at->format('d-m-Y h:i:s') }}
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Updated At:</strong>
                    {{ $order->updated_at->format('d-m-Y h:i:s') }}
                </div>
            </div>
        </div>
    </div>
@endsection
