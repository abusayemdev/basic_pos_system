<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

use DB;

class ExpenseController extends Controller
{
    public function __constract()
    {
        $this->middleware('auth');

    }


    public function add_expense()
    {
        return view('add_expense');
    }

    public function store(Request $request)
    {


        $data = array();
        $data['details'] = $request->details;
        $data['amount'] = $request->amount;
        $data['date'] = $request->date;
        $data['month'] = $request->month;
        $data['year'] = $request->year;



        $expense = DB::table('expenses')->insert($data);
                
        if ($expense) {
            $notification = array(
                'message' => 'expense inserted successfully.',
                'alert-type' =>'success'
            );

            return Redirect::to('/add-expense')->with($notification);
        }else {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return Redirect::to('/add-expense')->with($notification);
        }

                
    }


    public function today_expense()
    {   
        $date = date("d/m/y");
        $expenses=DB::table('expenses')->where('date',$date)->get();

        return view('today_expense', compact('expenses') );
        
    }


    public function view_expense($id)
    {
        $expense = DB::table('expenses')
                    ->where('id', $id)
                    ->first();

        return view('view_expense', compact('expense')); 

    }


    public function delete_expense($id)
    {


        $delete_expense = DB::table('expenses')
                            ->where('id', $id)
                            ->delete();
        
        if ($delete_expense) {
            $notification = array(
                'message' => 'expense deleted successfully.',
                'alert-type' =>'success'
            );

            return Redirect::to('/all-expense')->with($notification);
        }else {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return Redirect::to('/all-expense')->with($notification);
        }

    }

    public function edit_expense($id)
    {
        $edit = DB::table('expenses')
                ->where('id', $id)
                ->first();

        return view('edit_expense', compact('edit'));
    }

    public function update_expense(Request $request, $id)
    {


        $data = array();
        $data['details'] = $request->details;
        $data['amount'] = $request->amount;
        $data['date'] = $request->date;
        $data['month'] = $request->month;
        $data['year'] = $request->year;


        $update_expense = DB::table('expenses')->where('id', $id)->update($data);
                
        if ($update_expense) {
            $notification = array(
                'message' => 'expense updated successfully.',
                'alert-type' =>'success'
            );

            return Redirect::to('/today-expense')->with($notification);
        }else {
            $notification = array(
                'message' => 'Error',
                'alert-type' =>'error'
            );

            return Redirect::to('/add-expense')->with($notification);
        }


    }


    public function monthly_expense()
    {   
        $month = date("F");
        $monthly_expenses=DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense', compact('monthly_expenses') );
        
    }


    public function yearly_expense()
    {   
        $year = date("Y");
        $yearly_expenses=DB::table('expenses')->where('year',$year)->get();

        return view('yearly_expense', compact('yearly_expenses') );
        
    }


    public function january_expense()
    {   
        $month = "January";
        $monthly_expenses=DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense', compact('monthly_expenses') );
        
    }


    public function february_expense()
    {   
        $month = "February";
        $monthly_expenses=DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense', compact('monthly_expenses') );
        
    }


    public function march_expense()
    {   
        $month = "March";
        $monthly_expenses=DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense', compact('monthly_expenses') );
        
    }


    public function april_expense()
    {   
        $month = "April";
        $monthly_expenses=DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense', compact('monthly_expenses') );
        
    }


    public function may_expense()
    {   
        $month = "May";
        $monthly_expenses=DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense', compact('monthly_expenses') );
        
    }


    public function june_expense()
    {   
        $month = "June";
        $monthly_expenses=DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense', compact('monthly_expenses') );
        
    }


    public function july_expense()
    {   
        $month = "July";
        $monthly_expenses=DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense', compact('monthly_expenses') );
        
    }


    public function august_expense()
    {   
        $month = "August";
        $monthly_expenses=DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense', compact('monthly_expenses') );
        
    }


    public function september_expense()
    {   
        $month = "September";
        $monthly_expenses=DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense', compact('monthly_expenses') );
        
    }


    public function october_expense()
    {   
        $month = "October";
        $monthly_expenses=DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense', compact('monthly_expenses') );
        
    }


    public function november_expense()
    {   
        $month = "November";
        $monthly_expenses=DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense', compact('monthly_expenses') );
        
    }


    public function december_expense()
    {   
        $month = "December";
        $monthly_expenses=DB::table('expenses')->where('month',$month)->get();

        return view('monthly_expense', compact('monthly_expenses') );
        
    }


    
    


    
}
