@foreach($orders as $order)
    <tr>
        <td>{{ $order->id }}</td>
        <td>{{ $order->user->name }}</td>
        <td>
            ${{ number_format($order->total, 2) }}
        </td>
        <td>{{ $order->user->phone }}</td>
        <td>{{ $order->delivery_address }}</td>
        <td>
            @if($order->created_at)
                {{ $order->created_at->format('d-m-Y h:i:s') }}
            @endif
        </td>
        <td>
            @if($order->updated_at)
                {{ $order->updated_at->format('d-m-Y h:i:s') }}
            @endif
        </td>
        <td>
            <a href="{{ route('admin.orders.show', $order->id) }}"><i class="fa fa-eye"></i></a>
        </td>
    </tr>
@endforeach
