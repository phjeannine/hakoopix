<?php

include("../include/connexion.php");

function upload_logo() {
	$dossier = 'images/logo/';
	$fichier = basename($_FILES['logo']['name']);
	$taille_maxi = 1000000000;
	$taille = filesize($_FILES['logo']['tmp_name']);
	$extensions = array('.png', '.gif', '.jpg', '.jpeg');
	$extension = strrchr($_FILES['logo']['name'], '.');

	if(!in_array($extension, $extensions)) {
	     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg où jpeg';
	}
	if($taille > $taille_maxi) {
	     $erreur = 'Le fichier est trop lourd.';
	}
	if(!isset($erreur)) {
	     //On formate le nom du fichier ici...
	     $fichier = strtr($fichier, 
	          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
	          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
	     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
	     if(move_uploaded_file($_FILES['logo']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
	     {
	          echo '';
	     }
	     else
	     {
	          echo '';
	     }
	}
	else
	{
	     echo $erreur;
	}
}

// On récupère nos valeurs
$title = $_POST['title'];
$date_begin = $_POST['begin'];
$date_ending = $_POST['ending'];
$description = $_POST['description'];
$color_theme = $_POST['color-theme'];

// On vérifie si tous les champs ne sont pas null
if(empty($title) OR empty($date_begin) OR empty($date_ending) OR empty($description))  {
	// Si les champs sont vides, on affiche une erreur 
    echo '<font color="red">Attention, les champs doivent être remplis !</font>'; 
} else {
	// On insère dans la BDD
	$insertContest = $db->prepare("INSERT INTO contest(title, date_begin, date_ending, description, color_theme) VALUES ('".$title."', '".$date_begin."', '".$date_ending."', '".$description."', '".$color_theme."')");
	$insertContest->execute();
	
	upload_logo();

	header("Location: /contestList");
}

?>