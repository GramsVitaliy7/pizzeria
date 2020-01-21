@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label> Category filter
                        <select class="product-filter form-control form-control-lg" name="category-filter"
                                data-url="{{ route('products.filter') }}">
                            <option value="0">All categories</option>
                            @foreach($categories as $category)
                                <optgroup label="{{ $category->name }}">
                                    @foreach($category->children as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </label>
                </div>
                @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="input-group mb-3">
                    <div class="form-check">
                        <input class="product-filter form-check-input" type="radio" name="price-sort-filter"
                               id="asc-sorting"
                               value="asc">
                        <label class="form-check-label" for="asc-sorting">
                            Price ASC
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="product-filter form-check-input" type="radio" name="price-sort-filter"
                               id="desc-sorting"
                               value="desc">
                        <label class="form-check-label" for="desc-sorting">
                            Price DESC
                        </label>
                    </div>
                </div>
                <p>
                    <label for="amount">Rating range:</label>
                    <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                </p>
                <input type="hidden" id="hidden_minimum_rating" value="0"/>
                <input type="hidden" id="hidden_maximum_rating" value="5"/>
                <div id="slider-range" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">
                    <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 15%; width: 45%;"></div>
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                          style="left: 15%;"></span><span tabindex="0"
                                                          class="ui-slider-handle ui-corner-all ui-state-default"
                                                          style="left: 60%;"></span></div>

            </div>

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
                        @include('partials._products_table')
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
    <script src="/js/product_filter.js"></script>
@endsection
