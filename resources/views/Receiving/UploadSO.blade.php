  
 @extends('index')   
 @section('content') 
    <!-- page title area start -->
                <div class="page-title-area">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="breadcrumbs-area clearfix">
                                <h4 class="page-title pull-left">Upload SO</h4>
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
                <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="header-title">Upload File</h5>
                                <form action="/upload-soFile" method = "POST" class="form" enctype="multipart/form-data">
                                @CSRF
                               <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile04" name="excel_file" id="file">
                                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="submit">Upload</button>
                                                </div>
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
                                <h4 class="header-title">Upload List</h4>
                                <div class="data-tables table-responsive">
                                    <table id="dataTable_recUpload" class="table table-striped table-bordered table-hover">
                                        @csrf	
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th scope="col">File Name</th>
                                                <th scope="col">Sync Date</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>  
                                                <tr>
                                                <td>SOH-Main</td>
                                                <td>2024-09-17</td>
                                                <td>In-progress</td>
                                                <td>
                                                     <a href="/upload-list/1" class="btn btn-rounded btn-info mb-3"><i class="fa fa-folder-open"></i></a>
                                                </td>
                                                <tr>
                                                    <td colspan="6">No data found.</td>
                                                </tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            <!-- </div> -->
            <!-- Bootstrap Grid end -->
            </div>
        </div>
    </div>
            
    <!-- main content area end -->



@endsection