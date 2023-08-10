@extends('dashboard')
@section('content')

<div class="row-fluid sortable">
    <div class="card">

        <div class="card-header">
            <strong>View Product Details</strong> 
        </div>



        <div class="card-body card-block">

            <div class="row form-group">
                    
                    <div class="col-12 col-md-9">
                         <img id="image" src="{{URL::to($product->product_image)}}" style="width:300px; height:300px;">
                        
                    </div>
                </div>
            
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="name" class=" form-control-label">Product Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <p>: {{$product->product_name}}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email" class=" form-control-label">Category</label>
                    </div>
                    <div class="col-12 col-md-9">
                    <p>: {{$product->category_name}}</p>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="phone" class=" form-control-label">Supplier</label>
                    </div>
                    <div class="col-12 col-md-9">
                    <p>: {{$product->name}}</p>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="product_code" class=" form-control-label">Product Code</label>
                    </div>
                    <div class="col-12 col-md-9">
                    <p>: {{$product->product_code}}</p>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="product_garage" class=" form-control-label">Godoun</label>
                    </div>
                    <div class="col-12 col-md-9">
                    <p>: {{$product->product_garage}}</p>
                    
                    </div>
                </div>

            
            
                

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="product_route" class=" form-control-label">Product Route</label>
                    </div>
                    <div class="col-12 col-md-9">
                    <p>: {{$product->product_route}}</p>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="buying_date" class=" form-control-label">Buying Date</label>
                    </div>
                    <div class="col-12 col-md-9">
                    <p>: {{$product->buying_date}}</p>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="expire_date" class=" form-control-label">Expire Date</label>
                    </div>
                    <div class="col-12 col-md-9">
                    <p>: {{$product->expire_date}}</p>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="buying_price" class=" form-control-label">Buying Price</label>
                    </div>
                    <div class="col-12 col-md-9">
                    <p>: {{$product->buying_price}}</p>

                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="selling_price" class=" form-control-label">Selling Price</label>
                    </div>
                    <div class="col-12 col-md-9">
                    <p>: {{$product->selling_price}}</p>

                    </div>
                </div>

                <p>Back to <a href="{{url('/all-product')}}"> All products </a></p>



            </div>

           
           
        </div>
        
    </div>

</div><!--/row-->





@endsection