<?php

session_start();

include("../include/connexion.php");


//On récupère nos valeurs
if(isset($_POST['title']) && isset($_POST['description']) && !empty($_POST['title']) && !empty($_POST['description'])) {
	$title = $_POST['title'];
	$description = $_POST['description'];
	$idUser = $_SESSION['idUser'];


	//On récupère l'id du concours
	$selectContest = "SELECT * FROM contest WHERE is_active = true"; 
	$result = $db->prepare($selectContest); 
	$result->execute(); 
	$contestResult = $result->fetch();
	$idContest = $contestResult['id_contest'];

	//Je vérifie si l'user n'a pas déjà participé au concours
		$verif = $db->prepare("SELECT id_member, id_contest FROM picture");
		$verif->execute();
		$result = $verif->fetchAll(PDO::FETCH_ASSOC);

		//Si le tableau est vide on enregistre la 1ère participation
		if(count($result)==0){
			$insertParticipation = $db->prepare("INSERT INTO picture(title, description, id_contest, id_member) VALUES ('".$title."', '".$description."', '".$idContest."', '".$idUser."')");
				$insertParticipation->execute();
				header('Location: /contest');
		}

		//On parcoure le tableau
		foreach($result as $count){
			if(($idUser === $count['id_member']) && ($idContest === $count['id_contest'])) {
				header('Location: /contest');
				exit();
			} else {
				//On ajoute à la BDD la participation du membre
				$insertParticipation = $db->prepare("INSERT INTO picture(title, description, id_contest, id_member) VALUES ('".$title."', '".$description."', '".$idContest."', '".$idUser."')");
				$insertParticipation->execute();
				header('Location: /contest');
			}
		}

}else {
	echo "<p>Attention, tous les champs doivent être remplis !</p>";
}
