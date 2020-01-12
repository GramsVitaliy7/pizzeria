@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h3>Edit product</h3>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-link"><a href="{{ route('admin.products.index') }}"> Back</a>
                    </button>
                </div>
            </div>
        </div>
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
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
                        <label for="news-title">Title:</label>
                        <input id="news-title" type="text" name="title" class="form-control"
                               value="{{ $product->title }}"/>
                    </div>
                    @error('title')
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
                        <label for="news-content">Content:</label>
                        <textarea id="news-content" type="text" name="description" class="form-control"
                                  rows="10">{{ $product->description }}</textarea>
                    </div>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="variant-wrapper">
                        @foreach($product->productVariants as $variant)
                            <div class="variant-wrapper-element"><h5>VARIANT {{ $loop->iteration }}:</h5>
                                <div class="form-group">
                                    <strong>name</strong>
                                    <input class="form-control" placeholder="Name" type="text" name="variants[0][name]"
                                           value="{{ $variant->name }}">
                                </div>
                                <div class="form-group">
                                    <strong>size</strong>
                                    <input class="form-control" placeholder="Size" type="text" name="variants[0][size]"
                                           value="{{ $variant->size }}">
                                </div>
                                <div class="form-group">
                                    <strong>price</strong>
                                    <input class="form-control" placeholder="Price" type="text"
                                           name="variants[0][price]"
                                           value="{{ $variant->price }}"></div>
                                <div class="btn btn-warning btn-sm btn-delete-variant" href="#">Delete variant</div>
                            </div>
                        @endforeach
                    </div>
                    <a class="btn btn-success btn-sm btn-add-variant" href="#">
                        <i class="fa fa-plus"></i>
                        Add Variant
                    </a>
                    @error('variants')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <br>

            <div class="row justify-content-md-center">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="doping-wrapper">
                        @foreach($product->productDopings as $doping)
                            <div class="variant-wrapper-element"><h5>VARIANT {{ $loop->iteration }}:</h5>
                                <div class="form-group">
                                    <strong>name</strong>
                                    <input class="form-control" placeholder="Name" type="text" name="variants[0][name]"
                                           value="{{ $doping->name }}">
                                </div>
                                <div class="form-group">
                                    <strong>price</strong>
                                    <input class="form-control" placeholder="Price" type="text"
                                           name="variants[0][price]"
                                           value="{{ $doping->price }}"></div>
                                <div class="btn btn-warning btn-sm btn-delete-variant" href="#">Delete doping</div>
                            </div>
                        @endforeach
                    </div>
                    <a class="btn btn-success btn-sm btn-add-doping" href="#">
                        <i class="fa fa-plus"></i>
                        Add Doping
                    </a>
                    @error('dopings')
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

@section('scripts')
    <script src="/js/create_update_product.js"></script>
@endsection
