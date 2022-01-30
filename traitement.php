<?php

require_once 'Vol.php';
$vol = new Vol(
    $_POST['date_depart'],
    $_POST['heure_depart'],
    $_POST['heure_arrivee'],
    $_POST['ref_pilote'],
    $_POST['ref_avion']);//création d'objet / instanciation(

$vol->add_vol();


