<!-- Page Content -->
<?php
require_once APPLICATION_PATH . '/public/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => '959119600818575',
    'app_secret' => '9f0062f110ea6d3589e7debcb04c2268',
    'default_graph_version' => 'v2.5',
]);

if (empty($_SESSION['token']) || !verifyAccessToken()) {
    unset($_SESSION['token']);
    try {
        $helper = $fb->getRedirectLoginHelper();
        $scope = ["email", "user_likes", "user_photos", "publish_actions"];
        $loginUrl = $helper->getLoginUrl('participate/login', $scope);
    } catch (Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
} else {
    try {
        $fb->setDefaultAccessToken($_SESSION['token']);
    } catch (Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
}

function verifyAccessToken()
{
    $graph_url = "https://graph.facebook.com/me?access_token=" . $_SESSION['token'];
    $ch = curl_init($graph_url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $decoded_response = json_decode(curl_exec($ch));
    curl_close($ch);
    if (isset($decoded_response->error) && $decoded_response->error->type == "OAuthException") {
        return false;
    }
    return true;
}


?>
<!-- Page Header -->
<script>
</script>

<div class="container" id="participate">
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
            <form role="form" class="col-md-offset-1 col-sm-offset-1" method="POST" action="/participate/insert"
                  enctype="multipart/form-data">
                <div class="box-body col-md-11 col-sm-11">

                    <div class="form-group col-md-6 col-md-offset-3">
                        <label for="title">Titre (20 caractères max)</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"
                               placeholder="Ajoutez un titre à votre photo..." name="title" maxlength="20" required>
                    </div>

                    <div class="form-group col-md-6 col-md-offset-3">
                        <label for="exampleInputEmail1">Description (150 caractères max)</label>
                        <textarea class="form-control" rows="3" name="description" maxlength="100"></textarea>
                    </div>

                    <div class="form-group col-md-11 col-md-offset-1">
                        <div id="participate-label">
                            <label for="exampleInputFile">Votre image</label><br>
                            <button type="button" class="btn btn-info btn-md" data-toggle="modal"
                                    data-target="#myModal">Charger une image
                            </button>
                            <p class="help-block">Importer une image ou <strong>sélectionnez-la </strong>parmi vos
                                photos ci-dessous </p><br><br>
                        </div>

                        <div class="imgFbUser">
                            <?php if (empty($_SESSION['token'])): ?>
                                <p>Vous n'êtes pas connecté sur facebook :</p> <a href="<?php echo $loginUrl; ?>">cliquez
                                    pour vous connecter</a>
                            <?php else: ?>

                                <?php
                                //Affiche toutes les photos des albums
                                $response = $fb->get('/me/albums?fields=name,photos{name,source}');
                                $albums = $response->getGraphEdge()->asArray();
                                if (empty($albums)) {
                                    echo "<p class='msgErrorPhoto'>Aucune photo trouvé ! Assurez-vous que vous avez des photos sur votre profile et que l'application a la permission d'accéder à vos photos facebook </p>";
                                    //echo '<a href="#" onClick="'.$loginUrl.'">Cliquez pour réessayer</a>';
                                }

                                foreach ($albums as $album) {
                                    //echo "<h2>".$album['name']."</h2>";  //affichage du nom de l'album ici
                                    if (isset($album["photos"])) {
                                        foreach ($album["photos"] as $photo) {
                                            echo "<div class='divImg'><img class='imgParticipate' src='" . $photo['source'] . "' width='142px'>";
                                            echo "<br><input type='radio' name='imgSelected' value=" . $photo['source'] . "> Séléctionner</div>";

                                        }
                                    }
                                }
                                echo "<br><br><br>";

                            endif;
                            ?>
                        </div><!-- /.imgFbUser -->

                        <input type="submit" class="btn btn-customize">

                    </div><!-- /.form-group -->
                </div><!-- /.box-body -->
            </form><!-- /.form -->
        </div><!-- /.box -->
    </div><!-- /.content-wrapper -->

    <!-- Modal : code pour le pop-up qui s'affiche lorsqu'on clique sur charger une image -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Ajout d'une photo </h4>
                </div>
                <div class="modal-body">
                    <p>Séléctionnez un album parmis la liste de vos albums ou créez-en un autre et insérer l'image
                        : </p><br>

                    <form action="participate/upload" method="post" enctype="multipart/form-data">
                        <label for="album">Albums : </label>
                        <select name="album">
                            <?php
                            try {
                                $response = $fb->get('/me/albums?fields=name,can_upload');
                                $albums = $response->getGraphEdge()->asArray();
                                foreach ($albums as $album) {
                                    if ($album['can_upload'] == 1)
                                        echo "<option value='" . $album['id'] . "'>" . $album['name'] . "</option>";
                                }
                            } catch (Facebook\Exceptions\FacebookResponseException $e) {
                                // When Graph returns an error
                                echo 'Graph returned an error: ' . $e->getMessage();
                                exit;
                            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                                // When validation fails or other local issues
                                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                                exit;
                            }
                            ?>
                        </select>

                        <br/>
                        <br/>

                        <p>Ou créer un autre album :</p> <input type="text" name="name_album"/>
                        Séléctionnez l'image : <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
                        <input type="submit" class="btn btn-default" value="Charger l'image" name="Envoyer">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
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
