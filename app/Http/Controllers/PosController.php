<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

use DB;

class PosController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
                    ->join('categories','products.category_id','=','categories.id')
                    ->select('categories.category_name','products.*')
                    ->get();

        $customers = DB::table('customers')->get();
        $categories = DB::table('categories')->get();
        
        return view('pos', compact('products','customers','categories'));
    }


    public function pending_order()
    {
        $pending_order = DB::table('orders')
                        ->join('customers','orders.customer_id','=','customers.id')
                        ->select('customers.name','orders.*')
                        ->where('order_status','pending')
                        ->get();

        return view('pending_order',compact('pending_order'));
    }

    public function view_order($id)
    {
        $order=DB::table('orders')
               ->where('orders.id',$id)
               ->select('orders.*','customers.name','customers.shopname','customers.address','customers.phone','customers.email')
               ->join('customers','orders.customer_id','=','customers.id')
               ->first();


         $order_details=DB::table('orderdetails')
                      ->join('products','orderdetails.product_id','=','products.id')
                      ->select('orderdetails.*','products.product_name','products.product_code')
                      ->where('order_id',$id)
                      ->get();

        return view('order_confirmation', compact('order','order_details')); 
    }

    public function order_confirm($id)
    {
        $order_update = DB::table('orders')->where('id',$id)->update(['order_status'=>'success']);

        if ($order_update) {
            $notification = array(
                'message' => 'Order confirmed successfully! And products delivary completed.',
                'alert-type' =>'success'
            );

            return Redirect::to('/pending-order')->with($notification);

        }else {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return Redirect::back()->with($notification);
        }
    }


    public function success_order()
    {
        $success_order = DB::table('orders')
                        ->join('customers','orders.customer_id','=','customers.id')
                        ->select('customers.name','orders.*')
                        ->where('order_status','success')
                        ->get();

        return view('success_order',compact('success_order'));

    }

    

}
