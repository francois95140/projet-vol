<?php


class Client{
    private $nom;
    private $prenom;
    private $age;
    private $email;
    private $numero;
    private $mot_de_passe;

    public function setClient($nom,$prenom,$age,$email,$numero,$mot_de_passe){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
        $this->email = $email;
        $this->numero = $numero;
        $this->mot_de_passe = $mot_de_passe;

    }

    public function inscription(){


        $bdd = new PDO('mysql:host=localhost;dbname=fto_vol;charset=utf8', 'root', '');

        $req = $bdd->prepare('SELECT * FROM client WHERE nom = :nom AND prenom = :prenom');

        $req->execute(array(
            'nom' => $this->nom,
            'prenom' => $this->prenom
        ));

        $res = $req->fetch();

        if ($res) {
            echo 'un compte est deja existant à se nom ' . $this->nom . '' . $this->prenom . '<br>';
        } else {
            $req = $bdd->prepare('INSERT INTO client(nom,prenom,age,email,numero,mot_de_passe) values(:nom,:prenom,:age,:email,:numero,:mot_de_passe)');

            $req->execute(array(
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'age' => $this->age,
                'email' => $this->email,
                'numero' => $this->numero,
                'mot_de_passe' => $this->mot_de_passe,
            ));

            echo 'La personne a bien été inscrit !' . '<br>';
        }

        echo '<form action="connexion.php" method="post">
      <p></p>
      <input type="submit" value="connectez vous" />
      </form>';


    }

    public function connexion(){
        session_start();

        $bdd = new PDO('mysql:host=localhost;dbname=fto_projet_cinema;charset=utf8', 'root', '');
        $req = $bdd->prepare('SELECT * FROM client WHERE nom = :nom AND mot_de_passe = :mot_de_passe');

        $req->execute(array(
            'nom' => $this->nom,
            'mot_de_passe' => $this->mot_de_passe
        ));

        $res = $req->fetch();

        if ($res) {
            $_SESSION['nom'] = $res['nom'];
            $_SESSION['prenom'] = $res['prenom'];
            $_SESSION['age'] = $res['age'];
            $_SESSION['email'] = $res['email'];
            $_SESSION['numero'] = $res['numero'];
            $_SESSION['mot_de_passe'] = $res['mot_de_passe'];

            echo "session start";
            //header('Location: accueil_si_connecter.php');
        } else {
            header('Location: connexion.php?erreur= login ou mot de passe incorrecte');
        }


    }
}