@extends('admin.admin')

@section('content')
<div class="card">
    <div class="card-body">
        {{ Auth::user()->name }}
    </div>
</div>
@endsection