<?php

// Dashboard => fonction d'upload logo 
function upload_logo() {
	$dossier = '../images/logo/';
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


// Dashboard => fonction d'upload bannière 
function upload_banner() {
	$dossier = '../images/banner/';
	$fichier = basename($_FILES['banner']['name']);
	$taille_maxi = 1000000000;
	$taille = filesize($_FILES['banner']['tmp_name']);
	$extensions = array('.png', '.gif', '.jpg', '.jpeg');
	$extension = strrchr($_FILES['banner']['name'], '.');

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
	     if(move_uploaded_file($_FILES['banner']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
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



// Participation => fonction d'upload 
function upload_participation() {
	$dossier = '../images/participation/';
	$fichier = basename($_FILES['imgParticipation']['name']);
	$taille_maxi = 1000000000;
	$taille = filesize($_FILES['imgParticipation']['tmp_name']);
	$extensions = array('.png', '.gif', '.jpg', '.jpeg');
	$extension = strrchr($_FILES['imgParticipation']['name'], '.');

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
	     if(move_uploaded_file($_FILES['imgParticipation']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
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


?>