@extends('dashboard')
@section('content')
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2 class="mb-3">Edit Attendence (Employee)</h2>
            <h3 class="text-center mb-3">Attendence: {{$date->attendence_date}}</h3>
            
            
        </div>

        <div class="box-content">

            <table class="table table-striped table-bordered bootstrap-datatable datatable table1" width="300px" >
            <form action="{{url('/update-attendence')}}" method="post" class="form-horizontal">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Name</th>
                        <th>Attendence</th>
                    </tr>
                </thead>   
               
                @csrf

                
                <tbody>
                <?php 
                $sl=1;
                ?>
               
                @foreach ($edit as $edit_emp )
                <tr>
                    <td>{{$sl++}}</td>
                    <td class="center"> {{$edit_emp->name}}

                        <input type="hidden" name="id[]" value="{{$edit_emp->id}}">
                    </td>

                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="radio" name="attendence[{{$edit_emp->id}}]" value="Present" <?php if($edit_emp->attendence == 'Present') {echo "checked";} ?> class="custom-control-input" id="customCheck{{$edit_emp->id}}">
                            <label class="custom-control-label" for="customCheck{{$edit_emp->id}}">Present</label>
                        </div>

                        <div class="custom-control custom-checkbox">
                            <input type="radio" name="attendence[{{$edit_emp->id}}]" value="Absent" <?php if($edit_emp->attendence == 'Absent') {echo "checked";} ?> class="custom-control-input" id="customCheck1{{$edit_emp->id}}">
                            <label class="custom-control-label" for="customCheck1{{$edit_emp->id}}">Absent</label>
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
            <button type="submit" class="btn btn-primary btn-md "> Update </button>
            </form>       
        </div>
    </div><!--/span-->

</div><!--/row-->




@endsection