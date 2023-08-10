@extends('dashboard')
@section('content')

<div class="row-fluid sortable">
<div class="card">

        <div class="card-header">
            <strong>Add Category</strong> 
            <a href="{{url('/all-category')}}" class="btn btn-sm btn-primary pull-right"> All Categories </a>
        </div>



        <div class="card-body card-block">
            <form action="{{url('/insert-category')}}" method="post" class="form-horizontal">
                @csrf
    


                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="category_name" class=" form-control-label">Category Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="category_name" placeholder="Category Name" class="form-control">
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




@endsection