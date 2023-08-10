@extends('dashboard')
@section('content')

<div class="row-fluid sortable">
    <!--card-->
    <div class="card">

        <div class="card-header">
            <strong>Add Employee</strong> 
            <a href="{{url('/all-employee')}}" class="btn btn-sm btn-primary pull-right"> All Employees </a> 
        </div>



        <div class="card-body card-block">
            <form action="{{url('/insert-employee')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                        <input type="email"  name="email" placeholder="Email" class="form-control" required>
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
                        <label for="experience" class=" form-control-label">Experience</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="experience" placeholder="Experience" class="form-control" required>
                    </div>
                </div>

            
            
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="photo" class=" form-control-label">Photo</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <img id="image" src="" >
                        <input type="file"  name="photo" class="form-control-file" accept="image/*" onchange="readURL(this);" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="salary" class=" form-control-label">Salary</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="salary" placeholder="Salary" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="vacation" class=" form-control-label">Vacation</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="vacation" placeholder="Vacation Days" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="city" class=" form-control-label">City</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="city" placeholder="City Name" class="form-control" required>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-md"> Submit </button>
                    <button type="reset" class="btn btn-danger btn-md">Cancel </button>
                </div>
            
            </form>
        </div>
        
    </div><!--/card-->

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