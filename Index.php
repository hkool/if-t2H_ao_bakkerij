<?php

use model\Model;
include_once("model/Model.php");
use view\View;
include_once("view/View.php");
use controller\Controller;
include_once("controller/Controller.php");

$controller = new Controller();
$controller->updateView();

$controller->updateModel(2,"Kletskop",4.0, "zak", "koek",0);
$controller->updateView();

$controller->updateModel(3,"Mariakoekjes",6.0,"rol", "koek",0);
$controller->updateView();

$controller->updateModel(3,"Speltbrood",2.53,"spelt 20%, tarwe", "brood",0);
$controller->updateView();

$controller->updateModel(3,"Casinobrood",1.30,"wit meel", "brood",0);
$controller->updateView();

$controller->getView()->viewSold();
?>