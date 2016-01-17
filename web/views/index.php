<script>
    logInWithFacebook = function() {
        FB.login(function(response) {
            if (response.authResponse) {
                console.log('You are logged!');
                console.log(response.authResponse);

              /*  FB.api('/959119600818575/roles?access_token=959119600818575|NrwTVp41hp0a8XVklYVvKLOKAzE', function(response) {
                    console.log(response);
                });  */
                FB.api('/me?fields=id,last_name,first_name,picture', function(rep) {
                    console.log(rep);
                    window.location="/contest";
                    //window.location="../public/traitement.php?userId="+rep.id+"&lastName="+rep.last_name+"&firstName="+rep.first_name+"&token="+response.authResponse.accessToken;
                });
            }
        });
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
<div id="banner" class="container-fluid">
    <div class="overlay">
        <div class="banner-content row">
            <div class="holder">
                <div class="inner">
                    <h1 class="contest-title">Titre du concours</h1>
                    <p class="contest-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ligula mi, cursus non euismod ut, scelerisque ut ligula. Duis quis consequat tellus. Etiam commodo congue sem in accumsan.</p>
                    <div class="fb-connect-button">
                        <span>Envie de jouer le jeu ?</span>
                        <a href="#" onClick="logInWithFacebook()">Je participe</a>
                    </div>
                </div><!-- /.inner -->
            </div><!-- /.holder -->
        </div><!-- /.container -->
    </div><!-- /.overlay -->
</div><!-- /.banner -->

<!-- Homepage Content -->
<div id="homepage" class="container">

    <!-- Prices -->
    <div id="prices" class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">
            <h3 class="title">Lots à gagner</h3>
            <hr>
        </div>
        <div class="price-item col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <img class="img-responsive" src="../public/images/price.jpg" alt="">
            <h4 style="color: #12ba74">Premier prix</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ligula mi, cursus non euismod ut, scelerisque ut ligula.</p>
        </div><!-- /.price-item -->

        <div class="price-item col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <img class="img-responsive" src="../public/images/price.jpg" alt="">
            <h4 style="color: #12ba74">Premier prix</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ligula mi, cursus non euismod ut, scelerisque ut ligula.</p>
        </div><!-- /.price-item -->

        <div class="price-item col-lg-4 col-md-4 col-sm-4 col-xs-4">
            <img class="img-responsive" src="../public/images/price.jpg" alt="">
            <h4 style="color: #12ba74">Premier prix</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ligula mi, cursus non euismod ut, scelerisque ut ligula.</p>
        </div><!-- /.price-item -->
    </div><!-- /.row -->

    <!-- Gallery -->
    <div id="gallery" class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">
            <h3 class="title">Contributions</h3>
            <hr>
        </div>
        <div class="col-md-4 portfolio-item">
            <a href="#"><img class="img-responsive" src="../public/images/photo_contest.jpg" alt=""></a>
            <div class="item-contest">
                <div class="like item-contest-icon col-md-9"><span>like</span> 12</div>
                <div class="share item-contest-icon col-md-3"><span>share</span> Partager</div>
            </div>
            <h3 class="item-title" style="color: #12ba74">Titre de la photo</h3>
            <p class="item-meta">par <span style="color: #12ba74">{author}</span>, le <span style="color: #12ba74">{date}</span></p>
            <hr>
            <p class="item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
        </div>
        <div class="col-md-4 portfolio-item">
            <a href="#"><img class="img-responsive" src="../public/images/photo_contest.jpg" alt=""></a>
            <div class="item-contest">
                <div class="like item-contest-icon col-md-9"><span>like</span> 12</div>
                <div class="share item-contest-icon col-md-3"><span>share</span> Partager</div>
            </div>
            <h3 class="item-title" style="color: #12ba74">Titre de la photo</h3>
            <p class="item-meta">par <span style="color: #12ba74">{author}</span>, le <span style="color: #12ba74">{date}</span></p>
            <hr>
            <p class="item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
        </div>
        <div class="col-md-4 portfolio-item">
            <a href="#"><img class="img-responsive" src="../public/images/photo_contest.jpg" alt=""></a>
            <div class="item-contest">
                <div class="like item-contest-icon col-md-9"><span>like</span> 12</div>
                <div class="share item-contest-icon col-md-3"><span>share</span> Partager</div>
            </div>
            <h3 class="item-title" style="color: #12ba74">Titre de la photo</h3>
            <p class="item-meta">par <span style="color: #12ba74">{author}</span>, le <span style="color: #12ba74">{date}</span></p>
            <hr>
            <p class="item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
        </div>
        <div class="col-md-4 portfolio-item">
            <a href="#"><img class="img-responsive" src="../public/images/photo_contest.jpg" alt=""></a>
            <div class="item-contest">
                <div class="like item-contest-icon col-md-9"><span>like</span> 12</div>
                <div class="share item-contest-icon col-md-3"><span>share</span> Partager</div>
            </div>
            <h3 class="item-title" style="color: #12ba74">Titre de la photo</h3>
            <p class="item-meta">par <span style="color: #12ba74">{author}</span>, le <span style="color: #12ba74">{date}</span></p>
            <hr>
            <p class="item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
        </div>
        <div class="col-md-4 portfolio-item">
            <a href="#"><img class="img-responsive" src="../public/images/photo_contest.jpg" alt=""></a>
            <div class="item-contest">
                <div class="like item-contest-icon col-md-9"><span>like</span> 12</div>
                <div class="share item-contest-icon col-md-3"><span>share</span> Partager</div>
            </div>
            <h3 class="item-title" style="color: #12ba74">Titre de la photo</h3>
            <p class="item-meta">par <span style="color: #12ba74">{author}</span>, le <span style="color: #12ba74">{date}</span></p>
            <hr>
            <p class="item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
        </div>
        <div class="col-md-4 portfolio-item">
            <a href="#"><img class="img-responsive" src="../public/images/photo_contest.jpg" alt=""></a>
            <div class="item-contest">
                <div class="like item-contest-icon col-md-9"><span>like</span> 12</div>
                <div class="share item-contest-icon col-md-3"><span>share</span> Partager</div>
            </div>
            <h3 class="item-title" style="color: #12ba74">Titre de la photo</h3>
            <p class="item-meta">par <span style="color: #12ba74">{author}</span>, le <span style="color: #12ba74">{date}</span></p>
            <hr>
            <p class="item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
        </div>
    </div><!-- /.row -->

</div><!-- /.container -->
