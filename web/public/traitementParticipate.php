<?php

session_start();

include("../include/connexion.php");


//On récupère nos valeurs
if(isset($_POST['title']) && isset($_POST['description']) && !empty($_POST['title']) && !empty($_POST['description'])) {
	$title = $_POST['title'];
	$description = $_POST['description'];
	$idUser = $_SESSION['idUser'];

	echo "Votre userId est : ".$_SESSION['idUser'];

	/*$selectContest = "SELECT * FROM contest WHERE is_active = true"; 
	$result = $db->prepare($selectContest); 
	$result->execute(); 
	$contestResult = $result->fetch();
	$idContest = $contestResult['id_contest'];*/

	//$insertParticipation = $db->prepare("UPDATE member SET title='$title', description='$description' WHERE id_member=429");
	//$insertParticipation = $db->prepare("INSERT INTO picture(title, description) VALUES ('".$title."', '".$description."')");
	//$insertParticipation->execute();
	//echo "<div class='success'>Merci pour votre inscription</div>";

}else {
	echo "<div class='error'>Attention, tous les champs doivent être remplis !</div>";
}
