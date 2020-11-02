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

    public function updateModel()
    {

        $naam = filter_input(INPUT_POST, ('naam'));
        $prijs = filter_input(INPUT_POST, ('prijs'));
        $extraeigenschap = filter_input(INPUT_POST, ('extraeigenschap'));
        $type = filter_input(INPUT_POST, ('type'));
        $aanbieding = filter_input(INPUT_POST, ('aanbieding'));
        $this->model->insertArtikel($naam, $prijs, $extraeigenschap, $type);
    }


//        $this->model->setArtikel( $naam,  $prijs, $extraeigenschap, $type, $aanbieding);
//    }


//    public function updateModel($id, $naam,  $prijs,$extraEigenschap, $type){
//        $this->model->setArtikel($id, $naam,  $prijs, $extraEigenschap, $type);
//    }

    public function updateView(){
        $this->view->viewContent();
    }
}