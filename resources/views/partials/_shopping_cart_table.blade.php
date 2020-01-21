@foreach($cart['products'] as $id => $details)
    <tr>
        <td>
            <div class="col-sm-3 hidden-xs"><img
                    src="{{asset('storage/products/' . $id . '/' . $details['image_name']) }}" width="100"
                    height="100"
                    class="img-responsive" alt="product-photo"/></div>
        </td>
        <td>{{ $details['title'] }}</td>
        <td>${{ number_format($details['price'], 2) }}</td>
        <td><input type="text" class="amount" value="{{ $details['amount'] }}" class="form-control"
                   placeholder="Amount"></td>
        <td>${{ number_format($details['price'] * $details['amount'], 2) }}</td>
        <td>
            <a href="#" data-url="{{ route('shopping_cart.update', $id) }}" class="update-cart"
               data-id="{{ $id }}">
                <i class="fa fa-refresh"></i>
            </a>
            <a href="#" data-url="{{ route('shopping_cart.delete', $id) }}" class="delete-cart">
                <i class="fa fa-trash"></i>
            </a>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="6">
        <h4>Total: ${{ number_format($cart['total'], 2) }}</h4>
    </td>
</tr>
