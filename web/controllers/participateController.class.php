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
		$image_link ="";
		if(isset($_POST['imgSelected'])){
			//Si ça vient d'une photo FB
			$image_link = $_POST['imgSelected'];
		} else if (isset($_FILES['imgParticipation']['name'])) {
			//Ou si ça vient du desktop
			$image_link = $_FILES['imgParticipation']['name'];
		}

		//On vérifie si l'utilisateur a déjà participé ou pas
		$verifBdd = new pictureModel();
		$verifBdd->getOneByIdMember($id_member);

		if($verifBdd->getIdMember()==0){
			//Si non, on enregistre
			$participateObj = new pictureModel($id, $title, $description, $image_link, $id_contest, $id_member, $nb_like);
			$participateObj->save();
			header("Location: /contest");
		} else {
			header("Location: /contest");
		}


	}

}