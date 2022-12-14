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

    <div id="layout-wrapper">

        <?php include "../layouts/nav.template.php"; ?>

        <!-- ========== App Menu ========== -->
        <?php include "../layouts/sidebar.template.php"; ?>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <div class="main-content">
            <div>
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="profile-foreground position-relative mx-n4 mt-n4">
                            <div class="profile-wid-bg">
                                <img src="../public/images/profile-bg.jpg" alt="" class="profile-wid-img" />
                            </div>
                        </div>
                        <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
                            <div class="row g-4">
                                <div class="col-auto">
                                    <div class="avatar-lg">
                                        <img src="../public/images/users/avatar-1.jpg" alt="user-img"
                                            class="img-thumbnail rounded-circle" />
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col">
                                    <div class="p-2">
                                        <h3 class="text-white mb-1">Anna Adame</h3>
                                        <p class="text-white-75">Owner & Founder</p>
                                        <div class="hstack text-white-50 gap-1">
                                            <div class="me-2"><i
                                                    class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i>California,
                                                United States</div>
                                            <div>
                                                <i
                                                    class="ri-building-line me-1 text-white-75 fs-16 align-middle"></i>Themesbrand
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <div class="d-flex">
                                        <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1"
                                            role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link fs-14 active" data-bs-toggle="tab"
                                                    href="#overview-tab" role="tab">
                                                    <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                                        class="d-none d-md-inline-block">Overview</span>
                                                </a>
                                            </li>

                                        </ul>
                                        <div class="flex-shrink-0">
                                            <a href="setings.profile.php" class="btn btn-success"><i
                                                    class="ri-edit-box-line align-bottom"></i> Edit Profile</a>
                                        </div>
                                    </div>
                                    <div class="tab-content pt-4 text-muted">
                                        <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                            <div class="row">
                                                <div class="col-xxl-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title mb-3">Info</h5>
                                                            <div class="table-responsive">
                                                                <table class="table table-borderless mb-0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th class="ps-0" scope="row">Full Name :
                                                                            </th>
                                                                            <td class="text-muted">Anna Adame</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="ps-0" scope="row">Mobile :</th>
                                                                            <td class="text-muted">+(1) 987 6543</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="ps-0" scope="row">E-mail :</th>
                                                                            <td class="text-muted">daveadame@velzon.com
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="ps-0" scope="row">Location :</th>
                                                                            <td class="text-muted">California, United
                                                                                States
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="ps-0" scope="row">Joining Date
                                                                            </th>
                                                                            <td class="text-muted">24 Nov 2021</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
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

        </div>


        <?php include "../layouts/scripts.template.php"; ?>
        <script src="../public/libs/nouislider/nouislider.min.js"></script>
        <script src="../public/libs/wnumb/wNumb.min.js"></script>
        <script src="../public/libs/gridjs/gridjs.umd.js"></script>
        <script src="../public/js/pages/ecommerce-product-list.init.js"></script>

</body>


</html>