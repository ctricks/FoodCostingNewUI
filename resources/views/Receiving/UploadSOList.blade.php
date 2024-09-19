  
 @extends('index')   
 @section('content') 
    <!-- page title area start -->
                <div class="page-title-area">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="breadcrumbs-area clearfix">
                                <h4 class="page-title pull-left">Uploaded List</h4>
                                <ul class="breadcrumbs pull-left">
                                    <li><a href="">Receiving</a></li>
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
                    
                    <div class="col-md-12">
                        <!-- data table start -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Uploaded List</h4>
                                <div class="data-tables table-responsive">
                                   <table id="dataTable_Rec_Approval_list" class="table table-striped table-bordered table-hover">

                                        @csrf	
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Item Code</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @forelse ($so_upload_table as $list)
                                                <tr>
                                                <td>{{ $list->ID }}</td>
                                                <td>{{ $list->CATEGORY }}</td>
                                                <td>{{ $list->ITEMCODE }}</td>
                                                <td>{{ $list->QTY }}</td>
                                                <td>on-process</td>
                                                <td>
                                                     <button class="btn btn-rounded btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                           For Approval
                                                        </button>
                                                        <div class="dropdown-menu">
                                                        @csrf
                                                            <li><a class="dropdown-item"  data-status="1" data-value="{{ $list->ID  }}">Approved</a></li>
                                                            <li><a class="dropdown-item"  data-status="2" data-value="{{ $list->ID  }}">Disapproved</a></li>
                                                        </div>
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
                        <!-- data table end --> 
                    </div>
                </div>
            <!-- </div> -->
            <!-- Bootstrap Grid end -->
            </div>
        </div>
    </div>
            
    <!-- main content area end -->


   
@endsection