<?php
	session_start();
	include_once '../connect.php';
	include_once '../controllers/Primehill.php';
	include_once '../controllers/Database.php';
	include_once '../controllers/Product.php';
	include_once '../controllers/Uploader.php';
	$product = new Products($conn);
	$upload = new Uploader($conn);
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// instantiating and obj creation
        $upload->setMaxSize(5);
        $upload->setDir('../storage/');
        $upload->setExtension(array("jpg","jpeg","png"));
        $imgpath = $upload->action('file'); // { 201: large file, 202: Wrong file, value: File path...}
        if ($imgpath == 201) {
            echo $imgpath . ': Large file';
        } else if ($imgpath == 202) {
            echo $imgpath . ': Wrong file';
        } else {
        	$content = preg_replace("/\r\n|\r/", "<br />", $_POST['desc']);
			$content = trim($content);
        	$data = array(
				'project_name' => htmlspecialchars($_POST['name'], ENT_QUOTES),
				'project_image' => $imgpath,
				'project_category' => $_POST['category'],
				'project_desc' => $content,
				'dateCreated' => GLOBAL_DATE
			);
			if ($product->addProduct($data) == 200) {
				$_SESSION['msg'] = 
				'<div class="alert alert-success" role="alert">
				  <strong>Awesome!</strong> your product has been added successfully.
				</div>';
			} else {
				$_SESSION['msg'] = 
				'<div class="alert alert-danger" role="alert">
				  <strong>Ooops!</strong> Something went wrong try again shortly.
				</div>';
			}
			header("Location: ". $_SERVER['HTTP_REFERER']);
        }
	}