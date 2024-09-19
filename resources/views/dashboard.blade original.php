  
 @extends('index')   
 @section('content') 
    <!-- page title area start -->
                <div class="page-title-area">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="breadcrumbs-area clearfix">
                                <h4 class="page-title pull-left">Dashboard</h4>
                                <ul class="breadcrumbs pull-left">
                                    <li><a href="">Home</a></li>
                                    <li><span>Dashboard</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
    <!-- page title area end -->

            <div class="main-content-inner">
                        <!-- sales report area start -->
                        <div class="sales-report-area sales-style-two">
                            <div class="row">
                                <div class="col-xl-3 col-ml-3 col-md-6 mt-5">
                                    <div class="single-report">
                                        <div class="s-sale-inner pt--30 mb-3">
                                            <div class="s-report-title d-flex justify-content-between">
                                                <h4 class="header-title mb-0">Product Sold</h4>
                                                <select class="custome-select border-0 pr-3">
                                                    <option selected="">Last 7 Days</option>
                                                    <option value="0">Last 7 Days</option>
                                                </select>
                                            </div>
                                        </div>
                                        <canvas id="coin_sales4" height="100"></canvas>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-ml-3 col-md-6 mt-5">
                                    <div class="single-report">
                                        <div class="s-sale-inner pt--30 mb-3">
                                            <div class="s-report-title d-flex justify-content-between">
                                                <h4 class="header-title mb-0">Gross Profit</h4>
                                                <select class="custome-select border-0 pr-3">
                                                    <option selected="">Last 7 Days</option>
                                                    <option value="0">Last 7 Days</option>
                                                </select>
                                            </div>
                                        </div>
                                        <canvas id="coin_sales5" height="100"></canvas>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-ml-3 col-md-6  mt-5">
                                    <div class="single-report">
                                        <div class="s-sale-inner pt--30 mb-3">
                                            <div class="s-report-title d-flex justify-content-between">
                                                <h4 class="header-title mb-0">Orders</h4>
                                                <select class="custome-select border-0 pr-3">
                                                    <option selected="">Last 7 Days</option>
                                                    <option value="0">Last 7 Days</option>
                                                </select>
                                            </div>
                                        </div>
                                        <canvas id="coin_sales6" height="100"></canvas>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-ml-3 col-md-6 mt-5">
                                    <div class="single-report">
                                        <div class="s-sale-inner pt--30 mb-3">
                                            <div class="s-report-title d-flex justify-content-between">
                                                <h4 class="header-title mb-0">New Coustomers</h4>
                                                <select class="custome-select border-0 pr-3">
                                                    <option selected="">Last 7 Days</option>
                                                    <option value="0">Last 7 Days</option>
                                                </select>
                                            </div>
                                        </div>
                                        <canvas id="coin_sales7" height="100"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- sales report area end -->
                        <!-- visitor graph area start -->
                        <div class="card mt-5">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-5">
                                    <h4 class="header-title mb-0">Visitor Graph</h4>
                                    <select class="custome-select border-0 pr-3">
                                        <option selected="">Last 7 Days</option>
                                        <option value="0">Last 7 Days</option>
                                    </select>
                                </div>
                                <div id="visitor_graph"></div>
                            </div>
                        </div>
                        <!-- visitor graph area end -->
                    </div>
                </div>
                <!-- main content area end -->
@endsection