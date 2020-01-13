@foreach($productCategories as $category)
    <tr>
        <td>{{ $category->id }}</td>
        <td>{{ $category->name }}</td>
        <td>
            @if ($category->parent_id)
                {{$category->parent_id}}
            @endif
        </td>
        <td>
            <a href="{{ route('admin.product_categories.show', $category->id) }}"><i class="fa fa-eye"></i></a>
            <a href="{{ route('admin.product_categories.edit', $category->id) }}"><i class="fa fa-edit"></i></a>
            <a class="btn-delete" href="#" data-url="{{ route('admin.product_categories.destroy', $category->id) }}">
                <i class="fa fa-trash"></i>
            </a>
        </td>
    </tr>
@endforeach
