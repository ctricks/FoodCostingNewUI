  
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
                    
                    <div class="col-md-12">
                        <!-- data table start -->
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">List</h4>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm">Please see the delivery details before receiving the items:</span>
                                <div class="data-tables table-responsive">
                                   <table id="dataTable_Rec_Approval_list" class="table table-striped table-bordered table-hover">

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
                                                <th scope="col">Status</th>
                                                <th scope="col">Remarks</th>
                                                <th scope="col">Action</th>
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
                                                <td>{{ $detail->Status }}</td>
                                                <td>{{ $detail->Remarks }}</td>

                                                <td>
                                                     <button class="btn btn-rounded btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                           For Approval
                                                        </button>
                                                        <div class="dropdown-menu">
                                                        @csrf
                                                            <li><a class="dropdown-item"  data-status="1" data-value="{{ $detail->TransactionID  }}">Approved</a></li>
                                                            <li><a class="dropdown-item"  data-status="2" data-value="{{ $detail->TransactionID  }}">Disapproved</a></li>
                                                        </div>
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

<script>
    const productSelect = document.getElementById('product-select');
    const inventoryIdInput  = document.getElementById('ItemCode');
    const UOMInput  = document.getElementById('UOM');

    productSelect.addEventListener('change', () => {
    const selectedProductId = productSelect.value;
    
    fetch(`/get-itemcode/${selectedProductId}`)
        .then(response => response.json())
        .then(data => {
            inventoryIdInput.value = data.InventoryID;
            UOMInput.value = data.Packaging;
        })
        .catch(error => {
            console.error('Error fetching inventory name:', error);
        });
});

$(document).ready(function() {
        $('#fetchDataButton').click(function() {
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