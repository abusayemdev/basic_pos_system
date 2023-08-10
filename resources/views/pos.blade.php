@extends('dashboard')
@section('content')
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h3 class="mb-3 bg-white p-3">Point of Sale (POS)<span class="pull-right text-success" style="font-size:16px;">Date: {{date('d/m/y')}}</span></h3>
            
        </div>



        <div class="box-content">
            <div class="row">
                <div class="col-lg-5">
                

                    <div class="card">

                        <div class="card-header">
                            <strong>Create Invoice</strong> 
                        </div>



                        <div class="card-body card-block">

                            <div class="price-card text-center py-3 ">
                                <table class=" table-striped table-bordered bootstrap-datatable datatable table1" >
                                    <thead>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Single Price</th>
                                        <th>Sub Total</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>

                                    <?php $cart_product = Cart::content(); ?>

                                        @foreach($cart_product as $pro)
                                        <tr>
                                            <td>{{$pro->name}}</td>
                                            <td>
                                                <form action="{{url('/update-cart/'.$pro->rowId)}}" method="post">
                                                    @csrf
                                                    <input type="number" name="qty" value="{{$pro->qty}}" style="width:50px;" class="form-control">
                                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-check"></i></button>
                                                </form>
                                            </td>
                                            <td>{{$pro->price}}</td>
                                            <td>{{$pro->price*$pro->qty}}</td>
                                            <td><a href="{{url('/remove-cart/'.$pro->rowId)}}"><i class="far fa-trash-alt"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                             
                                
                            <div class="card-footer text-center ">
                                <p>Quantity: {{Cart::count();}}</p>
                                <p>Sub Total: {{Cart::subtotal();}}</p>
                                <p>Vat: {{Cart::tax();}}</p>
                                <hr>
                                <h3>Total: {{Cart::total();}}</h3>
                            </div>

                           
                            <form action="{{url('/create-invoice')}}" method="post">
                        @csrf
                        </div>

                        <hr>

                        

                        <div class="panel">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                            <h4 class="m-3" >Select Customer <button type="button" class="btn btn-sm btn-primary  pull-right" data-toggle="modal" data-target="#mediumModal">
											Add New
										</button></h4>
                        <select class="form-control" name="customer_id">
                            <option disabled selected >Select Customer</option>
                            @foreach($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                      
                        <button type="submit" class="btn btn-md btn-primary">Create Invoice</button>
                        </form>
                    </div>

                   

            
                </div>

                <div class="col-lg-7">
                <input class="form-control" id="myInput" type="text" placeholder="Search..">
                    <br>
                    <table class="table table-striped table-bordered bootstrap-datatable datatable table1" width="300px" >
                        <thead>
                            <tr>
                              
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Product Code</th>
                                <th>Action</th>
                            </tr>
                        </thead>   
                        <tbody id="myTable">
                        @foreach ($products as $product )
                        
                        <tr>
                            <form action="{{url('/add-cart')}}" method="post">
                               @csrf
                            <input type="hidden" name="id" value="{{$product->id}}">
                                <input type="hidden" name="name" value="{{$product->product_name}}">
                                <input type="hidden" name="qty" value="1">
                                <input type="hidden" name="price" value="{{$product->selling_price}}">
                                <td> 
                                    <img src="{{URL::to($product->product_image)}}" style="width:60px;height:60px;">
                                </td>
                                <td class="center">{{$product->product_name}}</td>
                                <td class="center">{{$product->category_name}}</td>
                                <td class="center">{{$product->product_code}}</td>
                                <td> 
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-plus-square"></i></button>
                                </td>
                            </form>                            
                            
                        </tr>
                    
                       
                        @endforeach
                        </tbody>
                    </table>  
                </div>

             


                
            
            
            
            </div>









     
        </div>
    </div><!--/span-->

</div><!--/row-->


<!-- modal medium -->
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Create Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                    <form action="{{url('/insert-customer')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="name" class=" form-control-label">Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="name" placeholder="Full Name" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email" class=" form-control-label">Email</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="email"  name="email" placeholder="Email" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="phone" class=" form-control-label">Phone</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="phone" placeholder="Phone Number" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="address" class=" form-control-label">Address</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="address" placeholder="Address" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="shopname" class=" form-control-label">Shopname</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="shopname" placeholder="shopname" class="form-control" >
                    </div>
                </div>

            
            
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="photo" class=" form-control-label">Photo</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <img id="image" src="" >
                        <input type="file"  name="photo" class="form-control-file" accept="image/*" onchange="readURL(this);" >
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="account_holder" class=" form-control-label">Account Holder</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="account_holder" placeholder="Account Holder" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="account_number" class=" form-control-label">Account Number</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="account_number" placeholder="Account Number" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="bank_name" class=" form-control-label">Bank Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="bank_name" placeholder="Bank Name" class="form-control" >
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="bank_branch" class=" form-control-label">Bank Branch</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="bank_branch" placeholder="Bank Branch" class="form-control">
                    </div>
                </div>

            

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary"> Submit </button>
            </div>

            </form>

        </div>
    </div>
</div>
<!-- end modal medium -->



<script>
    function readURL(input)
    {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image')
                   .attr('src', e.target.result)
                   .width(80)
                   .height(80);
                
            };
            reader.readAsDataURL(input.files[0]);
        }

    }
</script>





@endsection