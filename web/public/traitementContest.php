<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../include/connexion.php");

// On récupère nos valeurs
$title = $_POST['title'];
$date_begin = $_POST['begin'];
$date_ending = $_POST['ending'];
$description = $_POST['description'];

// On vérifie si tous les champs ne sont pas null
if(empty($title) OR empty($date_begin) OR empty($date_ending) OR empty($description))  {
	// Si les champs sont vides, on affiche une erreur 
    echo '<font color="red">Attention, les champs doivent être remplis !</font>'; 
} else {
	// On insère dans la BDD
	$insertContest = pg_query($db, "INSERT INTO contest(title, date_begin, date_ending, description) VALUES ('".$title."', '".$date_begin."', '".$date_ending."', '".$description."')");
	header("Location: /addContest");
}

?>