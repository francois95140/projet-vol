<?php
require_once 'Vol.php';
$vol = new Vol();
$volp = $vol->getVol();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vol</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<table id="table_id" class="table table-striped">
    <thead>

        <tr>
            <th>ID</th>
            <th>Date de depart</th>
            <th>Heure de depart</th>
            <th>Heure d'arrivée</th>
            <th>Pilote</th>
            <th>Avion</th>
        </tr>

        <?php foreach ($volp as $value){
        echo "<tr>
            <td>".$value['id_vol']."</td>
            <td>".$value['date_depart']."</td>
            <td>".$value['heure_depart']."</td>
            <td>".$value['heure_arrivee']."</td>
            <td>".$value['ref_pilote']."</td>
            <td>".$value['ref_avion']."</td>
        </tr>";
        };?>
    </thead>
</table>
</body>
</html>