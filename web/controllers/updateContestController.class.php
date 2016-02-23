<?php


class updateContestController extends basesql
{

    public function indexAction($args)
    {
        $v = new view("updateContest");
        $v->assign("mesargs", $args);
    }

    public function updateAction($args)
    {

        require_once APPLICATION_PATH . '/public/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';

        // On récupère nos valeurs
        $id = $args['0'];
        $title = $_POST['update-title'];
        $date_begin = $_POST['update-begin'];
        $date_ending = $_POST['update-ending'];
        $description = $_POST['update-description'];
        $color_theme = $_POST['update-color-theme'];
        $logo = $_FILES['update-logo']['name'];
        $banner = $_FILES['update-banner']['name'];

        if (!empty($_POST['active-contest'])) {
            $active_contest = $_POST['active-contest'];
        } else {
            $active_contest = 0;
        }

        if ($logo != NULL || $banner != NULL)
        {
            $albumId = $this->getAlbum();
            //Récupération des IDs du logo et du banner
            $IDs = $this->getBannerLogo($albumId);

            //Supprimer les photos existantes dans l'album
            $this->deleteBannerLogo($IDs);

            //Upload banner & logo
            $this->updateAlbum($albumId);

            //Récupération des URL du logo et du banner
            $URLs = $this->getSourceBannerLogo($albumId);

            $logo = $URLs['1'];
            $banner = $URLs['0'];
        }
        else {
            $oldBannerLogo = $this->getContest($title);
            $logo = $oldBannerLogo['logo'];
            $banner = $oldBannerLogo['banner'];
        }

        // On vérifie si tous les champs ne sont pas null
        if (empty($title) OR empty($date_begin) OR empty($date_ending) OR empty($description)) {
            // Si les champs sont vides, on affiche une erreur
            echo '<font color="red">Attention, les champs doivent être remplis !</font>';
        } else {
            try {
                $updateContestObj = new contestModel($id, $title, $date_begin, $date_ending, $description, $color_theme, $banner, $logo, $active_contest);
                $getActiveContest = $this->getActiveContest();
				if (!$getActiveContest == FALSE & isset($_POST['active-contest'])) {
					$this->unsetActiveContest($getActiveContest['id']);
				}
                $updateContestObj->save();
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }

			header("Location: /contestList");

        }
    }

    //Récupère le banner et la photo pour renseigné dans la BDD les URLs
    function getAlbum()
    {
        $fb = new Facebook\Facebook([
            'app_id' => '959119600818575',
            'app_secret' => '9f0062f110ea6d3589e7debcb04c2268',
            'default_graph_version' => 'v2.5',
        ]);

        //Récupère token Admin
        $fb->setDefaultAccessToken($_SESSION['token']);
        try {
            $response = $fb->get('/196951203980314?fields=access_token');
            $token = $response->getGraphNode()->asArray();
            $tokenId = $token['access_token'];
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // After you're done debugging, comment out the below lines
            $result = $e->getMessage();
            echo "<pre>";
            print_r($result);
            echo "</pre>";
        }

        $fb->setDefaultAccessToken($tokenId);

        try {
            $response = $fb->get('/196951203980314/albums?fields=name');
            $albums = $response->getGraphEdge()->asArray();
            foreach ($albums as $album) {
                if ($album['name'] == $_POST['update-title']) {
                    $albumId = $album['id'];
                }
            }
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // After you're done debugging, comment out the below lines
            $result = $e->getMessage();
            echo "<pre>";
            print_r($result);
            echo "</pre>";
        }
        return $albumId;
    }

    function getBannerLogo($albumId)
    {
        $fb = new Facebook\Facebook([
            'app_id' => '959119600818575',
            'app_secret' => '9f0062f110ea6d3589e7debcb04c2268',
            'default_graph_version' => 'v2.5',
        ]);

        //Récupère token Admin
        $fb->setDefaultAccessToken($_SESSION['token']);
        try {
            $response = $fb->get('/196951203980314?fields=access_token');
            $token = $response->getGraphNode()->asArray();
            $tokenId = $token['access_token'];
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // After you're done debugging, comment out the below lines
            $result = $e->getMessage();
            echo "<pre>";
            print_r($result);
            echo "</pre>";
        }

        $fb->setDefaultAccessToken($tokenId);

        try {
            $response = $fb->get('/' . $albumId . '?fields=name,photos{name,source}');
            $items = $response->getGraphNode()->asArray();
            foreach ($items['photos'] as $item) {
                $bannerlogo[] = $item['id'];
            }
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // After you're done debugging, comment out the below lines
            $result = $e->getMessage();
            echo "<pre>";
            print_r($result);
            echo "</pre>";
        }
        return $bannerlogo;
    }

