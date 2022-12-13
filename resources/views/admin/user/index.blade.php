@extends('admin.admin')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="mb-2">Users</h2>
        <a href="{{ route('admin.user.add') }}">
            <button class="btn btn-outline-primary">Add User</button>
        </a>
    </div>
    <div class="card-body">
        <table class="table table-bordered " id="userTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                        {{$user->id}}
                    </td>
                    <td class="px-6 py-4">
                        {{$user->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$user->email}}
                    </td>
                    <td class="px-6 py-4">
                        @switch($user->role_as)
                        @case(1)
                        <span class="bg-blue">SuperAdmin</span>
                        @break
                        @case(2)
                        <span class="bg-blue">Admin</span>
                        @break
                        @case(3)
                        <span class="bg-blue">SubAdmin</span>
                        @break
                        @case(4)
                        <span class="bg-blue">Employee</span>
                        @break
                        @case(0)
                        <span class="bg-blue">User</span>
                        @break
                        @default

                        @endswitch
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{route('show-edit-user',$user->id)}}" class="btn btn-sm btn-outline-info"><i
                                class="material-icons">edit</i>Edit</a>
                        <a href="{{route('delete-user',$user->id)}}" onclick="return confirm(\'Are you sure?\')"
                            class="btn btn-sm btn-outline-danger"><i class="material-icons">delete</i>Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@section('script')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
    $('#userTable').DataTable({
        // select: true,
    //     processing: true,
    //     serverSide: true,
    //     ajax: "{!! route('get.user') !!}",
    //     columns: [{
    //             data: 'id',
    //             name: 'id',
    //         },
    //         {
    //             data: 'name',
    //             name: 'name',
    //         },
    //         {
    //             data: 'email',
    //             name: 'email',
    //         },
    //         {
    //             data: 'role_as',
    //             name: 'role_as.name'
    //         },
    //         {
    //             data: 'action',
    //             name: 'action',
    //             searchable: false,
    //         },
    //     ],
        "columnDefs": [{
            "className": "dt-center",
            "target": "_all"
        }],
    });
});
</script>
@endsection
@endsection