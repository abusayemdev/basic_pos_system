@extends('dashboard')
@section('content')

<div class="row-fluid sortable">
    <div class="card">

        <div class="card-header">
            <strong>Update Company Information</strong> 
        </div>



        <div class="card-body card-block">
            <form action="{{url('/update-settings/'.$settings->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="company_name" class=" form-control-label">Company Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="company_name" value="{{$settings->company_name ?? ''}}" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="company_address" class=" form-control-label">Company Address</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="company_address" value="{{$settings->company_address ?? ''}}" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="company_email" class=" form-control-label">Company Email</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="email"  name="company_email" value="{{$settings->company_email ?? ''}}" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="company_telephone" class=" form-control-label">Telephone</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="company_telephone" value="{{$settings->company_telephone ?? ''}}" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="company_mobile" class=" form-control-label">Mobile</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="company_mobile" value="{{$settings->company_mobile ?? ''}}" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="company_city" class=" form-control-label">City</label>
                    </div>
                    <div class="col-12 col-md-9">
                    <input type="text"  name="company_city" value="{{$settings->company_city ?? ''}}" class="form-control" required>
                    </div>
                </div>

               

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="company_country" class=" form-control-label">Country</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="company_country" value="{{$settings->company_country ?? ''}}" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="company_zipcode" class=" form-control-label">Zip Code</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="company_zipcode" value="{{$settings->company_zipcode ?? ''}}" class="form-control" required>
                    </div>
                </div>

            
            
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="company_logo" class=" form-control-label">Company Logo</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <img id="image" src="" >
                        <input type="file"  name="company_logo" class="form-control-file" accept="image/*" onchange="readURL(this);" >
                        <br>
                        <img id="image" src="{{URL::to($settings->company_logo ?? '')}}" style="width:80px; height:80px;" >

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