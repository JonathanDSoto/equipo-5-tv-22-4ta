<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <?php include "../layouts/head.template.php"; ?>

    <!-- nouisliderribute css -->
    <link rel="stylesheet" href="../public/libs/nouislider/nouislider.min.css">

    <!-- gridjs css -->
    <link rel="stylesheet" href="../public/libs/gridjs/theme/mermaid.min.css">

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?php include "../layouts/nav.template.php"; ?>

        <!-- ========== App Menu ========== -->
        <?php include "../layouts/sidebar.template.php"; ?>

        <div class="vertical-overlay"></div>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Orders</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                        <li class="breadcrumb-item active">Orders</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card" id="orderList"><div>
                                <div class="card-header  border-0">
                                    <div class="d-flex align-items-center">
                                        <h5 class="card-title mb-0 flex-grow-1">Order History</h5>
                                        <div class="flex-shrink-0">
                                            <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Create Order</button>
                                
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body border border-dashed border-end-0 border-start-0">
                                    <form>
                                        <div class="row g-3">
                                            <div class="col-xxl-5 col-sm-6">
                                                <div class="search-box">
                                                    <input type="text" class="form-control search" placeholder="Search for order ID, customer, order status or something...">
                                                    <i class="ri-search-line search-icon"></i>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xxl-2 col-sm-4">
                                                <div>
                                                    <select class="form-control" data-choices data-choices-search-false name="choices-single-default" id="idStatus">
                                                        <option value="">Status</option>
                                                        <option value="all" selected>All</option>
                                                        <option value="Pending">Pending</option>
                                                        <option value="Inprogress">Inprogress</option>
                                                        <option value="Cancelled">Cancelled</option>
                                                        <option value="Pickups">Pickups</option>
                                                        <option value="Returns">Returns</option>
                                                        <option value="Delivered">Delivered</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                                <div class="card-body pt-0">
                                    <div>
                                        <ul class="nav nav-tabs nav-tabs-custom nav-success mb-3" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active All py-3" data-bs-toggle="tab" id="All" href="#home1" role="tab" aria-selected="true">
                                                    <i class="ri-store-2-fill me-1 align-bottom"></i> All Orders
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="table-responsive table-card mb-1">
                                          <table class="table table-nowrap align-middle" id="orderTable">
                                            <thead class="text-muted table-light">
                                                <tr class="text-uppercase">
                                                    <th scope="col" style="width: 25px;">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                        </div>
                                                    </th>
                                                    <th class="sort" data-sort="id">Folio</th>
                                                    <th class="sort" data-sort="customer_name">Client</th>
                                                    <th class="sort" data-sort="product_name">Product</th>
                                                    <th class="sort" data-sort="amount">Amount</th>
                                                    <th class="sort" data-sort="payment">Payment Method</th>
                                                    <th class="sort" data-sort="status">Delivery Status</th>
                                                    <th class="sort" data-sort="city">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list form-check-all">
                                                <tr>
                                                    <th scope="row">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="checkAll" value="option1">
                                                        </div>
                                                    </th>
                                                    <td class="id"><a href="ordenes.details.php" class="fw-medium link-primary">#VZ2101</a></td>
                                                    <td class="customer_name">Frank Hook</td>
                                                    <td class="product_name">Puma Tshirt</td>
                                                    <td class="amount">$654</td>
                                                    <td class="payment">Mastercard</td>
                                                    <td class="status"><span class="badge badge-soft-warning text-uppercase">Pending</span>
                                                    </td>
                                                    <td>
                                                        <ul class="list-inline hstack gap-2 mb-0">
                                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="View">
                                                                <a href="../products/ordenes.details.php" class="text-primary d-inline-block">
                                                                    <i class="ri-eye-fill fs-16"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                                <a href="#showModal" data-bs-toggle="modal" class="text-primary d-inline-block edit-item-btn">
                                                                    <i class="ri-pencil-fill fs-16"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                                                <a class="text-danger d-inline-block remove-item-btn" data-bs-toggle="modal" href="#deleteOrder">
                                                                    <i class="ri-delete-bin-5-fill fs-16"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </tbody>

                                          </table>
                                        </div>
                                    
                                    </div>
                                    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light p-3">
                                                    <h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                </div>
                                                <form action="#">
                                                    <div class="modal-body">
                                                        <input type="hidden" id="id-field" />

                                                        <div class="mb-3" id="modal-id">
                                                            <label for="orderId" class="form-label">ID</label>
                                                            <input type="text" id="orderId" class="form-control" placeholder="ID" readonly />
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="customername-field" class="form-label">Customer Name</label>
                                                            <input type="text" id="customername-field" class="form-control" placeholder="Enter name" required />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="date-field" class="form-label">Order Date</label>
                                                            <input type="date" id="date-field" class="form-control" data-provider="flatpickr" data-date-format="d M, Y" data-enable-time required placeholder="Select date" />
                                                        </div>

                                                        <div class="row gy-4 mb-3">
                                                            <div class="col-md-6">
                                                                <div>
                                                                    <label for="amount-field" class="form-label">Amount</label>
                                                                    <input type="text" id="amount-field" class="form-control" placeholder="Total amount" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div>
                                                                    <label for="payment-field" class="form-label">Payment Method</label>
                                                                    <select class="form-control" data-trigger name="payment-method" id="payment-field">
                                                                        <option value="">Payment Method</option>
                                                                        <option value="Mastercard">Mastercard</option>
                                                                        <option value="Visa">Visa</option>
                                                                        <option value="COD">COD</option>
                                                                        <option value="Paypal">Paypal</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <label for="delivered-status" class="form-label">Delivery Status</label>
                                                            <select class="form-control" data-trigger name="delivered-status" id="delivered-status">
                                                                <option value="">Delivery Status</option>
                                                                <option value="Pending">Pending</option>
                                                                <option value="Inprogress">Inprogress</option>
                                                                <option value="Cancelled">Cancelled</option>
                                                                <option value="Pickups">Pickups</option>
                                                                <option value="Delivered">Delivered</option>
                                                                <option value="Returns">Returns</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success" id="add-btn">Add Order</button>
                                                            <button type="button" class="btn btn-success" id="edit-btn">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body p-5 text-center">
                                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                                                    <div class="mt-4 text-center">
                                                        <h4>You are about to delete a order ?</h4>
                                                        <p class="text-muted fs-15 mb-4">Deleting your order will remove all of your information from our database.</p>
                                                        <div class="hstack gap-2 justify-content-center remove">
                                                            <button class="btn btn-link link-success fw-medium text-decoration-none" id="deleteRecord-close" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</button>
                                                            <button class="btn btn-danger" id="delete-record">Yes, Delete It</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>
            
            
           
        </div>
        <?php include "../layouts/footer.template.php"; ?>
    </div>

    <?php include "../layouts/scripts.template.php"; ?>
   
    <script src="../public/js/pages/ecommerce-product-create.init.js"></script>
    <script src="../public/libs/list.js/list.min.js"></script>
    <script src="../public/libs/list.pagination.js/list.pagination.min.js"></script>
    <script src="..public/js/pages/ecommerce-order.init.js"></script>
    <script src="../public/libs/sweetalert2/sweetalert2.min.js"></script>
  
    
   


</body>


</html>