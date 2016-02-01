<?php

include("../../include/connexion.php");

include("../../include/functions.php");

error_reporting(E_ALL); 
ini_set("display_errors", 1); 

// On récupère nos valeurs
$title = $_POST['update-title'];
$date_begin = $_POST['update-begin'];
$date_ending = $_POST['update-ending'];
$description = $_POST['update-description'];
$color_theme = $_POST['update-color-theme'];
$logo = $_FILES['update-logo']['name'];
$banner = $_FILES['update-banner']['name'];
$contest = $_POST['choosen-contest'];

// On vérifie si tous les champs ne sont pas null
if(empty($title) OR empty($date_begin) OR empty($date_ending) OR empty($description))  {
	// Si les champs sont vides, on affiche une erreur 
    echo '<font color="red">Attention, les champs doivent être remplis !</font>'; 
} else {
	$updateActiveStatut = $db->prepare("UPDATE contest SET title = '".$title."', date_begin = '".$date_begin."', date_ending = '".$date_ending."', description = '".$description."', color_theme = '".$color_theme."', logo = '".$logo."', banner = '".$banner."' WHERE title = '".$contest."'");
	$updateActiveStatut->execute();
}

	header("Location: /contestList");

?>