<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


session_start();
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
  echo 'URL Photo : '.$photo.'<br>';
  //echo 'Bienvenu '.$firstName.' ! <br> Coordonnees : <br> userID : '.$userId.' <br> Nom : '.$firstName.' <br> Prenom : '.$lastName.'<br><br>';

  $roles = $fb->get('/959119600818575/roles', '959119600818575|NrwTVp41hp0a8XVklYVvKLOKAzE');
  $response = $roles->getGraphEdge();

  //include('../include/connexion.php');
  $dbconn = pg_pconnect("host=ec2-54-227-254-13.compute-1.amazonaws.com port=5432 dbname=d56s4dlf857hdg user=djsrtxubpmzrta password=Z3D5hJKDJy6OF3fRPeCZ6tho7F");

  foreach ($response as $data) {
    if($data['user']==$userId){
      echo "Bienvenue ".$firstName." ".$lastName." !! Vous etes bien un admin !";
      $_SESSION["role"] = "admin";

      exit();
    } else{
      //echo "Bienvenue ".$firstName." ".$lastName." !! Vous etes Utilisateur !<br>";
      // On fera un SELECT * dans la table 'user' pour vérifier si le user n'est pas déjà inscrit avant d'inserer
      //$request = "INSERT INTO member VALUES(2, 'hbub', 'fnkes', 'hvhg@gmail.com')";
      //$result = pg_send_query($dbconn, $request);
      //$var = pg_send_query($dbconn, "SELECT firstname FROM member WHERE id_member = 1;");
      //echo $var;
      $_SESSION["role"] = "user";
      echo "<script>window.location = '/contest'</script>";
      //
      exit();
    }
    //echo "userId : ".$data['user']." - statut : ".$data['role']."<br>";
  }
?>
