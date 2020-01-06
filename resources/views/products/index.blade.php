@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label> Category filter
                        <select class="category-filter form-control form-control-lg" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" data-url ="{{ route('products.filter') }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="card bg-light">
            <div class="card-header">
                Product Listing
            </div>
            <div class="show-error alert alert-warning" style="display:none;">
            </div>
            <div class="card-body">
                <div class="row d-flex justify-content-center">

                    @if (count($products))
                        <div class="product-list card-group">
                            @include('partials._product_table')
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
    </div>
    @include('partials._product_details')
@endsection

@section('scripts')
    <script src="/js/shopping_cart.js"></script>
    <script src="/js/product_details.js"></script>
@endsection
