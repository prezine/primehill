<?php
	session_start();
	include_once './app/connect.php';
	include_once './app/controllers/Primehill.php';
	include_once './app/controllers/Database.php';
	include_once './app/controllers/Product.php';
	$product = new Products($conn);
	if (!isset($_SESSION['userID'])) {
		header("Location: ./login");
	}
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Category | Primehill</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
	<meta content="Themesbrand" name="author" />
	<!-- App favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">
	<!-- Bootstrap Css -->
	<link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
	<!-- Icons Css -->
	<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<!-- App Css-->
	<link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>
<!-- <body data-sidebar="dark"> -->

<body data-layout="horizontal" data-topbar="dark">
	<!-- Begin page -->
	<div id="layout-wrapper">
		<?php 
			include_once './widgets/header.php';
			include_once './widgets/nav.php';
		?>
		<!-- ============================================================== -->
		<!-- Start right Content here -->
		<!-- ============================================================== -->
		<div class="main-content">
			<div class="page-content">
				<div class="container-fluid">
					<!-- start page title -->
					<div class="row">
						<div class="col-12">
							<div class="page-title-box d-flex align-items-center justify-content-between">
								<h4 class="mb-0 font-size-18">Projects</h4>
							</div>
						</div>
					</div>
					<!-- end page title -->
					<div class="row">
						<div class="col-xl-4">
							<div class="card overflow-hidden">
								<div class="bg-soft-primary">
									<div class="row">
										<div class="col-7">
											<div class="text-primary p-3">
												<h5 class="text-primary">Welcome Back !</h5>
												<p>Primehill Dashboard</p>
											</div>
										</div>
										<div class="col-5 align-self-end">
											<img src="assets/images/profile-img.png" alt="" class="img-fluid">
										</div>
									</div>
								</div>
								<div class="card-body pt-0">
									<div class="row">
										<div class="col-sm-4">
											<div class="avatar-md profile-user-wid mb-4">
												<img src="assets/images/users/avatar-1.jpg" alt="" class="img-thumbnail rounded-circle">
											</div>
										</div>
										<div class="col-sm-8">
											<div class="pt-4">
												<div class="row">
													<h5 class="font-size-15 text-truncate">Administration</h5>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-8">
							<!-- end row -->
							<div class="row">
								<div class="col-lg-12">
									<?php
										if (isset($_SESSION['msg'])) {
											echo $_SESSION['msg'];
											unset($_SESSION['msg']);
										}
									?>
									<div class="card">
										<div class="card-body">
											<h5 class="card-title mb-4">Create Categories</h5>
											<form class="form-inline" action="./app/models/addcategory" method="post">
												<label class="sr-only" for="name">Name of Category</label>
												<input type="text" class="form-control mb-2 mr-sm-3" id="name" name="name" placeholder="Name of Category">
												<button type="submit" class="btn btn-primary mb-2">Add Category for Projects</button>
											</form>
										</div>
									</div>

									<div class="card">
										<div class="card-body">
											<h4 class="card-title mb-4">List of all Categories</h4>
											<div class="table-responsive">
												<table class="table table-nowrap table-centered mb-0">
													<tbody>
														<?php
															$allCategories = $product->fetchCategories();
				                                    		if ($allCategories != 'null') {
				                                    			foreach (json_decode($allCategories, true) as $ac) {
				                                    				echo 
				                                    				'<tr>
																		<td style="width: 60px;">
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck1">
																				<label class="custom-control-label" for="customCheck1"></label>
																			</div>
																		</td>
																		<td>
																			<h5 class="text-truncate font-size-14 m-0">
																				<a href="#" class="text-dark">
																					'. $ac['category_name'] .'
																				</a>
																			</h5>
																		</td>
																		<td>
																			<div class="text-center"> 
																				<span class="badge badge-pill badge-soft-secondary font-size-11">
																					'. $product->time_elapsed_string($ac['dateCreated']) .'
																				</span>
																			</div>
																		</td>
																	</tr>';
				                                    			}
				                                    		}
														?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- end row -->
						</div>
					</div>
				</div>
				<!-- container-fluid -->
			</div>
			<!-- End Page-content -->
			<!-- Modal -->
			<div class="modal fade exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							...
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!-- end modal -->
			<?php include_once './widgets/footer.php'; ?>
		</div>
		<!-- end main content-->
	</div>
	<!-- END layout-wrapper -->
	<!-- Right bar overlay-->
	<div class="rightbar-overlay"></div>
	<!-- JAVASCRIPT -->
	<script src="assets/libs/jquery/jquery.min.js"></script>
	<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/libs/metismenu/metisMenu.min.js"></script>
	<script src="assets/libs/simplebar/simplebar.min.js"></script>
	<script src="assets/libs/node-waves/waves.min.js"></script>
	<!-- apexcharts -->
	<script src="assets/libs/apexcharts/apexcharts.min.js"></script>
	<script src="assets/js/pages/dashboard.init.js"></script>
	<!-- App js -->
	<script src="assets/js/app.js"></script>
</body>

</html>