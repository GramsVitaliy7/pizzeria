<div class="card-header">
    Order {{ $order->id }}
</div>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Product</th>
                <th>Subtotal</th>
            </tr>
            </thead>
            <tbody class="record-list">
            @foreach($order->selectedProducts as $selectedProduct)
                <tr>
                    <td>
                        <div class="col-sm-3 hidden-xs"><img
                                src="{{asset('storage/products/' . $selectedProduct->product_id. '/' .
                                $selectedProduct->image_name) }}" width="100" height="100"
                                class="img-responsive" alt="product-photo"/></div>
                    </td>
                    <td>{{ $selectedProduct->title }}</td>
                    <td>{{ $selectedProduct->amount }}</td>
                    <td>${{ number_format($selectedProduct->subtotal, 2) }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4">
                    ${{ number_format($order->total, 2) }}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

