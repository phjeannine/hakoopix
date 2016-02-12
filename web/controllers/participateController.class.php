<?php

class participateController{

	public function indexAction($args){
		$v = new view("participate");
		$v->assign("mesargs", $args);
	}

	public function insertAction($args){


		$title = $_POST['title'];
		$description = $_POST['description'];
		if(isset($_POST['imgParticipation'])){
			//Si ça vient d'une photo FB
			$participation = $_POST['imgParticipation'];
		} else if (isset($_FILES['imgParticipation']['name'])) {
			//Ou si ça vient du desktop
			$participation = $_FILES['imgParticipation']['name'];
		}
		$idUser = $_SESSION['idUser'];
		
		$idContest = $_SESSION['idContest'];

		$participateObj = new pictureModel($title, $description, 0, $participation, $idContest, $idUser);
		$participateObj->save();
		//header("Location: /contest");
	}

	public function selectAction($args){
	}
}