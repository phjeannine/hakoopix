<?php

class addContestController {

	public function indexAction($args){
		$v = new view("addContest");
		$v->assign("mesargs", $args);
	}

	public function insertAction($args){
		$title = $_POST['title'];
		$date_begin = $_POST['begin'];
		$date_ending = $_POST['ending'];
		$description = $_POST['description'];
		$color_theme = $_POST['color-theme'];
		$logo = $_FILES['logo']['name'];
		$banner = $_FILES['banner']['name'];
		$active_contest = false;
		$delete_contest = false;

		if(isset($_POST['active-contest'])) {
			$active_contest = $_POST['active-contest'];
		}

		//$addContestObj = new contestModel($title, $date_begin, $date_ending, $description, $color_theme, $logo, $banner, $active_contest, $delete_contest);
		$addContestObj = new contestModel('titre', '01-25-2015', '02-15-2015', 'description', '#FFFFFF', 'logo', 'banner', true, false);
		$addContestObj->save();
		echo "Insertion réussie";
		//header("Location: /contestList");
	}

}