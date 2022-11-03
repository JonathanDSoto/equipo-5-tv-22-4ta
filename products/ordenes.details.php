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
        <?php include "../layouts/sidebar.template.php"; ?>
        <div class="vertical-overlay"></div>
        
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Order Details</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                        <li class="breadcrumb-item active">Order Details</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-9">
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h5 class="card-title flex-grow-1 mb-0">Order #VL2667</h5>
        
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table class="table table-nowrap align-middle table-borderless mb-0">
                                            <thead class="table-light text-muted">
                                                <tr>
                                                    <th scope="col">Product Details</th>
                                                    <th scope="col">Item Price</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col" class="text-end">Total Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                                                <img src="../public/images/products/img-8.png" alt="" class="img-fluid d-block">
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h5 class="fs-15"><a href="details.php" class="link-primary">Sweatshirt for Men (Pink)</a></h5>
                                                                <p class="text-muted mb-0">Color: <span class="fw-medium">Pink</span></p>
                                                                <p class="text-muted mb-0">Size: <span class="fw-medium">M</span></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>$119.99</td>
                                                    <td>02</td>
                                                    <td class="fw-medium text-end">
                                                        $239.98
                                                    </td>
                                                </tr>
                                                <tr class="border-top border-top-dashed">
                                                    <td colspan="3"></td>
                                                    <td colspan="2" class="fw-medium p-0">
                                                        <table class="table table-borderless mb-0">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Sub Total :</td>
                                                                    <td class="text-end">$359.96</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Discount <span class="text-muted">(VELZON15)</span> : :</td>
                                                                    <td class="text-end">-$53.99</td>
                                                                </tr>
                                                                <tr class="border-top border-top-dashed">
                                                                    <th scope="row">Total (USD) :</th>
                                                                    <th class="text-end">$415.96</th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <div class="d-flex">
                                        <h5 class="card-title flex-grow-1 mb-0">Customer Details</h5>
                                        <div class="flex-shrink-0">
                                            <a href="../clientes/cliente.detail.php" class="link-secondary">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled mb-0 vstack gap-3">
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <img src="../public/images/users/avatar-3.jpg" alt="" class="avatar-sm rounded shadow">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="fs-14 mb-1">Joseph Parkers</h6>
                                                    <p class="text-muted mb-0">Customer</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li><i class="ri-mail-line me-2 align-middle text-muted fs-16"></i>josephparker@gmail.com</li>
                                        <li><i class="ri-phone-line me-2 align-middle text-muted fs-16"></i>+(256) 245451 441</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            
                             <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0"><i class="ri-map-pin-line align-middle me-1 text-muted"></i> Shipping Address</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled vstack gap-2 fs-13 mb-0">
                                        <li class="fw-medium fs-14">Joseph Parker</li>
                                        <li>+(256) 245451 451</li>
                                        <li>2186 Joyce Street Rocky Mount</li>
                                        <li>California - 24567</li>
                                        <li>United States</li>
                                    </ul>
                                </div>
                             </div>
                             <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0"><i class="ri-secure-payment-line align-bottom me-1 text-muted"></i> Payment Details</h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="flex-shrink-0">
                                            <p class="text-muted mb-0">Transactions:</p>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <h6 class="mb-0">#VLZ124561278124</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="flex-shrink-0">
                                            <p class="text-muted mb-0">Payment Method:</p>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <h6 class="mb-0">Debit Card</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="flex-shrink-0">
                                            <p class="text-muted mb-0">Card Holder Name:</p>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <h6 class="mb-0">Joseph Parker</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="flex-shrink-0">
                                            <p class="text-muted mb-0">Discount:</p>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <h6 class="mb-0">VELZON15</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            <p class="text-muted mb-0">Total Amount:</p>
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <h6 class="mb-0">$415.96</h6>
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
   

</body>

</html>