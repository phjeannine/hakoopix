<?php
	session_start();
	require_once __DIR__ . '/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';

	
	$fb = new Facebook\Facebook([
	  'app_id' => '959119600818575',
	  'app_secret' => '9f0062f110ea6d3589e7debcb04c2268',
	  'default_graph_version' => 'v2.5',
	]);


	if(!isset($_SESSION['token']))
	{
		header("Location: http://hakoopix.dev:8888/public/index.php");
	}else{
		$fb->setDefaultAccessToken($_SESSION['token']);
	}




$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$error= 0;
$error_msg= "";

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check === false) {
        $error_msg = "File is not an image.";
        $error = 1;
    }
}

if ($_FILES["fileToUpload"]["size"] > 500000) {
    $error_msg = "Sorry, your file is too large.";
    $error = 1;
}


if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $error_msg =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $error = 1;
}

//Vérification de l'existance de l'album
$_POST["name_album"] = trim($_POST["name_album"]);
if(empty($_POST["name_album"]))
{
	$response = $fb->get('/me/albums?fields=id,can_upload');
	$albums = $response->getGraphEdge()->asArray();
	$albumFacebook = false;
	foreach ($albums as $album) {
		if($album["id"] == $_POST['album'] )
		{
			$albumFacebook = true;
			break;
		}
	}
	if(!$albumFacebook){
	        $error_msg = "L'upload is not allowed in this album.";
	        $error = 1;
	}
}else{
	$data = [
	 	"name" => $_POST["name_album"]
	];
	$response = $fb->post('/me/albums', $data);
	$graphNode = $response->getGraphNode();
	$_POST['album'] = $graphNode['id'];
}



if ($error == 0) {

    $data = [
	  'message' => 'A neat photo upload example. Neat.',
	  'source' => $fb->fileToUpload($_FILES["fileToUpload"]["tmp_name"]),
	];
    try {
	  	$response = $fb->post('/'.$_POST['album'].'/photos', $data);
		header("Location: index.php");
	} catch(FacebookSDKException $e) {
	  	$error_msg = 'Error: ' . $e->getMessage();
	  	
	}
}


header("Location: /?error_msg=".$error_msg);