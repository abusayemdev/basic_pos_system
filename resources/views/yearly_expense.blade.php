@extends('dashboard')
@section('content')
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>


            <h2 class="mb-3">All Expenses: {{date('Y')}}  <a href="{{url('/add-expense')}}" class="btn btn-sm btn-primary pull-right"> Add Expense </a></h2>

            
        </div>

        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable table1" width="300px" >
                <thead>
                    <tr>
                        <th>Details</th>
                        <th>Amount</th>
                    </tr>
                </thead>   

                <tbody>
                @foreach($yearly_expenses as $yearly_expense)
                <tr>   
                    <td class="center">{{$yearly_expense->details}}</td>
                    <td class="center">{{$yearly_expense->amount}}</td>
                </tr>
                @endforeach  
                </tbody>
            </table> 

            <?php 
            $year = date("Y");
            $total = DB::table('expenses')->where('year',$year)->sum('amount'); 
            ?> 

            <h5 class="pull-right py-3">Total Expense: {{$total}} Taka</h5>  
         

           
        </div>
    </div><!--/span-->

</div><!--/row-->




@endsection