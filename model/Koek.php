<?php

namespace model;
use model\Deegwaar;
include_once("model/Deegwaar.php");

class Koek extends Deegwaar
{
    private $verpakking;

//    public function __construct($id, $naam, $prijs, $verpakking)
//    {
//        parent::__construct($id,$naam,$prijs);
//
//        $this->verpakking = $verpakking;
//    }

    /**
     * @return mixed
     */
    public function getNaam()
    {
        return $this->naam;
    }

    /**
     * @param mixed $naam
     */
    public function setNaam($naam): void
    {
        parent::setNaam($naam);
        // niet meer via de constructor, omdat de fetch_class eenvoudiger is zonder constructor.
        // de setter gaat door naar de parent.
        // de attributen van de parent moeten wel op protected staan ipv op private.
    }

    /**
     * @return mixed
     */
    public function getPrijs()
    {
        return $this->prijs;
    }

    /**
     * @param mixed $prijs
     */
    public function setPrijs($prijs): void
    {
        parent::setPrijs($prijs);
    }

    /**
     * @return mixed
     */
    public function getVerpakking()
    {

        return $this->verpakking;
    }

    /**
     * @param mixed $verpakking
     */
    public function setVerpakking($verpakking): void
    {
        $this->verpakking = $verpakking;
    }
}