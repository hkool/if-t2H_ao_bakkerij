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
    private $artikelen;
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
        return $this->artikelen;
    }

    public function getContent(){
        return $this->content;
    }
    public function setArtikel ($id, $naam,$prijs, $extraEigenschap, $type, $aanbieding){
       switch($type)
       {
           case "brood":
               $artikel = new Brood($id, $naam, $prijs, $extraEigenschap);
               break;
           case "koek":
               $artikel = new Koek($id, $naam, $prijs, $extraEigenschap);
               break;
       }
        $this->artikelen[] = $artikel;
       if($aanbieding == "on" && $this->aanbieding == null){
           $this->setAanbieding($artikel);
       }
    }
    public function setAanbieding($artikel)
    {
        $this->aanbieding = $artikel;
        $this->setEinddatum();
    }
    public function getAanbieding()
    {
        return $this->aanbieding;
    }

    public function setEinddatum()
    {
        date_default_timezone_set('Europe/Amsterdam');
        $this->einddatum  = date("j F  Y",  mktime(0, 0,
            0, date("m")  , date("d")+14, date("Y")));

    }

    public function getEinddatum()
    {
        return $this->einddatum;
    }


}