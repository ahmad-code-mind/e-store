@extends('admin.admin')

@section('content')
<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Assign Permissions</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form id="assignPermissionForm" action="{{ route('assign-permissions',  ['id' => $roles->id]) }}" method="POST">
                            @csrf
                            <div class="row">
                                @foreach($permissions as $permission)
                                <div class="col-md-4 col-6 mb-3">
                                    <input type="checkbox" value="{{ $permission->id }}" {{ ((App\Models\User::checkPermissionByRoleId($permission->id , $roleID)) == 1) ? 'checked' : '' }} id='{{ $permission->id }}' name="permission[]">
                                    <label for="{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                <button class="btn btn-primary" type="submit">Assign</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- container -->
</div>
@endsection