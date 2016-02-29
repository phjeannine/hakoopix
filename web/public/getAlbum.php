<?php

include("../include/connexion.php");

require_once __DIR__ . '/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';


$fb = new Facebook\Facebook([
    'app_id' => '959119600818575',
    'app_secret' => '9f0062f110ea6d3589e7debcb04c2268',
    'default_graph_version' => 'v2.5',
]);

$name = $_GET['name'];
$photos = $_GET['photos'];

var_dump($name + $photos);

?>