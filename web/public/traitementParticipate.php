<?php
session_start();


include("../include/connexion.php");


//On récupère nos valeurs
if(isset($_POST['title']) OR isset($_POST['description'])) {
	$title = $_POST['title'];
	$description = $_POST['description'];
}

//On vérifie que l'utilisateur existe bien en BDD
$test = $db->prepare("SELECT user_id FROM member");
$test->execute();

$result = $test->fetchAll();
//print_r($result);

//On vérifie le formulaire
if(empty($title) OR empty($description)) {
	//S'il est vide on renvoie une erreur
	echo "<p>Attention, tous les champs doivent être remplis !</p>";
} else {
	$insertParticipation = $db->prepare("UPDATE member SET title='$title', description='$description' WHERE id_member=429");
	$insertParticipation->execute();
	echo "Merci de votre participation";
}
