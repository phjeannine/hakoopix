<?php

class participateController{

	public function indexAction($args){
		$v = new view("participate");
		$v->assign("mesargs", $args);
	}

	public function insertAction($args){


		$title = $_POST['title'];
		$description = $_POST['description'];
		$id_member = $_SESSION['idUser'];
		$id_contest = $_SESSION['idContest'];
		$nb_like = 0;
		$id = '0';
		$image_link = $_POST['imgSelected'];

		//On vérifie si l'utilisateur a déjà participé ou pas
		$verifBdd = new pictureModel();
		$verifBdd->getAll(true);
		//$test = $verifBdd->getIdMember();
		$hasParticipate = false;

		foreach ($verifBdd as $obj) {
			if($obj['id_member']==$id_member && $obj['id_contest']==$id_contest){
				$hasParticipate = true;
			}
		}
		if(!$hasParticipate){
			//Si non, on enregistre
			$participateObj = new pictureModel($id, $title, $description, $image_link, $id_contest, $id_member, $nb_like);
			$participateObj->save();
			header("Location: /contest");
		} else {
			header("Location: /contest");
		}


	}


	public function loginAction() {
		session_start();
		require_once APPLICATION_PATH . '/public/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';


		$fb = new Facebook\Facebook([
				'app_id' => '959119600818575',
				'app_secret' => '9f0062f110ea6d3589e7debcb04c2268',
				'default_graph_version' => 'v2.5',
		]);


		$helper = $fb->getRedirectLoginHelper();

		try{
			$accessToken = $helper->getAccessToken();
		}catch(Facebook\Exceptions\FacebookResponseException $e) {
			// When Graph returns an error
			echo 'Graph returned an error: ' . $e->getMessage();
			exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
			// When validation fails or other local issues
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
		}

		if( isset($accessToken)){

			$_SESSION["token"] = (string) $accessToken;
			header("Location: https://hakoopix.herokuapp.com/participate");
		}
	}
}