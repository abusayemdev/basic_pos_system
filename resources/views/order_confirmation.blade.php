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
                                            <li>Order Date: <span class="font-weight-semibold"> {{$order->order_date}}</span></li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-lg-6 text-left"> 
                                <h3 class="text-muted">Customer Information:</h3>
                                <ul class="list list-unstyled mb-0">
                                    <li>
                                        <h5 class="my-2">{{$order->name}}</h5>
                                    </li>
                                    <li>Shop Name: {{$order->shopname}}</li>
                                    <li>Address: {{$order->address}}</li>
                                    <li>Phone: {{$order->phone}}</li>

                                    <li><a href="#" data-abc="true">Email:  {{$order->email}}</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-6 text-left">
                                <div class="pull-right">
                                    <ul class="list list-unstyled mb-0">
                                        
                                        <li><strong>Today:</strong> {{date("jS  F Y")}}</li>
                                        <li><strong>Order Status:</strong> <span class="badge badge-info"> {{$order->order_status}}</span></li>
                                        <li><strong>Order ID:</strong> {{$order->id}}</li>
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
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Quantity</th>
                                    <th>Unit Cost</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sl=1;
                                ?>
                                @foreach($order_details as $details)
                                <tr>
                                    <td>{{$sl++}}</td>
                                    <td>{{$details->product_name}}</td>
                                    <td>{{$details->product_code}}</td>
                                    <td>{{$details->quantity}}</td>
                                    <td>{{$details->unitcost}}</td>
                                    <td>{{$details->quantity*$details->unitcost}}</td>
                                </tr>
                              @endforeach  
                              
                            </tbody>
                        </table>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="pt-2 mb-3 col-md-4">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th class="text-left">Payment By:</th>
                                                <td class="text-right">{{$order->payment_status}}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-left">Pay: <span class="font-weight-normal">(21%)</span></th>
                                                <td class="text-right">{{$order->pay}}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-left">Due:</th>
                                                <td class="text-right">{{$order->due}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="pt-2 mb-3 col-md-6 ml-auto">
                               
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th class="text-left">Subtotal:</th>
                                                <td class="text-right">{{$order->sub_total}}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-left">Tax: <span class="font-weight-normal">(21%)</span></th>
                                                <td class="text-right">{{$order->vat}}</td>
                                            </tr>
                                            <tr>
                                                <th class="text-left">Total:</th>
                                                <td class="text-right text-primary">
                                                    <h5 class="font-weight-semibold">{{$order->total}}</h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                @if($order->order_status == 'success')
                                @else
                                <div class="text-right mt-3"> 
                                    <a href="{{url('/order-confirm/'.$order->id)}}" class="btn btn-primary" > Order Confirm</a> 
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>


</div><!--/row-->





@endsection