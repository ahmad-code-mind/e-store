@extends('admin.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Category</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('edit-category',$category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" value="{{ $category->name }}" id="name" name="name">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" value="{{ $category->slug }}" id="slug" name="slug">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ $category->description }}
                    </textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input type="checkbox" class="btn-check" {{ $category->status == '1' ? 'checked': ''}} id="status"
                    name="status">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="popular" class="form-label">Popular</label>
                    <input type="checkbox" class="btn-check" {{ $category->popular == '1' ? 'checked': ''}} id="popular"
                    name="popular">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="meta_title" class="form-label">Meta Title</label>
                    <input type="text" class="form-control" value="{{ $category->meta_title }}" id="meta_title"
                        name="meta_title">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="meta_keywords" class="form-label">Meta Keywords</label>
                    <input type="text" class="form-control" value="{{ $category->meta_keywords }}" id="meta_keywords"
                        name="meta_keywords">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="meta_description" class="form-label">Meta Description</label>
                    <textarea class="form-control" id="meta_description" name="meta_description">{{ $category->meta_descrip }}
                    </textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    <model-viewer src="{{asset('upload/image/category/'.$category->image)}}" width="50" height="50"
                        value="{{$category->image}}" name="image"></model-viewer>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection