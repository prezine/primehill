<?php
	session_start();
	include_once '../app.php';
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if ($_POST['passcode'] === KEY) {
			$_SESSION['userID'] = 1;
			header("Location: ../../index");
		} else {
			$_SESSION['msg'] =
			'<div class="alert alert-danger" role="alert">
			  <strong>Ooops!</strong> Incorrect login details.
			</div>';
			header("Location: ". $_SERVER['HTTP_REFERER']);
		}
	}
	