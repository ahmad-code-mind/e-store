<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Categories;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){
        return view('admin.product.index');
    }
    public function show(){
        $product = Product::with('category');
        return DataTables::of($product)
        ->addColumn('image', function($product){
            $img = '<img src='.asset('upload/image/product/'.$product->image).' width="50" height="50"
            class="img img-responsive">';
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
    public function add(){
        //***Getting Category_id from Category Table*** //
        $category = Categories::all();
        return view('admin.product.add',compact('category'));
    }
    public function store(Request $request){
        $product = new Product;
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('upload/image/product',$filename);
            $product->image = $filename;
        }
        $product->category_id = $request->input('category');
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->qty = $request->input('qty');
        $product->tax = $request->input('tax');
        $product->status = $request->input('status') == TRUE? '1':'0';
        $product->trending = $request->input('trending') == TRUE? '1':'0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->meta_description = $request->input('meta_description');

        $product->save();
        return redirect('/products')->with('status','Product Added Successfully');
    }
    public function showedit($id){
        $product = Product::find($id);
        $category = Categories::all();
        return view('admin.product.edit',compact('product','category'));
    }
    public function edit(request $request,$id){
        $product = Product::find($id);
        if ($request->hasFile('image')){
            $path = 'upload/image/product'.$product->image;
            if (File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('upload/image/product',$filename);
            $product->image = $filename;
        }
        $product->category_id = $request->input('category');
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->qty = $request->input('qty');
        $product->tax = $request->input('tax');
        $product->status = $request->input('status') == TRUE? '1':'0';
        $product->trending = $request->input('trending') == TRUE? '1':'0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->meta_description = $request->input('meta_description');

        $product->update();
        return redirect('/products')->with('status','Product Updated Successfully');
    }

    public function delete($id){
        $product = Categories::find($id);
        if ($product->image)
        {
            $path = 'upload/image/product'.$product->image;
            if (File::exists($path)){
                File::delete($path);
            }
        }
        $product->delete();
        return redirect('/products')->with('status','Product Deleted Successfully');
    }
}