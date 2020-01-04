@foreach($products as $product)
    @if ($loop->first || (!$loop->count % 4))
        <div class="row">
            @endif
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <img src="{{ asset('storage/products/' . $product->id . '/' . $product->image_name) }}"
                         class="card-img-top product-image"
                         alt="...">
                    <div class="card-body">

                        <h5 class="card-title product-title"> {{ $product->title }}</h5>
                        <p class="card-text product-price"> {{ $product->price }}.</p>

                        <div class="row">

                            <a href="#"
                               class="btn-product-details btn btn-primary d-inline p-2 bg-primary text-white"
                               data-url="{{ route('products.show', $product->id) }}"
                               data-toggle="modal" data-target="#productModal">Choose</a>
                        </div>
                    </div>
                </div>
            </div>
            @if ($loop->last || (!$loop->count % 4))
        </div>
    @endif
@endforeach

<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-product-title modal-title" id="exampleModalLabel">{{ $product->title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('storage/products/' . $product->id . '/' . $product->image_name) }}"
                     class="card-img-top modal-product-image"
                     alt="...">
                <p class="modal-product-description"></p>
                <p class="modal-product-price"></p>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <select class="modal-product-variant form-control form-control-lg" name="size">
                        </select>
                    </div>
                </div>
                <div class="modal-product-doping btn-group-toggle" data-toggle="buttons">
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" data-url="{{ route('shopping_cart.store',$product->id) }}"
                   class="store-cart btn btn-primary d-inline p-2 bg-dark text-white">Book</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

