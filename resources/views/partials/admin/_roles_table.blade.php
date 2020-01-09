@foreach($roles as $role)
    <tr>
        <td>{{ $role->id }}</td>
        <td>{{ $role->name }}</td>
        <td>
            @foreach($role->permissions as $permission)
                {{ $permission->name }}
            @endforeach
        </td>
        <td>
            @if ($role->created_at)
                {{ $role->created_at->format('d-m-Y h:i:s') }}
            @endif
        </td>
        <td>
        @if ($role->updated_at)
            {{ $role->updated_at->format('d-m-Y h:i:s') }}
        @endif
        <td>
            <a href="{{ route('admin.roles.show', $role->id) }}"><i class="fa fa-eye"></i></a>
            <a href="{{ route('admin.roles.edit', $role->id) }}"><i class="fa fa-edit"></i></a>
            <a class="btn-delete" href="#" data-url="{{ route('admin.roles.destroy', $role->id) }}">
                <i class="fa fa-trash"></i>
            </a>
        </td>
    </tr>
@endforeach
