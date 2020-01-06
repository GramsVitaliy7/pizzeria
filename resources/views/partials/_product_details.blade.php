<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-product-title modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src=""
                     class="card-img-top modal-product-image"
                     alt="...">
                <p class="modal-product-description"></p>
                <p class="modal-product-price"></p>

                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <select class="modal-product-variant form-control form-control-lg" name="size"
                        data-url="{{ route('products.calculate_product_price') }}">
                        </select>
                    </div>
                </div>
                <div class="modal-product-doping btn-group-toggle" data-toggle="buttons">
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" data-url=""
                   class="store-cart btn btn-primary d-inline p-2 bg-dark text-white">Book</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
