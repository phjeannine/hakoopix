<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../include/connexion.php");

require_once __DIR__ . '/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';


$fb = new Facebook\Facebook([
  'app_id' => '959119600818575',
  'app_secret' => '9f0062f110ea6d3589e7debcb04c2268',
  'default_graph_version' => 'v2.5',
  ]);

$id = $_GET['id'];
$lastName = $_GET['last_name'];
$firstName = $_GET['first_name'];
$token = $_GET['token'];

$var = $fb->get('/me?fields=picture', $token);
$obj = $var->getGraphNode();
$picture = $obj['picture'];
$photo = $picture['url'];


$roles = $fb->get('/959119600818575/roles', '959119600818575|NrwTVp41hp0a8XVklYVvKLOKAzE');
$response = $roles->getGraphEdge();
$isAdmin=false;
//On vérifie si le user est admin ou pas
foreach($response as $data){
  $var = $data["user"];
  if($id==$var) {
    $_SESSION["role"] = "admin";
    $_SESSION["name"] = $firstName." ".$lastName;
    $_SESSION["firstName"] = $firstName;
    $_SESSION["lastName"] = $lastName;
    $_SESSION["idUser"] = $id;
    $_SESSION["photo"] = $photo;
    $isAdmin = true;
    header("Location: /contest");
    exit();
  }
}

if(!$isAdmin){
    $_SESSION["role"] = "user";
    $_SESSION["name"] = $firstName." ".$lastName;
    $_SESSION["firstName"] = $firstName;
    $_SESSION["lastName"] = $lastName;
    $_SESSION["idUser"] = $id;
    $_SESSION["photo"] = $photo;
    header("Location: /contest/adduser");
  }

?>

