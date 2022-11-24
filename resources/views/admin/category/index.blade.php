@extends('admin.admin')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="btn-group float-right">
    <ol class="breadcrumb hide-phone p-0 m-0">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Category</li>
    </ol>
</div>
<h2>Categories</h2>
{{-- @role("Add category") --}}
<a href="{{ route('admin.category.add') }}">
    <button class="btn btn-outline-primary">Add New Category</button>
</a>
{{-- @endrole --}}
<a href="{{ route('export-category') }}">
    <button class="btn btn-sm btn-outline-info float-right"><i class="material-icons">download</i>Download</button>
</a>
<div class="card ">
    <div class="card-body">
        <table class="table table-bordered table-hover text-center" id="categoryTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@section('script')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
    $('#categoryTable').DataTable({
        // select: true,
        processing: true,
        serverSide: true,
        ajax: "{!! route('get.category') !!}",
        columns: [{
                data: 'id',
                name: 'id',
            },
            {
                data: 'name',
                name: 'name',
            },
            {
                data: 'slug',
                name: 'slug',
            },
            {
                data: 'description',
                name: 'description',
            },
            {
                data: 'image',
                name: 'image',
            },
            {
                data: 'action',
                name: 'action',
                searchable: false,
            },
        ],
        "columnDefs": [{
            "className": "dt-center",
            "target": "_all"
        }],
    });
});
</script>
@endsection
@endsection