<?php

namespace view;
use model\Model;
class View
{
    private $model;
    private $content;

    public function __construct(Model $model){
        $this->model = $model;

        echo "<h2>".$this->model->getContent()."</h2>";
    }

    public function viewContent()
    {
        $this->content = $this->model->getContent();
        $artikel = $this->model->getArtikel();

        echo "<p>";
        var_dump(get_class($artikel));
        echo "</p>";
        echo "<br />Artikel is: " . $artikel->getNaam();

        if (get_class($artikel) == "model\Koek") {
            echo "<br />Prijs per " . $artikel->getVerpakking() . " is: &euro;  " . number_format($float = $artikel->getPrijs(), $decimals = 2, $dec_point = ",", $thousands_sep = ".");

        }
        if (get_class($artikel) == "model\Brood") {
            echo "<br />Prijs per brood is: &euro;  " . number_format($float = $artikel->getPrijs(), $decimals = 2, $dec_point = ",", $thousands_sep = ".");
            echo"<br />De samenstelling is: ".$artikel->getSamenstelling();
        }
    }
    public function viewSold(){

        if($this->model->getAanbieding() != NULL){
            echo "<h1>Het artikel in de aanbieding  is ".$this->model->getAanbieding()->getNaam()."</h1>";
            echo "<h2>De aanbieding loopt tot ".$this->model->getEinddatum()  ."</h2>";
        }
    }
}
