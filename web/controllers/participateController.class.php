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
		$participation = $_FILES['imgParticipation']['name'];
		$idContest = $_SESSION['idContest'];

		$participateObj = new pictureModel($title, $description, 0, $participation, $idContest, $idUser);
		$participateObj->save();
		header("Location: /contest");
	}

	public function selectAction($args){
	}
}