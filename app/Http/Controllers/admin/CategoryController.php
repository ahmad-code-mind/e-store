<?php

namespace App\Http\Controllers\admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }
    public function show(){
        $category = Categories::select(['id', 'name', 'slug','description', 'image']);
        return DataTables::of($category)->addColumn('image', function($category){
            $img = '<img src='.asset('upload/image/category/'.$category->image).' width="50" height="50"
            class="img img-responsive">';
            return $img;
        })
        ->editColumn('action', function($category){
            $btn = '
            <div class="d-grid gap-2 d-md-block"> 
                <a href='.route('show-edit-category',$category->id).' class="btn btn-sm btn-outline-info"><i class="material-icons">edit</i>Edit
                </a>
                <a href='.route('delete-category',$category->id).' onclick="return confirm(\'Are you sure?\')" class="btn btn-sm btn-outline-danger"><i class="material-icons">delete</i>
                Delete
                </a>
            </div>';
            return $btn;
        })
        ->rawColumns(['image','action'])
        ->make(true);
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
            $file->move('upload/image/category',$filename);
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
        return redirect('/categories')->with('status','Category Added Successfully');
    }
    public function showedit($id){
        $category = Categories::find($id);
        return view('admin.category.edit',compact('category'));
    }
    public function edit(request $request,$id){
        $category = Categories::find($id);
        if ($request->hasFile('image')){
            $path = 'upload/image/category'.$category->image;
            if (File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('upload/image/category',$filename);
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

        $category->update();
        return redirect('/categories')->with('status','Category Updated Successfully');
    }

    public function delete($id){
        $category = Categories::find($id);
        if ($category->image)
        {
            $path = 'upload/image/category'.$category->image;
            if (File::exists($path)){
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('/categories')->with('status','Category Updated Successfully');
    }
}