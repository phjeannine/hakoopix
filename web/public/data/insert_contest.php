<?php

include("../../include/connexion.php");

include("../../include/functions.php");

// On récupère nos valeurs
$title = $_POST['title'];
$date_begin = $_POST['begin'];
$date_ending = $_POST['ending'];
$description = $_POST['description'];
$color_theme = $_POST['color-theme'];
$logo = $_FILES['logo']['name'];

// On vérifie si tous les champs ne sont pas null
if(empty($title) OR empty($date_begin) OR empty($date_ending) OR empty($description))  {
	// Si les champs sont vides, on affiche une erreur 
    echo '<font color="red">Attention, les champs doivent être remplis !</font>'; 
} else {
	// On insère dans la BDD
	$insertContest = $db->prepare("INSERT INTO contest(title, date_begin, date_ending, description, color_theme, logo, is_active) VALUES ('".$title."', '".$date_begin."', '".$date_ending."', '".$description."', '".$color_theme."', '".$logo."', true)");
	$insertContest->execute();
	
	upload_logo();
	upload_banner();

	header("Location: /contestList");
}

?>