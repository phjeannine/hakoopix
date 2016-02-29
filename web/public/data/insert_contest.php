<?php

include("../../include/connexion.php");

include("../../include/functions.php");

error_reporting(E_ALL);
ini_set("display_errors", 1);

// On récupère nos valeurs
$title = $_POST['title'];
$date_begin = $_POST['begin'];
$date_ending = $_POST['ending'];
$description = $_POST['description'];
$color_theme = $_POST['color-theme'];
$logo = $_FILES['logo']['name'];
$banner = $_FILES['banner']['name'];

if (isset($active_contest)) {
    $active_contest = $_POST['active-contest'];
}

// On vérifie si tous les champs ne sont pas null
if (empty($title) OR empty($date_begin) OR empty($date_ending) OR empty($description)) {
    // Si les champs sont vides, on affiche une erreur
    echo '<font color="red">Attention, les champs doivent être remplis !</font>';
} else {
    // Si le bouton radio "Actif" est coché
    if (isset($active_contest)) {
        // On update l'ancien is_active pour le remettre à false
        // car il ne peut y avoir qu'un concours actif
        $updateActiveStatut = $db->prepare("UPDATE contest SET is_active = false WHERE is_active = true");
        $updateActiveStatut->execute();

        // On insère dans la BDD le nouveau concours avec la colonne is_active à true
        $insertContest = $db->prepare("INSERT INTO contest(title, date_begin, date_ending, description, color_theme, banner, logo, is_active) VALUES ('" . $title . "', '" . $date_begin . "', '" . $date_ending . "', '" . $description . "', '" . $color_theme . "', '" . $banner . "', '" . $logo . "', true)");
        $insertContest->execute();
        // Si le bouton "Actif" n'est pas coché
    } else {
        // On insère dans la BDD avec la colonne is_active à false
        $insertContest = $db->prepare("INSERT INTO contest(title, date_begin, date_ending, description, color_theme, banner, logo, is_active) VALUES ('" . $title . "', '" . $date_begin . "', '" . $date_ending . "', '" . $description . "', '" . $color_theme . "', '" . $banner . "', '" . $logo . "', false)");
        $insertContest->execute();
    }

    upload_logo();
    upload_banner();

    //header("Location: /contestList");
}

?>