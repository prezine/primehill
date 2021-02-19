<?php
	session_start();
	include_once '../connect.php';
	include_once '../controllers/Primehill.php';
	include_once '../controllers/Database.php';
	include_once '../controllers/Product.php';
	$product = new Products($conn);
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    	$data = array(
			'category_name' => $_POST['name'],
			'category_desc' => 'N/A',
			'dateCreated' => GLOBAL_DATE
		);
		if ($product->addCategory($data) == 200) {
			$_SESSION['msg'] = 
			'<div class="alert alert-success" role="alert">
			  <strong>Awesome!</strong> your category has been created successfully.
			</div>';
		} else {
			$_SESSION['msg'] = 
			'<div class="alert alert-danger" role="alert">
			  <strong>Ooops!</strong> Something went wrong try again shortly.
			</div>';
		}
		header("Location: ". $_SERVER['HTTP_REFERER']);
	}