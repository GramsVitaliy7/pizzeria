@extends('layouts.app')
@section('content')
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.permissions.index') }}">
                        <i class="fas fa-drum"></i>
                        Permissions
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.roles.index') }}">
                        <i class="fas fa-user-tag"></i>
                        Roles
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.product_categories.index') }}">
                        <i class="fas fa-boxes"></i>
                        Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.products.index') }}">
                        <i class="fas fa-box-open"></i>
                        Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.orders.index') }}">
                        <i class="fas fa-truck-loading"></i>
                        Orders
                    </a>
                </li>

            </ul>
        </div>
    </nav>
    <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
        @yield('dashboard-content')
    </div>
@endsection

