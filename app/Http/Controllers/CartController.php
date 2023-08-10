<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

use DB;

use Cart;

class CartController extends Controller
{
    public function __constract()
    {
        $this->middleware('auth');

    }


    public function index(Request $request)
    {
        $data=array();
        $data['id']=$request->id;
        $data['name']=$request->name;
        $data['qty']=$request->qty;
        $data['price']=$request->price;

        $add = Cart::add($data);

        if ($add) {
            $notification = array(
                'message' => 'Added successfully.',
                'alert-type' =>'success'
            );

            return Redirect::back()->with($notification);
        }else {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return Redirect::back()->with($notification);

        }

    }


    public function update_cart(Request $request, $rowId)
    {
        $qty = $request->qty;

        $update = Cart::update($rowId, $qty);

        if ($update) {
            $notification = array(
                'message' => 'Added successfully.',
                'alert-type' =>'success'
            );

            return Redirect::back()->with($notification);
        }else {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return Redirect::back()->with($notification);

        }

    }


    public function remove_cart($rowId)
    {
        $remove = Cart::remove($rowId);

        if ($remove) {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error' 
            );

            return Redirect::back()->with($notification);
        }else {
            $notification = array(
                
                'message' => 'Removed successfully.',
                'alert-type' =>'success'
            );

            return Redirect::back()->with($notification);

        }

    }
    


    public function create_invoice(Request $request)
    {
        $validateData = $request->validate([
            'customer_id' => 'required',
        ],
        [ 'customer_id.required' => 'Select a customer first!',
        ]);

        $customer_id = $request->customer_id;
        $contents = Cart::content();
        $customer = DB::table('customers')->where('id',$customer_id)->first();

        return view('invoice', compact('customer','contents'));
    }


    public function insert_invoice(Request $request)
    {

        $data=array();
        $data['customer_id']=$request->customer_id;
        $data['order_date']=$request->order_date;
        $data['order_status']=$request->order_status;
        $data['total_products']=$request->total_products;
        $data['sub_total']=$request->sub_total;
        $data['vat']=$request->vat;
        $data['total']=$request->total;
        $data['payment_status']=$request->payment_status;
        $data['pay']=$request->pay;
        $data['due']=$request->due;

        $order_id=DB::table('orders')->insertGetId($data);
        $contents=Cart::content();

        $odata=array();
        foreach ($contents as $content) {
            $odata['order_id']=$order_id;
            $odata['product_id']=$content->id;
            $odata['quantity']=$content->qty;
            $odata['unitcost']=$content->price;
            $odata['total']=$content->total;

            $insert=DB::table('orderdetails')->insert($odata);


        }

        if ($insert) {
            $notification = array(
                'message' => 'Successfully invoice created! Please delever the products and accept status.',
                'alert-type' =>'success'
            );

            Cart::destroy();

            return Redirect::to('/dashboard')->with($notification);
        }else {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return Redirect::back()->with($notification);

        }


    }
}
