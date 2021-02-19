<?php
	session_start();
	unset($_SESSION['userID']);
	$_SESSION['msg'] =
	'<div class="alert alert-success" role="alert">
	  <strong>Success</strong> you\'ve logged out, don\'t forget to checkback
	</div>';
	header("Location: ./login");