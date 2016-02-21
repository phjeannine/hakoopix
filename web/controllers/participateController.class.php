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
			//var_dump($_POST);
		}


	}

}