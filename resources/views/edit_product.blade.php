@extends('dashboard')
@section('content')

<div class="row-fluid sortable">
    <div class="card">

        <div class="card-header">
            <strong>Update Product</strong> 
        </div>



        <div class="card-body card-block">
            <form action="{{url('/update-product/'.$edit->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="product_name" class=" form-control-label">Product Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="product_name" value="{{$edit->product_name}}" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="category_name" class=" form-control-label">Category</label>
                    </div>
                    <?php
                        $categories = DB::table('categories')->get();
                    ?>
                    <div class="col-12 col-md-9">
                       <select name="category_id" class="form-control">
                           <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" <?php if($category->id == $edit->category_id) { echo "selected";} ?>>{{$category->category_name}}</option>
                            @endforeach
                       </select>
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="category_name" class=" form-control-label">Supplier</label>
                    </div>
                    <?php
                        $suppliers = DB::table('suppliers')->get();
                    ?>
                    <div class="col-12 col-md-9">
                       <select name="supplier_id" class="form-control">
                           <option value="">Select Supplier</option>
                            @foreach($suppliers as $supplier)
                            <option value="{{$supplier->id}}" <?php if($supplier->id == $edit->supplier_id) { echo "selected";} ?> >{{$supplier->name}}</option>
                            @endforeach
                       </select>
                    </div>
                </div>




                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="product_code" class=" form-control-label">Product Code</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="product_code"  name="product_code" value="{{$edit->product_code}}" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="product_garage" class=" form-control-label">Product Garage</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="product_garage" value="{{$edit->product_garage}}" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="product_route" class=" form-control-label">Product Route</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="product_route" value="{{$edit->product_route}}" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="buying_date" class=" form-control-label">Buying Date</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="buying_date" value="{{$edit->buying_date}}" class="form-control">
                    </div>
                </div>

            
            
          

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="expire_date" class=" form-control-label">Expire Date</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="expire_date" value="{{$edit->expire_date}}" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="buying_price" class=" form-control-label">Buying Price</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="buying_price" value="{{$edit->buying_price}}" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="selling_price" class=" form-control-label">Selling Price</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="selling_price" value="{{$edit->selling_price}}" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="product_image" class=" form-control-label">Product Image</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <img id="image" src="" >
                        <input type="file"  name="product_image" class="form-control-file" accept="image/*" onchange="readURL(this);" >
                        <br>
                        <img id="image" src="{{URL::to($edit->product_image)}}" style="width:80px; height:80px;" >

                    </div>
                </div>

                

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-md"> Update </button>
                    <button type="reset" class="btn btn-danger btn-md">Cancel </button>
                </div>
            
            </form>
        </div>
        
    </div>

</div><!--/row-->

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