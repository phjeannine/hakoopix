<?php

	session_start();
	require_once APPLICATION_PATH . '/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';

	
	$fb = new Facebook\Facebook([
	  'app_id' => '959119600818575',
	  'app_secret' => '9f0062f110ea6d3589e7debcb04c2268',
	  'default_graph_version' => 'v2.5',
	  ]);


	$helper = $fb->getRedirectLoginHelper();

	try{
		$accessToken = $helper->getAccessToken();
	}catch(Facebook\Exceptions\FacebookResponseException $e) {
	  // When Graph returns an error
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  // When validation fails or other local issues
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}

	if( isset($accessToken)){
		
		$_SESSION["token"] = (string) $accessToken;
		header("Location: https://hakoopix.herokuapp.com/public/index.php");
	}