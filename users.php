<?php
include_once('\wamp64\www\projetphp\view\premierepage.php');

class Users
{
    private $model;
    public function __construct()
    {
        $this->model = new Users;
    }

 /* INSCRIPTION */
    public function getFormInscription()
    {
        include_once('\wamp64\www\projetphp\view\inscription.php');
    }


    public function setUser()
    {
        if (isset($_POST['nom'])) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $mdp = password_hash($_POST['mdp'],PASSWORD_DEFAULT);

            if ($this->model->setUser($nom, $prenom, $email, $password)) {
                echo "Inscription OK";
            } else {
                echo "Inscription KO";
                $this->getFormInscription();
            }
        } else {
            $this->getFormInscription();
        }


    }
    /* connexion*/
    public function getFormConnexion()
    {
        include_once('view/connexion.php');
    }
    public function getConnexion()
    {
        if (isset($_POST['email'])) {
           
            $email = $_POST['email'];
           
            $user=$this->model->getUserByEmail($email);
            $password=password_verify($_POST['password'],$user['password']);

            if ($password) {
                $_SESSION['email']=$user['email'];
                
                echo "Connection OK";
            } else {
                echo "Connection KO";
                $this->getFormConnexion();
            }


        } else {
            $this->getFormConnexion();
        }


    }


}