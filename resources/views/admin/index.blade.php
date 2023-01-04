@extends('admin.admin')

@section('content')
<div class="card">
    {{-- <div class="card-body">
        {{ Auth::user()->name }}

    </div> --}}
</div>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <span class="material-symbols-outlined">
                        category
                    </span>
                </div>
                <p class="card-category">Category</p>
                <h3 class="card-title">{{ count($category) }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{ url('admin/category') }}">All Categories</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <span class="material-symbols-outlined">
                        inventory
                    </span>
                </div>
                <p class="card-category">Products</p>
                <h3 class="card-title">{{ count($product) }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{ url('admin/product') }}">All Products</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <span class="material-symbols-outlined">
                        inactive_order
                    </span>
                </div>
                <p class="card-category">Active Orders</p>
                <h3 class="card-title">{{ count($activeorder) }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{ url('admin/order') }}">All Active Orders</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <span class="material-symbols-outlined">
                        order_approve
                    </span>
                </div>
                <p class="card-category">Completed Orders</p>
                <h3 class="card-title">{{ count($comorder) }}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <a href="{{ route('order-history') }}">All Completed Orders</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection