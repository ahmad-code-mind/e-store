<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('frontend.frontend');
    }
    public function profile()
    {
        return view('frontend.profile.profile');
    }
    public function edit()
    {
        return view('frontend.profile.edit');
    }
}