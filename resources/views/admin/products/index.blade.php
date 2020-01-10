@extends('admin.dashboard')
@section('dashboard-content')
    <div class="container">
        <div class="card bg-light">
            <div class="card-header">
                Product Listing
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-success btn-sm" href="{{ route('admin.products.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add Product</a>
                        </div>
                    </div>
                </div>
            </div>

            <div id="success-operation" class="alert alert-success" style="display:none;">
            </div>

            <div id="error-operation" class="alert alert-warning" style="display:none;">
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-warning">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="card-body">
                @if (count($products))
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Image_name</th>
                                <th>Description</th>
                                <th>Rating</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody class="record-list">
                            @include('partials.admin._products_table')
                            </tbody>
                        </table>
                    </div>
                    <div class="row justify-content-md-center">
                        {{ $products->links() }}
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

@section('scripts')
    <script src="/js/delete_record.js"></script>
@endsection
