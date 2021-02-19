<?php 
	session_start();
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Login | Primehill</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- App favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">
	<!-- Bootstrap Css -->
	<link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
	<!-- Icons Css -->
	<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<!-- App Css-->
	<link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>

<body>
	<div class="home-btn d-none d-sm-block"> 
		<a href="../index" class="text-dark"><i class="mdi mdi-home-variant h2"></i></a>
	</div>
	<div class="account-pages my-5 pt-sm-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-6 col-xl-5">
					<div class="card overflow-hidden">
						<div class="bg-soft-primary">
							<div class="row">
								<div class="col-7">
									<div class="text-primary p-4">
										<h5 class="text-primary">Welcome Back Admin!</h5>
									</div>
								</div>
								<div class="col-5 align-self-end">
									<img src="assets/images/profile-img.png" alt="" class="img-fluid">
								</div>
							</div>
						</div>
						<div class="card-body pt-0">
							<div>
								<a href="index.html">
									<div class="avatar-md profile-user-wid mb-4"> 
										<span class="avatar-title rounded-circle bg-light">
                                            <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                        </span>
									</div>
								</a>
							</div>
							<div class="p-2">
								<form class="form-horizontal" action="./app/models/login" method="post">
									<?php
										if (isset($_SESSION['msg'])) {
											echo $_SESSION['msg'];
											unset($_SESSION['msg']);
										}
									?>
									<div class="form-group">
										<label for="userpassword">Password</label>
										<input type="password" class="form-control" id="passcode" name="passcode" placeholder="Enter password">
									</div>
									<div class="mt-3">
										<button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- JAVASCRIPT -->
	<script src="assets/libs/jquery/jquery.min.js"></script>
	<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/libs/metismenu/metisMenu.min.js"></script>
	<script src="assets/libs/simplebar/simplebar.min.js"></script>
	<script src="assets/libs/node-waves/waves.min.js"></script>
	<!-- App js -->
	<script src="assets/js/app.js"></script>
</body>

</html>