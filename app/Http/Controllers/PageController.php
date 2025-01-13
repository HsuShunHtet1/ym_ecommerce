<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCart;
use App\Models\ProductOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index(){
        $products = Product::latest()->with('category')->paginate(6);
        return view('user.index',compact('products'));
    }
    public function byCategory($slug){
        $cat_id = Category::where('slug',$slug)->first()->id;
        $products = Product::where('category_id',$cat_id)->with('category')->paginate(6);
        return view('user.index',compact('products'));
    }
    public function search(Request $request)
    {
        $search = $request->search;
        $products = Product::where('name','like',"%{$search}%")->with('category')->paginate(6);
        $products->appends($request->all());
        return view('user.index',compact('products'));
    }

    public function productDetail(Request $request,$slug){
        //update
        $product = Product::where('slug',$slug);
        $product->update([
            'view_count'=>DB::raw('view_count+1')
        ]);
        //get
        $product = $product->with('category')->first();
        return view('user.productDetail',compact('product'));
    }

    public function addToCart($slug){
        $user_id = Auth::user()->id;
        $product_id = Product::where('slug',$slug)->first()->id;
        $qty = 1;
        ProductCart::create([
            'user_id'=>$user_id,
            'product_id'=>$product_id,
            'qty'=>$qty
        ]);
        return redirect()->back();
    }

    public function cart(){
        $cart = ProductCart::with('product')->where('user_id',Auth::user()->id)->get();
        return view('user.cart',compact('cart'));
    }

    public function makeOrder(){
        $user_id = Auth::user()->id;
        $cart = ProductCart::where('user_id',$user_id)->get();
        foreach($cart as $c){
            ProductOrder::create([
                'user_id'=>$user_id,
                'product_id'=>$c->product_id,
                'qty'=>$c->qty,
                'status'=>'pending'
            ]);
            ProductCart::where('user_id',$c->user_id)->delete();
        }
        return redirect()->back()->with('success','Order Success!');
    }

    public function pendingOrder(){
        $orders = ProductOrder::where('user_id',Auth::user()->id)
        ->with('product')
        ->where('status','pending')
        ->get();
        $status = 'pending';
        return view('user.order',compact('orders','status'));
    }

    public function completeOrder(){
        $orders = ProductOrder::where('user_id',Auth::user()->id)
        ->with('product')
        ->where('status','complete')
        ->get();
        $status = 'complete';
        return view('user.order',compact('orders','status'));
    }

    public function profile(){
        $user = Auth::user();
        return view('user.auth.info',compact('user'));
    }

    public function changeProfile(Request $request){
        $user = User::where('id',Auth::user()->id);
        //check image
        if($request->file('image')){
            $file = $request->file('image');
            $name = uniqid(time()).$file->getClientOriginalName();
            $file_path = 'image/'. $name;
            $file->storeAs('image',$name);
        }
        else{
            $file_path = $user->first()->image;
        }

        //update
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'image'=>$file_path,
        ]);

        return redirect()->back()->with('success','Change Success!');
    }
}
