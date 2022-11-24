@extends('admin.admin') @section('content')
<div class="btn-group float-right">
    <ol class="breadcrumb hide-phone p-0 m-0">
        <li class="breadcrumb-item"><a class="" href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ url('admin/category') }}">Category</a></li>
        <li class="breadcrumb-item active"><a href="{{ url('admin/category/add') }}">Add Category</a></li>
        <li class="breadcrumb-item active">Add Bulk Data</li>
    </ol>
</div>
<h3>Add Category</h3>
<div class="card">
    <div class="card-body">
        <form action="{{ route('import-category') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12 mb-3">
                <label for="bulk" class="form-label">Add Data</label>
                <input type="file" class="form-control" id="bulk" name="bulk" />
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-sm btn-outline-primary">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
@endsection