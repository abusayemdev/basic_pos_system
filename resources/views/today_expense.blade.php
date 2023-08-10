@extends('dashboard')
@section('content')
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
           <?php 
           $date = date("d/m/y");
           $today_expenses = DB::table('expenses')->where('date',$date)->sum('amount'); 
           ?>

            <h2 class="mb-3">Today Expense  <a href="{{url('/add-expense')}}" class="btn btn-sm btn-primary pull-right"> Add Expense </a></h2>
            <h3 class="text-center my-3">Total: {{$today_expenses}} Taka</h3>
            
        </div>

        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable table1" width="300px" >
                <thead>
                    <tr>
                        <th>Details</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>   

                <tbody>
                <tr>
                    @foreach($expenses as $expense)
                    <td class="center">{{$expense->details}}</td>
                    <td class="center">{{$expense->amount}}</td>

                    <td class="center"> 
                        <a href="{{URL::to('/edit-expense/'.$expense->id)}}" id="edit" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{URL::to('/delete-expense/'.$expense->id)}}" id="delete" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                    
                    
                </tr>
                @endforeach
                </tbody>

            </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->




@endsection