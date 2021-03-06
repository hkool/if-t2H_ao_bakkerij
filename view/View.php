<?php

namespace view;
use model\Model;
use model\Brood;
class View
{
    private $model;
    private $content;

    public function __construct(Model $model){
        $this->model = $model;
    }

    public function viewContent()
    {
        echo "<h2>".$this->model->getContent()."</h2>";

        $koeken = $this->model->getKoeken();
        if($koeken != null) {
            foreach ($koeken as $artikel) {
                echo"<br />";
                echo "<br /><br />Artikel is: " . $artikel->getNaam();

                if (get_class($artikel) == "model\Koek") {
                    echo "<br />Prijs per " . $artikel->getVerpakking() . " is: &euro;  "
                        . number_format($float = floatval($artikel->getPrijs()),
                            $decimals = 2, $dec_point = ",", $thousands_sep = ".");
                }

            }
        }
        $broden = $this->model->getBroden();
        if($broden != null){
            foreach ($broden as $artikel)
            {
                echo "<br /><br />Artikel is: " . $artikel->getNaam();
                if (get_class($artikel) == "model\Brood") {
                    echo "<br />Prijs per brood is: &euro;  " . number_format($float = $artikel->getPrijs(), $decimals = 2, $dec_point = ",", $thousands_sep = ".");
                    echo "<br />De samenstelling is: " . $artikel->getSamenstelling();
                }
            }
        }

    }
    public function viewSold()
    {
        if($this->model->getAanbieding() != NULL){
            echo "<h1>Het artikel in de aanbieding  is ".$this->model->getAanbieding()->getNaam()."</h1>";
            echo "<h2>De aanbieding loopt tot ".strtolower($this->model->getEinddatum())  ."</h2>";
        }
    }
    public function viewForm(){
       include 'view/templates/form.php';
    }
}
