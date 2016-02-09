<?php

class addPriceController {

	public function indexAction($args){
		$v = new view("addPrice");
		$v->assign("mesargs", $args);
	}

	public function insertAction($args){
		/* Premier prix */
		$rank1 = 1;
		$title1 = $_POST['first-price-title'];
		$image_link1 = $_FILES['first-price-img']['name'];
		$description1 = $_POST['first-price-desc'];

		/* Deuxième prix */
		$rank2 = 2;
		$title2 = $_POST['second-price-title'];
		$image_link2 = $_FILES['second-price-img']['name'];
		$description2 = $_POST['second-price-desc'];

		/* Premier prix */
		$rank3 = 3;
		$title3 = $_POST['third-price-title'];
		$image_link3 = $_FILES['third-price-img']['name'];
		$description3 = $_POST['third-price-desc'];

		$addPriceObj1 = new priceModel(1, "titre premier prix", "canon.jpg", "sdjsnkjdnjkzsndjk", 20);
		$addPriceObj1->save();

		/*
		$addPriceObj2 = new priceModel($rank2, $title2, $image_link2, $description2, 20);
		$addPriceObj2->save();

		$addPriceObj3 = new priceModel($rank3, $title3, $image_link3, $description3, 20);
		$addPriceObj3->save();
		*/

		//header("Location: /dashboard");
	}
}