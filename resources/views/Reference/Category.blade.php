  
 @extends('index')   
 @section('content') 
    <!-- page title area start -->
                <div class="page-title-area">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="breadcrumbs-area clearfix">
                                <h4 class="page-title pull-left">Category</h4>
                                <ul class="breadcrumbs pull-left">
                                    <li><a href="">Reference</a></li>
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
                            <div class="modal fade bd-example-modal-lg" id="AddModal">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <!-- <h5 class="modal-title">{{ isset($editItemId) ? 'Edit Category' : 'Create Category' }}</h5> -->
                                        <h5 class="modal-title">Create Category</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                       
                                        <!-- <form action="{{ isset($editItemId) ? '/update-category' : '/store-category' }}" method="POST" class="form"> -->
                                        <form action="/store-category" method = "POST" class="form">
										    @csrf	
                                            <input class="form-control" type="text" id="editItemId" name="editItemId">
                                            <!-- <input class="form-control" type="text" id="editItemId" name="editItemId" value="{{ isset($editItemId) ? $editItemId : '' }}"> -->

                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label for="totItem-input" class="col-4 col-form-label">Module Name</label>
                                                    <div class="col-8   ">

                                                    <input class="form-control" type="text" value="Category" id="" name ="" disabled/>
                                                    <input class="form-control" type="hidden" value="Category"  name ="Module"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="totItem-input" class="col-4 col-form-label">Setting Name</label>
                                                    <div class="col-8">
                                                        <input class="form-control" type="text"  name ="SettingName" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="totItem-input" class="col-4 col-form-label">Description</label>
                                                    <div class="col-8">
                                                        <input class="form-control" type="text"   name ="Description" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="totItem-input" class="col-4 col-form-label">Value</label>
                                                    <div class="col-8">
                                                        <input class="form-control" type="text"   name ="Value" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <!-- <button type="submit" class="btn btn-primary">{{ isset($editItemId) ? 'Update' : 'Create' }}</button> -->
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade bd-example-modal-lg" id="EditModal">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title">Update Category</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <form action="\update-category" method="POST">
                                        @csrf
                                        <input class="form-control" type="hidden" id="editItemIdE" name="editItemId" >

                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label for="totItem-input" class="col-4 col-form-label">Module Name</label>
                                                    <div class="col-8">

                                                    <input class="form-control" type="text" value="Category" id="ModuleE" name ="" disabled/>
                                                    <input class="form-control" type="hidden" value="Category" id="ModuleE" name ="Module"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="totItem-input" class="col-4 col-form-label">Setting Name</label>
                                                    <div class="col-8">
                                                        <input class="form-control" type="text"  id="SettingNameE" name ="SettingName" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="totItem-input" class="col-4 col-form-label">Description</label>
                                                    <div class="col-8">
                                                        <input class="form-control" type="text"  id="DescriptionE" name ="Description" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="totItem-input" class="col-4 col-form-label">Value</label>
                                                    <div class="col-8">
                                                        <input class="form-control" type="text"  id="ValueE" name ="Value" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
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
                                <h4 class="header-title">Category List</h4>
                                    <button type="button" class="btn btn-rounded btn-info mb-3" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i></button>
                                <div class="data-tables">
                                    <table id="category_dTable" class="table table-striped table-bordered table-hover">
										@csrf	
                                        <thead class="bg-light text-capitalize">
                                             <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Module</th>
                                                <th scope="col">Setting Name</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Value</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data as $row)
                                                <tr>
                                                    <td>{{ $row->id }}</td>
                                                    <td>{{ $row->Module }}</td>
                                                    <td>{{ $row->SettingName }}</td>
                                                    <td>{{ $row->Value }}</td>
                                                    <td>{{ $row->Description }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-rounded btn-info mb-3 edit-button" data-toggle="modal" data-target="#EditModal" data-id="{{ $row->id }}" data-id2="{{ $row->Module }}" data-id3="{{ $row->SettingName }}" data-id4="{{ $row->Value }}" data-id5="{{ $row->Description }}"><i class="fa fa-edit"></i></button>
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