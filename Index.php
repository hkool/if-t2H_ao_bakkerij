<?php

use model\Model;
include_once("model/Model.php");
use view\View;
include_once("view/View.php");
use controller\Controller;
include_once("controller/Controller.php");

$controller = new Controller();
if($_REQUEST == null) {
    $controller->getView()->viewForm();
}
else{
    $controller->updateModel();
    $controller->updateView();
    $controller->getView()->viewSold();
}



?>