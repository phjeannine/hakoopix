<?php

class participateController{

	public function indexAction($args){
		$v = new view("participate");
		$v->assign("mesargs", $args);
	}

	public function insertAction($args){


		$title = $_POST['title'];
		$description = $_POST['description'];
		$idUser = $_SESSION['idUser'];
		$idContest = $_SESSION['idContest'];
		$nbLike = 0;
		$id = '0';
		if(isset($_POST['imgSelected'])){
			//Si ça vient d'une photo FB
			$participation = $_POST['imgSelected'];
		} else if (isset($_FILES['imgParticipation']['name'])) {
			//Ou si ça vient du desktop
			$participation = $_FILES['imgParticipation']['name'];
		}

		$participateObj = new pictureModel($id, $title, $description, $participation, $idContest, $idUser, $nbLike);
		$participateObj->save();
		header("Location: /contest");
	}

}