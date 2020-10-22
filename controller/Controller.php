<?php

namespace controller;
use model\Model;
use view\View;

class Controller
{
    private $model;
    private $view;

    public function __construct(){
        $this->model = new Model();

        $this->view = new View($this->model);
    }
    /**
     * @return View
     */
    public function getView(): View
    {
        return $this->view;
    }

    public function updateModel($id, $naam,  $prijs,$verpakking, $type, $aanbieding){
        $this->model->setArtikel($id, $naam,  $prijs, $verpakking, $type, $aanbieding);
    }
    public function updateView(){
        $this->view->viewContent();
    }
}