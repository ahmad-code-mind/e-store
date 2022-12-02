<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.product.index');
    }

    public function show()
    {
        $product = Product::with('category');
        return DataTables::of($product)
        ->addColumn('image', function($product){
            // $img = '<img src='.asset('upload/image/product/'.$product->image).' width="50" height="50"
            // class="img img-responsive">';
            // return $img;
            $img = '<model-viewer src='.asset('upload/image/product/'.$product->image).' camera-controls ;"
            class="img img-responsive"></model-viewer>';
            return $img;
        })
        ->addColumn('category', function(Product $product){
            $category = $product->category->name;
            return $category;
        })
        ->editColumn('action', function($product){
            $btn = '
            <div class="d-grid gap-2 d-md-block"> 
                <a href='.route('show-edit-product',$product->id).' class="btn btn-sm btn-outline-info"><i class="material-icons">edit</i>Edit
                </a>
                <a href='.route('delete-product',$product->id).' onclick="return confirm(\'Are you sure?\')" class="btn btn-sm btn-outline-danger"><i class="material-icons">delete</i>
                Delete
                </a>
            </div>';
            return $btn;
        })
        ->rawColumns(['image','action'])
        ->make(true);
    }
    public function add()
    {
        $category = Categories::all();
        return view('admin.product.add',compact('category'));
    }
    public function store(Request $request)
    {
        $id = DB::table('products')->insertGetId([
            'category_id' => $request->input('category'),
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'small_description' => $request->input('small_description'),
            'description' => $request->input('description'),
            'original_price' => $request->input('original_price'),
            'selling_price' => $request->input('selling_price'),
            'qty' => $request->input('qty'),
            'tax' => $request->input('tax'),
            'status' => $request->input('status') == TRUE? '1':'0',
            'trending' => $request->input('trending') == TRUE? '1':'0',
            'meta_title' => $request->input('meta_title'),
            'meta_keywords' => $request->input('meta_keywords'),
            'meta_description' => $request->input('meta_description'),
            'created_at' => Carbon::now()
        ]);
        $image = 'product-'.$id.'.'.$request->file('image')->extension();
        $imageSave = $request->image->move('upload/image/product',$image);
        if ($imageSave){
            Product::where('id',$id)->update([
                'image' => $image
            ]);
        }
        return redirect('admin/product')->with('status','Product Added Successfully');
    }
    public function showedit($id)
    {
        $product = Product::find($id);
        $category = Categories::all();
        return view('admin.product.edit',compact('product','category'));
    }
    public function edit(request $request,$id)
    {
        Product::find($id)->update([
            'category_id' => $request->input('category'),
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'small_description' => $request->input('small_description'),
            'description' => $request->input('description'),
            'original_price' => $request->input('original_price'),
            'selling_price' => $request->input('selling_price'),
            'qty' => $request->input('qty'),
            'tax' => $request->input('tax'),
            'status' => $request->input('status') == TRUE? '1':'0',
            'trending' => $request->input('trending') == TRUE? '1':'0',
            'meta_title' => $request->input('meta_title'),
            'meta_keywords' => $request->input('meta_keywords'),
            'meta_descrip' => $request->input('meta_description'),
        ]);
        $path = 'upload/image/product'.$request->image;
        if (File::exists($path)){
            File::delete($path);
        }
        if ($request->hasFile('image'))
        {
            $image = 'product-'.$id.'.'.$request->file('image')->extension();
            $imageSave = $request->image->move('upload/image/product',$image);
            if ($imageSave){
                Product::where('id',$id)->update([
                    'image' => $image
                ]);
            }
        }
        return redirect('admin/product')->with('status','Product Updated Successfully');
    }

    public function delete($id)
    {
        $product = Categories::find($id);
        unlink('upload/image/product/'.$product->image);
        $product->delete();
        return redirect('admin/product')->with('status','Product Deleted Successfully');
    }
}