  
 @extends('index')   
 @section('content') 
    <!-- page title area start -->
                <div class="page-title-area">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="breadcrumbs-area clearfix">
                                <h4 class="page-title pull-left">Item List</h4>
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
                                <h5 class="header-title">Add Item - <span style="font-weight: bold; color: red;">{{$SONumber}}</span></h5>
                                <form action="/store-details" method = "POST" class="form" id="InputDetails">
                               @CSRF
                               <input type="hidden" value="{{ $paramId }}" name="paramId">
                               <input type="hidden"  id="ItemCodeH" name="ItemCodeH">
                                    <div class="form-group">
                                        <label for="Receiving Date">Receiving Date</label>
                                        <input type="date" class="form-control form-control-sm input-rounded " id="Receiving Date" name="ReceivingDate" value="{{ date('Y-m-d') }}">
                                    </div>
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
                                   
                                    <div class="form-group">
                                        <label for="REC_QTY">Actual Quantity</label>
                                        <input type="number" class="form-control form-control-sm input-rounded" id="REC_QTY" name="REC_QTY">
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="Discrepancy">Discrepancy</label>
                                        <input type="number" class="form-control form-control-sm input-rounded" id="Discrepancy" name="Discrepancy" disabled>
                                    </div> -->
                                    <div class="form-group">
                                        <label for="Barcode">Barcode</label>
                                        <input type="number" class="form-control form-control-sm input-rounded" id="Barcode" name="Barcode">
                                    </div>
                                    <div class="form-group">
                                        <label for="Receiving Date">Expiration Date</label>
                                        <input type="date" class="form-control form-control-sm input-rounded " id="ExpirationDate" name="ExpirationDate">
                                    </div>
                                    <div class="form-group">
                                        <label for="Remarks">Remarks</label>
                                        <textarea class="form-control form-control-sm" rows="3" id="Remarks" name="Remarks"></textarea> 
                                    </div>
                                    <button type="submit" class="btn btn-rounded btn-info mb-3">Submit</button>
                                    <!-- <a href="" class="btn btn-rounded btn-info mb-3"><i class="fa fa-edit"></i></a> </td> -->
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <!-- data table start -->
                        <div class="card">
                            <div class="card-body">
                                <!-- Large modal start -->
                                <div class="col-lg-6 mt-5">
                                    <div class="card">
                                        <div class="modal fade" id="addExpModal" tabindex="-1" role="dialog" aria-labelledby="addExpModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Add Expiration Details</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                    </div>
                                                    <form action="/store-expiry" method = "POST" class="form">
                                                        @CSRF
                                                        <div class="modal-body">
                                                            <div class="form-group row">
                                                                <label class="col-4 col-form-label">Item</label>
                                                                <div class="col-8">
                                                                    <input class="form-control" type="text" id="inventoryNameInput" name="inventoryname" disabled />
                                                                    <input type="hidden" id="transactionIdInput" name="transactionId">
                                                                    <input type="hidden" id="itemcodeIdInput" name="itemCode">
                                                                    <input type="hidden" id="inventoryNameInput" name="inventoryname">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="totItem-input" class="col-4 col-form-label">Received Qty</label>
                                                                <div class="col-8">
                                                                    <input class="form-control" type="number" value="0" id="REC_Qty" name ="REC_Qty" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                 <label for="totItem-input" class="col-4 col-form-label"></label>

                                                                <div class="custom-control custom-checkbox">
                                                                  <input type="checkbox" checked="" class="custom-control-input" id="customCheck1">
                                                                  <label class="custom-control-label" for="customCheck1">wo Expiration Date</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="totItem-input" class="col-4 col-form-label">Expiration Date</label>
                                                                <div class="col-8">
                                                                    <input class="form-control" type="date" value="0" id="Expiration_date" name ="Expiration_date" />
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

                                <h4 class="header-title">List</h4>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm">Please see the delivery details before receiving the items:</span>
                                <div class="data-tables table-responsive">
                                    <table id="dataTable_details" class="table table-striped table-bordered table-hover">
                                        @csrf	
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Receiving Date</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Item Code</th>
                                                <th scope="col">UOM</th>
                                                <th scope="col">BarCode</th>
                                                <th scope="col">REC Quantity</th>
                                                <th scope="col">ExpirationDate</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Remarks</th>
                                                <!-- <th scope="col">Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>    
                                                @forelse ($details as $detail)
                                                <tr>
                                                <td>{{ $detail->TransactionID }}</td>
                                                <td>{{ $detail->ReceivingDate }}</td>
                                                <td>{{ $detail->InventoryName }}</td>
                                                <td>{{ $detail->ItemCode }}</td>
                                                <td>{{ $detail->UOM_Desc }}</td>
                                                <td>{{ $detail->Barcode }}</td>
                                                <td>{{ $detail->REC_QTY }}</td>
                                                <td>{{ $detail->ExpirationDate }}</td>
                                                <td>{{ $detail->Status }}</td>
                                                <td>{{ $detail->Remarks }}</td>

                                                <!-- <td> -->
                                                    <!-- <button id="fetchDataButton" class="btn btn-rounded btn-info mb-3 edit-button" data-transaction-id="{{ $detail->TransactionID }}"><i class="fa fa-edit"></i></button> -->
                                                    <!-- <button id="addExpiry" class="btn btn-rounded btn-info mb-3 add-button" data-transaction-id="{{ $detail->TransactionID }}" ><i class="fa fa-plus"></i></button> -->
                                                    <!-- <button id="addExpiry" class="btn btn-rounded btn-info mb-3 add-button" data-transaction-id="{{ $detail->TransactionID }}" data-itemcode-id="{{ $detail->ItemCode }}" data-inventoryname-id="{{ $detail->InventoryName }}" data-toggle="modal" data-target="#addExpModal"><i class="fa fa-plus"></i></button> -->
                                                    <!-- <a href="/receiving-list/{{ $detail->TransactionID }}/edit" class="btn btn-rounded btn-info mb-3"><i class="fa fa-edit"></i></a> </td> -->
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

