@extends('layouts.app')
@section('content')
    <form action="{{ route('shopping_cart.payment.index') }}" method="GET">
        @csrf
        <div class="row justify-content-md-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name"
                           @if($user->name)
                           value="{{ $user->name }}"
                        @endif
                    >
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="phone" class="form-control" placeholder="Phone number"
                           @if($user->phone)
                           value="{{ $user->phone }}"
                        @endif
                    >
                </div>
                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Delivery address:</strong>
                    <input type="text" name="delivery_address" class="form-control" placeholder="Delivery address">
                </div>
                @error('delivery_address')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
