  
 @extends('index')   
 @section('content') 
    <!-- page title area start -->
                <div class="page-title-area">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="breadcrumbs-area clearfix">
                                <h4 class="page-title pull-left">Status-Details</h4>
                                <ul class="breadcrumbs pull-left">
                                    <li><a href="">Inventory</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
    <!-- page title area end -->
    <div class="main-content-inner">
        <div class="row">
            <!-- Bootstrap Grid start -->
            <div class="col-12 mt-5">
            <!-- <div class="header-title">Add</div> -->
                <!-- Start 6 column grid system -->
                <div class="row">
                <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="header-title">Select Item</h5>
                                <form action="/store-details" method = "POST" class="form" id="InputDetails">
                               @CSRF
                               <input type="hidden"  id="ItemCodeH" name="ItemCodeH">
                                    <div class="form-group">
                                        <label class="col-form-label">Item</label>
                                        <select class="form-control form-control-sm input-rounded" id="product-select">
                                            @forelse ($productList as $productLists)
                                            <option value="{{ $productLists->ID }}">{{ $productLists->InventoryName }}</option>
                                            @empty
                                            <option>No data found.</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ItemCode">Item Code</label>
                                        <input type="text" class="form-control form-control-sm input-rounded" id="ItemCode" name="ItemCode" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="UOM">UOM</label>
                                        <input type="text" class="form-control form-control-sm input-rounded" id="UOM" name="UOM" disabled>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- separator -->
                    <div class="col-md-8">
                        <!-- data table start -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Stock On Hand</h4>
                                <div class="data-tables table-responsive">
                                    <table id="dataTable_onhand" class="table table-striped table-bordered table-hover">
                                        @csrf	
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th scope="col">OnHand QTY</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>    
                                                @forelse ($iteminventory as $itemInv)
                                                <tr>
                                                <td>{{ $itemInv->OnHandQuantity }}</td>
                                                @empty
                                                <tr>
                                                    <td colspan="6">No data found.</td>
                                                </tr>
                                                @endforelse
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- data table end --> 
                         <!-- data table start -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Expiration Date</h4>
                                <div class="data-tables table-responsive">
                                    <table id="dataTable_expiry" class="table table-striped table-bordered table-hover">
                                        @csrf	
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th scope="col">Record QTY</th>
                                                <th scope="col">Expiration Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>    
                                                @forelse ($itemExpiry as $itemInv)
                                                <tr>
                                                <td>{{ $itemInv->PO_QTY }}</td>
                                                <td>{{ $itemInv->ExpirationDate }}</td>
                                                @empty
                                                <tr>
                                                    <td colspan="6">No data found.</td>
                                                </tr>
                                                @endforelse
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- data table end --> 
                    </div>
                    <!-- separator -->
                        <!-- data table start -->
                        
                        <!-- data table end --> 
                     <!-- end separator -->
                </div>
            <!-- </div> -->
            <!-- Bootstrap Grid end -->
            </div>
        </div>
    </div>
            
    <!-- main content area end -->



@endsection