<script type="text/javascript">
    const productSelect = document.getElementById('product-select');
    const inventoryIdInput  = document.getElementById('ItemCode');
    const ItemCodeHInput  = document.getElementById('ItemCodeH');
    const UOMInput  = document.getElementById('UOM');

    productSelect.addEventListener('change', () => {
    const selectedProductId = productSelect.value;
    
    fetch(`/get-itemcode/${selectedProductId}`)
        .then(response => response.json())
        .then(data => {
            inventoryIdInput.value = data.InventoryID;
            ItemCodeHInput.value = data.InventoryID;
            UOMInput.value = data.Packaging;
        })
        .catch(error => {
            console.error('Error fetching inventory name:', error);
        });
});

$(document).ready(function() {
        $('#fetchDataButton').click(function() {
            alert('hello');
        var transactionId = $(this).data('transaction-id');
        // Make an AJAX request to fetch the details of the transaction
        $.ajax({
            url: '/get-transaction-details/' + transactionId, // Replace with the correct URL
            type: 'GET',
            success: function(data) {
                // Populate the form fields with the fetched data
                $('#ReceivingDate').val(data.ReceivingDate);
                $('#product-select').val(data.productId);
                $('#ItemCode').val(data.ItemCode);
                $('#ItemCodeH').val(data.ItemCode);
                $('#UOM').val(data.UOM);
                $('#PO_QTY').val(data.PO_QTY);
                $('#REC_QTY').val(data.REC_QTY);
                $('#Discrepancy').val(data.Discrepancy);
                $('#Barcode').val(data.Barcode);
                $('#Remarks').val(data.Remarks);

                // Show the form
                $('#InputDetails').show();
            },
            error: function(error) {
                console.error('Error fetching transaction details:', error);
            }
        });
    });

  

});


</script>

@endsection