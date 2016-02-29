<?php

class contestListController
{

    public function indexAction($args)
    {
        $v = new view("contestList");
        $v->assign("mesargs", $args);
    }

}