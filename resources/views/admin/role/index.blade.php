@extends('admin.admin')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Roles List</h4>
                </div>
            </div>


            <div class="col-sm-12 mb-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    + Permissions
                </button>
                <button type="button" class="btn btn-outline-primary float-right" data-bs-toggle="modal"
                    data-bs-target="#role">
                    + Add New Role
                </button>
            </div>
            <!-- Modal Permission -->
            <form action="{{ route('store-permission') }}" method="POST">
                @csrf
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Add Permission</h5>
                            </div>
                            <div class="modal-body">
                                <input type="text" class="form-control" id="name" name="name" v-model="permission_name"
                                    aria-describedby="emailHelp" placeholder="Enter Permission" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- End Model -->
            <!-- Modal Role -->
            <form action="{{ route('store-role') }}" method="POST">
                @csrf
                <div class="modal fade" id="role" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Add Role</h5>
                            </div>
                            <div class="modal-body">
                                <input type="text" class="form-control" id="name" name="name" v-model="role_name"
                                    aria-describedby="emailHelp" placeholder="Enter Role" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- End Model -->
            <div class="clearfix"></div>
        </div>
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card new-user">
                    <div class="card-body table-responsive">
                        <div class="">
                            <table id="roleTable" class="table">
                                <thead>
                                    <tr>
                                        <th>Role Id</th>
                                        <th>Role Name</th>
                                        <th>Permissions</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
    <!-- container -->
</div>
@section('script')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
    $('#roleTable').DataTable({
        // select: true,
        processing: true,
        serverSide: true,
        ajax: "{!! route('get.role') !!}",
        columns: [{
                data: 'id',
                name: 'id',
            },
            {
                data: 'name',
                name: 'name',
            },
            {
                data: 'permission',
                name: 'permission',
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