@foreach($orders as $order)
    <tr>
        <td colspan="4">
            <h6>Id: #{{ $order->id }}</h6>
        </td>
    </tr>

    @foreach($order->selectedProducts as $selectedProduct)
        <tr>
            <td>
                <div class="col-sm-3 hidden-xs"><img
                        src="{{asset('storage/products/' . $selectedProduct->product_id
                        . '/' . $selectedProduct->image_name }}" width="100"
                        height="100"
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
@endforeach
