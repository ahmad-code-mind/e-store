<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.profile');
    }

    public function showedit($id)
    {
        $user = User::find($id);
        return view('admin.profile.edit', compact('user'));
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required',
            'zip_code' => 'nullable|integer',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
        ]);
        // $gender = 0;
        // if($request->input('gender') =="Male") {
        //     $gender = 1;
        // } else if($request->input('gender') =="Female") {
        //     $gender = 2;
        // } else {
        //     $gender = 3;
        // }
        User::find($id)->update([
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'd_o_b' => $request->input('d_o_b'),
            'phone' => $request->input('phone'),
            'about' => $request->input('about'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'state' => $request->input('state'),
            'zip_code' => $request->input('zip_code'),
            'country' => $request->input('country'),
        ]);
        if($request->file('image')){
            $path = 'upload/image/profile/'.$request->image;
            if (File::exists($path)){
                File::delete($path);
            }
            $image = 'profile-'.$id.'.'.$request->file('image')->extension();
            $imageSave = $request->image->move('upload/image/profile/',$image);
            if ($imageSave){
                User::where('id',$id)->update([
                    'image' => $image
                ]);
            }
        }
        return redirect('admin/profile')->with('status','Profile Updated Successfully');
    }

    // public function openSetting()
    // {
    //     return view('admin.fixedplugin');
    // }
}