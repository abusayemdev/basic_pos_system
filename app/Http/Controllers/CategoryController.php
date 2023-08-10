<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

use DB;

class CategoryController extends Controller
{
    public function __constract()
    {
        $this->middleware('auth');

    }


    public function add_category()
    {
        return view('add_category');
    }

    public function store(Request $request)
    {


        $data = array();
        $data['category_name'] = $request->category_name;



        $category = DB::table('categories')->insert($data);
                
        if ($category) {
            $notification = array(
                'message' => 'category inserted successfully.',
                'alert-type' =>'success'
            );

            return Redirect::to('/add-category')->with($notification);
        }else {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return Redirect::to('/add-category')->with($notification);
        }

                
    }


    public function all_category()
    {
        $categories=DB::table('categories')->get();

        return view('all_category', compact('categories') );
        
    }


    public function view_category($id)
    {
        $category = DB::table('categories')
                    ->where('id', $id)
                    ->first();

        return view('view_category', compact('category')); 

    }


    public function delete_category($id)
    {


        $delete_category = DB::table('categories')
                            ->where('id', $id)
                            ->delete();
        
        if ($delete_category) {
            $notification = array(
                'message' => 'category deleted successfully.',
                'alert-type' =>'success'
            );

            return Redirect::to('/all-category')->with($notification);
        }else {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return Redirect::to('/all-category')->with($notification);
        }

    }

    public function edit_category($id)
    {
        $edit = DB::table('categories')
                ->where('id', $id)
                ->first();

        return view('edit_category', compact('edit'));
    }

    public function update_category(Request $request, $id)
    {

        $data = array();
        $data['category_name'] = $request->category_name;


        $update_category = DB::table('categories')->where('id', $id)->update($data);
                
        if ($update_category) {
            $notification = array(
                'message' => 'category updated successfully.',
                'alert-type' =>'success'
            );

            return Redirect::to('/all-category')->with($notification);
        }else {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return Redirect::to('/add-category')->with($notification);
        }


    }


}
