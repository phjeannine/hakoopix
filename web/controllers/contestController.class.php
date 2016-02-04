<?php

class contestController{

	public function indexAction($args){
		$v = new view("contest");
		$v->assign("mesargs", $args);
	}


	public function adduserAction(){
		$idUser = $_SESSION["idUser"];
		$lastName = $_SESSION['lastName'];
		$firstName = $_SESSION['firstName'];
		$picture = $_SESSION['photo'];
		$testObj = new memberModel();
		$testObj->getOneByIdmember($idUser);
		//On teste si l'utilisateur n'existe pas dans la BDD avant de l'inserer
		if($testObj->getIdMember() == 0){
			$member = new memberModel($lastName, $firstName, $picture, $idUser);
			$member->save();
			header('Location: /contest');
		}

	}

}