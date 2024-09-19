<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Eyelix - FoodCosting</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="{{asset('image/png')}}" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.min.css')}}">
     <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- <link rel="stylesheet" href="{{asset('assets/css/export.css')}}" type="text/css" media="all" /> -->
    <!-- others css -->
    <link rel="stylesheet" href="{{asset('assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/default-css.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>

    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
   
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <h1 style="color: white;">EYELIX</h1>
                    <!-- <a href=""><img src="{{asset('assets/images/icon/logo.png')}}" alt="logo"></a> -->
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                        <li><a href="/dashboard" aria-expanded="true"><i class="ti-dashboard"></i> <span>dashboard</span></a></li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout-sidebar-left"></i><span>Receiving
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="/createSO">SO</a></li>
                                    <li><a href="/approvalSO">Approval</a></li>
                                    <li><a href="/uploadSO">SO Upload</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-pie-chart"></i><span>Sales</span></a>
                                <ul class="collapse">
                                    <li><a href="">Upload</a></li>
                                    <li><a href="">Approval</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-palette"></i><span>Inventory</span></a>
                                <ul class="collapse">
                                    <li><a href="/status-details">Status/Details</a></li>
                                    <li><a href="/">Item List (w/ Cost)</a></li>
                                    <li><a href="/">Item List (w/o Cost)</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-slice"></i><span>Reports</span></a>
                                <ul class="collapse">
                                    <li><a href="/"></a></li>
                                    <li><a href="/"></a></li>
                                    <li><a href="/"></a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-table"></i>
                                    <span>Reference</span></a>
                                <ul class="collapse">
                                    <li><a href="">Brand Lists</a></li>
                                    <li><a href="">Category Lists</a></li>
                                    <li><a href="">Sub-Category Lists</a></li>
                                    <li><a href="">UOM Lists</a></li>
                                    <li><a href="">Store Lists</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layers-alt"></i> <span>User</span></a>
                                <ul class="collapse">
                                    <li><a href=""></a></li>
                                    <li><a href=""></a></li>
                                    <li><a href=""></a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            <form action="#">
                                <!-- <input type="text" name="search" placeholder="Search..." required> -->
                                <!-- <i class="ti-search"></i> -->
                            </form>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            <li class="user-profile pull-right">
                                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Admin<i class="fa fa-angle-down"></i></h4>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Log Out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            @yield('content')
            
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->

    <!-- jquery latest version -->
    <script src="{{asset('assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slicknav.min.js')}}"></script>

    <!-- all line chart activation -->
    <script src="{{asset('assets/js/line-chart.js')}}"></script>
    <!-- all bar chart activation -->
    <script src="{{asset('assets/js/bar-chart.js')}}"></script>
    <!-- all pie chart -->
    <script src="{{asset('assets/js/pie-chart.js')}}"></script>
    <!-- others plugins -->

     <!-- start chart js -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>

    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>

  <!-- Start datatable js -->
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script> -->
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js">
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>   
</script> 
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                responsive: true
            });

            $('#dataTable_details').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                responsive: true
            });

            $('#dataTable_recUpload').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                responsive: true
            });

            $('#dataTable_details').on('click', 'td', function() {
                var cellIndex = $(this).data('_DT_CellIndex');
                console.log('Cell index:', cellIndex);
            });

            $('#dataTable_Rec_Approval').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                responsive: true
            });

            $('#dataTable_Rec_Approval_list').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                responsive: true
            });
            
            $('#dataTable_onhand').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                responsive: true
            });
            $('#dataTable_expiry').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                info: true,
                responsive: true
            });
            

            
        });
    </script>  

</body>
<script>
            $('.dropdown-item').click(function() {
                var status = $(this).data('status');
                var id = $(this).data('value');

                $.ajax({
                    url: '/update-status-rec',
                    type: 'PUT',
                    data: {
                        status: status,
                        id: id,
                       _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
					    alert('Successfully Approved!');
                        console.log(response);
                        location.reload();
                    },
                    error: function(error) {
                        console.error(error);
                    }
                });
            });
