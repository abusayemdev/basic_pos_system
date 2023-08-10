@extends('dashboard')
@section('content')
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2 class="mb-3">All Categories
            <a href="{{url('/add-category')}}" class="btn btn-sm btn-primary pull-right"> Add Category </a> 
            </h2>
            
        </div>

        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable table1" width="300px" >
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>   

                @foreach ($categories as $category )
                <tbody>
                <tr>
                    <td class="center">{{$category->category_name}}</td>

                    <td class="center"> 
                    <a href="{{URL::to('/edit-category/'.$category->id)}}" id="edit" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{URL::to('/delete-category/'.$category->id)}}" id="delete" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                    
                </tr>
               
                </tbody>
                @endforeach

            </table>            
        </div>
    </div><!--/span-->

</div><!--/row-->




@endsection