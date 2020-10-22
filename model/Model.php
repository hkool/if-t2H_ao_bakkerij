<?php

namespace model;
use model\Koek as Koek;
include_once("model/Koek.php");
use model\Brood as Brood;
include_once("model/Brood.php");
include_once ("model/Aanbieding.php");
class Model implements Aanbieding
{
    private $content;
    private $artikel;
    private $aanbieding;
    private $einddatum;

    public function __construct(){
        $this->content = "Welkom bij de Bakker";
        $this->setArtikel('1','Bosche Bol',1.50 ,"stuk", "koek", 0);
    }
    /**
     * @return mixed
     */
    public function getArtikel()
    {
        return $this->artikel;
    }

    public function getContent(){
        return $this->content;
    }
    public function setArtikel ($id, $naam,$prijs, $verpakking, $type, $aanbieding){
       switch($type)
       {
           case "brood":
               $artikel = new Brood($id, $naam, $prijs, $verpakking);
               break;
           case "koek":
               $artikel = new Koek($id, $naam, $prijs, $verpakking);
               break;
       }
        $this->artikel = $artikel;
       if($aanbieding == 1){
           $this->setAanbieding();
       }


    }

    public function getAanbieding()
    {
        return $this->aanbieding;
    }

    public function setEinddatum()
    {
        $this->einddatum  = date("j F  Y",  mktime(0, 0, 0, date("m")  , date("d")+14, date("Y")));

    }

    public function getEinddatum()
    {
        return $this->einddatum;
    }

    public function setAanbieding()
    {
        $this->aanbieding = $this->artikel;
        $this->setEinddatum();
    }
}