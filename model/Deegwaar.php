<?php


namespace model;


abstract class Deegwaar
{
    private $id;
    private $naam;
    private $prijs;

    protected function __construct($id,$naam, $prijs)
    {
        $this->id = $id;
        $this->naam = $naam;
        $this->prijs = $prijs;
    }

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
        $this->naam = $naam;
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
        $this->prijs = $prijs;
    }



}