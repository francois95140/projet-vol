<?php

require_once 'Client.php';
$client = new client(array(
    'nom'=>$_POST['nom'],
    'mot_de_passe'=>$_POST['wps']
));

$client->connexion();