<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function pending(){
        $order = ProductOrder::where('status','pending')->with('user','product')->paginate(20);
        return view('admin.order.index',compact('order'));
    }

    public function complete(Request $request){
        if(isset($request->start_date)){
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $order = ProductOrder::where('status','complete')->whereBetween('created_at',[$start_date,$end_date])->paginate(2);
            $order->appends($request->all()); //for page 2
            //return $order;
        }else{
            $order = ProductOrder::where('status','complete')->with('user','product')->paginate(20);
        }

        return view('admin.order.complete',compact('order'));

    }

    public function makeComplete($id){
        ProductOrder::where('id',$id)->update([
            'status'=>'complete'
        ]);
        return redirect()->back()->with('success','Change To Complete');
    }
}
