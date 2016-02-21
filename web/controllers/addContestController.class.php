<?php

class addContestController extends basesql
{
	public function indexAction($args)
	{
		$v = new view("addContest");
		$v->assign("mesargs", $args);
	}

	public function insertAction($args)
	{
		require_once APPLICATION_PATH . '/public/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';

		//Variables sans Logo & Banner
		$id = '0';
		$title = $_POST['title'];
		$date_begin = $_POST['begin'];
		$date_ending = $_POST['ending'];
		$description = $_POST['description'];
		$color_theme = $_POST['color-theme'];
		$active_contest = 0;
		$delete_contest = 0;

		if (!empty($_POST['active-contest'])) {
			$active_contest = $_POST['active-contest'];
		}

		//Création de l'album avec le logo et le banner
		$this->createAlbum();

		//Récupération de l'album ID
		$albumId = $this->getAlbum();

		//Récupération des URL du logo et du banner
		$template = $this->getBannerLogo($albumId);

		//Logo & Banner
		$logo = $template[0];
		$banner = $template[1];

		$addContestObj = new contestModel($id, $title, $date_begin, $date_ending, $description, $color_theme, $logo, $banner, $active_contest, $delete_contest);

        $getActiveContest = $this->getActiveContest();
        if (!$getActiveContest == FALSE & isset ($_POST['active-contest'])) {
            $this->unsetActiveContest($getActiveContest['id']);
        }
		$addContestObj->save();
        header("Location: /contestList");
	}

	//Créé l'album
	function createAlbum()
	{
		$fb = new Facebook\Facebook([
				'app_id' => '959119600818575',
				'app_secret' => '9f0062f110ea6d3589e7debcb04c2268',
				'default_graph_version' => 'v2.5',
		]);

		//Récupère token Admin
		$fb->setDefaultAccessToken($_SESSION['token']);
		try {
			$response = $fb->get('/196951203980314?fields=access_token');
			$token = $response->getGraphNode()->asArray();
			$tokenId = $token['access_token'];
		}
		catch (Facebook\Exceptions\FacebookResponseException $e) {
			// After you're done debugging, comment out the below lines
			$result = $e->getMessage();
			echo "<pre>";
			print_r($result);
			echo "</pre>";
		}

		$fb->setDefaultAccessToken($tokenId);

		$target_dir = "images/";
		$target_file = $target_dir . basename($_FILES['banner']['name']);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
		$error = 0;
		$error_msg = "";
		if (isset($_POST["submit"])) {
			$check = getimagesize($_FILES["banner"]["name"]);
			if ($check === false) {
				$error_msg = "File is not an image.";
				$error = 1;
			}
			$check = getimagesize($_FILES["logo"]["name"]);
			if ($check === false) {
				$error_msg = "File is not an image.";
				$error = 1;
			}
		}

        if ($_FILES["banner"]["size"] > 500000) {
            $error_msg = "Sorry, your file is too large.";
            $error = 1;
        }

		if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif"
		) {
			$error_msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$error = 1;
		}
		//Vérification de l'existance de l'album
		$_POST["title"] = trim($_POST["title"]);
		if (empty($_POST["title"])) {
			$response = $fb->get('/196951203980314/albums?fields=id,can_upload');
			$albums = $response->getGraphEdge()->asArray();
			$albumFacebook = false;
			foreach ($albums as $album) {
				if ($album["id"] == $_POST['album']) {
					$albumFacebook = true;
					break;
				}
			}
			if (!$albumFacebook) {
				$error_msg = "L'upload is not allowed in this album.";
				$error = 1;
			}
		} else {
			$data = [
					"name" => $_POST["title"]
			];
			$response = $fb->post('/196951203980314/albums', $data);
			$graphNode = $response->getGraphNode();
			$_POST['album'] = $graphNode['id'];
		}

		if ($error == 0) {
			$data = [
					'message' => "Logo",
					'source' => $fb->fileToUpload($_FILES["logo"]["tmp_name"]),
			];
			try {
				$response = $fb->post('/' . $_POST['album'] . '/photos', $data);
			} catch (Facebook\Exceptions\FacebookResponseException $e) {
				$error_msg = 'Error: ' . $e->getMessage();
			}
		}

		if ($error == 0) {
			$data = [
					'message' => "Banner",
					'source' => $fb->fileToUpload($_FILES["banner"]["tmp_name"]),
			];
			try {
				$response = $fb->post('/' . $_POST['album'] . '/photos', $data);

			} catch (Facebook\Exceptions\FacebookResponseException $e) {
				$error_msg = 'Error: ' . $e->getMessage();
			}
		}
	}


	//Récupère le banner et la photo pour renseigné dans la BDD les URLs
	function getAlbum()
	{
		$fb = new Facebook\Facebook([
				'app_id' => '959119600818575',
				'app_secret' => '9f0062f110ea6d3589e7debcb04c2268',
				'default_graph_version' => 'v2.5',
		]);

		//Récupère token Admin
		$fb->setDefaultAccessToken($_SESSION['token']);
		try {
			$response = $fb->get('/196951203980314?fields=access_token');
			$token = $response->getGraphNode()->asArray();
			$tokenId = $token['access_token'];
		}
		catch (Facebook\Exceptions\FacebookResponseException $e) {
			// After you're done debugging, comment out the below lines
			$result = $e->getMessage();
			echo "<pre>";
			print_r($result);
			echo "</pre>";
		}

		$fb->setDefaultAccessToken($tokenId);

		try {
			$response = $fb->get('/196951203980314/albums?fields=name');
			$albums = $response->getGraphEdge()->asArray();
			foreach ($albums as $album) {
				if($album['name'] == $_POST['title']) {
					$albumId = $album['id'];
				}
			}
		}
		catch (Facebook\Exceptions\FacebookResponseException $e) {
		// After you're done debugging, comment out the below lines
			$result = $e->getMessage();
			echo "<pre>";
			print_r($result);
			echo "</pre>";
		}
		return $albumId;
	}

	function getBannerLogo($albumId) {
		$fb = new Facebook\Facebook([
				'app_id' => '959119600818575',
				'app_secret' => '9f0062f110ea6d3589e7debcb04c2268',
				'default_graph_version' => 'v2.5',
		]);

		//Récupère token Admin
		$fb->setDefaultAccessToken($_SESSION['token']);
		try {
			$response = $fb->get('/196951203980314?fields=access_token');
			$token = $response->getGraphNode()->asArray();
			$tokenId = $token['access_token'];
		}
		catch (Facebook\Exceptions\FacebookResponseException $e) {
			// After you're done debugging, comment out the below lines
			$result = $e->getMessage();
			echo "<pre>";
			print_r($result);
			echo "</pre>";
		}

		$fb->setDefaultAccessToken($tokenId);

		try {
			$response = $fb->get('/'.$albumId.'?fields=name,photos{name,source}');
			$items = $response->getGraphNode()->asArray();
			foreach ($items['photos'] as $item) {
				$bannerlogo[] = $item['source'];
			}

		}
		catch (Facebook\Exceptions\FacebookResponseException $e) {
			// After you're done debugging, comment out the below lines
			$result = $e->getMessage();
			echo "<pre>";
			print_r($result);
			echo "</pre>";
		}
		return $bannerlogo;
	}
}