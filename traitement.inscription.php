<?php
require_once 'Client.php';
$client = new Client(array(
    'nom'=>$_POST['nom'],
    'prenom'=>$_POST['prenom'],
    'age'=>$_POST['age'],
    'email'=>$_POST['email'],
    'mot_de_passe'=>$_POST['mot_de_passe'],
    'numero'=>$_POST['numero']
));
$client->inscription();