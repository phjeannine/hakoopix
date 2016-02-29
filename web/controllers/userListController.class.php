<?php

class userListController extends basesql
{
    public function indexAction($args)
    {
        $v = new view("userList");
        $v->assign("mesargs", $args);
    }

    public function exportAction($args)
    {
        header('Content-Type: text/csv;');
        header('Content-Disposition: attachment; filename="Export Concours.csv"');
        $verif = new memberModel();
        $verif->getAll(true);
        //var_dump($verif);
        ?>"Nom";"Prenom";"Id Facebook";"Email"<?php
        echo "\n";
        foreach ($verif as $data) {
            echo utf8_decode($data['lastname'] . ";" . $data['firstname'] . ";" . $data['id_member'] . ";" . $data['email'] . "\n");
        }
    }
}