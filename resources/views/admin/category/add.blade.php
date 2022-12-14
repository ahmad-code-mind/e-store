@extends('admin.admin') @section('content')
<div class="btn-group float-right">
    <ol class="breadcrumb hide-phone p-0 m-0">
        <li class="breadcrumb-item"><a class="" href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ url('admin/category') }}">Category</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>
</div>
<h3>Add Category</h3>
<a href="{{ route('get-import-category') }}">
    <button class="btn btn-sm btn-outline-info float-right mb-2"><i class="material-icons">add</i>Bulk Data</button>
</a>
<div class="card">
    <div class="card-body">
        <form action="{{ route('add-category') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" />
                </div>
                <div class="col-md-6 mb-3">
                    <label for="slug">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" />
                </div>
                <div class="col-md-12 mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="status" class="form-label">Status</label>
                    <input type="checkbox" class="btn-check" id="status" name="status" />
                </div>
                <div class="col-md-6 mb-3">
                    <label for="popular" class="form-label">Popular</label>
                    <input type="checkbox" class="btn-check" id="popular" name="popular" />
                </div>
                <div class="col-md-12 mb-3">
                    <label for="meta_title" class="form-label">Meta Title</label>
                    <input type="text" class="form-control" id="meta_title" name="meta_title" />
                </div>
                <div class="col-md-12 mb-3">
                    <label for="meta_keywords" class="form-label">Meta Keywords</label>
                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" />
                </div>
                <div class="col-md-12 mb-3">
                    <label for="meta_description" class="form-label">Meta Description</label>
                    <input type="text" class="form-control" id="meta_description" name="meta_description" />
                </div>
                <div class="col-md-12 mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" />
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-outline-primary">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection