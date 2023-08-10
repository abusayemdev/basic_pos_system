@extends('dashboard')
@section('content')
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2 class="mb-3">Pay Salary (Employee) <span class="pull-right text-lg">Current Month: {{date("F Y")}}</span></h2>
            
        </div>

        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable table1" width="300px" >
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Salary</th>
                        <th>Month</th>
                     
                        <th>Action</th>
                    </tr>
                </thead>   

                
                <tbody>
                @foreach ($employees as $employee )
                
                <tr>
                    <td class="center">{{$employee->name}}</td>
                    <td class="center">{{$employee->salary}}</td>
                    <td class="center"><span class="badge badge-success">{{date("F", strtotime('-1 months'))}}</span></td>
            
                   
                    <td class="center"> 
                        <a href="{{url('/pay-now/'.$employee->id)}}"  class="btn btn-sm btn-primary" >Pay Now</a>
                    </td>
                    
                </tr>
                @endforeach
                </tbody>
                

            </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->

@endsection