    public function deleteBannerLogo($IDs)
    {
        $fb = new Facebook\Facebook([
            'app_id' => '959119600818575',
            'app_secret' => '9f0062f110ea6d3589e7debcb04c2268',
            'default_graph_version' => 'v2.5',
        ]);

        //Récupère token Admin
        $fb->setDefaultAccessToken($_SESSION['token']);
        try {
            $response = $fb->get('/196951203980314?fields=access_token');
            $token = $response->getGraphNode()->asArray();
            $tokenId = $token['access_token'];
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // After you're done debugging, comment out the below lines
            $result = $e->getMessage();
            echo "<pre>";
            print_r($result);
            echo "</pre>";
        }

        $fb->setDefaultAccessToken($tokenId);

        //Suppression
        foreach ($IDs as $item) {
            try {
                $response = $fb->delete('/' . $item);
            } catch (Facebook\Exceptions\FacebookResponseException $e) {
                // After you're done debugging, comment out the below lines
                $result = $e->getMessage();
                echo "<pre>";
                print_r($result);
                echo "</pre>";
            }
        }
        return $item;
    }

    public function updateAlbum($albumId)
    {
        $fb = new Facebook\Facebook([
            'app_id' => '959119600818575',
            'app_secret' => '9f0062f110ea6d3589e7debcb04c2268',
            'default_graph_version' => 'v2.5',
        ]);

        //Récupère token Admin
        $fb->setDefaultAccessToken($_SESSION['token']);
        try {
            $response = $fb->get('/196951203980314?fields=access_token');
            $token = $response->getGraphNode()->asArray();
            $tokenId = $token['access_token'];
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // After you're done debugging, comment out the below lines
            $result = $e->getMessage();
            echo "<pre>";
            print_r($result);
            echo "</pre>";
        }

        $fb->setDefaultAccessToken($tokenId);


        //Ajout des images
        $data = ['message' => "Logo",
            'source' => $fb->fileToUpload($_FILES["update-logo"]["tmp_name"]),];
        try {
            $response = $fb->post('/' . $albumId . '/photos', $data);
        } catch
        (Facebook\Exceptions\FacebookResponseException $e) {
            $error_msg = 'Error: ' . $e->getMessage();
        }

        $data = [
            'message' => "Banner",
            'source' => $fb->fileToUpload($_FILES["update-banner"]["tmp_name"]),
        ];
        try {
            $response = $fb->post('/' . $albumId . '/photos', $data);

        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            $error_msg = 'Error: ' . $e->getMessage();
        }
    }

    function getSourceBannerLogo($albumId)
    {
        $fb = new Facebook\Facebook([
            'app_id' => '959119600818575',
            'app_secret' => '9f0062f110ea6d3589e7debcb04c2268',
            'default_graph_version' => 'v2.5',
        ]);

        //Récupère token Admin
        $fb->setDefaultAccessToken($_SESSION['token']);
        try {
            $response = $fb->get('/196951203980314?fields=access_token');
            $token = $response->getGraphNode()->asArray();
            $tokenId = $token['access_token'];
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // After you're done debugging, comment out the below lines
            $result = $e->getMessage();
            echo "<pre>";
            print_r($result);
            echo "</pre>";
        }

        $fb->setDefaultAccessToken($tokenId);

        try {
            $response = $fb->get('/' . $albumId . '?fields=name,photos{name,source}');
            $items = $response->getGraphNode()->asArray();
            foreach ($items['photos'] as $item) {
                $bannerlogo[] = $item['source'];
            }
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // After you're done debugging, comment out the below lines
            $result = $e->getMessage();
            echo "<pre>";
            print_r($result);
            echo "</pre>";
        }
        return $bannerlogo;
    }

    function getContest($title) {
        $contestObj = new contestModel();
        $contestResult = $contestObj->getOneContest($title);
        return $contestResult;
    }
}