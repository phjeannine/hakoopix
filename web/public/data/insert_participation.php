<?php


include("../../include/connexion.php");

include("../../include/functions.php");

//On récupère nos valeurs
if(isset($_POST['title']) OR isset($_POST['description'])) {
	$title = $_POST['title'];
	$description = $_POST['description'];
}

//On vérifie que l'utilisateur existe bien en BDD
/*$test = $db->prepare("SELECT user_id FROM member");
$test->execute();

$result = $test->fetchAll();*/
//print_r($result);

$erreur = false;
$message = "";

//On vérifie le formulaire
if(empty($title) OR empty($description)) {
	//S'il est vide on renvoie une erreur
	$erreur = true;
	$message = "<div class='error'>Attention, tous les champs doivent être remplis !</div>";
} else {
	//$insertParticipation = $db->prepare("UPDATE member SET title='$title', description='$description' WHERE id_member=429");
	$insertParticipation = $db->prepare("INSERT INTO picture(title, description) VALUES ('".$title."', '".$description."')");
	$insertParticipation->execute();
	$message = "<div class='success'>Merci pour votre inscription</div>";
}

if($erreur == false) {
	echo $message;
} else {
	echo $message;
}
