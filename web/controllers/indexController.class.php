<?php

class indexController extends basesql {
	public function indexAction($args){

		if ($this->getActiveContest()== FALSE) {
			$v = new view("nocontest");
			$v->assign("mesargs", $args);
		}
		else {
			$v = new view("index");
			$v->assign("mesargs", $args);
		}


	}

	public function insertAction($args){
		require_once __DIR__ . '/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';

		$fb = new Facebook\Facebook([
		  'app_id' => '959119600818575',
		  'app_secret' => '9f0062f110ea6d3589e7debcb04c2268',
		  'default_graph_version' => 'v2.5',
		  ]);

		$userId = $_GET['userId'];
		$lastName = $_GET['lastName'];
		$firstName = $_GET['firstName'];
		$token = $_GET['token'];

		$var = $fb->get('/me?fields=picture, albums', $token);
		$obj = $var->getGraphNode();
		$picture = $obj['picture'];
		$photo = $picture['url'];

		$roles = $fb->get('/959119600818575/roles', '959119600818575|NrwTVp41hp0a8XVklYVvKLOKAzE');
		$response = $roles->getGraphEdge();


		//On vérifie si il est admin ou pas
		foreach($response as $data){
		  if($userId == $data['user']) {
		    $_SESSION["role"] = "admin";
		    $_SESSION["name"] = $firstName." ".$lastName;
		    $_SESSION["idUser"] = $userId;
		    $_SESSION["photo"] = $photo;
		    header('Location: /contest');
		    exit();
		  }
		}

		//On liste les user inscrits
		$verif = $db->prepare("SELECT id_member FROM member");
		$verif->execute();

		$result = $verif->fetchAll(PDO::FETCH_ASSOC);

		//Si le tableau est vide on enregistre le user
		if(count($result)==0) {

		   $_SESSION["role"] = "user";
		  $_SESSION["name"] = $firstName." ".$lastName;
		  $_SESSION["idUser"] = $userId;
		  $_SESSION["photo"] = $photo;
		  $insertUser = $db->prepare("INSERT INTO member(id_member, lastname, firstname, picture) VALUES ('".$userId."','".$lastName."','".$firstName."','".$photo."')");
		  $insertUser->execute();
		  header('Location: /contest');
		}

		//On parcoure le tableau
		foreach($result as $count) {

		   $_SESSION["role"] = "user";
		    $_SESSION["name"] = $firstName." ".$lastName;
		    $_SESSION["idUser"] = $userId;
		    $_SESSION["photo"] = $photo;


		  if($userId != $count['id_member']) {
		    
		    //echo "on enregistre"
		    $insertUser = $db->prepare("INSERT INTO member(id_member, lastname, firstname, picture) VALUES ('".$userId."','".$lastName."','".$firstName."','".$photo."')");
		    $insertUser->execute();
		    header('Location: /contest');

		  } else {
		   //echo "on enregistre pas<br>";
		    header('Location: /contest');
		  }
		}


	}
}