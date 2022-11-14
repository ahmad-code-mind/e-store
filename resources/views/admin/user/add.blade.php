@extends('admin.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add User</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('store-user') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="col-12 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="col-12 mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="role_as" class="form-label">Role</label>
                    <select name="role_as" class="form-select">
                        <option selected disabled>Select Category</option>
                        <option value="1">admin</option>
                        <option value="2">user</option>
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