<?php
    include "../app/ProductsController.php";
    include "../app/PresentationController.php";
    include "../app/UserController.php";

    $productController = new ProductsController();
    $products = $productController->getAllProducts();

    $presentationController = new PresentationController();

    $userController = new UserController();
    //$user = $UserController->getUser(1);
    //echo json_encode($user);
    //$presentation = $presentationController->getProductPresentation($products->id);
?>
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
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <?php include "../layouts/bread.template.php"; ?>
                    <!-- end page title -->

                    <div class="row">


                        <div class="col-xl-12 col-lg-12">
                            <div>
                                <div class="card">
                                    <div class="card-header border-0">
                                        <div class="row g-4">
                                            <div class="col-sm-auto">
                                                <div>
                                                    <a href="../products/addproduct.php" class="btn btn-success"
                                                        id="addproduct-btn"><i
                                                            class="ri-add-line align-bottom me-1"></i> Add Product</a>
                                                </div>
                                            </div>
                                            <div class="col-sm">
                                                <div class="d-flex justify-content-sm-end">
                                                    <div class="search-box ms-2">
                                                        <input type="text" class="form-control" id="searchProductList"
                                                            placeholder="Search Products...">
                                                        <i class="ri-search-line search-icon"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0"
                                                    role="tablist">

                                                    <li class="nav-item">
                                                        <a class="nav-link fw-semibold" data-bs-toggle="tab"
                                                            href="#productnav-published" role="tab">
                                                            Published <span
                                                                class="badge badge-soft-danger align-middle rounded-pill ms-1">5</span>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="col-auto">
                                                <div id="selection-element">
                                                    <div class="my-n1 d-flex align-items-center text-muted">
                                                        Select <div id="select-content"
                                                            class="text-body fw-semibold px-1"></div> Result <button
                                                            type="button"
                                                            class="btn btn-link link-danger p-0 ms-3 shadow-none"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#removeItemModal">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card header -->
                                    <div class="card-body">
                                        <div class="tab-pane" id="productnav-published" role="tabpanel">
                                            <div id="table-product-list-published" class="table-card gridjs-border-none">
                                                <div role="complementary" class="gridjs gridjs-container" style="width: 100%;">
                                                    <div class="gridjs-wrapper" style="height: auto;">
                                                        <table role="grid" class="gridjs-table" style="height: auto;">
                                                            <thead class="gridjs-thead">
                                                                <tr class="gridjs-tr">
                                                                    <th data-column-id="#" class="gridjs-th text-muted" style="width: 40px;">
                                                                        <div class="gridjs-th-content">#</div>
                                                                    </th>
                                                                    <th data-column-id="product" class="gridjs-th-sort text-muted" tabindex="0"
                                                                        style="width: 200px;">
                                                                        <div class="gridjs-th-content">Product</div>
                                                                    </th>
                                                                    <th data-column-id="stock" class="gridjs-th-sort text-muted" tabindex="0"
                                                                        style="width: 94px;">
                                                                        <div class="gridjs-th-content">Stock</div>
                                                                        <button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending"
                                                                            class="gridjs-sort gridjs-sort-neutral"></button>
                                                                    </th>
                                                                    <th data-column-id="price" class="gridjs-th-sort text-muted" tabindex="0"
                                                                        style="width: 80px;">
                                                                        <div class="gridjs-th-content">Price</div>
                                                                        <button tabindex="-1" aria-label="Sort column ascending" title="Sort column ascending"
                                                                            class="gridjs-sort gridjs-sort-neutral"></button>
                                                                    </th>
                                                                    <th data-column-id="action" class="gridjs-th text-muted" style="width: 100px;">
                                                                        <div class="gridjs-th-content">Action</div>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <?php if (isset($products) && count($products)): ?>
                                                            <?php foreach ($products as $product): ?>
                                                                
                                                            <thead class="gridjs-tbody">
                                                                <tr class="gridjs-tr">
                                                                    <td data-column-id="#" class="gridjs-td">
                                                                        <div class="gridjs-th-content">#<?= $product->id ?></div>
                                                                    </td>
                                                                    <td data-column-id="product" class="gridjs-td">
                                                                        <span>
                                                                            <div class="d-flex align-items-center">
                                                                                <div class="flex-shrink-0 me-3">
                                                                                    <div class="avatar-sm bg-light rounded p-1">
                                                                                        <img src="<?= $product->cover ?>" alt=""
                                                                                            class="img-fluid d-block">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="flex-grow-1">
                                                                                    <h5 class="fs-14 mb-1">
                                                                                        <a href="details.php?slug=<?= $product->slug ?>" class="text-dark"><?= $product->name ?></a>
                                                                                    </h5>
                                                                                    <p class="text-muted mb-0">
                                                                                        Category :
                                                                                        <span class="fw-medium"><?php foreach ($product->categories as $category): ?>
                                                                                            
                                                                                                <?= $category->name ?>
                                                                                            
                                                                                        <?php endforeach ?></span>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </span>
                                        
                                                                    </td>
                                                                    <td data-column-id="stock" class="gridjs-td"><?= $presentation->stock ?></td>
                                                                    <td data-column-id="price" class="gridjs-td">
                                                                        <span><?= $presentation->amount ?></span>
                                                                    </td>
                                        
                                                                    <td data-column-id="action" class="gridjs-td">
                                                                        <span>
                                                                            <div class="dropdown">
                                                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                                    <i class="ri-more-fill"></i>
                                                                                </button>
                                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                                    <li>
                                                                                        <a class="dropdown-item" href="details.php?slug=<?= $product->slug ?>">
                                                                                            <i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                                            View
                                                                                        </a>
                                        
                                                                                    </li>
                                                                                    <li>
                                                                                        <a class="dropdown-item" href="apps-ecommerce-product-details.html">
                                                                                            <i class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                                            Edit
                                                                                        </a>
                                                                                    </li>
                                                                                    <li class="dropdown-divider"></li>
                                                                                    <li>
                                                                                        <a type="submit" class="dropdown-item remove-list" href="#" data-id="undefined"
                                                                                            data-bs-toggle="modal" data-bs-target="#removeItemModal">
                                                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                                             Delete 
                                                                                        </a>


                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </span>
                                                                    </td>
                                        
                                                                </tr>
                                                            </thead>
                                                            <?php endforeach ?>
                                
                                                            <?php endif ?>
                                                        </table>
                                                    </div>
                                                    <div class="gridjs-footer">
                                                        <div class="gridjs-pagination">
                                                            <div class="gridjs-pagination">
                                                                <div role="status" aria-live="polite" class="gridjs-summary" title="Page 1 of 2">
                                                                    Showing <b>1</b>
                                                                    to
                                                                    <b>10</b>
                                                                    of
                                                                    <b>12</b>
                                                                    results
                                                                </div>
                                                                <div class="gridjs-pages">
                                                                    <button tabindex="0" role="button" disabled="" title="Previous" aria-label="Previous"
                                                                        class="">Previous</button>
                                                                    <button tabindex="0" role="button" class="gridjs-currentPage" title="Page 1"
                                                                        aria-label="Page 1">1</button>
                                                                    <button tabindex="0" role="button" class="" title="Page 2" aria-label="Page 2">2</button>
                                                                    <button tabindex="0" role="button" title="Next" aria-label="Next" class="">Next</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="gridjs-temp" class="gridjs-temp"></div>
                                                    </div>
                                                </div>
                                        
                                            </div>

                                       
                                    </div>
                                    <!-- end card -->
                                </div>
                            </div>
                            <!-- end col -->
                        </div>

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <?php include "../layouts/footer.template.php"; ?>
            </div>
            <!-- end main content-->

        </div>
     


        <?php include "../layouts/scripts.template.php"; ?>
        <script src="../public/libs/nouislider/nouislider.min.js"></script>
        <script src="../public/libs/wnumb/wNumb.min.js"></script>
        <script src="../public/libs/gridjs/gridjs.umd.js"></script>
        <script src="../public/js/pages/ecommerce-product-list.init.js"></script>



</body>


</html>














