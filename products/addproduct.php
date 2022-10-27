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
                                <h4 class="mb-sm-0">Create Product</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="details.php">Details</a></li>
                                        <li class="breadcrumb-item active">Create Product</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <form id="createproduct-form" autocomplete="off" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label" for="product-title-input">Product Title</label>
                                            <input type="hidden" class="form-control" id="formAction" name="formAction"
                                                value="add">
                                            <input type="text" class="form-control d-none" id="product-id-input">
                                            <input type="text" class="form-control" id="product-title-input" value=""
                                                placeholder="Enter product title" required>
                                            <div class="invalid-feedback">Please Enter a product title.</div>
                                        </div>
                                        <div>
                                            <label>Product Description</label>

                                            <div id="ckeditor-classic">
                                                <p>Tommy Hilfiger men striped pink sweatshirt. Crafted with cotton.
                                                    Material composition is 100% organic cotton. This is one of the
                                                    world’s leading designer lifestyle brands and is internationally
                                                    recognized for celebrating the essence of classic American cool
                                                    style, featuring preppy with a twist designs.</p>
                                                <ul>
                                                    <li>Full Sleeve</li>
                                                    <li>Cotton</li>
                                                    <li>All Sizes available</li>
                                                    <li>4 Different Color</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Product Gallery</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <h5 class="fs-14 mb-1">Product Image</h5>
                                            <p class="text-muted">Add Product main Image.</p>
                                            <div class="text-center">
                                                <div class="position-relative d-inline-block">
                                                    <div class="position-absolute top-100 start-100 translate-middle">
                                                        <label for="product-image-input" class="mb-0"
                                                            data-bs-toggle="tooltip" data-bs-placement="right"
                                                            title="Select Image">
                                                            <div class="avatar-xs">
                                                                <div
                                                                    class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                                    <i class="ri-image-fill"></i>
                                                                </div>
                                                            </div>
                                                        </label>
                                                        <input class="form-control d-none" value=""
                                                            id="product-image-input" type="file"
                                                            accept="image/png, image/gif, image/jpeg">
                                                    </div>
                                                    <div class="avatar-lg">
                                                        <div class="avatar-title bg-light rounded">
                                                            <img src="#" id="product-img" class="avatar-md h-auto" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <h5 class="fs-14 mb-1">Product Gallery</h5>
                                            <p class="text-muted">Add Product Gallery Images.</p>

                                            <div class="dropzone">
                                                <div class="fallback">
                                                    <input name="file" type="file" multiple="multiple">
                                                </div>
                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                                    </div>

                                                    <h5>Drop files here or click to upload.</h5>
                                                </div>
                                            </div>

                                            <ul class="list-unstyled mb-0" id="dropzone-preview">
                                                <li class="mt-2" id="dropzone-preview-list">
                                                    <!-- This is used as the file preview template -->
                                                    <div class="border rounded">
                                                        <div class="d-flex p-2">
                                                            <div class="flex-shrink-0 me-3">
                                                                <div class="avatar-sm bg-light rounded">
                                                                    <img data-dz-thumbnail
                                                                        class="img-fluid rounded d-block" src="#"
                                                                        alt="Product-Image" />
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <div class="pt-1">
                                                                    <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                                    <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                                    <strong class="error text-danger"
                                                                        data-dz-errormessage></strong>
                                                                </div>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-3">
                                                                <button data-dz-remove
                                                                    class="btn btn-sm btn-danger">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <!-- end dropzon-preview -->
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->

                                <div class="card">
                                    <div class="card-header">
                                        <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab"
                                                    href="#addproduct-general-info" role="tab">
                                                    General Info
                                                </a>
                                            </li>
                                           
                                        </ul>
                                    </div>
                                    <!-- end card header -->
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                                                <div class="row">
            
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="manufacturer-brand-input">
                                                                Brand</label>
                                                            <input type="text" class="form-control"
                                                                id="manufacturer-brand-input"
                                                                placeholder="Enter manufacturer brand">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end row -->

                                                <div class="row">
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="stocks-input">Stocks</label>
                                                            <input type="text" class="form-control" id="stocks-input"
                                                                placeholder="Stocks" required>
                                                            <div class="invalid-feedback">Please Enter a product stocks.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label"
                                                                for="product-price-input">Price</label>
                                                            <div class="input-group has-validation mb-3">
                                                                <span class="input-group-text"
                                                                    id="product-price-addon">$</span>
                                                                <input type="text" class="form-control"
                                                                    id="product-price-input" placeholder="Enter price"
                                                                    aria-label="Price"
                                                                    aria-describedby="product-price-addon" required>
                                                                <div class="invalid-feedback">Please Enter a product
                                                                    price.</div>
                                                            </div>

                                                        </div>
                                                    </div>
                    
                                                    <!-- end col -->
                                                </div>
                                                <!-- end row -->
                                            </div>
                                            <!-- end tab-pane -->

                                           
                                            <!-- end tab pane -->
                                        </div>
                                        <!-- end tab content -->
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                                <div class="text-end mb-3">
                                    <button type="submit" class="btn btn-success w-sm">Submit</button>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-4">

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Product Categories</h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted mb-2"> <a href="#"
                                                class="float-end text-decoration-underline">Add
                                                New</a>Select product category</p>
                                        <select class="form-select" id="choices-category-input"
                                            name="choices-category-input" data-choices data-choices-search-false>
                                            <option value="Appliances">Appliances</option>
                                        </select>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Product Tags</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="hstack gap-3 align-items-start">
                                            <div class="flex-grow-1">
                                                <input class="form-control" data-choices
                                                    data-choices-multiple-remove="true" placeholder="Enter tags"
                                                    type="text" value="Cotton" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->

                 

                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                    </form>
                </div>

            </div>
        </div>

    </div>
    <?php include "../layouts/scripts.template.php"; ?>
    <script src="../public/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
    <script src="../public/libs/dropzone/dropzone-min.js"></script>
    <script src="../public/js/pages/ecommerce-product-create.init.js"></script>
    <?php include "../layouts/footer.template.php"; ?>


</body>


</html>