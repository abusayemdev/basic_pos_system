@extends('dashboard')
@section('content')

<div class="row-fluid sortable">

<div class="card">

        <div class="card-header">
            <strong>Import Products  </strong> 
            <a href="{{url('/all-product')}}" class="btn btn-sm btn-primary pull-right"> All Products </a>
            <a href="{{url('/export-product')}}" class="btn btn-sm btn-success pull-right mx-3">Download Xlsx</a>
        </div>


        <div class="card-body card-block">
            <form action="{{url('/import')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
    


                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="import_file" class=" form-control-label">Xlsx File Import</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file"  name="import_file"    required>
                    </div>
                </div>


                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-md"> Upload </button>
                    <button type="reset" class="btn btn-danger btn-md">Cancel </button>
                </div>
            
            </form>
            <br>
            <p><b>Note:</b> Please download the xlsx file (included requird columns as example) format, fill it with products information and import the file. </p>
        </div>
        
    </div>

</div><!--/row-->




@endsection