<script>
    logInWithFacebook = function () {
        FB.login(function (response) {
            if (response.authResponse) {
                console.log('You are logged!');
                //console.log(response.authResponse);

                FB.api('/me?fields=id,last_name,first_name,picture', function (rep) {
                    window.location = "../public/createSessionAdmin.php?id=" + rep.id + "&last_name=" + rep.last_name + "&first_name=" + rep.first_name + "&picture=" + rep.picture + "&token=" + response.authResponse.accessToken;

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
        }, {scope: 'user_photos, manage_pages, publish_pages'});
        return false;
    };

    window.fbAsyncInit = function () {
        FB.init({
            appId: "959119600818575",
            cookie: true, // This is important
            version: 'v2.5'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/fr_FR/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<div id="nocontest">
    <div id="content">
        <img src="../public/images/logo.png" title="logo Hakoopix">

        <h1>Pas de concours créé !</h1>

        <p> Oups ! Il semblerait qu'il n'y ait pas de concours actuellement, merci de revenir plus tard !</p>
    </div>

</div><!-- /. No contest -->