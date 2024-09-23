  
 @extends('index')   
 @section('content') 
    <!-- page title area start -->
                <div class="page-title-area">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="breadcrumbs-area clearfix">
                                <h4 class="page-title pull-left">Approval</h4>
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
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Approve Actual Delivery</h4>
                                <div class="data-tables">
                                    <table id="dataTable_Rec_Approval" class="table table-striped table-bordered table-hover">
										@csrf	
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">SO NO</th>
                                                <th scope="col">Received Date</th>
                                                <th scope="col">Added by</th>
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
                                                <td>{{ $row->SONumber }}</td>
                                                <td>{{ $row->ReceivingDate }}</td>
                                                <td>{{ $row->Firstname }} {{ $row->Surname }}</td>
                                                <td>{{ $row->Total_Item }}</td>
                                                <td>{{ $row->Status }}</td>
                                                <td>
                                                     <a href="/approval-list/{{ $row->Id }}" class="btn btn-rounded btn-info mb-3"><i class="fa fa-folder-open"></i></a>
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