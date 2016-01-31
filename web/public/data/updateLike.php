<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("../../include/connexion.php");

$idPhoto = $_GET['image'];
$nbLike = $_GET['nbLike'];
$nbLike = $nbLike+1;

$results = $db->query("UPDATE picture SET nb_like=".$nbLike." WHERE id_picture=".$idPhoto);

header('Location: /contest');
?>

