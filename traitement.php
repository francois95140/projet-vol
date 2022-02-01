<?php

require_once 'Vol.php';
$vol = new Vol(array(
    'date_depart'=>$_POST['date_depart'],
    'heure_depart'=>$_POST['heure_depart'],
    'heure_arrivee'=>$_POST['heure_arrivee'],
    'ref_pilote'=>$_POST['ref_pilote'],
    'ref_avion'=>$_POST['ref_avion']));//création d'objet / instanciation(
var_dump($vol);
$vol->add_vol();





