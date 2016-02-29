<?php

class addPriceController
{

    public function indexAction($args)
    {
        $v = new view("addPrice");
        $v->assign("mesargs", $args);
    }

    public function insertAction($args)
    {
        /* Premier prix */
        $id = '0';
        $rank = 1;
        $title = $_POST['first-price-title'];
        $image_link = $_FILES['first-price-img']['name'];
        $description = $_POST['first-price-desc'];
        $id_contest = $_POST['id_cont'];

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

        /* Enregistrement Premier Prix */

        if (!empty($title)) {
            $addPriceObj1 = new priceModel($id, $rank, $title, $image_link, $description, $id_contest);
            $addPriceObj1->save();
        }

        /* Enregistrement Deuxième Prix */
        if (!empty($title2)) {
            $addPriceObj2 = new priceModel($id, $rank2, $title2, $image_link2, $description2, $id_contest);
            $addPriceObj2->save();
        }

        /* Enregistrement Troisième Prix */
        if (!empty($title3)) {
            $addPriceObj3 = new priceModel($id, $rank3, $title3, $image_link3, $description3, $id_contest);
            $addPriceObj3->save();
        }

        header("Location: /dashboard");
    }
}