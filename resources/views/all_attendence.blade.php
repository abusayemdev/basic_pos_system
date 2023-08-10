@extends('dashboard')
@section('content')
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2 class="mb-3">All Attendences
            <a href="{{url('/take-attendence')}}" class="btn btn-sm btn-primary pull-right"> Add Attendence </a> 
            </h2>
            
        </div>

        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable table1" width="300px" >
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Attendence Date</th>
                        <th>Action</th>
                    </tr>
                </thead>   
                <?php 
                $sl=1;
                ?>

                @foreach ($attendences as $attendence )
                <tbody>
                <tr>
                    <td>{{$sl++}}</td>
                    <td class="center">{{$attendence->edit_date}}</td>

                    <td class="center"> 
                    <a href="{{URL::to('/view-attendence/'.$attendence->edit_date)}}" id="view" class="btn btn-sm btn-primary">View Attendence List</a>
                    <a href="{{URL::to('/edit-attendence/'.$attendence->edit_date)}}" id="edit" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{URL::to('/delete-attendence/'.$attendence->edit_date)}}" id="delete" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                    
                </tr>
               
                </tbody>
                @endforeach

            </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->




@endsection