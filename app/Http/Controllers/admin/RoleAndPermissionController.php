<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionController extends Controller
{
    public function index(){
        return view('admin.role.index');
    }

    public function storePermission(Request $request){
        
        $permission = new Permission;
        $permission->name = $request->input('name');

        $permission->save();
        return redirect('admin/role')->with('status','Permission Added Successfully');
    }

    public function storeRole(Request $request){
        
        $role = new Role;
        $role->name = $request->input('name');

        $role->save();
        return redirect('admin/role')->with('status','Role Added Successfully');
    }

    public function getAllRoles(){
        $role = Role::all();
        // select(['id', 'name', 'slug','description', 'image']);
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

    public function getAllPermissions($id)
    {
        $roles = Role::find($id);
        $permissions = Permission::all();
        return view('admin.role.permissions',compact('roles','permissions'));
    }

    public function assignPermissions($request)
    {
        
    }
}