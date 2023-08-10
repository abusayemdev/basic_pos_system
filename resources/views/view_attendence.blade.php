@extends('dashboard')
@section('content')
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2 class="mb-3">Attendences List: {{$date->attendence_date}}</h2>
            
        </div>

        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable table1" width="300px" >
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Name</th>
                        <th>Attendence</th>
                        
                    </tr>
                </thead>   
                <?php 
                $sl=1;
                ?>

                @foreach ($attendence_list as $att_list )
                <tbody>
                <tr>
                    <td>{{$sl++}}</td>
                    <td class="center">{{$att_list->name}}</td>

                    <td class="center">{{$att_list->attendence}}</td>

                
                    
                </tr>
               
                </tbody>
                @endforeach

            </table>          

            <p>Back to <a href="{{url('/all-attendence')}}"> All Attendences </a></p>  
        </div>
    </div><!--/span-->

</div><!--/row-->




@endsection