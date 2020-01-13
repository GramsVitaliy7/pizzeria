@foreach($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->productCategory->name }}</td>
        <td>{{ $product->title }}</td>
        <td>
            @if ($product->productVariants)
                <ul>
                    @foreach($product->productVariants as $variant)
                        <li>Size {{ $variant->size}}: ${{ $variant->price }}</li>
                    @endforeach
                </ul>
            @endif
        </td>
        <td>
            @if ($product->productDopings)
                <ul>
                    @foreach($product->productDopings as $doping)
                        <li>{{ $doping->name}}: ${{ $doping->price}}</li>
                    @endforeach
                </ul>
            @endif
        </td>
        <td>{{ $product->image_name }}</td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->rating }}</td>
        <td>
            <a href="{{ route('admin.products.show', $product->id) }}"><i class="fa fa-eye"></i></a>
            <a href="{{ route('admin.products.edit', $product->id) }}"><i class="fa fa-edit"></i></a>

            <a class="btn-delete" href="#" data-url="{{ route('admin.products.destroy', $product->id) }}">
                <i class="fa fa-trash"></i>
            </a>
        </td>
    </tr>
@endforeach
