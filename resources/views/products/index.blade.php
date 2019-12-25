@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card bg-light">
            <div class="card-header">
                Product Listing
            </div>
            <div class="show-error alert alert-warning" style="display:none;">
            </div>
            <div class="card-body">
                @if (count($products))
                    <div class="product-list card-group">
                        @include('partials._products_table')
                    </div>
            </div>
            <div class="row justify-content-md-center">
                {{ $products->links() }}
            </div>
            @else
                <p class="alert alert-info">
                    No Listing Found
                </p>
            @endif
        </div>
    </div>
    </div>
@endsection

@section('scripts')
    <script src="/js/product_filter.js"></script>
    <script src="/js/shopping_cart.js"></script>
@endsection
