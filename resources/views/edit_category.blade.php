@extends('dashboard')
@section('content')

<div class="row-fluid sortable">
    <div class="card">

        <div class="card-header">
            <strong>Update Category</strong> 
        </div>



        <div class="card-body card-block">
            <form action="{{url('/update-category/'.$edit->id)}}" method="post"  class="form-horizontal">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="category_name" class=" form-control-label">category_name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="category_name" value="{{$edit->category_name}}" class="form-control" required>
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





@endsection