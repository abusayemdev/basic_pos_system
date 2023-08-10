@extends('dashboard')
@section('content')

<div class="row-fluid sortable">
<div class="card">

        <div class="card-header">
            <strong>Add Product</strong> 
            <a href="{{url('/all-product')}}" class="btn btn-sm btn-primary pull-right"> All Products </a> 
        </div>



        <div class="card-body card-block">
            <form action="{{url('/insert-product')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="product_name" class=" form-control-label">Product Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="product_name" placeholder="Product Name" class="form-control">
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
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
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
                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                            @endforeach
                       </select>
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="product_code" class=" form-control-label">Product Code</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="product_code" placeholder="Product Code" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="product_garage" class=" form-control-label">Godoun</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="product_garage" placeholder="Godoun No" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="product_route" class=" form-control-label">Product Route</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="product_route" placeholder="Product Route" class="form-control">
                    </div>
                </div>

            
            
               

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="buying_date" class=" form-control-label">Buying Date</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="buying_date" placeholder="01/01/2021" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="expire_date" class=" form-control-label">Expire Date</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="expire_date" placeholder="01/01/2021" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="buying_price" class=" form-control-label">Buying Price</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="buying_price" placeholder="Buying Price" class="form-control" required>
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="selling_price" class=" form-control-label">Selling Price</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="selling_price" placeholder="Selling Price" class="form-control" required>
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="product_image" class=" form-control-label">Product Image</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <img id="image" src="" >
                        <input type="file"  name="product_image" class="form-control-file" accept="image/*" onchange="readURL(this);">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-md"> Submit </button>
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