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
		
		// Insertion d'un utilisateur seulement
		// A commenter pour que les admins puissent participer
		if($testObj->getIdMember() == 0){
		
			$member = new memberModel($lastName, $firstName, $picture, $idUser);
			$member->save();
			header('Location: /contest');
		
		}
		
		

	}

	public function updatelikeAction($args){
		$idPhoto = $args['0'];

		$pictureGet = new pictureModel();
		$pictureGet->getOneBy($idPhoto);

		$nbLike = $pictureGet->getNbLike();
		$title = $pictureGet->getTitle();
		$description = $pictureGet->getDescription();
		$image_link = $pictureGet->getImageLink();
		$id_contest = $pictureGet->getIdContest();
		$id_member = $pictureGet->getIdMember();

		$like = $nbLike+1;
		$idVote = 0;

		$pictureObj = new pictureModel($idPhoto,$title,$description,$image_link,$id_contest,$id_member,$like);
		$pictureObj->save();

		$voteObj = new voteModel($idVote,$like,$id_contest,$_SESSION['idUser'],$idPhoto);
		$voteObj->save();

		header('Location: /contest');
	}

}