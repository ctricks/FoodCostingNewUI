  
 @extends('index')   
 @section('content') 
    <!-- page title area start -->
                <div class="page-title-area">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="breadcrumbs-area clearfix">
                                <h4 class="page-title pull-left">SO</h4>
                                <ul class="breadcrumbs pull-left">
                                    <li><a href="">Ordering</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
    <!-- page title area end -->
    <div class="main-content-inner">
                    <!-- Large modal start -->
                    <div class="col-lg-6 mt-5">
                        <div class="card">
                            <div class="modal fade bd-example-modal-lg">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Create SO Header</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <form action="/store-so" method = "POST" class="form">
										    @csrf	
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label class="col-4 col-form-label">Branch</label>
                                                    <div class="col-8">
                                                        <select class="form-control form-control-sm input-rounded" id="BranchId" name="BranchId">
                                                            @forelse ($branch as $branches)
                                                            <option value="{{ $branches->id }}">{{ $branches->Name }}</option>
                                                            @empty
                                                            <option>No data found.</option>
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="totItem-input" class="col-4 col-form-label">SO No.</label>
                                                    <div class="col-8">
                                                        <input class="form-control" type="text" value="0" id="SONumber" name ="SONumber" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="totItem-input" class="col-4 col-form-label">Total Item</label>
                                                    <div class="col-8">
                                                        <input class="form-control" type="number" value="0" id="totItem-input" name ="TotalItem" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="totItem-input" class="col-4 col-form-label">Total Quantity</label>
                                                    <div class="col-8">
                                                        <input class="form-control" type="number" value="0" id="totqty-input" name ="TOTALQUANTITY" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Large modal modal end -->


                <div class="row">
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Receiving Actual Delivery</h4>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm">Please see the delivery details before receiving the items:</span>
                                    <button type="button" class="btn btn-rounded btn-info mb-3" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i></button>
                                <div class="data-tables">
                                    <table id="dataTable" class="table table-striped table-bordered table-hover">
										@csrf	
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Branch</th>
                                                <th scope="col">SO NO</th>
                                                <th scope="col">Order Date</th>
                                                <th scope="col">SO Qty</th>
                                                <th scope="col">Total Items</th>
                                                <th scope="col">Receiving Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @forelse ($data as $row)
                                                <tr>
                                                <td>{{ $row->Id }}</td>
                                                <td>{{ $row->StoreName }}</td>
                                                <td>{{ $row->SONumber }}</td>
                                                <td>{{ $row->OrderDate }}</td>
                                                <td>{{ $row->Total_Item }}</td>
                                                <td>{{ $row->TOTALQUANTITY }}</td>
                                                <td>{{ $row->Status }}</td>
                                                <td>
                                                     <a href="/receiving-list/{{ $row->Id }}/{{ $row->TOTALQUANTITY }}/{{ $row->SONumber }}" class="btn btn-rounded btn-info mb-3"><i class="fa fa-folder-open"></i></a>
                                                </td>
                                                
                                                </tr>
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
                    </div>
                    <!-- data table end -->
                </div>
            </div>
        </div>
        <!-- main content area end -->

   
    
    
@endsection