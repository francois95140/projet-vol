<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <meta charset="UTF-8">
    <title>AJOUT DE VOL</title>
</head>
<body>
<h1 >AJOUT DE VOL</h1>
<form action="traitement.php" method="post">
    <p>

        Date depart<br>
        <input type="date" name="date_depart"><br><br>

        Heure depart<br>
        <input type="time" name="heure_depart"><br><br>

        Heure arrivée<br>
        <input type="time" name="heure_arrivee"><br><br>

        Ref_pilote<br>
        <select class="js-example-basic-single" name="state">
            <option value="">--Choisissez un pilote--</option>
            <?php
            require_once 'Vol.php';
            $vol = new Vol();

            $pilote = $vol->pilote();

            foreach ($pilote as $value){
              echo "<option value=".$value['id_pilote'].">".$value['nom']." ".$value['prenom']."</option>";
            }?>
        </select>
        <br></dr><br></dr>

         <dr>Ref_avion<br>
                <select class="js-example-basic-single" name="state">
                    <option value="">--Choisissez un avion--</option>
                    <?php

                    $avion = $vol->avion();

                    foreach ($avion as $value){
                        echo "<option value=".$value['id_avion'].">".$value['nom']." ".$value['capacite']."</option>";
                    }?>
                </select><dr>
         </dr>

             <dr><br> <dr></dr> <input type="submit" value="valider"><br/>
    </p>
</form>

</body>
</html>
