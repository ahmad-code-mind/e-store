<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class profile extends Controller
{
    public function index()
    {
        if (Auth::check() == false)
        {
            return redirect('login')->with('error', 'Please First Login');
        }
        else
        {
            return view('frontend.profile.profile');
        }
    }
    public function showedit($id)
    {
        $user = User::find($id);
        return view('frontend.profile.edit', compact('user'));
    }

    public function edit(Request $request, $id)
    {
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
        return redirect('profile')->with('status','Profile Updated Successfully');
    }
}