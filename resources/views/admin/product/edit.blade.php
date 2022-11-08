@extends('admin.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Product</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('edit-product',$product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" class="form-select">
                        <option selected disabled>Select Category</option>
                        @foreach ($category as $getcategory)
                        <option value="{{$getcategory->id}}">{{$getcategory->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" value="{{ $product->name }}" id="name" name="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" value="{{ $product->slug }}" id="slug" name="slug">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="small_description" class="form-label">Small Description</label>
                    <textarea class="form-control"  id="small_description" name="small_description" rows="3">{{ $product->small_description }}</textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}
                    </textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="original_price">Original Price</label>
                    <input type="number" class="form-control" value="{{ $product->original_price }}" id="original_price" name="original_price">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="selling_price">Selling Price</label>
                    <input type="number" class="form-control" value="{{ $product->selling_price }}" id="selling_price" name="selling_price">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    <img src="{{asset('upload/image/product/'.$product->image)}}" width="50" height="50"
                        value="{{$product->image}}" name="image">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="qty">Quantity</label>
                    <input type="number" class="form-control" value="{{ $product->qty }}" id="qty" name="qty">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tax">Tax</label>
                    <input type="number" class="form-control" value="{{ $product->tax }}" id="tax" name="tax">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input type="checkbox" class="btn-check" {{ $product->status == '1' ? 'checked': ''}} id="status"
                        name="status">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="trending" class="form-label">Trending</label>
                    <input type="checkbox" class="btn-check" {{ $product->trending == '1' ? 'checked': ''}} id="trending"
                        name="trending">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="meta_title" class="form-label">Meta Title</label>
                    <input type="text" class="form-control" value="{{ $product->meta_title }}" id="meta_title"
                        name="meta_title">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="meta_keywords" class="form-label">Meta Keywords</label>
                    <input type="text" class="form-control" value="{{ $product->meta_keywords }}" id="meta_keywords"
                        name="meta_keywords">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="meta_description" class="form-label">Meta Description</label>
                    <textarea class="form-control" id="meta_description" name="meta_description">{{ $product->meta_description }}
                    </textarea>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection