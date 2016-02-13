

<!-- Page Content -->
<div class="container" id="participate">
  <?php


  require_once APPLICATION_PATH . '/public/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';

  $fb = new Facebook\Facebook([
    'app_id' => '959119600818575',
    'app_secret' => '9f0062f110ea6d3589e7debcb04c2268',
    'default_graph_version' => 'v2.5',
    ]);

  if(empty($_SESSION['token']) || !verifyAccessToken())
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
  <!-- Page Header -->
  <script>

//TEST JAVASCRIPT POUR ALBUM

 /* logGetAlbum = function() {
    FB.login(function(response) {
      if (response.authResponse) {
        FB.api('/me/albums?fields=name,photos{name,source}', function(rep){
          window.location="../public/getAlbum.php?name="+rep.name+"&photos="+rep.photos;

        });
      }
    });
};*/

  /*logGetAlbum = function() {
    FB.login(function(response) {
    console.log("connecté");
  }, {scope: 'user_photos'});
};

logGetAlbum = function(){
  FB.api('/me/albums?fields=name', function(rep){
    var album = rep.data[i];
    FB.api('/'+album.id+'/photos', function(photos){
      var photo = photos.data[i];
    });
  });
};


function logGetAlbum(){
   FB.api('/me/albums',  function(rep) {
    var album = resp.data;
    document.getElementById("albums").innerHTML=html;
});
};
*/

</script>

<div class="row">
  <div class="col-lg-12 col-md-12">
    <h1 class="page-header">Participez au concours !</h1>
    <div class="barre"></div>
  </div>
</div><!-- /.row -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <div class="box box-primary">

    <!-- FORMULAIRE -->
    <form role="form" class="col-md-offset-1 ol-sm-offset-1" method="POST" action="/participate/insert" enctype="multipart/form-data">
      <div class="box-body col-md-11 col-sm-11">

       <div class="form-group col-md-12">
         <label for="exampleInputEmail1">Titre</label>
         <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ajoutez un titre à votre photo..." name="title" required>
         
         <label for="exampleInputEmail1">Description</label>
         <textarea class="form-control" rows="3" name="description"></textarea>
       </div>

       <div class="form-group">

        <label for="exampleInputFile">Votre image</label>
        <input type="file"  class="btn btn-default" id="inputImage" name="imgParticipation">
        <p class="help-block">Importer une image ou <strong>sélectionnez-la </strong>parmi vos photos ci-dessous </p><br><br>
        <div class="imgFbUser">

          <?php if(empty($_SESSION['token'])):?>

          Vous n'êtes pas connecté sur facebook : <a href="<?php echo $loginUrl;?>">cliquez pour vous connecter</a>

        <?php else: ?>



        <!--
        <a href="#" onClick="<?php echo $loginUrl;?>">Afficher mes photos Facebook</a>
        -->
       <?php 
             // $response = $fb->get('/me?fields=email');
              //$userNode = $response->getGraphUser();

              //Affiche toutes les photos des albums
        $response = $fb->get('/me/albums?fields=name,photos{name,source}');
        $albums = $response->getGraphEdge()->asArray();
        if(empty($albums)){ 
          echo "<p class='msgErrorPhoto'>Aucune photo trouvé ! Assurez-vous que vous avez des photos sur votre profile et que l'application a la permission d'accéder à vos photos facebook </p>"; 
          echo '<a href="#" onClick="'.$loginUrl.'">Cliquez pour réessayer</a>';
        }
        
        foreach ($albums as $album) {
                //echo "<h2>".$album['name']."</h2>";  //affichage du nom de l'album ici
          if(isset($album["photos"])){
            foreach ($album["photos"] as $photo) {
              echo "<div class='divImg'><img class='imgParticipate' src='".$photo['source']."' width='142px'>";
              echo "<br><input type='radio' name='imgSelected' value=".$photo['source']."> Séléctionner</div>";

            }
          } 
        }
        echo "<br><br><br>";

        ?>

      <?php endif; ?>
    </div>

    <input type="submit" class="btn btn-success btn-customize">

  </div>


</div><!-- /.box -->
</div><!-- /.box-body -->

</form><!-- /. FORM -->
</div><!-- /.box -->

</div><!-- /.content-wrapper -->


</div><!-- /container -->
<!--
<script type="text/javascript">
 function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#inputImage").change(function(){
        readURL(this);
    });
  </script>-->
