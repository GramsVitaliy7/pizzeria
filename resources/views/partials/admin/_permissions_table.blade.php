@foreach($permissions as $permission)
    <tr>
        <td>{{ $permission->id }}</td>
        <td>{{ $permission->name }}</td>
        <td>
            @if ($permission->created_at)
                {{ $permission->created_at->format('d-m-Y h:i:s') }}
            @endif
        </td>
        <td>
        @if ($permission->updated_at)
            {{ $permission->updated_at->format('d-m-Y h:i:s') }}
        @endif
        <td>
            <a href="{{ route('admin.permissions.show', $permission->id) }}"><i class="fa fa-eye"></i></a>
            <a href="{{ route('admin.permissions.edit', $permission->id) }}"><i class="fa fa-edit"></i></a>
            <a class="btn-delete" href="#" data-url="{{ route('admin.permissions.destroy', $permission->id) }}">
                <i class="fa fa-trash"></i>
            </a>
        </td>
    </tr>
@endforeach
