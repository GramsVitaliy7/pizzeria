@foreach($products as $product)
    @if ($loop->first || (!$loop->count % 4))
        <div class="row">
            @endif
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <img src=""
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
