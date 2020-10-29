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

    public function updateModel(){
        $id = filter_input(INPUT_GET,('id'));
        $naam = filter_input(INPUT_GET,('naam'));
        $prijs = filter_input(INPUT_GET,('prijs'));
        $extraeigenschap = filter_input(INPUT_GET,('extraeigenschap'));
        $type = filter_input(INPUT_GET,('type'));
        $aanbieding = filter_input(INPUT_GET,('aanbieding'));
        $this->model->setArtikel($id, $naam,  $prijs, $extraeigenschap, $type, $aanbieding);
    }


//    public function updateModel($id, $naam,  $prijs,$extraEigenschap, $type){
//        $this->model->setArtikel($id, $naam,  $prijs, $extraEigenschap, $type);
//    }

    public function updateView(){
        $this->view->viewContent();
    }
}