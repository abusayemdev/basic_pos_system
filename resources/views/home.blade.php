@extends('dashboard')

@section('content')
<?php 
    $today = date('d/m/Y');
    $todays_orders = DB::table('orders')->where('order_date',$today)->count();

    $success_order = DB::table('orders')
                        ->where('order_date',$today)
                        ->where('order_status','success')
                        ->count();

    $pending_order = DB::table('orders')
                        ->where('order_date',$today)
                        ->where('order_status','pending')
                        ->count();

    $product_import = DB::table('products')
                        ->where('buying_date',$today)
                        ->count();

                       
$total = DB::table('orders')
->where('order_date',$today)
->selectRaw("REPLACE(total,',','') as total")->get();

$total_sell = $total->sum('total');
?>




<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <h2 class="title-1">Today's overview <span style="font-size:16px;" class="pull-right text-success">date: {{$today}}</span></h2>
                
            </div>
        </div>
    </div>
    
    <div class="row m-t-25">
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c1 py-5">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                        <i class="zmdi zmdi-shopping-cart"></i>
                            
                        </div>

                        <div class="text">
                        @if($success_order != null)
                            <h2 class="text-white p-1">Orders Completed: {{$success_order}}</h2>
                        @else
                        <h2 class="text-white p-1">Orders Completed: 0</h2>
                        @endif
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c2 py-5">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                    <div class="icon">
                        <i class="zmdi zmdi-shopping-cart"></i>
                            
                        </div>
                        <div class="text">
                        @if($pending_order != null)
                            <h2 class="text-white p-1">Orders Pending: {{$pending_order}}</h2>
                        @else
                        <h2 class="text-white p-1">Orders Pending: 0</h2>
                        @endif
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c3 py-5">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-calendar-note"></i>
                        </div>
                        <div class="text">
                        @if($product_import != null)
                            <h2 class="text-white p-1">Product Imported: {{$product_import}}</h2>
                        @else
                        <h2 class="text-white p-1">Product Imported: 0</h2>
                        @endif
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="overview-item overview-item--c4 py-5">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-money"></i>
                        </div>
                        <div class="text">
                        @if($total_sell != null)
                            <h2 class="text-white p-1">Today's Total Sell: {{$total_sell}}</h2>
                        @else
                        <h2 class="text-white p-1">Today's Total Sell: 0</h2>
                        @endif
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8">
            <!-- RECENT REPORT 2-->
            <div class="recent-report2">
                <h3 class="title-3">recent reports</h3>
                <div class="chart-info">
                    <div class="chart-info__left">
                        <div class="chart-note">
                            <span class="dot dot--blue"></span>
                            <span>products</span>
                        </div>
                        <div class="chart-note">
                            <span class="dot dot--green"></span>
                            <span>Services</span>
                        </div>
                    </div>
                    
                </div>
                <div class="recent-report__chart">
                    <canvas id="recent-rep2-chart"></canvas>
                </div>
            </div>
            <!-- END RECENT REPORT 2             -->
        </div>
        <div class="col-lg-6">

                <!-- CHART-->
            <div class="statistic-chart-1">
                <h3 class="title-3 m-b-30">chart</h3>
                <div class="chart-wrap">
                    <canvas id="widgetChart5"></canvas>
                </div>
                <div class="statistic-chart-1-note">
                    <span class="big">10,368</span>
                    <span>/ 16220 items sold</span>
                </div>
            </div>

        </div>
        <div class="col-lg-6">
            <div class="au-card chart-percent-card">
                <div class="au-card-inner">
                    <h3 class="title-2 tm-b-5">char by %</h3>
                    <div class="row no-gutters">
                        <div class="col-xl-6">
                            <div class="chart-note-wrap">
                                <div class="chart-note mr-0 d-block">
                                    <span class="dot dot--blue"></span>
                                    <span>products</span>
                                </div>
                                <div class="chart-note mr-0 d-block">
                                    <span class="dot dot--red"></span>
                                    <span>services</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="percent-chart">
                                <canvas id="percent-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="au-card m-b-30">
                <div class="au-card-inner">
                    <h3 class="title-2 m-b-40">Yearly Sales</h3>
                    <canvas id="sales-chart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="au-card m-b-30">
                <div class="au-card-inner">
                    <h3 class="title-2 m-b-40">Team Commits</h3>
                    <canvas id="team-chart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="au-card m-b-30">
                <div class="au-card-inner">
                    <h3 class="title-2 m-b-40">Bar chart</h3>
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="au-card m-b-30">
                <div class="au-card-inner">
                    <h3 class="title-2 m-b-40">Rader chart</h3>
                    <canvas id="radarChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="au-card m-b-30">
                <div class="au-card-inner">
                    <h3 class="title-2 m-b-40">Line Chart</h3>
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="au-card m-b-30">
                <div class="au-card-inner">
                    <h3 class="title-2 m-b-40">Doughut Chart</h3>
                    <canvas id="doughutChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="au-card m-b-30">
                <div class="au-card-inner">
                    <h3 class="title-2 m-b-40">Pie Chart</h3>
                    <canvas id="pieChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="au-card m-b-30">
                <div class="au-card-inner">
                    <h3 class="title-2 m-b-40">Polar Chart</h3>
                    <canvas id="polarChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="au-card m-b-30">
                <div class="au-card-inner">
                    <h3 class="title-2 m-b-40">Single Bar Chart</h3>
                    <canvas id="singelBarChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="copyright">
                <p>All rights reserved. Copyright © 2021</p>
            </div>
        </div>
    </div>
</div>




@endsection