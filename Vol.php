<?php

class Vol{

    private $date_depart;
    private $heure_depart;
    private $heure_arrivee;
    private $ref_pilote;
    private $ref_avion;

    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    private function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }


    public function getDateDepart()
    {
        return $this->date_depart;
    }


    public function setDateDepart($date_depart)
    {
        $this->date_depart = $date_depart;
    }


    public function getHeureDepart()
    {
        return $this->heure_depart;
    }


    public function setHeureDepart($heure_depart)
    {
        $this->heure_depart = $heure_depart;
    }


    public function getHeureArrivee()
    {
        return $this->heure_arrivee;
    }


    public function setHeureArrivee($heure_arrivee)
    {
        $this->heure_arrivee = $heure_arrivee;
    }


    public function getRefPilote()
    {
        return $this->ref_pilote;
    }


    public function setRefPilote($ref_pilote)
    {
        $this->ref_pilote = $ref_pilote;
    }


    public function getRefAvion()
    {
        return $this->ref_avion;
    }


    public function setRefAvion($ref_avion)
    {
        $this->ref_avion = $ref_avion;
    }

    public function add_vol(){
        $bdd = new PDO('mysql:host=localhost;dbname=fto_vol;charset=utf8', 'root', '');

        $req = $bdd->prepare('INSERT INTO vol (date_depart,heure_depart,heure_arrivee,ref_pilote,ref_avion) VALUES (:date_depart,:heure_depart,:heure_arrivee,:ref_pilote,:ref_avion)');

        $req->execute(array(

            'date_depart'=>$this->date_depart,
            'heure_depart'=>$this->heure_depart,
            'heure_arrivee'=>$this->heure_arrivee,
            'ref_pilote'=>$this->ref_pilote,
            'ref_avion'=>$this->ref_avion
        ));

        echo 'fin';
    }

    public function pilote(){
        $bdd = new PDO('mysql:host=localhost;dbname=fto_vol;charset=utf8', 'root', '');

        $res = $bdd ->prepare('SELECT * FROM pilote');

        $res->execute();

        return $res ->fetchAll();
    }

    public function avion (){
        $bdd = new PDO('mysql:host=localhost;dbname=fto_vol;charset=utf8', 'root', '');

        $res = $bdd->prepare('SELECT * FROM avion');

        $res->execute(array());

        $req = $res->fetchAll();
        return $req;
    }

    public function getVol(){
        $bdd = new PDO('mysql:host=localhost;dbname=fto_vol;charset=utf8', 'root', '');

        $res = $bdd ->prepare('SELECT * FROM vol');

        $res->execute(array(

        ));

        $req = $res ->fetchAll();
        return $req;
    }

    public function supprimer(){
        $bdd = new PDO('mysql:host=localhost;dbname=fto_vol;charset=utf8', 'root', '');

        $res = $bdd ->prepare('DELETE FROM vol WHERE ');
    }

    public function modif(){

    }

}