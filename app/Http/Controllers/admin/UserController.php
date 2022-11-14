<?php

namespace App\Http\Controllers\admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all()->where('role_as','!=',0);
        return view('admin.user.index',compact('users'));
        return DataTables::of($users)->make(true);
    }

    public function show(){
        // $users = User::all()->where('role_as','!=',0);
        // return DataTables::of($users, compact('users'))->make(true);
        // // ->addColumn('role', function(User $user){
        // //     $user = $user->roles->name;
        // //     return $user;
        // // })
        // ->editColumn('action', function($user){
        //     $btn = '
        //     <div class="d-grid gap-2 d-md-block"> 
        //         <a href='.route('show-edit-user',$user->id).' class="btn btn-sm btn-outline-info"><i class="material-icons">edit</i>Edit
        //         </a>
        //         <a href='.route('delete-user',$user->id).' onclick="return confirm(\'Are you sure?\')" class="btn btn-sm btn-outline-danger"><i class="material-icons">delete</i>
        //         Delete
        //         </a>
        //     </div>';
        //     return $btn;
        // })
        // ->rawColumns(['role', 'action'])
        // ->make(true);
    }
    public function add(){
        return view('admin.user.add');
    }
    public function store(Request $request){
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role_as = $request->input('role_as');
        $user->assignRole($user->role_as);

        $user->save();
        return redirect('admin/user')->with('status','User Added Successfully');
    }
    public function showedit($id){
        $user = User::find($id);
        return view('admin.user.edit',compact('user'));
    }
    public function edit(request $request,$id){
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_as = $request->input('role_as');
        $user->assignRole($user->role_as);

        $user->update();
        return redirect('admin/user')->with('status','User Updated Successfully');
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user')->with('status','User Deleted Successfully');
    }
}