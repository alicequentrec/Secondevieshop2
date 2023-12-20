<?php

if (isset($_POST["bouton_connexion"])) {
    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];

    $id = new mysqli ;
    $host= '51.158.59.186'; 
    $port= '14301'; 
    $dhname ='AQ';
     $user = 'phpex';
      $pass = 'Supermotdepasse!42';

    if ($id->connect_error) {
        die("Connexion échouée : " . $id->connect_error);
    }

 
    if (!method_exists($id, 'prepare')) {
        die("La méthode prepare n'est pas disponible pour cette connexion.");
    }

 
    $requete = "SELECT * FROM users WHERE email=?"; 

    $stmt = $id->prepare($requete);

    if (!$stmt) {
        die("Erreur de préparation de la requête : " . $id->error);
    }

    $stmt->bind_param("s", $mail);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        $ligne = $res->fetch_assoc();

        if (password_verify($mdp, $ligne["password"])) {

          session_start();
            $_SESSION["mail"] = $mail;
            $_SESSION["nom"] = $ligne["nom"];

            echo "Connexion OK, vous allez être redirigé...";
            header("refresh:1; url=accueil.php"); 
        } else {
            echo "<h3>Erreur de mail ou de mot de passe...</h3>";
        }
    } else {
        
        echo "<h3>Erreur de mail ou de mot de passe...</h3>";
    }

   
    $stmt->close();
    $id->close();
}

if(isset($_POST["bouton_inscription"])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    $hashedmdp = password_hash($mdp, PASSWORD_DEFAULT);
   
    $bdd = new PDO('mysql:host=localhost;dbname=projetphp', 'root', '');

    $requete = "INSERT INTO users (nom, prenom, email, password)
                VALUES (:nom, :prenom, :mail, :mdp)";

    $stmt = $bdd->prepare($requete);

    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':mail', $mail);
    $stmt->bindParam(':mdp', $hashedmdp); 

    $stmt->execute();

    echo "<h3>Inscription réussie.<br>Vous pouvez vous connecter...</h3>";
    header("refresh:3; url=connexion.php");
}
?>
