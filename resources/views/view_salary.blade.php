@extends('dashboard')
@section('content')
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2 class="mb-3">Salary List: {{$month->salary_month}}
            <a href="{{url('/all-salary')}}" class="btn btn-sm btn-primary pull-right"> All Salaries </a> 
            </h2>
            
        </div>

        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable table1" width="300px" >
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Name</th>
                        <th>Salary</th>
                        
                    </tr>
                </thead>   
                <?php 
                $sl=1;
                ?>

                @foreach ($salary_list as $s_list )
                <tbody>
                <tr>
                    <td>{{$sl++}}</td>
                    <td class="center">{{$s_list->name}}</td>

                    <td class="center">{{$s_list->paid_salary}}</td>

                
                    
                </tr>
               
                </tbody>
                @endforeach

            </table>          

        </div>
    </div><!--/span-->

</div><!--/row-->




@endsection