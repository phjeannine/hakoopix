<?php

class addContestController extends basesql {

	public function indexAction($args){
		$v = new view("addContest");
		$v->assign("mesargs", $args);
	}

	public function insertAction($args){
		$id = '0';
		$title = $_POST['title'];
		$date_begin = $_POST['begin'];
		$date_ending = $_POST['ending'];
		$description = $_POST['description'];
		$color_theme = $_POST['color-theme'];
		$logo = $_FILES['logo']['name'];
		$banner = $_FILES['banner']['name'];
		$active_contest = 0;
		$delete_contest = 0;

		$logo = $this->upload_logo();
		$banner = $this->upload_banner();

		if(!empty($_POST['active-contest'])) {
			$active_contest = $_POST['active-contest'];
		}

		$addContestObj = new contestModel($id, $title, $date_begin, $date_ending, $description, $color_theme, $logo, $banner, $active_contest, $delete_contest);
		$getActiveContest = $this->getActiveContest();
		if (!$getActiveContest == FALSE & isset ($_POST['active-contest'])) {
			$this->unsetActiveContest($getActiveContest['id']);
		}
		$addContestObj->save();

		header("Location: /contestList");
	}

	// Dashboard => fonction d'upload logo
	function upload_logo() {
		$dossier = APPLICATION_PATH.'\public\images\logo';
		$fichier = explode(".", $_FILES['logo']['name']);
		$taille_maxi = 1000000000;
		$taille = filesize($_FILES['logo']['tmp_name']);
		$extensions = array('.png', '.gif', '.jpg', '.jpeg');
		$extension = strrchr($_FILES['logo']['name'], '.');

		if(!in_array($extension, $extensions)) {
			$erreur = 'Vous devez uploader un fichier de type png, gif, jpg où jpeg';
		}
		if($taille > $taille_maxi) {
			$erreur = 'Le fichier est trop lourd.';
		}
		if(!isset($erreur)) {
			//On formate le nom du fichier ici...
//			$fichier = strtr($fichier,
//					'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
//					'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
//			$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

			$fichier = md5(uniqid(rand(), true)) . "." . end($fichier);
			try {
				move_uploaded_file($_FILES['logo']['tmp_name'], $dossier . '\\' . $fichier);
				//Si la fonction renvoie TRUE, c'est que ça a fonctionné...
			}
			catch (Exception $e) {
				die('Erreur : ' . $e->getMessage());
			}
		}
		else
		{
			echo $erreur;
		}
		return $fichier;
	}


	// Dashboard => fonction d'upload bannière
	function upload_banner()
	{
		$dossier = APPLICATION_PATH . '\public\images\banner';
		$fichier = basename($_FILES['banner']['name']);
		$taille_maxi = 1000000000;
		$taille = filesize($_FILES['banner']['tmp_name']);
		$extensions = array('.png', '.gif', '.jpg', '.jpeg');
		$extension = strrchr($_FILES['banner']['name'], '.');

		if (!in_array($extension, $extensions)) {
			$erreur = 'Vous devez uploader un fichier de type png, gif, jpg ou jpeg';
		}
		if ($taille > $taille_maxi) {
			$erreur = 'Le fichier est trop lourd.';
		}
		if (!isset($erreur)) {
			//On formate le nom du fichier ici...
//			$fichier = strtr($fichier,
//					'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
//					'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
//			$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

			$fichier = md5(uniqid(rand(), true)) . $extension;
			try {
				move_uploaded_file($_FILES['banner']['tmp_name'], $dossier . '\\' . $fichier);
				//Si la fonction renvoie TRUE, c'est que ça a fonctionné...
			} catch (Exception $e) {
				die('Erreur : ' . $e->getMessage());
			}
		} else {
			echo $erreur;
		}
		return $fichier;
	}
}