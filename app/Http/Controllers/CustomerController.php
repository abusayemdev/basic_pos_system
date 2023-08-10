<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

use DB;

class CustomerController extends Controller
{
    public function __constract()
    {
        $this->middleware('auth');

    }


    public function add_customer()
    {
        return view('add_customer');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:13',
            'address' => 'required',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['shopname'] = $request->shopname;
        $data['account_holder'] = $request->account_holder;
        $data['account_number'] = $request->account_number;
        $data['bank_name'] = $request->bank_name;
        $data['bank_branch'] = $request->bank_branch;

        $image=$request->file('photo');
        if ($image) {
            $image_name=Str::random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.".".$ext;
            $upload_path='public/customer/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;

                $customer = DB::table('customers')->insert($data);
                
                if ($customer) {
                    $notification = array(
                        'message' => 'Customer inserted successfully.',
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

                
            }else {
                $notification = array(
                    'message' => 'Error',
                    'alert-type' =>'error'
                );

                return Redirect::back()->with($notification);
            }

        }


    }


    public function all_customer()
    {
        $customers=DB::table('customers')->get();

        return view('all_customer', compact('customers') );
        
    }


    public function view_customer($id)
    {
        $customer = DB::table('customers')
                    ->where('id', $id)
                    ->first();

        return view('view_customer', compact('customer')); 

    }


    public function delete_customer($id)
    {
        $customer = DB::table('customers')
                    ->where('id', $id)
                    ->first();

        $customer_photo = $customer->photo;

        unlink($customer_photo);

        $delete_customer = DB::table('customers')
                            ->where('id', $id)
                            ->delete();
        
        if ($delete_customer) {
            $notification = array(
                'message' => 'customer deleted successfully.',
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

    public function edit_customer($id)
    {
        $edit = DB::table('customers')
                           ->where('id', $id)
                           ->first();
        return view('edit_customer', compact('edit'));
    }

    public function update_customer(Request $request, $id)
    {

        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:13',
            'address' => 'required',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['shopname'] = $request->shopname;
        $data['account_holder'] = $request->account_holder;
        $data['account_number'] = $request->account_number;
        $data['bank_name'] = $request->bank_name;
        $data['bank_branch'] = $request->bank_branch;

        $image=$request->photo;

        if ($image) {
            $image_name=Str::random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.".".$ext;
            $upload_path='public/customer/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;

                $customer = DB::table('customers')->where('id', $id)->first();

                $image_path = $customer->photo;
                $delete_old_photo = unlink($image_path);
                $update_with_photo = DB::table('customers')->where('id', $id)->update($data);
                
                if ($update_with_photo) {
                    $notification = array(
                        'message' => 'customer updated successfully.',
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
        
                
        }else {
            $update_without_photo = DB::table('customers')->where('id', $id)->update($data);
            
            if ($update_without_photo) {
                $notification = array(
                    'message' => 'customer updated successfully.',
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




    }


    
}
