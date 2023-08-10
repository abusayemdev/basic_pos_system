@extends('dashboard')
@section('content')

<div class="row-fluid sortable">
    <div class="card">

        <div class="card-header">
            <strong>Update Expense</strong> 
        </div>



        <div class="card-body card-block">
            <form action="{{url('/update-expense/'.$edit->id)}}" method="post"  class="form-horizontal">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="details" class=" form-control-label">Details</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="details" cols="30" rows="4" class="form-control">{{$edit->details}}</textarea>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="amount" class=" form-control-label">Amount</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="amount" value="{{$edit->amount}}" class="form-control" >
                    </div>
                </div>

                <div class="row form-group">

                    <div class="col-12 col-md-9">
                        <input type="hidden"  name="date" Value="{{date('d/m/y')}}" class="form-control">

                    </div>
                </div>

                <div class="row form-group">

                    <div class="col-12 col-md-9">
                         <input type="hidden"  name="month" Value="{{date('F')}}" class="form-control">

                    </div>
                </div>

                <div class="row form-group">

                    <div class="col-12 col-md-9">
                         <input type="hidden"  name="year" Value="{{date('Y')}}" class="form-control">

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