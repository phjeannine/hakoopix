<div class="container">



 <form action="upload.php" method="post" enctype="multipart/form-data">
          Albums : 
          <?php

            require_once __DIR__ . '/../public/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';

    $fb = new Facebook\Facebook([
      'app_id' => '959119600818575',
      'app_secret' => '9f0062f110ea6d3589e7debcb04c2268',
      'default_graph_version' => 'v2.5',
      ]);

    
     $response = $fb->get('/me?fields=name, cover, albums');
            $userNode = $response->getGraphUser();
            foreach($userNode['albums'] as $album) {

            var_dump($album['name']);
            $img = $fb->get("/".$album["id"]."/photos?fields=url,source");
            $userImg = $img->getGraphEdge();
            foreach($userImg as $photo) {
              echo "<img src='".$photo['source']."'>";
            }
          }

          ?>
          
            <input type="file" name="fileToUpload" id="fileToUpload"><br>
            <input type="submit" value="Upload Image" name="Envoyer">
        </form>

</div>