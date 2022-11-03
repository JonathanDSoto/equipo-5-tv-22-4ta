<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <?php include "../layouts/head.template.php"; ?>
    <link href="../public/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../public/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="../public/css/custom.min.css" rel="stylesheet" type="text/css" />

</head>
<body>
    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">
                            <div class="card-body p-4 text-center">
                                <lord-icon src="https://cdn.lordicon.com/hzomhqxz.json" trigger="loop" colors="primary:#4b38b3,secondary:#08a88a" style="width:180px;height:180px">
                                </lord-icon>

                                <div class="mt-4 pt-2">
                                    <h5>You are Logged Out</h5>
                                    <p class="text-muted">Thank you for using <span class="fw-semibold">velzon</span> admin template</p>
                                    <div class="mt-4">
                                        <a href="../index.php" class="btn btn-success w-100">Sign In</a>
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
            </div>
            <!-- end container -->
        </div>
        <?php include "../layouts/footer.template.php"; ?>
    </div>
    <?php include "../layouts/scripts.template.php"; ?>
    <script src="assets/libs/particles.js/particles.js"></script>
    <script src="assets/js/pages/particles.app.js"></script>
</body>

</html>