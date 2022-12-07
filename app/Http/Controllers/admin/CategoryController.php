<?php

namespace App\Http\Controllers\admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Exports\CategoryExport;
use App\Imports\CategoryImport;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }
    public function show()
    {
        $category = Categories::all();
        // select(['id', 'name', 'slug','description', 'image']);
        // if(Gate::allows('edit-category') && Gate::allows('delete-category')) {

        // } else if(Gate::allows('edit-category')) {

        // } else {

        // }
        return DataTables::of($category)->addColumn('image', function($category){
            $img = '<img src='.asset('upload/image/category/'.$category->image).' width="50" height="50"
            class="img img-responsive">';
            return $img;
            // $img = '<model-viewer src='.asset('upload/image/category/'.$category->image).' camera-controls ;"
            // class="img img-responsive"></model-viewer>';
            return $img;
        })

        ->editColumn('action', function($category)
        {
            $btn = '
            <div class="d-grid gap-2 d-md-block"> 
                <a href='.route('show-edit-category',$category->id).' class="btn btn-sm btn-outline-info"><i class="material-icons">edit</i>
                </a>
                <a href='.route('delete-category',$category->id).' onclick="return confirm(\'Are you sure?\')" class="btn btn-sm btn-outline-danger"><i class="material-icons">delete</i>
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

    public function store(Request $request)
    {
        $id = DB::table('categories')->insertGetId([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'description' => $request->input('description'),
            'status' => $request->input('status') == TRUE? '1':'0',
            'popular' => $request->input('popular') == TRUE? '1':'0',
            'meta_title' => $request->input('meta_title'),
            'meta_keywords' => $request->input('meta_keywords'),
            'meta_descrip' => $request->input('meta_description'),
            'created_at' => Carbon::now()
        ]);
        $image = 'category-'.$id.'.'.$request->file('image')->extension();
        $imageSave = $request->image->move('upload/image/category',$image);
        if ($imageSave){
            Categories::where('id',$id)->update([
                'image' => $image
            ]);
        }
        // $category->save();
        return redirect('admin/category')->with('status','Category Added Successfully');
    }

    public function showedit($id)
    {
        $category = Categories::find($id);
        return view('admin.category.edit',compact('category'));
    }
    
    public function edit(request $request,$id)
    {
        Categories::find($id)->update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'description' => $request->input('description'),
            'status' => $request->input('status') == TRUE? '1':'0',
            'popular' => $request->input('popular') == TRUE? '1':'0',
            'meta_title' => $request->input('meta_title'),
            'meta_keywords' => $request->input('meta_keywords'),
            'meta_descrip' => $request->input('meta_description'),
        ]);
        $path = 'upload/image/category'.$request->image;
        if (File::exists($path)){
            File::delete($path);
        }
        if ($request->hasFile('image'))
        {
            $image = 'category-'.$id.'.'.$request->file('image')->extension();
            $imageSave = $request->image->move('upload/image/category',$image);
            if ($imageSave){
                Categories::where('id',$id)->update([
                    'image' => $image
                ]);
            }
        }
        return redirect('admin/category')->with('status','Category Updated Successfully');
    }

    public function delete($id)
    {
        $category = Categories::find($id);
        unlink('upload/image/category/'.$category->image);
        $category->delete();
        return redirect('admin/category')->with('status','Category Deleted Successfully');
    }

    public function exportCategory()
    {
        return Excel::download(new CategoryExport, 'Category.xlsx');
    }
    
    public function getImportCategory()
    {
        return view('admin.category.bulkdata');
    }

    public function importCategory(Request $request)
    {
        Excel::import(new CategoryImport, $request->file('bulk'));
        return redirect('admin/category');
    }
}