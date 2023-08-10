<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

use DB;

class AttendenceController extends Controller
{
    public function __constract()
    {
        $this->middleware('auth');

    }


    public function take_attendence()
    {
        $employees = DB::table('employees')->get();

        return view('take_attendence', compact('employees'));
    }

    public function store(Request $request)
    {
        $date = $request->attendence_date;
        $att_date = DB::table('attendences')->where('attendence_date', $date)->first();

        if ($att_date) {
            $notification = array(
                'message' => 'Todays attendence already exist!!',
                'alert-type' =>'error'
            );

            return Redirect::to('/all-attendence')->with($notification);
        } else {
            foreach ($request->employee_id as $id) {
                $data[]=[
                    'employee_id' => $id,
                    'attendence' => $request->attendence[$id],
                    'attendence_date' => $request->attendence_date,
                    'attendence_year' => $request->attendence_year,
                    'month' => $request->month,
                    'edit_date' => date('d_m_y')
    
                ];
            }
    
            $attendence = DB::table('attendences')->insert($data);
    
    
            if ($attendence) {
                $notification = array(
                    'message' => 'Todays attendence has taken successfully.',
                    'alert-type' =>'success'
                );
    
                return Redirect::to('/all-attendence')->with($notification);
            }else {
                $notification = array(
                    'message' => 'Error',
                    'alert-type' =>'error'
                );
    
                return Redirect::to('/take-attendence')->with($notification);
    
            }
        }

        
    }


    public function all_attendence()
    {
       $attendences = DB::table('attendences')->select('edit_date')->groupBy('edit_date')->get();

       return view('all_attendence', compact('attendences'));
        
    }


    public function view_attendence($edit_date)
    {
        $date = DB::table('attendences')->where('edit_date', $edit_date)->first();

        $attendence_list = DB::table('attendences')
                    ->where('edit_date', $edit_date)
                    ->join('employees','attendences.employee_id','=','employees.id')
                    ->select('employees.name','attendences.*')
                    ->get();

        return view('view_attendence', compact('attendence_list','date')); 

    }


    public function edit_attendence($edit_date)
    {
        $date = DB::table('attendences')->where('edit_date', $edit_date)->first();

        $edit = DB::table('attendences')
                ->where('edit_date', $edit_date)
                ->join('employees','attendences.employee_id','=','employees.id')
                ->select('employees.name','attendences.*')
                ->get();

        return view('edit_attendence', compact('edit','date'));
    }

    public function update_attendence(Request $request)
    {
      
        foreach ($request->id as $id) {
            $data=[
                'attendence' => $request->attendence[$id],
                'attendence_date' => $request->attendence_date,
                'attendence_year' => $request->attendence_year,
                'month' => $request->month

            ];

            $attendence = Attendence::where(['attendence_date' => $request->attendence_date, 'id'=>$id])->first();
            $updated_attendence = $attendence->update($data);
        }
                
        if ($updated_attendence) {
            $notification = array(
                'message' => 'attendence updated successfully.',
                'alert-type' =>'success'
            );

            return Redirect::to('/all-attendence')->with($notification);
        }else {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return Redirect::to('/all-attendence')->with($notification);
        }


    }




    public function delete_attendence($id)
    {


        $delete_attendence = DB::table('advanced_salaries')
                            ->where('id', $id)
                            ->delete();
        
        if ($delete_attendence) {
            $notification = array(
                'message' => 'Advanced salary deleted successfully.',
                'alert-type' =>'success'
            );

            return Redirect::to('/all-attendence')->with($notification);
        }else {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return Redirect::to('/all-attendence')->with($notification);
        }

    }

}
