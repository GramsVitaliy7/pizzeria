@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h3>Create Product</h3>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-link"><a href="{{ route('admin.products.index') }}"> Back</a>
                    </button>
                </div>
            </div>
        </div>
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-md-center">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <select class="form-control form-control-lg" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>title:</strong>
                        <input type="text" name="title" class="form-control" placeholder="Name">
                    </div>
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>price:</strong>
                        <input type="text" name="price" class="form-control" placeholder="Name">
                    </div>
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputImage" name="image">
                        <label class="custom-file-label" for="inputImage">Choose image</label>
                    </div>
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="news-excerpt">Description:</label>
                        <textarea id="news-excerpt" type="text" name="description" class="form-control"
                                  placeholder="Content" rows="10"></textarea>
                    </div>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
@endsection
