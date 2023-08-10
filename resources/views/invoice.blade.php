@extends('dashboard')
@section('content')

<?php

$company = DB::table('settings')->first();

?>

<div class="row-fluid sortable">
<div class="container  my-3">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-transparent header-elements-inline">
                        <h6 class="card-title">Sale invoice</h6>
                        <div class="header-elements"> <button type="button" onclick="window.print();" class="btn btn-light btn-sm ml-3"><i class="fa fa-print mr-2"></i> Print</button> </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-4 pull-left">
                                    <h6>{{$company->company_name}}</h6>
                                    <ul class="list list-unstyled mb-0 text-left">
                                        <li>{{$company->company_address}}</li>
                                        <li>+{{$company->company_mobile}} </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4 ">
                                    <div class="text-sm-right">
                                    <ul class="list list-unstyled mb-0">
                                        
                                        <li><strong>Date:</strong> {{date("jS  F Y")}}</li>
                                    </ul>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-lg-6 text-left"> 
                                <h3 class="text-muted">Invoice To:</h3>
                                <ul class="list list-unstyled mb-0">
                                    <li>
                                        <h5 class="my-2">{{$customer->name}}</h5>
                                    </li>
                                    <li>Shop Name: {{$customer->shopname}}</li>
                                    <li>Address: {{$customer->address}}</li>
                                    <li>Phone: {{$customer->phone}}</li>

                                    <li><a href="#" data-abc="true">Email:  {{$customer->email}}</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-6 text-left">
                                <div class="pull-right">
                                    <ul class="list list-unstyled mb-0">
                                        
                                        <li><strong>Order Date:</strong> {{date("jS  F Y")}}</li>
                                        <li><strong>Order Status:</strong> <span class="badge badge-info"> Pending</span></li>
                                   
                                    </ul>
                          
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-lg">
                            <thead>
                                
                                <tr>
                                    <th>#</th>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Unit Cost</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sl=1;
                                ?>
                                @foreach($contents as $content)
                                <tr>
                                    <td>{{$sl++}}</td>
                                    <td>{{$content->name}}</td>
                                    <td>{{$content->qty}}</td>
                                    <td>{{$content->price}}</td>
                                    <td>{{$content->qty*$content->price}}</td>
                                </tr>
                              @endforeach  
                              
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        <div class="d-md-flex flex-md-wrap">
                            <div class="pt-2 mb-3 wmin-md-400 ml-auto">
                               
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th class="text-left">Subtotal:</th>
                                                <td class="text-right">{{Cart::subtotal();}}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-left">Tax: <span class="font-weight-normal">(21%)</span></th>
                                                <td class="text-right">{{Cart::tax();}}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-left">Total:</th>
                                                <td class="text-right text-primary">
                                                    <h5 class="font-weight-semibold">{{Cart::total();}}</h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right mt-3"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mediumModal"><b><i class="fa fa-paper-plane-o mr-1"></i></b> Send invoice</button> </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>


</div><!--/row-->


<!-- modal -->
<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="mediumModalLabel">Invoice of {{$customer->name}} </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <h5><span class="pull-right m-3">Total: {{Cart::total(); }}</span></h5>


            <div class="modal-body">
                <form action="{{url('/insert-invoice')}}" method="post" class="form-horizontal">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="payment_status" class=" form-control-label">Payment</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="payment_status" class="form-control">
                                    <option value="Handcash">Handcash</option>
                                    <option value="Cheque">Cheque</option>
                                    <option value="Due">Due</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="pay" class=" form-control-label">Pay</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text"  name="pay" class="form-control">
                            </div>
                        </div>
                       
                    </div>
                    <div class="col-md-4">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="due" class=" form-control-label">Due</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text"  name="due" class="form-control">
                            </div>
                        </div>
                       
                    </div>
                </div>

                <input type="hidden" name="customer_id" value="{{$customer->id}}">
                <input type="hidden" name="order_date" value="{{date('d/m/Y')}}">
                <input type="hidden" name="order_status" value="pending">
                <input type="hidden" name="total_products" value="{{Cart::count();}}">
                <input type="hidden" name="sub_total" value="{{Cart::subtotal();}}">
                <input type="hidden" name="vat" value="{{Cart::tax();}}">
                <input type="hidden" name="total" value="{{Cart::total();}}">

            

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary"> Submit </button>
            </div>

            </form>

        </div>
    </div>
</div>
<!-- end modal-->






@endsection