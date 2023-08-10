@extends('dashboard')
@section('content')

<div class="row-fluid sortable">
<div class="card">

        <div class="card-header">
            <strong>Pay Salary</strong> 
            <a href="{{url('/all-salary')}}" class="btn btn-sm btn-primary pull-right"> All Salaries </a>
        </div>



        <div class="card-body card-block">
            <form action="{{url('/insert-pay_now')}}" method="post" class="form-horizontal">
                @csrf
    


                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="name" class=" form-control-label">Employee Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="name" value="{{$employee->name}}" class="form-control">
                        <input type="hidden"  name="employee_id" value="{{$employee->id}}" class="form-control" >
                    </div>

                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="salary" class=" form-control-label">Salary</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="salary" value="{{$employee->salary}}" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="salary_month" class=" form-control-label">Month</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text"  name="salary_month" value="{{date('F', strtotime('-1 months'))}}" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="address" class=" form-control-label">Advanced Salary</label>
                    </div>
                    <div class="col-12 col-md-9">
                        @if(isset ($advance->employee_id))
                        <input type="text"  name="advanced_salary" value="{{$advance->advanced_salary}}" class="form-control">
                        @else
                        <input type="text"  name="advanced_salary" value="0" class="form-control">
                        @endif
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="shopname" class=" form-control-label">Salary Unpaid</label>
                    </div>
                    <div class="col-12 col-md-9">
                    @if(isset ($advance->employee_id))
                        <input type="text"  name="paid_salary" value="{{$employee->salary-$advance->advanced_salary}}" class="form-control">
                        @else
                        <input type="text"  name="paid_salary" value="{{$employee->salary}}" class="form-control">
                        @endif
                    </div>
                </div>


                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-md"> Pay Salary</button>
                 
                </div>
            
            </form>
        </div>
        
    </div>

</div><!--/row-->




@endsection