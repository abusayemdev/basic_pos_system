<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

use DB;

use App\Imports\ProductsImport;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;



class ProductController extends Controller
{
    public function __constract()
    {
        $this->middleware('auth');

    }


    public function add_product()
    {
        return view('add_product');
    }

    public function store(Request $request)
    {

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['supplier_id'] = $request->supplier_id;
        $data['product_code'] = $request->product_code;
        $data['product_garage'] = $request->product_garage;
        $data['product_route'] = $request->product_route;
        $data['buying_date'] = $request->buying_date;
        $data['expire_date'] = $request->expire_date;
        $data['buying_price'] = $request->buying_price;
        $data['selling_price'] = $request->selling_price;

        $image=$request->file('product_image');
        if ($image) {
            $image_name=Str::random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.".".$ext;
            $upload_path='public/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['product_image']=$image_url;

                $product = DB::table('products')->insert($data);
                
                if ($product) {
                    $notification = array(
                        'message' => 'product inserted successfully.',
                        'alert-type' =>'success'
                    );

                    return Redirect::to('/add-product')->with($notification);
                }else {
                    $notification = array(
                        'message' => 'Error',
                        'alert-type' =>'error'
                    );

                    return Redirect::to('/add-product')->with($notification);
                }

                
            }else {
                $notification = array(
                    'message' => 'Error',
                    'alert-type' =>'error'
                );

                return Redirect::to('/add-product')->with($notification);
            }

        }


    }


    public function all_product()
    {
        $products=DB::table('products')->get();

        return view('all_product', compact('products') );
        
    }


    public function view_product($id)
    {
        $product = DB::table('products')
                   ->join('categories', 'products.category_id','=','categories.id')
                   ->join('suppliers', 'products.supplier_id','=','suppliers.id')
                   ->select('products.*','categories.category_name','suppliers.name')
                   ->where('products.id', $id)
                   ->first();

        return view('view_product', compact('product')); 

    }


    public function delete_product($id)
    {
        $product = DB::table('products')
                    ->where('id', $id)
                    ->first();

        $delete_product_image = $product->product_image;

        unlink($delete_product_image);

        $delete_product = DB::table('products')
                            ->where('id', $id)
                            ->delete();
        
        if ($delete_product) {
            $notification = array(
                'message' => 'product deleted successfully.',
                'alert-type' =>'success'
            );

            return Redirect::to('/all-product')->with($notification);
        }else {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return Redirect::to('/all-product')->with($notification);
        }

    }

    public function edit_product($id)
    {
        $edit = DB::table('products')
                           ->where('id', $id)
                           ->first();
        return view('edit_product', compact('edit'));
    }

    public function update_product(Request $request, $id)
    {


        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['supplier_id'] = $request->supplier_id;
        $data['product_code'] = $request->product_code;
        $data['product_garage'] = $request->product_garage;
        $data['product_route'] = $request->product_route;
        $data['buying_date'] = $request->buying_date;
        $data['expire_date'] = $request->expire_date;
        $data['buying_price'] = $request->buying_price;
        $data['selling_price'] = $request->selling_price;

        $image=$request->product_image;

        if ($image) {
            $image_name=Str::random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.".".$ext;
            $upload_path='public/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['product_image']=$image_url;

                $product = DB::table('products')->where('id', $id)->first();

                $image_path = $product->product_image;
                $delete_old_product_image = unlink($image_path);
                $update_with_product_image = DB::table('products')->where('id', $id)->update($data);
                
                if ($update_with_product_image) {
                    $notification = array(
                        'message' => 'product updated successfully.',
                        'alert-type' =>'success'
                    );

                    return Redirect::to('/all-product')->with($notification);
                }else {
                    $notification = array(
                        'message' => 'Error',
                        'alert-type' =>'error'
                    );

                    return Redirect::to('/add-product')->with($notification);
                }

            }
        
                
        }else {
            $update_without_product_image = DB::table('products')->where('id', $id)->update($data);
            
            if ($update_without_product_image) {
                $notification = array(
                    'message' => 'product updated successfully.',
                    'alert-type' =>'success'
                );

                return Redirect::to('/all-product')->with($notification);
            }else {
                $notification = array(
                    'message' => 'Error',
                    'alert-type' =>'error'
                );

                return Redirect::to('/add-product')->with($notification);
            }
        
        }

    }


    public function import_product()
    {
        return view('import_product');
    }

    public function import(Request $request) 
    {
       $import = Excel::import(new ProductsImport, $request->file('import_file'));
        
       if ($import) {
            $notification = array(
                'message' => 'Product imported successfully.',
                'alert-type' =>'success'
            );

            return Redirect::to('/all-product')->with($notification);

        }else {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return Redirect::to('/import-product')->with($notification);
        }
        
    }

    public function export() 
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }




}
