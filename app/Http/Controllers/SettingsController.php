<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

use DB;

class SettingsController extends Controller
{
    public function __constract()
    {
        $this->middleware('auth');

    }



    public function website_settings()
    {
       



        $settings = DB::table('settings')->first();

        return view('edit_settings', compact('settings'));
    }




    public function update_settings(Request $request, $id)
    {

        $validateData = $request->validate([
            'company_name' => 'required|max:255',
            'company_address' => 'required',
            'company_email' => 'required|max:255',
            'company_telephone' => 'required|max:13',
            'company_mobile' => 'required|max:13',
            'company_city' => 'required',
            'company_country' => 'required',
 
        ]);

        $data = array();
        $data['company_name'] = $request->company_name;
        $data['company_address'] = $request->company_address;
        $data['company_email'] = $request->company_email;
        $data['company_telephone'] = $request->company_telephone;
        $data['company_mobile'] = $request->company_mobile;
        $data['company_city'] = $request->company_city;
        $data['company_country'] = $request->company_country;
        $data['company_zipcode'] = $request->company_zipcode;

        $image=$request->company_logo;

        if ($image) {
            $image_name=Str::random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.".".$ext;
            $upload_path='public/company_logo/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['company_logo']=$image_url;

                $settings = DB::table('settings')->where('id', $id)->first();

                $image_path = $settings->company_logo;
               
                $update_with_company_logo = DB::table('settings')->where('id', $id)->update($data);
                
                if ($update_with_company_logo) {
                    $notification = array(
                        'message' => 'settings updated successfully.',
                        'alert-type' =>'success'
                    );

                    return Redirect::to('/website-settings')->with($notification);
                }else {
                    $notification = array(
                        'message' => 'Error',
                        'alert-type' =>'error'
                    );

                    return Redirect::to('/website-settings')->with($notification);
                }

            }
        
                
        }else {
            $update_without_company_logo = DB::table('settings')->where('id', $id)->update($data);
            
            if ($update_without_company_logo) {
                $notification = array(
                    'message' => 'settings updated successfully.',
                    'alert-type' =>'success'
                );

                return Redirect::to('/website-settings')->with($notification);
            }else {
                $notification = array(
                    'message' => 'Error',
                    'alert-type' =>'error'
                );

                return Redirect::to('/website-settings')->with($notification);
            }
        

        }




    }




}
