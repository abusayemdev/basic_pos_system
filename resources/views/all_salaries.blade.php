@extends('dashboard')
@section('content')
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2 class="mb-3">All Salaries
            <a href="{{url('/pay-salary')}}" class="btn btn-sm btn-primary pull-right"> Pay Salary </a> 
            </h2>
            
        </div>

        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable table1" width="300px" >
                <thead>
                    <tr>
                    
                        <th>Month</th>
                        <th>Action</th>
                    </tr>
                </thead>   
              
   
               
                <tbody>
                @foreach ($salaries as $salary )
                <tr>
                 
                    <td class="center">{{$salary->salary_month}}</td>

                    <td class="center"> 
                    <a href="{{URL::to('/view-salary/'.$salary->salary_month)}}" id="view" class="btn btn-sm btn-primary">View Salary List</a>
                    
                    
                    </td>
                    
                </tr>
               
                </tbody>
                @endforeach

            </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->




@endsection