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
                                <h4 class="mb-sm-0">Product Details</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="index.php">Ecommerce</a></li>
                                        <li class="breadcrumb-item active">Product Details</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row gx-lg-5">
                                        <div class="col-xl-4 col-md-8 mx-auto">
                                            <div class="product-img-slider sticky-side-div">
                                                <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide">
                                                            <img src="../public/images/products/img-8.png" alt="" class="img-fluid d-block" />
                                                        </div>
                                                        
                                                    </div>
                                    
                                                </div>
                                                <!-- end swiper thumbnail slide -->
                                        
                                            </div>
                                        </div>
                                        <!-- end col -->

                                        <div class="col-xl-8">
                                            <div class="mt-xl-0 mt-5">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <h4>Full Sleeve Sweatshirt for Men (Pink)</h4>
                                                        <div class="hstack gap-3 flex-wrap">
                                                            <div><a href="#" class="text-primary d-block">Tommy Hilfiger</a></div>
                                                            <div class="vr"></div>
                                                            <div class="text-muted">Seller : <span class="text-body fw-medium">Zoetic Fashion</span></div>
                                                            <div class="vr"></div>
                                                            <div class="text-muted">Published : <span class="text-body fw-medium">26 Mar, 2021</span></div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div>
                                                            <a href="addproduct.php" class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="ri-pencil-fill align-bottom"></i></a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-4">
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="p-2 border border-dashed rounded">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm me-2">
                                                                    <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                                        <i class="ri-money-dollar-circle-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted mb-1">Price :</p>
                                                                    <h5 class="mb-0">$120.40</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end col -->
                                                    
                                                    <!-- end col -->
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="p-2 border border-dashed rounded">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm me-2">
                                                                    <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                                        <i class="ri-stack-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1">
                                                                    <p class="text-muted mb-1">Available Stocks :</p>
                                                                    <h5 class="mb-0">1,230</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end col -->
                                                  
                                                    <!-- end col -->
                                                </div>

                                                <div class="row">
                
                                                

                                                    <div class="col-xl-6">
                                                        <div class=" mt-4">
                                                            <h5 class="fs-14">Colors :</h5>
                                                            <div class="d-flex flex-wrap gap-2">
                                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Out of Stock">
                                                                    <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-primary" disabled>
                                                                        <i class="ri-checkbox-blank-circle-fill"></i>
                                                                    </button>
                                                                </div>
                                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="03 Items Available">
                                                                    <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-secondary">
                                                                        <i class="ri-checkbox-blank-circle-fill"></i>
                                                                    </button>
                                                                </div>
                                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="03 Items Available">
                                                                    <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-success">
                                                                        <i class="ri-checkbox-blank-circle-fill"></i>
                                                                    </button>
                                                                </div>
                                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="02 Items Available">
                                                                    <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-info">
                                                                        <i class="ri-checkbox-blank-circle-fill"></i>
                                                                    </button>
                                                                </div>
                                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="01 Items Available">
                                                                    <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-warning">
                                                                        <i class="ri-checkbox-blank-circle-fill"></i>
                                                                    </button>
                                                                </div>
                                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="04 Items Available">
                                                                    <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-danger">
                                                                        <i class="ri-checkbox-blank-circle-fill"></i>
                                                                    </button>
                                                                </div>
                                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="03 Items Available">
                                                                    <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-light">
                                                                        <i class="ri-checkbox-blank-circle-fill"></i>
                                                                    </button>
                                                                </div>
                                                                <div data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="04 Items Available">
                                                                    <button type="button" class="btn avatar-xs p-0 d-flex align-items-center justify-content-center border rounded-circle fs-20 text-dark">
                                                                        <i class="ri-checkbox-blank-circle-fill"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end col -->
                                                </div>
                                                <!-- end row -->

                                                <div class="mt-4 text-muted">
                                                    <h5 class="fs-14">Description :</h5>
                                                    <p>Tommy Hilfiger men striped pink sweatshirt. Crafted with cotton. Material composition is 100% organic cotton. This is one of the world’s leading designer lifestyle brands and is internationally recognized for celebrating the essence of classic American cool style, featuring preppy with a twist designs.</p>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="mt-3">
                                                            <h5 class="fs-14">Features :</h5>
                                                            <ul class="list-unstyled">
                                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> Full Sleeve</li>
                                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> Cotton</li>
                                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> All Sizes available</li>
                                                                <li class="py-1"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> 4 Different Color</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                   
                                                </div>


                                                <div class="product-content mt-5">
                                                    <h5 class="fs-14 mb-3">Product Description :</h5>
                                                    <nav>
                                                        <ul class="nav nav-tabs nav-tabs-custom nav-success" id="nav-tab" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" id="nav-speci-tab" data-bs-toggle="tab" href="#nav-speci" role="tab" aria-controls="nav-speci" aria-selected="true">Specification</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" id="nav-detail-tab" data-bs-toggle="tab" href="#nav-detail" role="tab" aria-controls="nav-detail" aria-selected="false">Details</a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                    <div class="tab-content border border-top-0 p-4" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-speci" role="tabpanel" aria-labelledby="nav-speci-tab">
                                                            <div class="table-responsive">
                                                                <table class="table mb-0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row" style="width: 200px;">Category</th>
                                                                            <td>T-Shirt</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Brand</th>
                                                                            <td>Tommy Hilfiger</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Color</th>
                                                                            <td>Blue</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Material</th>
                                                                            <td>Cotton</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th scope="row">Weight</th>
                                                                            <td>140 Gram</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="nav-detail" role="tabpanel" aria-labelledby="nav-detail-tab">
                                                            <div>
                                                                <h5 class="font-size-16 mb-3">Tommy Hilfiger Sweatshirt for Men (Pink)</h5>
                                                                <p>Tommy Hilfiger men striped pink sweatshirt. Crafted with cotton. Material composition is 100% organic cotton. This is one of the world’s leading designer lifestyle brands and is internationally recognized for celebrating the essence of classic American cool style, featuring preppy with a twist designs.</p>
                                                                <div>
                                                                    <p class="mb-2"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> Machine Wash</p>
                                                                    <p class="mb-2"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> Fit Type: Regular</p>
                                                                    <p class="mb-2"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> 100% Cotton</p>
                                                                    <p class="mb-0"><i class="mdi mdi-circle-medium me-1 text-muted align-middle"></i> Long sleeve</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- product-content -->

                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    
                </div>
            </div>
            
        </div>





        <?php include "../layouts/scripts.template.php"; ?>

        <!-- nouisliderribute js -->
        <script src="../public/libs/nouislider/nouislider.min.js"></script>
        <script src="../public/libs/wnumb/wNumb.min.js"></script>

        <!-- gridjs js -->
        <script src="../public/libs/gridjs/gridjs.umd.js"></script>

        <!-- ecommerce product list -->
        <script src="../public/js/pages/ecommerce-product-list.init.js"></script>
        <?php include "../layouts/footer.template.php"; ?>

    </div>


</body>


</html>