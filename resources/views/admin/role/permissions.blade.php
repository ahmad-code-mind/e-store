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
                        <form id="assignPermissionForm"
                            action="{{ route('assign-permissions',  ['id' => $roles->id]) }}" method="POST">
                            @csrf
                            <div class="form-check">
                                <input type="checkbox" class="" id="checkPermissionAll" value="1">
                                <label class="form-check-label" for="checkPermissionAll">All</label>
                            </div>
                            <hr>
                            @php $i = 1; @endphp
                            @foreach ($permission_groups as $group)
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="" id="{{ $i }}Management"
                                            value="{{ $group->name }}"
                                            onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                        <label class="" for="checkPermission">{{
                                            $group->name
                                            }}</label>
                                    </div>
                                </div>
                                <div class="col-9 role-{{ $i }}-management-checkbox">
                                    @php
                                    $permissions = App\Models\User::getpermissionsByGroupName($group->name);
                                    $j = 1;
                                    @endphp
                                    @foreach ($permissions as $permission)
                                    <div class="form-check">
                                        <input type="checkbox" class="" name="permission[]"
                                            id="checkPermission{{ $permission->id }}" {{
                                            ((App\Models\User::checkPermissionByRoleId($permission->id , $roleID)) == 1)
                                        ?
                                        'checked' : '' }} value="{{ $permission->name }}">
                                        <label class="" for="checkPermission{{ $permission->id }}">{{
                                            $permission->name }}</label>
                                    </div>
                                    @php $j++; @endphp
                                    @endforeach
                                </div>
                                {{-- @foreach($permissions as $permission)
                                <div class="col-md-4 col-6 mb-3">
                                    <input type="checkbox" value="{{ $permission->id }}" {{
                                        ((App\Models\User::checkPermissionByRoleId($permission->id , $roleID)) == 1) ?
                                    'checked' : '' }} id='{{ $permission->id }}' name="permission[]">
                                    <label for="{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
                                @endforeach --}}
                            </div>
                            <hr>
                            @php $i++; @endphp
                            @endforeach
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

@section('script')
<script>
    $("#checkPermissionAll").click(function(){
             if($(this).is(':checked')){
                 // check all the checkbox
                 $('input[type=checkbox]').prop('checked', true);
             }else{
                 // un check all the checkbox
                 $('input[type=checkbox]').prop('checked', false);
             }
         });
         function checkPermissionByGroup(className, checkThis){
            const groupIdName = $("#"+checkThis.id);
            const classCheckBox = $('.'+className+' input');
            if(groupIdName.is(':checked')){
                 classCheckBox.prop('checked', true);
             }else{
                 classCheckBox.prop('checked', false);
             }
         }
</script>
{{-- @include('admin.roles.partials.scripts') --}}
@endsection