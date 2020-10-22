<?php

namespace model;
use model\Deegwaar;
include_once("model/Deegwaar.php");

class Koek extends Deegwaar
{
    private $verpakking;



    public function __construct($id, $naam, $prijs, $verpakking)
    {
        parent::__construct($id,$naam,$prijs);

        $this->verpakking = $verpakking;
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