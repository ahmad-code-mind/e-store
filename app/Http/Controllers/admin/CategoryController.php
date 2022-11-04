<?php

namespace App\Http\Controllers\admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index',[Datatables::of(Categories::all())
        ->addColumn('action', function(){
            $btn = '<a href="" class="edit btn btn-primary btn-sm">Edit</a>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true)]);
    }

    public function add(){
        return view('admin.category.add');
    }

    public function store(Request $request){

        $category = new Categories;
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('upload/image/category'.$filename);
            $category->image = $filename;
        }
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == TRUE? '1':'0';
        $category->popular = $request->input('popular') == TRUE? '1':'0';
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_descrip = $request->input('meta_description');

        $category->save();
        return redirect('/')->with('status','Category Added Successfully');
    }
}