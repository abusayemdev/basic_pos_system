@extends('dashboard')
@section('content')
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2 class="mb-3">All Products
            <a href="{{url('/add-product')}}" class="btn btn-sm btn-primary pull-right"> Add Product </a>
            </h2>
            
        </div>

        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable table1" width="300px" >
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Code</th>
                        <th>Selling Price</th>
                        <th>Garage</th>
                        <th>Route</th>
                        <th>Actions</th>
                    </tr>
                </thead>   

                @foreach ($products as $product )
                <tbody>
                <tr>
                    <td class="center">{{$product->product_name}}</td>
                    <td class="center"><img src="{{URL::to($product->product_image)}}" style="width:70px; height:70px;"></td>
                    <td class="center">{{$product->product_code}}</td>
                    <td class="center">{{$product->selling_price}}</td>
                    <td class="center">{{$product->product_garage}}</td>
                    <td class="center">{{$product->product_route}}</td>
                    <td class="center"> 
                        <a href="{{URL::to('/view-product/'.$product->id)}}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{URL::to('/edit-product/'.$product->id)}}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{URL::to('/delete-product/'.$product->id)}}" id="delete" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                    
                </tr>
               
                </tbody>
                @endforeach

            </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->




@endsection