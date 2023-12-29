<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>
        <?php if (!empty($title)) {
            echo $title;
        } ?> - Office Furniture Store
    </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lexend">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../asset/css/style.css">
    <style>
        .form-check {
            display: inline-block;
        }
    </style>
</head>

<body>

    <!-- Nav bar -->
    <nav id="navbar" class="navbar navbar-expand-lg bg-green navbar-img">
        <div class="container">
            <a class="navbar-brand" href="../public/index.php"> <img
                    src="https://websitedemos.net/office-furniture-store-04/wp-content/uploads/sites/913/2021/07/site-logo-light.svg">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link text-light" href="../public/index.php">Store</a></li>
                    <!-- </?php if($_SESSION['role_id']):?>
                        <li class="nav-item"><a class="nav-link text-light" href="#">Store</a></li>
                    </?php endif?> -->
                </ul>
                <ul class="navbar-nav me-3 mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link text-light" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link text-light" href="#">Contact</a></li>

                </ul>
                <form action="index.php" method="GET" class="d-flex" role="search">
                    <input class="p-1 bg-light border border-light border-start-0 rounded-end form-control me-2"
                        type="search" placeholder="Search Products..." aria-label="Search" name="keyword">
                    <button class="btn bg-yellow" type="submit"><i class="bi bi-search"></i></button>
                </form>

                <ul class="navbar-nav me-0 ms-1 mb-lg-0">
                    <li class="nav-item">
                        <a  class="me-auto nav-link text-light fs-4 position-relative" onclick="<?php echo (isset($_SESSION['username']))?'':'return confirm(\'You need sign up before shopping.\')'?>" href="<?php echo (isset($_SESSION['username']))?'show_cart.php':'#' ?>"><i
                                class="bi bi-basket2-fill"></i> <span id="result"
                                class="fs-7 position-absolute top-60 start-60 translate-middle badge rounded-pill bg-light text-dark" style="font-size: 14px;">
                                <?php
									if (isset($_SESSION['cart_id'])) {
										$orderModel = new Order();
										$quantityOrder = $orderModel->sumQuantity($_SESSION['cart_id'])[0]['totalQuantity'];
										print($quantityOrder);
									}
									else{
										print(0);
									}
								?>

                            </span></a>
                    </li>
                    <!--<%if (username == null) {%> -->
                    <?php if (!isset($_SESSION['username'])) { ?>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle text-light fs-4" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false"><i
                                    class="bi bi-person-fill"></i></a>
                            <ul class="dropdown-menu">
                                <li><button type="button" class="nav-link text-dark" data-bs-toggle="modal"
                                        data-bs-target="#modalLoginForm">
                                        Login</button></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><button type="button" class="nav-link text-dark" data-bs-toggle="modal"
                                        data-bs-target="#modalSignUpForm">
                                        Sign Up</button></li>

                            </ul> <!-- Modal Login-->
                            <div class="modal fade" id="modalLoginForm" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <h5 class="modal-title" id="exampleModalLabel">Login</h5>

                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="login_process.php" method="post">
                                                <div class="mb-3">
                                                    <label class="form-label">Email Address Or Username</label>
                                                    <input required type="email" class="form-control" id="username"
                                                        name="username" placeholder="Username" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Password</label> <input required
                                                        type="password" class="form-control" id="password" name="password"
                                                        placeholder="Password" />
                                                </div>
                                                <div class="mb-3 form-check">
                                                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me" />
                                                    <label class="form-check-label" for="remember_me">Remember me</label>
                                                </div>
                                                <div class="modal-footer d-block">
                                                    <button type="submit"
                                                        class="btn btn-warning float-end submit-btn">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- Modal Sign Up -->
                            <div class="modal fade" id="modalSignUpForm" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="sign_up_process.php" method="post">
                                                <div class="mb-3">
                                                    <label class="form-label">Email Address Or Username</label>
                                                    <input required type="email" class="form-control" id="username"
                                                        name="username" placeholder="Username" />

                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Password</label> <input required
                                                        type="password" class="form-control" id="password" name="password"
                                                        placeholder="Password" />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Phone Number</label>
                                                    <input type="text" class="form-control" id="phone_number" only
                                                        pattern="^[0-9]{10}$" name="phone_number"
                                                        placeholder="Phone Number" />
                                                </div>
                                                <div class="mb-3 form-check">
                                                    <input checked type="radio" class="form-check-input" id="female"
                                                        name="gender" value="female" />
                                                    <label class="form-check-label" for="female">Female</label>
                                                </div>
                                                <div class="mb-3 form-check ">
                                                    <input type="radio" class="form-check-input" id="male" name="gender"
                                                        value="male" />
                                                    <label class="form-check-label" for="male">Male</label>
                                                </div>
                                                <div class="modal-footer d-block">

                                                    <button type="submit" class="btn btn-warning float-end">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php } else { ?>
                        <!-- <%
                    } else {
                    %>-->
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle text-light fs-5" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION['username'] ?>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <form action="profile_process.php" method="post">
                                        <input type="hidden" name="username" value="<?php echo $_SESSION['username'] ?>">
                                        <button type="submit" class="nav-link text-dark">Profile</button>
                                    </form>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a type="button" href="sign_out_process.php" class="nav-link text-dark"> Sign Out</a>
                                </li>
                            </ul>
                        <?php } ?>
                </ul>
            </div>
        </div>

    </nav>
    <!-- <hr class=" text-secondary"> -->
    <!-- End Navbar -->

    <!-- Body content -->

    <?php
    if (!empty($slot)) {
        echo $slot;
    }
    ?>
    <!-- End body content -->

    <!-- Footer -->
    <div class="container mt-100px">
        <div class="row">
            <div class="col-3">
                <img src="https://websitedemos.net/office-furniture-store-04/wp-content/uploads/sites/913/2021/07/site-logo-light.svg"
                    class="bg-warning text-light" width="200" height="33">
            </div>
            <div class="col-3">
                <h2 class="fs-5  mb-3">About Us</h2>
                <ul>
                    <li><a href="#" class="text-secondary text-decoration-none">About Us</a></li>
                    <li><a href="#" class="text-secondary text-decoration-none">Contact Us</a></li>
                    <li><a href="#" class="text-secondary text-decoration-none">Careers</a></li>
                    <li><a href="#" class="text-secondary text-decoration-none">Customer Support</a></li>
                </ul>
            </div>
            <div class="col-3">
                <h2 class="fs-5 mb-3">Categories</h2>
                <ul>
                    <li><a href="#" class="text-secondary text-decoration-none">Table</a></li>
                    <li><a href="#" class="text-secondary text-decoration-none">Chairs</a></li>
                    <li><a href="#" class="text-secondary text-decoration-none">Cabinets</a></li>
                    <li><a href="#" class="text-secondary text-decoration-none">Laptop Stands</a></li>
                </ul>
            </div>
            <div class="col-3">
                <h2 class="fs-5 mb-3">Informations</h2>
                <ul>
                    <li><a href="#" class="text-secondary text-decoration-none">FAQs</a></li>
                    <li><a href="#" class="text-secondary text-decoration-none">Refund Policy</a></li>
                    <li><a href="#" class="text-secondary text-decoration-none">Privacy Policy</a></li>
                    <li><a href="#" class="text-secondary text-decoration-none">Terms & Conditions</a></li>
                </ul>
            </div>
        </div>
        <div class="mt-5">
            <p class="text-secondary text-center">Copyright © 2023 Office Furniture Store</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="./public/js/sitescript.js"></script>
</body>
<script>
    <?php if (isset($_SESSION['alert'])) { ?>
        alert("<?php echo $_SESSION['alert'] ?>")
        <?php unset($_SESSION['alert']);
    } ?>

</script>

</html>