<?php

/*
function pg_connection_string() {
	return "dbname=d5p9s6nvf6ggtq host=ec2-54-204-8-224.compute-1.amazonaws.com port=5432 user=bjcjnkzygeqlza password=zmXSRzTXA2OWa_KOCJTbD53g82 sslmode=require";
}

$db = pg_connect(pg_connection_string());
if (!$db) {
    echo "Database connection error.";
    exit;
}
*/

try {
  $db = new PDO("pgsql:host=ec2-54-204-8-224.compute-1.amazonaws.com; dbname=d5p9s6nvf6ggtq", "bjcjnkzygeqlza", "zmXSRzTXA2OWa_KOCJTbD53g82");
}
catch(PDOException $e) {
  $db = null;
  echo 'ERREUR DB: ' . $e->getMessage();
}

//session_start();

?>