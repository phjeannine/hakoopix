<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Hakoopix</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="css/main.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery-1.12.0.min.js"></script>
		<script src="js/script.js" type="text/javascript"></script>
	    <script src="js/functions.js" type="text/javascript"></script>
	    <script src="js/jscolor.js" type="text/javascript"></script>
	    <script src="../templates/sb-admin/js/plugins/morris/raphael.min.js"></script>
	    <script src="http://code.highcharts.com/highcharts.js"></script>
	</head>
	<body>
	<!-- Navigation -->
        <?php if($uri != "/dashboard" && $uri != "/addContest" && $uri != "/addAdmin" && $uri != "/contestList" && $uri != "/addPrice" && $uri != "/updateContest" && $uri != "/userList") { ?>
          <nav class="navbar navbar-fixed-top" role="navigation" style="background-color: #12ba74;">
            <div class="container">
              <div class="navbar-header">
                  <a class="navbar-brand" href="/">Home</a>
                  <span> Facebook Contest</span>
              </div>

              <div class="navbar-collapse collapse">
                <?php  if(!empty($_SESSION)){ ?>
                <ul class="nav navbar-nav pull-right">
                  <li><img class="user-picture-profile" src="<?php echo $_SESSION['photo'];?>"/></li>
                  <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><strong><?php echo $_SESSION["name"];?> </strong> <span class="caret"></span></a>
                    <ul id="g-account-menu" class="dropdown-menu" role="menu">
                      <?php if($_SESSION["role"] == "admin") { ?>
                        <li><a href="/dashboard" title="Administration">Administration</a></li>
                        <hr>
                        <li><a href="data/disconnect.php">Déconnexion</a></li>
                      <?php } else { ?>
                        <li><a href="/participate" title="Administration">Participer</a></li>
                        <li><a href="/participate" title="Administration">Mes photos</a></li>
                        <hr>
                        <li><a href="data/disconnect.php">Déconnexion</a></li>
                      <?php } ?>
                    </ul>
                  </li>
                  <li><a href="data/disconnect.php"><i class="fa fa-power-off"></i></a></li>
                </ul>
                <?php } ?>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
          </nav>
        <?php } ?><br><br>
	   <!-- Code php pour la récupération des photos depuis le compte facebook de l'utilisateur -->
		<?php
			
		    require_once __DIR__ . '/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';

			$fb = new Facebook\Facebook([
			  'app_id' => '959119600818575',
			  'app_secret' => '9f0062f110ea6d3589e7debcb04c2268',
			  'default_graph_version' => 'v2.5',
			]);

			if(!isset($_SESSION['token']) || !verifyAccessToken())
			{
				unset($_SESSION['token']);
				$helper = $fb->getRedirectLoginHelper();
				$scope = ["email", "user_likes", "user_photos", "publish_actions"];
				$loginUrl =  $helper->getLoginUrl("https://hakoopix.herokuapp.com/public/login-callback.php", $scope);
			}else{
				$fb->setDefaultAccessToken($_SESSION['token']);
			}

			function verifyAccessToken(){
				$graph_url = "https://graph.facebook.com/me?access_token=" . $_SESSION['token'];
		       	$ch = curl_init($graph_url); 
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
				$decoded_response = json_decode(curl_exec($ch)); 
				curl_close($ch); 
		       	if (isset($decoded_response->error) && $decoded_response->error->type== "OAuthException") {
		       		return false;
		      	} 
		      	return true;
			}

		?>
		
		<header class="row col-lg-10 col-md-10 col-sm-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
			<br>
			<form role="form" class="col-md-offset-1 ol-sm-offset-1" method="POST" action="/participate/insert" enctype="multipart/form-data">
            <div class="box-body col-md-11 col-sm-11">

             <div class="form-group col-md-12">
                <label class="col-md-offset-4 col-sm-offset-4" for="exampleInputEmail1"><br>Participation au concours </label>
             </div>

             <div class="form-group col-md-12">
               <label for="exampleInputEmail1">Titre</label>
               <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title..." name="title" required>
             </div>
              
             <div class="form-group col-md-12 col-sm-12">
               <label for="exampleInputEmail1">Description</label>
               <textarea class="form-control" rows="3" name="description"></textarea>
             </div>

             <div class="form-group">
                  <div class="col-md-12 col-sm-12">
                    <label for="exampleInputFile">Votre image</label>
                    <input type="file"  class="btn btn-default" id="inputImage" name="imgParticipation" required>
                    <p class="help-block">Importer une image ou <strong>sélectionnez-la </strong>parmi vos photos cidessous </p><br><br>
                    <div class="imgFbUser">

					    <?php if(!isset($_SESSION['token'])):?>

						<a href="<?php echo $loginUrl;?>">Se connecter à facebook</a>

					    <?php else: ?>

						<?php
						  $response = $fb->get('/me?fields=email');
						  $userNode = $response->getGraphUser();
						  
						  //Affiche toutes les photos des albums

						  $response = $fb->get('/me/albums?fields=name,photos{name,source}');
						  $albums = $response->getGraphEdge()->asArray();
						  
						  foreach ($albums as $album) {
						  	//echo "<h2>".$album['name']."</h2>";  //affichage du nom de l'album ici
						  	if(isset($album["photos"])){
							  	foreach ($album["photos"] as $photo) {
							  		echo "<img class='imgParticipate' src='".$photo['source']."' width='142px'>";

							  	}
						  	}
						  }

						  echo "<br><br><br>";

						 ?>

					     <?php endif; ?>
					</div>
                  </div>

                </div>
                
            
        	 </div><!-- /.box -->
            </div><!-- /.box-body -->
			
			<div class="box-footer">
              <input type="submit" class="btn btn-success col-md-offset-3 col-md-5 col-sm-offset-3 col-sm-5">
            </div>
          </form>
			<nav>
				
			</nav>
		</header>
	<!--	<section>


			<?php /* if(isset($_SESSION['token'])):?>

				<hr>
				<h1>Ajouter une photo</h1>

				<form action="upload.php" method="post" enctype="multipart/form-data">
					Albums : 
					<select name="album">
					<?php

				  	$response = $fb->get('/me/albums?fields=name,can_upload');
				  	$albums = $response->getGraphEdge()->asArray();
					  foreach ($albums as $album) {
					  	if($album['can_upload'] == 1)
					  	echo "<option value='".$album['id']."'>".$album['name']."</option>";
					  }
					?>
					</select><br>
					Or Create an album <input type="text" name="name_album">
				    Select image to upload:
				    <input type="file" name="fileToUpload" id="fileToUpload"><br>
				    <input type="submit" value="Upload Image" name="Envoyer">
				</form>
				

			<?php endif; */?>
		</section> -->
		<aside>
		</aside>
		<footer>
			
		</footer>
	</body>
</html>