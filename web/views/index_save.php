<script>
    logInWithFacebook = function() {
        FB.login(function(response) {
            if (response.authResponse) {
                console.log('You are logged!');
                console.log(response.authResponse);

                FB.api('/me?fields=id,last_name,first_name,picture', function(rep) {
                    console.log(response.picture.data.url);
                    //:window.location = "../public/traitement.php?userId="+rep.id+"&lastName="+rep.last_name+"&firstName="+rep.first_name+"&token="+response.authResponse.accessToken;
                    window.location = "/contest";
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
<!-- fin du code script -->

<!-- Page Content -->

    <!-- Page Header -->
    <div  class="body-header">
        <div class="row">
            <div class="col-md-offset-4 col-md-4 text-center">
                <h1 class="">Titre du concours</h1>
            </div>
        </div><!-- /.row -->
        <br /><br />
    <!-- Projects Row -->
    <div class="row">
        <div class="col-md-offset-3 col-md-3 portfolio-item">
            <a href="#" onClick="logInWithFacebook()">
                <img class="img-responsive btn-vot" src="../public/images/btn-participe.png" alt="">
            </a>

        </div>
        <div class="col-md-3 portfolio-item">
            <a href="#" onClick="logInWithFacebook()">
                <img class="img-responsive btn-vot" src="../public/images/btn-vote.png" alt="">
            </a>
        </div>

    </div>
  </div><!-- /.row -->
  <div class="container">
    <br>
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
                <a href="#">LOT 1</a>
            </h3>
        </div>
        <div class="col-md-4 portfolio-item">
            <a href="#">
                <img class="img-responsive imgLot" src="../public/images/lot2.jpg" alt="">
            </a>
            <h3 class="text-center">
                <a href="#">LOT 2</a>
            </h3>
        </div>
        <div class="col-md-4 portfolio-item">
            <a href="#">
                <img class="img-responsive imgLot" src="../public/images/lot1.jpg" alt="">
            </a>
            <h3 class="text-center">
                <a href="#">LOT 3</a>
            </h3>
        </div>
    </div>
    <br>
    <!-- Description -->
    <div class="text-center col-md-12">
        <h3 class="page-header">Description</h1>
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
