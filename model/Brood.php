<?php


namespace model;

use model\Deegwaar;
include_once("model/Deegwaar.php");

class Brood extends Deegwaar
{
    private $samenstelling;



//    public function __construct($id, $naam, $prijs, $samenstelling)
//    {
//        parent::__construct($id,$naam,$prijs);
//
//        $this->samenstelling = $samenstelling;
//    }

    /**
     * @return mixed
     */
    public function getSamenstelling()
    {
        return $this->samenstelling;
    }

    /**
     * @param mixed $samenstelling
     */
    public function setSamenstelling($samenstelling): void
    {
        $this->samenstelling = $samenstelling;
    }



}