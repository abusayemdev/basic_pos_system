@extends('dashboard')
@section('content')

<div class="row-fluid sortable">
<div class="card">

        <div class="card-header">
            <strong>Add Expense</strong> 
            <a href="{{url('/today-expense')}}" class="btn btn-sm btn-primary pull-right"> Today Expenses </a> 
        </div>



        <div class="card-body card-block">
            <form action="{{url('/insert-expense')}}" method="post" class="form-horizontal">
                @csrf
    


                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="details" class=" form-control-label">Expense Details</label>
                    </div>
                    <div class="col-12 col-md-9">
                       <textarea name="details" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="amount" class=" form-control-label">Amount</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="amount" placeholder="Amount" class="form-control">
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
                    <button type="submit" class="btn btn-primary btn-md"> Submit </button>
                    <button type="reset" class="btn btn-danger btn-md">Cancel </button>
                </div>
            
            </form>
        </div>
        
    </div>

</div><!--/row-->




@endsection