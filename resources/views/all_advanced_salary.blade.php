@extends('dashboard')
@section('content')
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2 class="mb-3">All Advanced Salary (Employee) 
            <a href="{{url('/add-advance_salary')}}" class="btn btn-sm btn-primary pull-right"> Add Advanced Salary </a> 
            </h2>
            
        </div>

        <div class="box-content">
 
            <table class="table table-striped table-bordered bootstrap-datatable datatable table1" width="300px" >
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Salary</th>
                        <th>Month</th>
                        <th>Advanced Salary</th>
                        <th>Action</th>
                    </tr>
                </thead>   

               
                <tbody>
                @foreach ($advanced_salaries as $advanced_salary )
                <tr>
                    <td class="center">{{$advanced_salary->name}}</td>
                    <td class="center">{{$advanced_salary->salary}}</td>
                    <td class="center">{{$advanced_salary->month}}</td>
            
                    <td class="center">{{$advanced_salary->advanced_salary}}</td>
                    <td class="center"> 
                        <a href="{{URL::to('/delete-advanced_salary/'.$advanced_salary->id)}}" id="delete" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                    
                </tr>
                @endforeach
                </tbody>
                

            </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->




@endsection