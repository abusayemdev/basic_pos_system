@extends('dashboard')
@section('content')
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2 class="mb-3">Success Orders
            <a href="{{url('/pending-order')}}" class="btn btn-sm btn-primary pull-right"> Pending Orders </a>
            </h2>
            
        </div>

        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable table1" width="300px" >
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Order Date</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Payment Status</th>
                        <th>Order Status</th>
                        <th>Action</th>
                    </tr>
                </thead>   

                @foreach ($success_order as $success )
                <tbody>
                <tr>
                    <td class="center">{{$success->name}}</td>
                    
                    <td class="center">{{$success->order_date}}</td>
                    <td class="center">{{$success->total_products}}</td>
                    <td class="center">{{$success->total}}</td>
                    <td class="center">{{$success->payment_status}}</td>
                    <td class="center"><span class="badge badge-success">{{$success->order_status}}</span> </td>
                    <td class="center"> <a href="{{URL::to('/view-order-status/'.$success->id)}}" id="view" class="btn btn-sm btn-primary">View Order Status</a></td>
                </tr>
               
                </tbody>
                @endforeach

            </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->




@endsection