</script>
<script type="text/javascript">
    $('.add-button').click(function() {
        var transactionId = $(this).data('transaction-id');
        var itemCodeid = $(this).data('itemcode-id');
        var inventoryname = $(this).data('inventoryname-id');

        // $('#addExpModal').modal('show');
        $('#transactionIdInput').val(transactionId);
        $('#itemcodeIdInput').val(itemCodeid);
        $('#inventoryNameInput').val(inventoryname);
    });
</script>
<script>
    $('.accordion-toggle').click(function() {
        var transactionId = $(this).data('id');
        $(this).siblings('.accordion-collapse').find('tr').hide();
        $('#collapse' + transactionId).find('tr').show();
        loadTable(transactionId);
    });

    function loadTable(transactionId) {
        $.ajax({
            url: '/get-table-expiry/' + transactionId,
            type: 'GET',
            success: function(data) {
                // alert(data.REC_Qty);
                // $('#table' + transactionId).html(data);
                if (Array.isArray(data) && data.length > 0) {
            var table = $('#table');
            table.empty();

            data.forEach(function(item) {
                var row = $('<tr></tr>');
                row.append('<td>' + item.REC_Qty + '</td>');
                row.append('<td>' + item.Expiration_date + '</td>');
                table.append(row);
            });
        } else {
            console.error('Data is not in the expected format:', data);
        }
    },
            error: function(error) {
                console.error('Error fetching table data:', error);
            }
        });
    }
</script>
<script type="text/javascript">
    const productSelect = document.getElementById('product-select');
    const inventoryIdInput = document.getElementById('ItemCode');
    const ItemCodeHInput = document.getElementById('ItemCodeH');
    const UOMInput = document.getElementById('UOM');
    const dataTableOnhandBody = $('#dataTable_onhand tbody'); // Target element for on-hand data
    const dataTableExpiryBody = $('#dataTable_expiry tbody'); // Target element for expiry data

    productSelect.addEventListener('change', () => {
     const selectedProductId = productSelect.value;

    fetch(`/get-itemcodeInv/${selectedProductId}`)
        .then(response => response.json())
        .then(combinedResponse => {
            if (!combinedResponse) {
                console.error('Error fetching item data.');
                return; // Exit if no data found
            }

            const selectData = combinedResponse.data;
            const selectItemInventory = combinedResponse.iteminventory;
            const selectItemExpiry = combinedResponse.itemExpiry;

            inventoryIdInput.value = selectData.InventoryID;
            ItemCodeHInput.value = selectData.InventoryID;
            UOMInput.value = selectData.Packaging;

            // Clear existing rows for both tables
            dataTableOnhandBody.empty();
            dataTableExpiryBody.empty();

            populateInventoryTable(selectItemInventory, dataTableOnhandBody);
            populateExpiryTable(selectItemExpiry, dataTableExpiryBody);
            })
            .catch(error => {
            console.error('Error fetching inventory name:', error);
            });
     });                         

        function populateInventoryTable(data, targetBody) {
        $.each(data, function (index, item) {
            const row = $('<tr></tr>');
            row.append('<td>' + item.SOH + '</td>');
            targetBody.append(row);
        });
        }

        function populateExpiryTable(data, targetBody) {
        $.each(data, function (index, item) {
            const row = $('<tr></tr>');
            row.append('<td>' + item.PO_QTY + '</td>');
            row.append('<td>' + item.ExpirationDate + '</td>');
            targetBody.append(row);
        });
        }
</script>
<script>
      const soQuantityInput = document.getElementById('PO_QTY');
    const recordQuantityInput = document.getElementById('REC_QTY');
    const discrepancyInput = document.getElementById('Discrepancy');

    soQuantityInput.addEventListener('input', calculateDiscrepancy);
    recordQuantityInput.addEventListener('input', calculateDiscrepancy);

    function calculateDiscrepancy() {
        const soQuantity = parseInt(soQuantityInput.value);
        const recordQuantity = parseInt(recordQuantityInput.value);
        const discrepancy = soQuantity - recordQuantity;
        discrepancyInput.value = discrepancy;
    }
</script>
</html>
