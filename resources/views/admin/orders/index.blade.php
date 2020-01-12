@extends('admin.dashboard')
@section('dashboard-content')
    <div class="container">
        <div class="card bg-light">
            <div class="card-header">
                Orders Listing
            </div>
            <div id="success-operation" class="alert alert-success" style="display:none;">
            </div>

            <div id="error-operation" class="alert alert-warning" style="display:none;">
            </div>
            <div class="card-body">
                @if (count($orders))
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>User</th>
                                <th>Total</th>
                                <th>Phone</th>
                                <th>Delivery address</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>action</th>
                            </tr>
                            </thead>
                            <tbody class="record-list">
                            @include('partials.admin._orders_table')
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
