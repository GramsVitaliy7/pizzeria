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

@endsection

@section('scripts')
    <script src="/js/shopping_cart.js"></script>
    <script>
        $(document).ready(function () {
            /*$(document).on("click", ".btn-product-details", function () {
                let self = $(this);
                let parent = self.closest('.card-body');
                let productId = $(self).data('product-id');
                $(".modal-product-title").html(parent.find('.product-title').text());
                $(".modal-product-image").attr('src', parent.find('.product-image').attr('src'));
                $(".modal-product-description").html(self.data('product-description'));
                $(".modal-product-price").html(parent.find('.product-price').text());
            });
            $('.select-product-size').on('change', function () {
                let self = $(this);
                let parent = self.closest('.modal-body');
                let selectedFactor = $(this).children("option:selected").val();
                $(".modal-product-price").html(parseFloat(parent.find('.product-price').text()) * selectedFactor);
            });*/
            $(document).on("click", ".btn-product-details", function (e) {
                e.preventDefault();
                let self = $(this);
                let html = "";
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: $(self).data("url"),
                    method: "GET",
                    success: function (response) {
                        $('.modal-product-title').html(response.title);
                        $('.modal-product-description').html(response.description);
                        $.each(response.variants, function (key, value) {
                            html += '<option value="' + value.id + '">' +
                                value.size +
                                '</option>';
                        });
                        $('.modal-product-variant').html(html);
                        html = "";
                        $.each(response.dopings, function (key, value) {
                            html += '<div class="btn-group-toggle" data-toggle="buttons">' +
                                '<label class="btn btn-secondary active">' +
                                '<input type="checkbox" name="dopings[]" checked autocomplete="off">' +
                                value.name +
                                '</label>';
                        });
                        $('.modal-product-doping').html(html);
                    },
                    error: function (response) {
                    }
                });
            });
        });
    </script>
@endsection
