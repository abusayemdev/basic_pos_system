<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

use DB;


class SalaryController extends Controller
{
    public function __constract()
    {
        $this->middleware('auth');

    }


    public function pay_salary()
    {
        $employees = DB::table('employees')->get();
   
        
       
        return view('pay_salary', compact('employees')); 
    }


    public function pay_now($id)
    {
        $month = date("F", strtotime('-1 months'));

        $advance = DB::table('advanced_salaries')
                  ->where('employee_id',$id)
                  ->where('month', $month)
                  ->first(); 

        $employee = DB::table('employees')
                  ->where('id',$id)
                  ->first();

       return view('pay_now', compact('advance','employee'));


    }

    public function insert_pay_now(Request $request)
    {
        $salary_month = $request->salary_month;
        $employee_id = $request->employee_id;

        $salary = DB::table('salaries')
                    ->where('employee_id', $employee_id)
                    ->where('salary_month', $salary_month)
                    ->first();

        if ($salary === null) {
            $data = array();
        $data['employee_id']= $request->employee_id;
        $data['salary_month']= $request->salary_month;
        $data['paid_salary']= $request->paid_salary;

        $insert_salary = DB::table('salaries')->insert($data);



            if ($insert_salary) {
                $notification = array(
                    'message' => 'Salary Paid.',
                    'alert-type' =>'success'
                );

                return Redirect::to('/all-salary')->with($notification);
            }else {
                $notification = array(
                    'message' => 'Error',
                    'alert-type' =>'error'
                );

                return Redirect::back()->with($notification);
            }
        }else {
            $notification = array(
                'message' => 'Salary allready paid in this month!!',
                'alert-type' =>'error'
            );

            return Redirect::to('/all-salary')->with($notification);
        }

        
    }



    public function all_salary()
    {
        $salaries = DB::table('salaries')->select('salary_month')->groupBy('salary_month')->get();

        return view('all_salaries', compact('salaries'));
    }


    public function view_salary($salary_month)
    {
        $month = DB::table('salaries')->where('salary_month', $salary_month)->first();

        $salary_list = DB::table('salaries')
                    ->where('salary_month', $salary_month)
                    ->join('employees','salaries.employee_id','=','employees.id')
                    ->select('employees.name','salaries.*')
                    ->get();

        return view('view_salary', compact('salary_list','month')); 

    }




 
}
