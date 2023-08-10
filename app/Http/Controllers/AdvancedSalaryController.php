<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

use DB;

class AdvancedSalaryController extends Controller
{
    public function __constract()
    {
        $this->middleware('auth');

    }


    public function add_advanced_salary()
    {
        return view('add_advanced_salary');
    }

    public function store(Request $request)
    {

        $month = $request->month;
        $employee_id = $request->employee_id;

        $advanced = DB::table('advanced_salaries')
                    ->where('employee_id', $employee_id)
                    ->where('month', $month)
                    ->first();


           
  
        if ($advanced === NULL) {
            $data = array();
            $data['employee_id'] = $request->employee_id;
            $data['month'] = $request->month;
            $data['year'] = $request->year;
            $data['advanced_salary'] = $request->advanced_salary;
    
            $advanced = DB::table('advanced_salaries')->insert($data);
    
            if ($advanced) {
                $notification = array(
                    'message' => 'Advanced salary paid successfully.',
                    'alert-type' =>'success'
                );
    
                return Redirect::to('/all-advanced_salary')->with($notification);
            }else {
                $notification = array(
                    'message' => 'Error',
                    'alert-type' =>'error'
                );
    
                return Redirect::to('/all-advanced_salary')->with($notification);
            } 
        }else {
            $notification = array(
                'message' => 'Allready advanced paid in this month!!',
                'alert-type' =>'error'
            );

            return Redirect::to('/all-advanced_salary')->with($notification);
        }

 


    }


    public function all_advanced_salary()
    {
        $advanced_salaries=DB::table('advanced_salaries')
                    ->join('employees','advanced_salaries.employee_id','=','employees.id')
                    ->select('advanced_salaries.*','employees.name','employees.salary')
                    ->get();



        return view('all_advanced_salary', compact('advanced_salaries') );
        
    }

    public function delete_advanced_salary($id)
    {


        $delete_advanced_salary = DB::table('advanced_salaries')
                            ->where('id', $id)
                            ->delete();
        
        if ($delete_advanced_salary) {
            $notification = array(
                'message' => 'Advanced salary deleted successfully.',
                'alert-type' =>'success'
            );

            return Redirect::to('/all-advanced_salary')->with($notification);
        }else {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return Redirect::to('/all-advanced_salary')->with($notification);
        }

    }


}
