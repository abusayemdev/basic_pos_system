@extends('dashboard')
@section('content')

<div class="row-fluid sortable">
    <div class="card">

        <div class="card-header">
            <strong>View Employee</strong> 
        </div>



        <div class="card-body card-block">
            
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="name" class=" form-control-label">Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <p>: {{$employee->name}}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email" class=" form-control-label">Email</label>
                    </div>
                    <div class="col-12 col-md-9">
                    <p>: {{$employee->email}}</p>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="phone" class=" form-control-label">Phone</label>
                    </div>
                    <div class="col-12 col-md-9">
                    <p>: {{$employee->phone}}</p>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="address" class=" form-control-label">Address</label>
                    </div>
                    <div class="col-12 col-md-9">
                    <p>: {{$employee->address}}</p>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="experience" class=" form-control-label">Experience</label>
                    </div>
                    <div class="col-12 col-md-9">
                    <p>: {{$employee->experience}}</p>
                    </div>
                </div>

            
            
                

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="salary" class=" form-control-label">Salary</label>
                    </div>
                    <div class="col-12 col-md-9">
                    <p>: {{$employee->salary}}</p>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="vacation" class=" form-control-label">Vacation</label>
                    </div>
                    <div class="col-12 col-md-9">
                    <p>: {{$employee->vacation}}</p>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="city" class=" form-control-label">City</label>
                    </div>
                    <div class="col-12 col-md-9">
                    <p>: {{$employee->city}}</p>
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="photo" class=" form-control-label">Photo</label>
                    </div>
                    <div class="col-12 col-md-9">
                         <img id="image" src="{{URL::to($employee->photo)}}" style="width:100px; height:100px;">
                        
                    </div>
                </div>

                <p>Back to <a href="{{url('/all-employee')}}"> All Employees </a></p>

           
        </div>
        
    </div>

</div><!--/row-->





@endsection