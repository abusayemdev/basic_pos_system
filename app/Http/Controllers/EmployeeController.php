<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use DB;

class EmployeeController extends Controller
{
    
    public function __constract()
    {
        $this->middleware('auth');

    }


    public function add_employee()
    {
        return view('add_employee');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:employees|max:255',
            'phone' => 'required|max:13',
            'address' => 'required',
            'experience' => 'required',
            'photo' => 'required',
            'salary' => 'required',
            'vacation' => 'required',
            'city' => 'required',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['experience'] = $request->experience;
        $data['salary'] = $request->salary;
        $data['vacation'] = $request->vacation;
        $data['city'] = $request->city;

        $image=$request->file('photo');
        if ($image) {
            $image_name=Str::random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.".".$ext;
            $upload_path='public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;

                $employee = DB::table('employees')->insert($data);
                
                if ($employee) {
                    $notification = array(
                        'message' => 'Employee inserted successfully.',
                        'alert-type' =>'success'
                    );

                    return Redirect::to('/add-employee')->with($notification);
                }else {
                    $notification = array(
                        'message' => 'Error',
                        'alert-type' =>'error'
                    );

                    return Redirect::to('/add-employee')->with($notification);
                }

                
            }else {
                $notification = array(
                    'message' => 'Error',
                    'alert-type' =>'error'
                );

                return Redirect::to('/add-employee')->with($notification);
            }

        }


    }


    public function all_employee()
    {
        $employees=DB::table('employees')->get();

        return view('all_employee', compact('employees') );
        
    }


    public function view_employee($id)
    {
        $employee = DB::table('employees')
                    ->where('id', $id)
                    ->first();

        return view('view_employee', compact('employee')); 

    }


    public function delete_employee($id)
    {
        $employee = DB::table('employees')
                    ->where('id', $id)
                    ->first();

        $employee_photo = $employee->photo;

        unlink($employee_photo);

        $delete_employee = DB::table('employees')
                            ->where('id', $id)
                            ->delete();
        
        if ($delete_employee) {
            $notification = array(
                'message' => 'Employee deleted successfully.',
                'alert-type' =>'success'
            );

            return Redirect::to('/all-employee')->with($notification);
        }else {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return Redirect::to('/all-employee')->with($notification);
        }

    }

    public function edit_employee($id)
    {
        $edit = DB::table('employees')
                           ->where('id', $id)
                           ->first();
        return view('edit_employee', compact('edit'));
    }

    public function update_employee(Request $request, $id)
    {

        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:13',
            'address' => 'required',
            'experience' => 'required',
            'salary' => 'required',
            'vacation' => 'required',
            'city' => 'required',
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['experience'] = $request->experience;
        $data['salary'] = $request->salary;
        $data['vacation'] = $request->vacation;
        $data['city'] = $request->city;

        $image=$request->photo;

        if ($image) {
            $image_name=Str::random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.".".$ext;
            $upload_path='public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;

                $employee = DB::table('employees')->where('id', $id)->first();

                $image_path = $employee->photo;
                $delete_old_photo = unlink($image_path);
                $update_with_photo = DB::table('employees')->where('id', $id)->update($data);
                
                if ($update_with_photo) {
                    $notification = array(
                        'message' => 'Employee updated successfully.',
                        'alert-type' =>'success'
                    );

                    return Redirect::to('/all-employee')->with($notification);
                }else {
                    $notification = array(
                        'message' => 'Error',
                        'alert-type' =>'error'
                    );

                    return Redirect::to('/add-employee')->with($notification);
                }

            }
        
                
        }else {
            $update_without_photo = DB::table('employees')->where('id', $id)->update($data);
            
            if ($update_without_photo) {
                $notification = array(
                    'message' => 'Employee updated successfully.',
                    'alert-type' =>'success'
                );

                return Redirect::to('/all-employee')->with($notification);
            }else {
                $notification = array(
                    'message' => 'Error',
                    'alert-type' =>'error'
                );

                return Redirect::to('/add-employee')->with($notification);
            }
        

        }




    }



    
}
