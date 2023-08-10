@extends('dashboard')
@section('content')
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2 class="mb-3">Take Attendence (Employee)
            <a href="{{url('/all-attendence')}}" class="btn btn-sm btn-primary pull-right"> All Attendences </a>
            </h2>
            <h3 class="text-center mb-3">Today: {{date('d/m/y')}}</h3>
            
        </div>

        <div class="box-content">

            <table class="table table-striped table-bordered bootstrap-datatable datatable table1" width="300px" >
            <form action="{{url('/insert-attendence')}}" method="post" class="form-horizontal">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Attendence</th>
                    </tr>
                </thead>   
               
                @csrf

                
                <tbody>
               
                @foreach ($employees as $employee )
                <tr>
                    <td class="center"> {{$employee->name}}

                        <input type="hidden" name="employee_id[]" value="{{$employee->id}}">
                    </td>

                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="radio" name="attendence[{{$employee->id}}]" value="Present" class="custom-control-input" id="customCheck{{$employee->id}}">
                            <label class="custom-control-label" for="customCheck{{$employee->id}}">Present</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                            <input type="radio" name="attendence[{{$employee->id}}]" value="Absent" class="custom-control-input" id="customCheck1{{$employee->id}}">
                            <label class="custom-control-label" for="customCheck1{{$employee->id}}">Absent</label>
                        </div>

                    </td>    

                        <input type="hidden" name="attendence_date" value="{{date('d/m/y')}}">
                        <input type="hidden" name="attendence_year" value="{{date('Y')}}">
                        <input type="hidden" name="month" value="{{date('F')}}">
                    
                    
                </tr>
                @endforeach
                
               
                </tbody>
                

            </table>     
            <br>
            <button type="submit" class="btn btn-primary btn-md "> Submit </button>
            </form>       
        </div>
    </div><!--/span-->

</div><!--/row-->




@endsection