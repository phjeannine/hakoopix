<?php

class participateController
{

    public function indexAction($args)
    {
        $v = new view("participate");
        $v->assign("mesargs", $args);
    }

    public function insertAction($args)
    {

        if(strlen($_POST['title']<=20)){
            $title = htmlentities(trim($_POST['title']));
        } else {
            echo "Le titre est trop long";
        }
        if(strlen($_POST['description']<=100)){
            $description = htmlentities(trim($_POST['description']));
        } else {
            echo "La description est trop longue";
        }
        $id_member = $_SESSION['idUser'];
        $id_contest = $_SESSION['idContest'];
        $nb_like = 0;
        $id = '0';
        $image_link = $_POST['imgSelected'];

        //On vérifie si l'utilisateur a déjà participé ou pas
        $verifBdd = new pictureModel();
        $verifBdd->getAll(true);
        //$test = $verifBdd->getIdMember();
        $hasParticipate = false;

        foreach ($verifBdd as $obj) {
            if ($obj['id_member'] == $id_member && $obj['id_contest'] == $id_contest) {
                $hasParticipate = true;
            }
        }
        if (!$hasParticipate) {
            //Si non, on enregistre
            $participateObj = new pictureModel($id, $title, $description, $image_link, $id_contest, $id_member, $nb_like);
            $participateObj->save();
            header("Location: /contest");
        } else {
            header("Location: /contest");
        }


    }


    public function loginAction()
    {
        session_start();
        require_once APPLICATION_PATH . '/public/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';


        $fb = new Facebook\Facebook([
            'app_id' => '959119600818575',
            'app_secret' => '9f0062f110ea6d3589e7debcb04c2268',
            'default_graph_version' => 'v2.5',
        ]);


        $helper = $fb->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        if (isset($accessToken)) {

            $_SESSION["token"] = (string)$accessToken;
            header("Location: https://hakoopix.herokuapp.com/participate");
        }
    }

    public function uploadAction()
    {
        session_start();

        include("../include/connexion.php");

        require_once APPLICATION_PATH . '/public/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';

        $fb = new Facebook\Facebook([
            'app_id' => '959119600818575',
            'app_secret' => '9f0062f110ea6d3589e7debcb04c2268',
            'default_graph_version' => 'v2.5',
        ]);


        if (!isset($_SESSION['token'])) {
            header("Location: /participate");
        } else {
            $fb->setDefaultAccessToken($_SESSION['token']);
        }


        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $error = 0;
        $error_msg = "";

        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check === false) {
                $error_msg = "File is not an image.";
                $error = 1;
            }
        }

        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $error_msg = "Sorry, your file is too large.";
            $error = 1;
        }


        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $error_msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $error = 1;
        }

//Vérification de l'existance de l'album
        $_POST["name_album"] = trim($_POST["name_album"]);
        if (empty($_POST["name_album"])) {
            $response = $fb->get('/me/albums?fields=id,can_upload');
            $albums = $response->getGraphEdge()->asArray();
            $albumFacebook = false;
            foreach ($albums as $album) {
                if ($album["id"] == $_POST['album']) {
                    $albumFacebook = true;
                    break;
                }
            }
            if (!$albumFacebook) {
                $error_msg = "L'upload is not allowed in this album.";
                $error = 1;
            }
        } else {
            $data = [
                "name" => $_POST["name_album"]
            ];
            try {
                $response = $fb->post('/me/albums', $data);
                $graphNode = $response->getGraphNode();
                $_POST['album'] = $graphNode['id'];
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


        if ($error == 0) {

            $data = [
                'message' => "Photo chargé depuis l'application Hakoopix ",
                'source' => $fb->fileToUpload($_FILES["fileToUpload"]["tmp_name"]),
            ];
            try {
                $response = $fb->post('/' . $_POST['album'] . '/photos', $data);
                header("Location: /participate");
            } catch (Facebook\Exceptions\FacebookResponseException $e) {
                $error_msg = 'Error: ' . $e->getMessage();

            }
        }

        header("Location: /participate");
    }
}