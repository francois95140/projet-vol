<?php

class Vol{

    private $date_depart;
    private $heure_depart;
    private $heure_arrivee;
    private $ref_pilote;
    private $ref_avion;

    public function setVol($date_depart,$heure_depart,$heure_arrivee,$ref_pilote,$ref_avion){

        $this->date_depart = $date_depart;
        $this->heure_depart = $heure_depart;
        $this->heure_arrivee = $heure_arrivee;
        $this->ref_pilote = $ref_pilote;
        $this->ref_avion = $ref_avion;
    }


    public function add_vol(){
        $bdd = new PDO('mysql:host=localhost;dbname=fto_vol;charset=utf8', 'root', '');

        $req = $bdd->prepare('INSERT INTO vol (date_depart,heure_depart,heure_arrivee,ref_pilote,ref_avion) VALUES (:date_depart,:heure_depart,:heure_arrivee,:ref_pilote,:ref_avion)');

        $req->execute(array(

            "date_depart"=>$this->date_depart,
            "heure_depart"=>$this->heure_depart,
            "heure_arrivee"=>$this->heure_arrivee,
            "ref_pilote"=>$this->ref_pilote,
            "ref_avion"=>$this->ref_avion
        ));

        echo 'fin';
    }

    public function pilote(){
        $bdd = new PDO('mysql:host=localhost;dbname=fto_vol;charset=utf8', 'root', '');

        $res = $bdd ->prepare('SELECT * FROM pilote');

        $res->execute(array(

        ));

        $req = $res ->fetchAll();
        return $req;
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

}