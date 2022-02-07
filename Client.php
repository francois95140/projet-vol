<?php


class Client{
    private $nom;
    private $prenom;
    private $age;
    private $email;
    private $numero;
    private $mot_de_passe;

    public function __construct(array $donnees){
        $this->hydrate($donnees);
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getMotDePasse()
    {
        return $this->mot_de_passe;
    }

    /**
     * @param mixed $mot_de_passe
     */
    public function setMotDePasse($mot_de_passe)
    {
        $this->mot_de_passe = $mot_de_passe;
    }


    private function hydrate(array $donnees){
        foreach ($donnees as $key => $value){
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
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
            $req = $bdd->prepare('INSERT INTO client(nom,prenom,age,email,mot_de_passe,numero) values (:nom,:prenom,:age,:email,:mot_de_passe,:numero)');

            $req->execute(array(
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'age' => $this->age,
                'email' => $this->email,
                'mot_de_passe' => $this->mot_de_passe,
                'numero' => $this->numero,
            ));
    var_dump($this);
            $req->debugDumpParams();

            echo 'La personne a bien été inscrit !' . '<br>';
        }

        echo '<form action="connexion.html" method="post">
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