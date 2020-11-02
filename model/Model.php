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
    private $database;


    public function __construct(){
        $this->content = "Welkom bij de Bakker";
    }
    /**
     * @return mixed
     */
    public function getKoeken()
    {
        $this->makeConnection();
        $selection = $this->database->query('SELECT * FROM koeken');
        if($selection){
            $result=$selection->fetchAll(\PDO::FETCH_CLASS,Koek::class);
            return $result;
        }
        return null;

    }
    /**
     * @return mixed
     */
    public function getBroden()
    {
        $this->makeConnection();
        $selection = $this->database->query('SELECT `id`, `naam`, `prijs`, `samenstelling` FROM broden');
        if($selection){
            $result=$selection->fetchAll(\PDO::FETCH_CLASS,Brood::class);
            return $result;
        }
        return null;


    }
    public function getContent(){
        return $this->content;
    }

    private function makeConnection(){
        $this->database = new \PDO('mysql:host=localhost;dbname=bakkerij', "root", "");
    }// hier XAMPP, elders: database server, database naam, usernaam, password
    private function stopConnection()
    {
    $this->database = null;
    }

    // insertArtikel() slaat het artikel rechtstreeks op in de database zonder er eerst een object van te hebben gemaakt.
    // in symfony werken formulieren wel met klassen en objecten, zoals setArtikel() en saveArtikel()

    public function insertArtikel($naam,$prijs, $extraEigenschap, $type){
        $this->makeConnection();

        if($type == "koek"){
            try{
                // id hoeft niet te worden toegevoegd omdat de id in de databse op autoincrement staat.
                $query = $this->database->prepare ("INSERT INTO `koeken` (`id`,`naam`,`prijs`,`verpakking`) 
                        VALUES(NULL, :naam, :prijs, :verpakking);");
                var_dump($query);
                $query->bindParam(":naam", $naam);
                $query->bindParam(":prijs", $prijs);
                $query->bindParam(":verpakking",$extraEigenschap);
                $result = $query->execute();
                return $result;
            }
            catch(\PDOException $pdoEx){
                echo"mislukt".$pdoEx->getMessage();
            }
        }
    }
    // setArtikel en saveArtikel maken eerst een object aan en slaan het object op in de database
    private function saveArtikel($object){
      $this->makeConnection();

        if(get_class($object) == "model\Koek"){
            try{
                $naam = $object->getNaam();
                $prijs=$object->getPrijs();
                $verpakking = $object->getVerpakking();
                // id hoeft niet te worden toegevoegd omdat de id in de databse op autoincrement staat.
                $query = $this->database->prepare ("INSERT INTO `koeken` (`id`,`naam`,`prijs`,`verpakking`) 
                        VALUES(NULL, :naam, :prijs, :verpakking);");
//                $query2 = $this->database->prepare ("INSERT INTO `koeken` (`id`, `naam`, `prijs`, `verpakking`) VALUES (NULL, 'pannekoek', '1', 'per 10');");
                var_dump($query);
                $query->bindParam(":naam", $naam);
                $query->bindParam(":prijs", $prijs);
                $query->bindParam(":verpakking",$verpakking);
                $result = $query->execute();
                var_dump($result);
                return $result;
            }
            catch(\PDOException $pdoEx){
                echo"mislukt".$pdoEx->getMessage();
            }
        }
    }
    public function setArtikel ( $naam,$prijs, $extraEigenschap, $type, $aanbieding){
        switch($type)
       {
           case "brood":
               $artikel = new Brood();
               $artikel->setNaam($naam);
               $artikel->setPrijs($prijs);
               $artikel->setSamenstelling($extraEigenschap);
               break;
           case "koek":
               $artikel = new Koek();
               $artikel->setNaam($naam);
               $artikel->setPrijs($prijs);
               $artikel->setVerpakking($extraEigenschap);
               break;
       }
       $this->saveArtikel($artikel);
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