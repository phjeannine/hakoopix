<script>
    logInWithFacebook = function() {
        FB.login(function(response) {
            if (response.authResponse) {
                console.log('You are logged!');
                //console.log(response.authResponse);

                FB.api('/me?fields=id,last_name,first_name,picture', function(rep) {
                    window.location="../public/createSession.php?id="+rep.id+"&last_name="+rep.last_name+"&first_name="+rep.first_name+"&picture="+rep.picture+"&token="+response.authResponse.accessToken;                    
                   
                   // A ne pas décommenter la requête ajax
                   /* $.ajax({
                      url:'../public/createSession.php',
                      data: {id:rep.id, last_name:rep.last_name, first_name:rep.first_name, picture:rep.picture, token:response.authResponse.accessToken},
                      success: function(reponse) {
                        window.location="/contest/adduser";
                      }

                   });
                */
                });
            }
        },{scope: 'user_photos'});
        return false;
    };

    window.fbAsyncInit = function() {
        FB.init({
            appId: "959119600818575",
            cookie: true, // This is important
            version: 'v2.5'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/fr_FR/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Bannière & Title -->
<?php 

$contestObj = new contestModel();
$contestObj->getOneByActive(true);
$title = $contestObj->getTitle();
$description = $contestObj->getDescription();
$id_contest = $contestObj->getId();
$banner = $contestObj->getBanner();
$color = $contestObj->getColorTheme();
$_SESSION['color'] = $color;
$_SESSION['idContest'] = $idContest;
      
$priceObj1 = new priceModel();
$priceObj1->getAll(true);      

if(!empty($id_contest)) { ?>

<div id="banner" class="container-fluid" style="background: url(<?php echo $banner ?>) no-repeat center fixed;">
    <div class="overlay" style="background-color: rgba(0, 0, 0, 0.7)">
        <div class="banner-content row">
            <div class="holder">
                <div class="inner">
                        <h1 class="contest-title"><?php echo $title; ?></h1>
                        <p class="contest-description"><?php echo $description; ?></p>
                    <div class="fb-connect-button">
                        <div class="want-to-play">Envie de jouer le jeu ?</div>
                        <a href="#" class="btn btn-block btn-social btn-lg btn-facebook" onClick="logInWithFacebook()">
                            <span class="fa fa-facebook"></span> Se connecter avec Facebook
                        </a>
                    </div>
                </div><!-- /.inner -->
            </div><!-- /.holder -->
        </div><!-- /.container -->
    </div><!-- /.overlay -->
</div><!-- /.banner -->
<?php } else { ?>
<div id="banner" class="container-fluid" style="background: url(../../public/images/banner/banner_default.jpg) no-repeat center fixed;">
    <div class="overlay" style="background-color: rgba(0, 0, 0, 0.2)">
        <div class="banner-content row">
            <div class="holder">
                <div class="inner">
                    <h1 class="contest-title">Hakoopix <br /> Concours photo de qualité</h1>
                    <?php if($_SESSION["role"] == "admin") { ?>
                        <p class="contest-description">Aucun concours de créés ou d'actifs. <a href="/addContest" title="Créer un concours">Lancez-vous!</a></p>
                    <?php } ?>
                </div><!-- /.inner -->
            </div><!-- /.holder -->
        </div><!-- /.container -->
    </div><!-- /.overlay -->
</div><!-- /.banner -->
<?php } ?>

<!-- Homepage Content -->
<div id="homepage" class="container">
    <!-- Rules -->
    <div id="rules" class="row">
            <h2>Hakoopix</h2>
            <div class="barre"></div>
            <p>Le concours photos qui te permettra de gagner de nombreux cadeaux, pour toi et tous tes amis !</p>
            <p>Sois créatif, original, cela te permettra de te démarquer</p>
        <!-- Rule 1 -->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="rule">
                <i class="fa fa-camera-retro fa-4x"></i>
                <h3>Ajoute une photo</h3>
                <p>Pour participer et avoir une chance de gagner, il te suffit simplement de publier ta photo !</p>
            </div>
        </div><!-- /.rule 1 -->
        <!-- Rule 2 -->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="rule">
                <i class="fa fa-thumbs-o-up fa-4x"></i>
                <h3>Récolte le plus de vote</h3>
                <p>Partage ta photo avec tes amis et invite les à voter pour toi ! Le gagnant sera cela qui comptabilisera le plus de vote !</p>
            </div>
        </div><!-- /.rule 2 -->
        <!-- Rule 3 -->
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="rule">
                <i class="fa fa-gift fa-4x"></i>
                <h3>Gagne un ou plusieurs cadeaux !</h3>
                <p>Après délibération du jury, tu auras peut-être la possibilité de gagner un cadeau !</p>
            </div>
        </div><!-- /.rule 2 -->
    </div>
</div>
<div class="prices-container" id="homepage">
    <div class="container">
    <!-- Prices -->
    <div id="prices" class="row">
            <h2>Lots à gagner</h2>
            <div class="barre"></div>
            <p>Comme nous savons que tu es gourmant, nous t'avons concocté des petits cadeaux ...</p>
        
            <!-- Parcourir tous les prix -->
            <?php foreach($priceObj1 as $priceObj) : ?>
                <!-- Exclure le prix qui a un id = 0 -->
                <?php if(isset($priceObj['id'])) : ?>
                    <!-- Prendre que les prix avec id contest en cours -->
                    <?php if($priceObj['id_contest'] == $id_contest) : ?>

                    <div class="price-item col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="price">
                            <!--<img class="img-responsive" src="../public/images/price.jpg" alt="">-->
                            
                                <h3><?php echo $priceObj['title']; ?></h3>
                                <p><?php echo $priceObj['description']; ?></p>
                        </div><!-- /.price -->
                    </div><!-- /.price-item -->
                    <?php endif; ?><!-- / si l'objet a bien un id -->
                <?php endif; ?><!-- / si id concours -->
            <?php endforeach; ?>
        
    </div><!-- /.row -->
</div>
</div>

<div id="homepage">
    <div class="container">
    <!-- Gallery -->
    <div id="gallery" class="row">
            <h2>Participants</h2>
            <div class="barre"></div>
            <?php
                $participationBdd = new pictureModel();
                $participationBdd->getAll(true);
                $cpt=0;
                foreach($participationBdd as $userParticipate) : 
                  $cpt +=1;
                  if($userParticipate['id_contest']==$_SESSION['idContest'] && $cpt<7){
            ?>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 contributionIndex">
                    <?php echo '<img class="img-responsive" src="'.$userParticipate['image_link'].'">'; ?>
                </div>
            <?php } endforeach; ?>
    </div><!-- /.row -->
</div>
</div>

</div><!-- /.container -->
