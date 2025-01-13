<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{

   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->orderBy('id','DESC')->latest()->paginate(10);
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cat = Category::all();
        return view('admin.product.create',compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required',
            'cat_id'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg',
        ]);

        $file = $request->file('image');
        $file_name = uniqid(time()).$file->getClientOriginalName();
        $file_path = 'image/'.$file_name;
        $file->storeAs('image',$file_name);

        Product::create([
            'slug'=>uniqid().Str::slug($request->name),
            'name'=> $request->name,
            'price'=> $request->price,
            'category_id'=> $request->cat_id,
            'image'=> $file_path,
            'description'=> $request->description,
            'view_count'=> 0
        ]);

        return redirect(route('admin.product.index'))->with('success','Product Created Successfully!!');

        // return $request->all();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::where('id',$id)->with('category')->first();
        return view('admin.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cat = Category::all();
        $product = Product::where('id',$id)->with('category')->first();
        return view('admin.category.edit',compact('cat','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        if($request->file('image')){
            $img_arr = explode('/',$product->image);
            Storage::disk('image')->delete($img_arr[1]);
            $file = $request->file('image');
            $file_name = uniqid(time()).$file->getClientOriginalName();
            $path = 'image/'.$file_name;
            $file->storeAs('image',$file_name);
        }
        else{
            $path = $product->image;
        }
        Product::where('id',$id)->update([
            'slug'=>uniqid().Str::slug($request->name),
            'name'=> $request->name,
            'price'=> $request->price,
            'category_id'=> $request->cat_id,
            'image'=> $path,
            'description'=> $request->description,
        ]);
        return redirect()->back()->with('success','Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::where('id',$id);
        $img_arr = explode('/',$product->first()->image);
        Storage::disk('image')->delete($img_arr[1]);
        $product->delete();
        return redirect(route('admin.product.index'))->with('success','Product Deleted Successfully');
    }

}
