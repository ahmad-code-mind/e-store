@extends('admin.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit User</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('edit-user',$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" value="{{ $user->name }}" id="name" name="name">
                </div>
                <div class="col-12 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" value="{{ $user->email }}" id="email" name="email">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="role_as" class="form-label">Role</label>
                    <select name="role_as" class="form-select">
                        {{-- <option selected disabled>Select Category</option> --}}
                        <option value="1">SuperAdmin</option>
                        <option value="2">Admin</option>
                        <option value="3">SubAdmin</option>
                        <option value="4">Employee</option>
                        <option value="0">User</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection