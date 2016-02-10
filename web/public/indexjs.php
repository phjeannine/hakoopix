<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Mon application FB</title>
		<meta name="description" content="description de mon application">


		<meta property="og:url"           content="http://www.your-domain.com/your-page.html" />
	    <meta property="og:type"          content="website" />
	    <meta property="og:title"         content="Your Website Title" />
	    <meta property="og:description"   content="Your description" />
	    <meta property="og:image"         content="http://www.your-domain.com/path/image.jpg" />



		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script src="js/jquery-1.12.0.min.js"></script>
	</head>
	<body>

		<script>
		  window.fbAsyncInit = function() {

		    FB.init({
		      appId      : '959119600818575',
		      xfbml      : true,
		      version    : 'v2.5'
		    });
		    checkLoginState()

		  };

		  (function(d, s, id){
		     var js, fjs = d.getElementsByTagName(s)[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement(s); js.id = id;
		     js.src = "//connect.facebook.net/fr_FR/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));






		  function checkLoginState(){
		  	console.log("check state");

		    FB.getLoginStatus(function(response) {
		      statusChangeCallback(response);
		    });
		  }


		  function statusChangeCallback(response){
		  	console.log(response)

		  	if(response.status === "connected")
		  	{
		  		console.log("Connecté et autorisé")

		  		 FB.api('/me?fields=email,name,cover', function(response) {
		  		 	$("body").css("background-image", "url('"+response.cover.source+"')")
			    });



		  	}else if(response.status === "not_authorized")
		  	{
		  		console.log("Connecté et non autorisé")
		  	}else{
		  		console.log("Non Connecté")
		  	}
		  }


		</script>

		<header>
			<h1>Application FB</h1>
		
			<div class="fb-like" data-action="recommend" data-href="http://www.google.fr"></div>

			<hr>

			<div class="fb-share-button" data-layout="button_count"></div>

			<hr>

			<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
			</fb:login-button>

			<nav>
				
			</nav>
		</header>
		<section>

			
		</section>
		<aside>
		</aside>
		<footer>
			
		</footer>
	</body>
</html>