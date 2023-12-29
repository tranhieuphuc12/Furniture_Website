
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
		.navbar {
			background-image: none;

		}

		.form-select {
			width: auto;
		}

		option {
			overflow-y: scroll;
		}

		select {
			
			overflow-y: auto;
		}
		.change-btn:hover{
			background-color: #fbd849;
		}
	</style>
</head>

<body>


	<!-- Nav bar -->
	<nav class="navbar navbar-expand-lg bg-white">
		<div class="container">
			<a class="navbar-brand" href="<?php echo (!isset($_SESSION['roleAdmin']))?'../public/index.php':''?>"> <img
				src="https://websitedemos.net/office-furniture-store-04/wp-content/uploads/sites/913/2021/07/site-logo-dark.svg">
			</a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<?php if (!isset($_SESSION['roleAdmin'])) {?>
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item"><a class="nav-link text-dark" href="../public/index.php">Store</a></li>
				</ul>
			<?php } ?>
				
				<ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
					<li class="nav-item"><a class="nav-link text-dark" href="#">About</a></li>
					<li class="nav-item"><a class="nav-link text-dark" href="#">Contact</a></li>

				</ul>
				<form class="d-flex" role="search" action="HomeServlet" method="get">
					<input class="p-1 bg-light border border-light border-start-0 rounded-end form-control me-2"
						type="search" placeholder="Search Products..." aria-label="Search" name="search" id="search">
					<button class="btn bg-yellow" type="submit">
						<i class="bi bi-search"></i>
					</button>
				</form>

				<ul class="navbar-nav me-0 ms-1 mb-lg-0">
					<li class="nav-item">
						<button type="button" class="me-auto nav-link text-light fs-4 position-relative" href="#">
							<i class="bi bi-basket2-fill text-dark"></i> <span
								class=" position-absolute top-60 start-60 translate-middle badge rounded-pill bg-black text-light" style="font-size:14px ;">
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
							</span>
						</button> <!--<%if (username == null) {%> -->

							
						<?php if (!isset($_SESSION['username'])) { ?>
						<li class="nav-item dropdown"><a class="nav-link dropdown-toggle text-dark fs-4" href="#"
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
													<input type="text" class="form-control" id="username" name="username"
														placeholder="Username" />
												</div>
												<div class="mb-3">
													<label class="form-label">Password</label> <input type="password"
														class="form-control" id="password" name="password"
														placeholder="Password" />
												</div>											
												<div class="modal-footer d-block">
													<button type="submit" class="btn btn-warning float-end">Submit</button>
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
											<form action="SignUpServlet" method="post">
												<div class="mb-3">
													<label class="form-label">Email Address Or Username</label>
													<input type="text" class="form-control" id="username" name="username"
														placeholder="Username" />
												</div>
												<div class="mb-3">
													<label class="form-label">Password</label> <input type="password"
														class="form-control" id="password" name="password"
														placeholder="Password" />
												</div>
												<div class="mb-3">
													<label class="form-label">Phone Number</label>
													<input type="text" class="form-control" id="phone_number"
														name="phone_number" placeholder="Phone Number" />
												</div>
												<div class="mb-3 form-check">
													<input type="radio" class="form-check-input" id="female" name="gender"
														value="female" />
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
							<?php } else { ?>

						<li class="nav-item dropdown"><a class="nav-link dropdown-toggle text-dark fs-5" href="#"
								role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<?php echo $_SESSION['username'] ?>
							</a>

							<ul class="dropdown-menu">
								<li><a type="button" href="../public/profile_process.php" class="nav-link text-dark">Profile</a></li>
								<li>
									<hr class="dropdown-divider">
								</li>
								<li><a type="button" href="../public/sign_out_process.php" class="nav-link text-dark"> Sign Out</a>
								</li>


							</ul>
						<?php } ?>
				</ul>
			</div>
		</div>

	</nav>
	<hr class=" text-secondary">
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
				<img src="https://websitedemos.net/office-furniture-store-04/wp-content/uploads/sites/913/2021/07/site-logo-dark.svg"
					class="text-light" width="200" height="33">
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
</body>

</html>