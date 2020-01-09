@extends('admin.dashboard')
@section('dashboard-content')
    <div class="container">
        <div class="card bg-light">
            <div class="card-header">
                Permission Listing
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-success btn-sm" href="{{ route('admin.permissions.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add Permission</a>
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
                @if (count($permissions))
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody class="record-list">
                            @include('partials.admin._permissions_table')
                            </tbody>
                        </table>
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
