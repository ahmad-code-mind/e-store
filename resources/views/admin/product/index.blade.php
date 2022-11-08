@extends('admin.admin')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="mb-2">Products</h2>
        <a href="{{ route('admin.product.add') }}">
            <button class="btn btn-outline-primary">Add New Product</button>
        </a>
    </div>
    <div class="card-body">
        <table class="table table-bordered text-center" id="productTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th>Selling Price</th>
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
    $('#productTable').DataTable({
        // select: true,
        processing: true,
        serverSide: true,
        ajax: "{!! route('get.product') !!}",
        columns: [{
                data: 'id',
                name: 'id',
            },
            {
                data: 'category',
                name: 'category.name',
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
                data: 'small_description',
                name: 'small_description',
            },
            {
                data: 'selling_price',
                name: 'selling_price',
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