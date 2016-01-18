<?php

// On récupère l'URL en cours
$uri = $_SERVER['REQUEST_URI'];

include("headerAdmin.php");

if($uri == "/addContest") {
	include("addContest.php");
} else if($uri == "/addContest") {
	include("addAdmin.php");
} else {
	echo "No view to show";
}

include("footerAdmin.php");

?>