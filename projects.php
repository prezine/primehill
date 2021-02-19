<?php
	session_start();
	include_once './app/connect.php';
	include_once './app/controllers/Primehill.php';
	include_once './app/controllers/Database.php';
	include_once './app/controllers/Property.php';
	$property = new Property($conn);
	if (!isset($_SESSION['userID'])) {
		header("Location: ./login");
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Projects | Primehill</title>
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
								<h4 class="mb-0 font-size-18">Dashboard</h4>
								<div class="page-title-right">
									<button class="btn btn-success" data-toggle="modal" data-target=".addModal">
										Add Projects
									</button>
								</div>
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
											<h4 class="card-title mb-4">All Projeects</h4>
											<div class="table-responsive">
												<table class="table table-centered table-nowrap mb-0">
													<thead class="thead-light">
														<tr>
															<th style="width: 20px;">
																<div class="custom-control custom-checkbox">
																	<input type="checkbox" class="custom-control-input" id="customCheck1">
																	<label class="custom-control-label" for="customCheck1">&nbsp;</label>
																</div>
															</th>
															<th>S/N</th>
															<th>Projects Name</th>
															<th>Date Added</th>
															<th>Categories</th>
															<th>Description</th>
															<th>View Image</th>
														</tr>
													</thead>
													<tbody>
														<?php
															$allProducts = $property->fetchProperties();
				                                    		if ($allProducts != 'null') {
				                                    			foreach (json_decode($allProducts, true) as $ap) {
				                                    				echo 
				                                    				'<tr>
																		<td>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck2">
																				<label class="custom-control-label" for="customCheck2">&nbsp;</label>
																			</div>
																		</td>
																		<td><a href="javascript: void(0);" class="text-body font-weight-bold">1</a> 
																		</td>
																		<td>'. $ap['project_name'] .'</td>
																		<td>'. $product->time_elapsed_string($ap['dateCreated']) .'</td>
																		<td>'. $ap['project_category'] .'</td>
																		<td> 
																			<span class="font-size-12">
																				'. $ap['project_desc'] .'
																			</span>
																		</td>
																		<td>
																			<!-- Button trigger modal -->
																			<button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light">View Image</button>
																		</td>
																	</tr>';
				                                    			}
				                                    		} else {
				                                    			echo "</tbody></table> <div class='mt-4 text-center text-bold'> No Properties found. Add some 🚀 </div>";
				                                    		}
														?>
													</tbody>
												</table>
											</div>
											<!-- end table-responsive -->
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
			<div class="modal fade addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="addModalLabel">Add Property</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form class="form-horizontal" action="./app/models/addproperty" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="useremail">Name of Property</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name of Property">   
                                </div>

                                <div class="form-group">
                                    <label for="useremail">Property Image</label>
                                    <input type="file" class="form-control" id="file" name="file">   
                                </div>
        
                                <div class="form-group">
                                    <label for="userpassword">Categories</label>
                                    <select class="form-control" name="category">
                                    	<option>-- Select Categories --</option>
                                    	<?php
											$allCategories = $property->fetchCategories();
                                    		if ($allCategories != 'null') {
                                    			foreach (json_decode($allCategories, true) as $ac) {
                                    				echo 
                                    				'<option>'. $ac['category_name'] .'</option>';
                                    			}
                                    		}
										?>
                                    </select>       
                                </div>
        
                                <div class="form-group">
                                    <label for="username">Description</label>
                                    <textarea class="form-control" id="desc" name="desc" placeholder="Description"></textarea>
                                </div>
								<button type="submit" class="btn btn-success">Add Product</button>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </form>
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