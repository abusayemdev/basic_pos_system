@extends('dashboard')
@section('content')

<div class="row-fluid sortable">
    <div class="card">

        <div class="card-header">
            <strong>View Supplier</strong> 
        </div>



        <div class="card-body card-block">
            
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="name" class=" form-control-label">Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <p>: {{$supplier->name}}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email" class=" form-control-label">Email</label>
                    </div>
                    <div class="col-12 col-md-9">
                    @if($supplier->email == NULL)
                    None
                    @else
                    <p>: {{$supplier->email}}</p>
                    @endif
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="phone" class=" form-control-label">Phone</label>
                    </div>
                    <div class="col-12 col-md-9">
                    <p>: {{$supplier->phone}}</p>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="address" class=" form-control-label">Address</label>
                    </div>
                    <div class="col-12 col-md-9">
                    <p>: {{$supplier->address}}</p>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="shopname" class=" form-control-label">Shopname</label>
                    </div>
                    <div class="col-12 col-md-9">
                    @if($supplier->shopname == NULL)
                    None
                    @else
                    <p>: {{$supplier->shopname}}</p>
                    @endif
                    
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="type" class=" form-control-label">Type</label>
                    </div>
                    <div class="col-12 col-md-9">
                    @if($supplier->type == NULL)
                    None
                    @else
                    <p>: {{$supplier->type}}</p>
                    @endif
                    
                    </div>
                </div>

            
            
                

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="account_holder" class=" form-control-label">Account Holder</label>
                    </div>
                    <div class="col-12 col-md-9">
                    @if($supplier->account_holder == NULL)
                    None
                    @else
                    <p>: {{$supplier->account_holder}}</p>
                    @endif
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="account_number" class=" form-control-label">Account Number</label>
                    </div>
                    <div class="col-12 col-md-9">
                    @if($supplier->account_number == NULL)
                    None
                    @else
                    <p>: {{$supplier->account_number}}</p>
                    @endif
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="bank_name" class=" form-control-label">Bank Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                    @if($supplier->bank_name == NULL)
                    None
                    @else
                    <p>: {{$supplier->bank_name}}</p>
                    @endif
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="bank_branch" class=" form-control-label">Bank Branch</label>
                    </div>
                    <div class="col-12 col-md-9">
                    @if($supplier->bank_branch == NULL)
                    None
                    @else
                    <p>: {{$supplier->bank_branch}}</p>
                    @endif
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="photo" class=" form-control-label">Photo</label>
                    </div>
                    <div class="col-12 col-md-9">
                         <img id="image" src="{{URL::to($supplier->photo)}}" style="width:100px; height:100px;">
                        
                    </div>
                </div>

                <p>Back to <a href="{{url('/all-supplier')}}"> All Suppliers </a></p>

           
        </div>
        
    </div>

</div><!--/row-->





@endsection