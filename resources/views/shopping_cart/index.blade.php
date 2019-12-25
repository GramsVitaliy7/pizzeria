@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card bg-light">
            <div class="card-header">
                Shopping cart Listing
            </div>
            <div id="success-operation" class="alert alert-success" style="display:none;">
            </div>

            <div id="error-operation" class="alert alert-warning" style="display:none;">
            </div>

            <div class="card-body">
                @if ($cart)
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Amount</th>
                                <th>Subtotal</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody class="record-list">
                            @include('partials._shopping_cart_table')
                            </tbody>
                        </table>
                    </div>
                    <form action="{{ route('orders.pay_order') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <button class="btn btn-success btn-sm" type="submit">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Buy
                        </button>
                    </form>
                @else
                    <p class="alert alert-info">
                        Shopping cart is empty
                    </p>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/js/shopping_cart.js"></script>
@endsection
