@extends('dashboard')
@section('content')
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2 class="mb-3">All Employees
            <a href="{{url('/add-employee')}}" class="btn btn-sm btn-primary pull-right"> Add Employee </a> 
            </h2>
            
        </div>

        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable table1" width="300px" >
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Photo</th>
                        <th>Salary</th>
                        <th>Actions</th>
                    </tr>
                </thead>   

                @foreach ($employees as $employee )
                <tbody>
                <tr>
                    <td class="center">{{$employee->name}}</td>
                    <td class="center">{{$employee->phone}}</td>
                    <td class="center">{{$employee->address}}</td>
                    <td class="center"><img src="{{URL::to($employee->photo)}}" style="width:70px; height:70px;"></td>
                    <td class="center">{{$employee->salary}}</td>
                    <td class="center"> 
                        <a href="{{URL::to('/view-employee/'.$employee->id)}}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{URL::to('/edit-employee/'.$employee->id)}}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{URL::to('/delete-employee/'.$employee->id)}}" id="delete" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                    
                </tr>
               
                </tbody>
                @endforeach

            </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->




@endsection