<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionController extends Controller
{
    public function index()
    {
        if (Gate::allows('role.view'))
        {
            return view('admin.role.index');
        } else {
            abort(403, "You don't have permission to access");
        }
    }

    public function storePermission(Request $request)
    {
        if (Gate::allows('permission.add'))
        {
            $permission = new Permission;
            $permission->name = $request->input('name');
            $permission->group_name = $request->input('group_name');
    
            $permission->save();
            return redirect('admin/role')->with('status','Permission Added Successfully');
        } else {
            abort(403, "You don't have permission to access");
        } 
    }

    public function storeRole(Request $request)
    {
        if (Gate::allows('role.add'))
        {
            $role = new Role;
            $role->name = $request->input('name');
    
            $role->save();
            return redirect('admin/role')->with('status','Role Added Successfully');
        } else {
            abort(403, "You don't have permission to access");
        }   
    }

    public function getAllRoles()
    {
        $role = Role::all();
        return DataTables::of($role)->addColumn('permission', function($role){
            $permission = '<a href='.route('get-permissions',$role->id).' class="btn btn-sm btn-outline-warning">Assign
            </a>';
            return $permission;
        })
        ->editColumn('action', function($category){
            $btn = '
            <div class="d-grid gap-2 d-md-block"> 
                <a href="" class="btn btn-sm btn-outline-info"><i class="material-icons">edit</i>Edit
                </a>
                <a href="" onclick="return confirm(\'Are you sure?\')" class="btn btn-sm btn-outline-danger"><i class="material-icons">delete</i>
                Delete
                </a>
            </div>';
            return $btn;
        })
        ->rawColumns(['permission','action'])
        ->make(true);
    }

    public function getAllPermissions(Request $request,$id)
    {
        if (Gate::allows('permission.assign'))
        {
            $roles = Role::find($id);
            $permissions = Permission::all();
            $roleID = $request->id;
            $permission_groups = User::getpermissionGroup();
            return view('admin.role.permissions',compact('permissions','roles','roleID','permission_groups'));
        } else {
            abort(403, "You don't have permission to access");
        }
    }

    public function assignPermissions(Request $request)
    {
        $role = Role::findById($request->id);
        $permission = $request->permission;
        $role->syncPermissions($permission);
        return redirect()->back()->with('status','Permission Assigned');
    }
}