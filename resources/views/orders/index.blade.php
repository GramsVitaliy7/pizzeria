@extends('admin.dashboard')
@section('dashboard-content')
    <div class="container">
        <div class="card bg-light">
            <div class="card-header">
                Product Listing
            </div>
            @if ($message = Session::get('error'))
                <div class="alert alert-warning">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="card-body">
                @if (count($orders))
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
                            @include('partials._orders_table')
                            </tbody>
                        </table>
                    </div>
                    <div class="row justify-content-md-center">
                        {{ $orders->links() }}
                    </div>
                @else
                    <p class="alert alert-info">
                        No Listing Found
                    </p>
                @endif
            </div>
        </div>
    </div>
@endsection
