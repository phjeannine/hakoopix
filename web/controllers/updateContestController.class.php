<?php


class updateContestController extends basesql {

	public function indexAction($args){
		$v = new view("updateContest");
		$v->assign("mesargs", $args);
	}

	public function updateAction($args) {
		// On récupère nos valeurs
		$id = $args['0'];
		$title = $_POST['update-title'];
		$date_begin = $_POST['update-begin'];
		$date_ending = $_POST['update-ending'];
		$description = $_POST['update-description'];
		$color_theme = $_POST['update-color-theme'];
		$logo = $_FILES['update-logo']['name'];
		$banner = $_FILES['update-banner']['name'];

		if(!empty($_POST['active-contest'])) {
			$active_contest = $_POST['active-contest'];
		}
		else {
			$active_contest = 0;
		}

		// On vérifie si tous les champs ne sont pas null
		if(empty($title) OR empty($date_begin) OR empty($date_ending) OR empty($description))  {
			// Si les champs sont vides, on affiche une erreur
			echo '<font color="red">Attention, les champs doivent être remplis !</font>';
		} else {
			try {
				$updateContestObj = new contestModel($id, $title, $date_begin, $date_ending, $description, $color_theme, $banner, $logo, $active_contest);
				$getActiveContest = $this->getActiveContest();
				if (!$getActiveContest == FALSE) {
					$this->unsetActiveContest($getActiveContest['id']);
				}
				$updateContestObj->save();
			}
			catch (Exception $e) {
				die('Erreur : ' . $e->getMessage());
			}

			header("Location: /contestList");

		}


	}
}