@extends('dashboard')
@section('content')
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2 class="mb-3">All Customers
            <a href="{{url('/add-customer')}}" class="btn btn-sm btn-primary pull-right"> Add Customer </a> 
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
                        <th>Actions</th>
                    </tr>
                </thead>   

                @foreach ($customers as $customer )
                <tbody>
                <tr>
                    <td class="center">{{$customer->name}}</td>
                    <td class="center">{{$customer->phone}}</td>
                    <td class="center">{{$customer->address}}</td>
                    <td class="center"><img src="{{URL::to($customer->photo)}}" style="width:70px; height:70px;"></td>
                    <td class="center"> 
                        <a href="{{URL::to('/view-customer/'.$customer->id)}}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{URL::to('/edit-customer/'.$customer->id)}}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{URL::to('/delete-customer/'.$customer->id)}}" id="delete" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                    
                </tr>
               
                </tbody>
                @endforeach

            </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->




@endsection