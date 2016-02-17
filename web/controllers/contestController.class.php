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
		$role = $_SESSION['role'];

		//On teste si l'utilisateur n'existe pas dans la BDD avant de l'inserer
		$testObj = new memberModel();
		$testObj->getOneByIdmember($idUser);
		/*
		// Insertion d'un utilisateur seulement
		// A commenter pour que les admins puissent participer
		if($testObj->getIdMember() == 0){
		*/
			$member = new memberModel($lastName, $firstName, $picture, $idUser);
			$member->save();
			//header('Location: /contest');
		/*
		}
		*/
		

	}

	public function updatelikeAction($args){
		$idPhoto = $args['0'];
		$nbLike = $args['1'];
		$nbLike = $nbLike+1;

		$contestObj = new memberModel();
		$contestObj->getOneBy($idPhoto);

		// appel de la méthode save() ici 

		header('Location: /contest');
	}

}