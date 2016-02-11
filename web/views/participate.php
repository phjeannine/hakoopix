<!-- Page Content -->
<div class="container participate">
<?php

require_once APPLICATION_PATH . '/public/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';

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
        $loginUrl =  $helper->getLoginUrl("https://hakoopix.herokuapp.com/web/public/login-callback.php", $scope);
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
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <h1 class="page-header">Participez au concours !</h1>
        </div>
    </div><!-- /.row -->


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
          </div><!-- /.box-header -->
          <!-- form start -->
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
        </div><!-- /.box -->

      </div><!-- /.content-wrapper -->


</div><!-- /container -->

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
</script>
