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

  $userId = $_GET['userId'];
  $lastName = $_GET['lastName'];
  $firstName = $_GET['firstName'];
  $token = $_GET['token'];

  $var = $fb->get('/me?fields=picture', $token);
  $obj = $var->getGraphNode();
  $picture = $obj['picture'];
  $photo = $picture['url'];

  $roles = $fb->get('/959119600818575/roles', '959119600818575|NrwTVp41hp0a8XVklYVvKLOKAzE');
  $response = $roles->getGraphEdge();

  foreach ($response as $data) {
    if ($data['user']==$userId) {
      //echo "Bienvenue ".$firstName." ".$lastName." !! Vous etes bien un admin !";
      $_SESSION["role"] = "admin";
      $_SESSION["name"] = $firstName." ".$lastName;
      $_SESSION["idUser"] = $userId;
      $_SESSION["photo"] = $photo;
      echo "<script>window.location = '/contest'</script>";
      exit();
    } else {
      $_SESSION["role"] = "user";
      $_SESSION["name"] = $firstName." ".$lastName;
      $_SESSION["idUser"] = $userId;
      $_SESSION["photo"] = $photo;
      //echo("Bienvenue vous êtes un utilisateur");
      //$result = pg_query($db, "INSERT INTO member(lastname, firstname, title, description, picture,user_id) VALUES ('".$lastName."', '".$firstName."', '"test title"', '"test description"', '".$photo."', '".$userId."')");
      echo "<script>window.location = '/contest'</script>";
      exit();
    }
    //echo "userId : ".$data['user']." - statut : ".$data['role']."<br>";
  }

?>
