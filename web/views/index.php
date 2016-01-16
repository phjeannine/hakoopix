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
                    window.location="../public/traitement.php?userId="+rep.id+"&lastName="+rep.last_name+"&firstName="+rep.first_name+"&token="+response.authResponse.accessToken;
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
                    <p class="contest-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ligula mi, cursus non euismod ut, scelerisque ut ligula. Duis quis consequat tellus. Etiam commodo congue sem in accumsan. </p>
                    <div class="fb-connect-button">
                        <span>Envie de jouer le jeu ?</span>
                        <a href="#" onClick="logInWithFacebook()">Je participe</a>
                    </div>
                </div><!-- /.inner -->
            </div><!-- /.holder -->
        </div><!-- /.container -->
    </div><!-- /.overlay -->
</div><!-- /.banner -->


    <div class="container">
    <!-- Projects Row -->
    <div class="row">
        <div class="text-center col-md-12">
            <h3 class="page-header">Lots à gagner</h3>
        </div>
        <div class="col-md-4 portfolio-item">
            <a href="#">
                <img class="img-responsive imgLot" src="../public/images/lot1.jpg" alt="">
            </a>
            <h3 class="text-center">
                <a href="#">Lot 1</a>
            </h3>
        </div>
        <div class="col-md-4 portfolio-item">
            <a href="#">
                <img class="img-responsive imgLot" src="../public/images/lot2.jpg" alt="">
            </a>
            <h3 class="text-center">
                <a href="#">Lot 2</a>
            </h3>
        </div>
        <div class="col-md-4 portfolio-item">
            <a href="#">
                <img class="img-responsive imgLot" src="../public/images/lot1.jpg" alt="">
            </a>
            <h3 class="text-center">
                <a href="#">Lot 3</a>
            </h3>
        </div>
    </div>
    <br>
    <!-- Description -->
    <div class="text-center col-md-12">
        <h3 class="page-header">Description</h3>
    </div>
    <p class="text-center">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.
    </p><br>
    <hr>
    <!-- Projects Row -->
    <div class="row">
      <div class="text-center col-md-12">
          <h3 class="page-header">Contribution</h3>
      </div>
        <div class="col-md-4 portfolio-item">
            <a href="#">
                <img class="img-responsive" src="http://placehold.it/700x400" alt="">
            </a>
        </div>
        <div class="col-md-4 portfolio-item">
            <a href="#">
                <img class="img-responsive" src="http://placehold.it/700x400" alt="">
            </a>
        </div>
        <div class="col-md-4 portfolio-item">
            <a href="#">
                <img class="img-responsive" src="http://placehold.it/700x400" alt="">
            </a>
        </div>
    </div>
    <hr>
    <!-- /.row -->

</div><!-- /.container -->
