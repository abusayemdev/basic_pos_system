@extends('dashboard')
@section('content')

<div class="row-fluid sortable">
<div class="card">

                                    <div class="card-header">
                                        <strong>Add Advanced Salary (Employee)</strong> 
                                        <a href="{{url('/all-advanced_salary')}}" class="btn btn-sm btn-primary pull-right"> All Advanced Salaries </a>
                                    </div>
             

    
                                    <div class="card-body card-block">
                                        <form action="{{url('/insert-advanced_salary')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            @csrf
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="name" class=" form-control-label">Employee</label>
                                                </div>
                                                <?php
                                                $employees = DB::table('employees')->get();
                                                ?>
                                                <div class="col-12 col-md-9">
                                                    <select name="employee_id" class="form-control">
                                                       <option value="Select Employee">Select Employee</option>
                                                        @foreach($employees as $employee)
                                                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                                                        @endforeach 
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="name" class=" form-control-label">Month</label>
                                                </div>
                                               
                                                <div class="col-12 col-md-9">
                                                    <select name="month" class="form-control">
                                                    <option value="">Salect Month</option>
                                                        <option value="January">January</option>
                                                        <option value="February">February</option>
                                                        <option value="March">March</option>
                                                        <option value="April">April</option>
                                                        <option value="May">May</option>
                                                        <option value="June">June</option>
                                                        <option value="July">July</option>
                                                        <option value="August">August</option>
                                                        <option value="September">September</option>
                                                        <option value="October">October</option>
                                                        <option value="November">November</option>
                                                        <option value="December">December</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="year" class=" form-control-label">Year</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text"  name="year" placeholder="Year" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="advanced_salary" class=" form-control-label">Advanced Salary</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text"  name="advanced_salary" placeholder="Advanced Salary Amount" class="form-control">
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