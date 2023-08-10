@extends('dashboard')
@section('content')

<div class="row-fluid sortable">
    <div class="card">

        <div class="card-header">
            <strong>Update Customer Information</strong> 
        </div>



        <div class="card-body card-block">
            <form action="{{url('/update-customer/'.$edit->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="name" class=" form-control-label">Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="name" value="{{$edit->name}}" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email" class=" form-control-label">Email</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="email"  name="email" value="{{$edit->email}}" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="phone" class=" form-control-label">Phone</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="phone" value="{{$edit->phone}}" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="address" class=" form-control-label">Address</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="address" value="{{$edit->address}}" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="shopname" class=" form-control-label">Shopname</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="shopname" value="{{$edit->shopname}}" class="form-control">
                    </div>
                </div>

            
            
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="photo" class=" form-control-label">Photo</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <img id="image" src="" >
                        <input type="file"  name="photo" class="form-control-file" accept="image/*" onchange="readURL(this);" >
                        <br>
                        <img id="image" src="{{URL::to($edit->photo)}}" style="width:80px; height:80px;" >

                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="account_holder" class=" form-control-label">Account Holder</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="account_holder" value="{{$edit->account_holder}}" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="account_number" class=" form-control-label">Account Number</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="account_number" value="{{$edit->account_number}}" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="bank_name" class=" form-control-label">Bank Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="bank_name" value="{{$edit->bank_name}}" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="bank_branch" class=" form-control-label">Bank Branch</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="bank_branch" value="{{$edit->bank_branch}}" class="form-control">
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