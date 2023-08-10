<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

use DB;

class SupplierController extends Controller
{
    public function __constract()
    {
        $this->middleware('auth');

    }


    public function add_supplier()
    {
        return view('add_supplier');
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
        $data['type'] = $request->type;
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
            $upload_path='public/supplier/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;

                $supplier = DB::table('suppliers')->insert($data);
                
                if ($supplier) {
                    $notification = array(
                        'message' => 'Supplier inserted successfully.',
                        'alert-type' =>'success'
                    );

                    return Redirect::to('/add-supplier')->with($notification);
                }else {
                    $notification = array(
                        'message' => 'Error',
                        'alert-type' =>'error'
                    );

                    return Redirect::to('/add-supplier')->with($notification);
                }

                
            }else {
                $notification = array(
                    'message' => 'Error',
                    'alert-type' =>'error'
                );

                return Redirect::to('/add-supplier')->with($notification);
            }

        }


    }


    public function all_supplier()
    {
        $suppliers=DB::table('suppliers')->get();

        return view('all_supplier', compact('suppliers') );
        
    }


    public function view_supplier($id)
    {
        $supplier = DB::table('suppliers')
                    ->where('id', $id)
                    ->first();

        return view('view_supplier', compact('supplier')); 

    }


    public function delete_supplier($id)
    {
        $supplier = DB::table('suppliers')
                    ->where('id', $id)
                    ->first();

        $supplier_photo = $supplier->photo;

        unlink($supplier_photo);

        $delete_supplier = DB::table('suppliers')
                            ->where('id', $id)
                            ->delete();
        
        if ($delete_supplier) {
            $notification = array(
                'message' => 'Supplier deleted successfully.',
                'alert-type' =>'success'
            );

            return Redirect::to('/all-supplier')->with($notification);
        }else {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return Redirect::to('/all-supplier')->with($notification);
        }

    }

    public function edit_supplier($id)
    {
        $edit = DB::table('suppliers')
                           ->where('id', $id)
                           ->first();
        return view('edit_supplier', compact('edit'));
    }

    public function update_supplier(Request $request, $id)
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
        $data['type'] = $request->type;
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
            $upload_path='public/supplier/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;

                $supplier = DB::table('suppliers')->where('id', $id)->first();

                $image_path = $supplier->photo;
                $delete_old_photo = unlink($image_path);
                $update_with_photo = DB::table('suppliers')->where('id', $id)->update($data);
                
                if ($update_with_photo) {
                    $notification = array(
                        'message' => 'Supplier updated successfully.',
                        'alert-type' =>'success'
                    );

                    return Redirect::to('/all-supplier')->with($notification);
                }else {
                    $notification = array(
                        'message' => 'Error',
                        'alert-type' =>'error'
                    );

                    return Redirect::to('/add-supplier')->with($notification);
                }

            }
        
                
        }else {
            $update_without_photo = DB::table('suppliers')->where('id', $id)->update($data);
            
            if ($update_without_photo) {
                $notification = array(
                    'message' => 'supplier updated successfully.',
                    'alert-type' =>'success'
                );

                return Redirect::to('/all-supplier')->with($notification);
            }else {
                $notification = array(
                    'message' => 'Error',
                    'alert-type' =>'error'
                );

                return Redirect::to('/add-supplier')->with($notification);
            }
        

        }




    }

   
}
