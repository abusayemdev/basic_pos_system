@extends('dashboard')
@section('content')
<div class="row-fluid sortable">		

    <div class="box span12">
        <div class="btn-group mb-3" role="group">
            <a href="{{url('/january-expense')}}" class="btn btn-sm btn-light ">January</a>
            <a href="{{url('/february-expense')}}" class="btn btn-sm btn-light ">February</a>
            <a href="{{url('/march-expense')}}" class="btn btn-sm btn-light ">March</a>
            <a href="{{url('/april-expense')}}" class="btn btn-sm btn-light ">April</a>
            <a href="{{url('/may-expense')}}" class="btn btn-sm btn-light ">May</a>
            <a href="{{url('/june-expense')}}" class="btn btn-sm btn-light ">June</a>
            <a href="{{url('/july-expense')}}" class="btn btn-sm btn-light ">July</a>
            <a href="{{url('/august-expense')}}" class="btn btn-sm btn-light ">August</a>
            <a href="{{url('/september-expense')}}" class="btn btn-sm btn-light ">September</a>
            <a href="{{url('/october-expense')}}" class="btn btn-sm btn-light ">October</a>
            <a href="{{url('/november-expense')}}" class="btn btn-sm btn-light ">November</a>
            <a href="{{url('/december-expense')}}" class="btn btn-sm btn-light ">December</a>
        
        
        
        </div>
        <div class="box-header" data-original-title>



            <h2 class="mb-3">Monthly Expenses:  <a href="{{url('/add-expense')}}" class="btn btn-sm btn-primary pull-right"> Add Expense </a></h2>

            
        </div>

        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable table1" width="300px" >
                <thead>
                    <tr>
                        <th>Details</th>
                        <td>Date</td>
                        <th>Amount</th>
                    </tr>
                </thead>   

                <tbody>
                @foreach($monthly_expenses as $monthly_expense)
                <tr>
                    <td class="center">{{$monthly_expense->details}}</td>
                    <td class="center">{{$monthly_expense->date}}</td>
                    <td class="center">{{$monthly_expense->amount}}</td>
                </tr>
                @endforeach  
               
                </tbody>
            </table> 

            <?php 
            $month = date("F");
            $total = DB::table('expenses')->where('month',$month)->sum('amount'); 
            ?> 

            <h5 class="pull-right py-3">Current Month Expenses: {{$total}} Taka</h5>  
         

           
        </div>
    </div><!--/span-->

</div><!--/row-->




@endsection