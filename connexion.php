<?php
session_start();

if (isset($_POST["bouton"])) {
    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];
    $id = new mysqli;
  
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
?>
<!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projetphp</title>
    </head>
<html lang="en">
<body>
    <h1>Formulaire de Connexion </h1><hr>
    <form action="" method="post">
       <p> <input type="email" name="mail" placeholder="Entrez votre mail :" required></p>
       <p> <input type="password" name="mdp" placeholder="Mot de passe :" required></p>
       <p><input type = "password" name = "mdp" placeholder="Mot de passe" required></p>
       <p> <input type="submit" value="Connexion" name="bouton"></p>
       <div class="links">
            <a href="Inscription.php">Pas encore inscrit?</a>
        </div>
    </form><hr>
</body>
<style>
    body {
    background-color: lightblue;
    color: white;
}
h1 {
    font-size: 50px;
    text-align: center;
    font-family: 'Nom de la police', sans-serif;
}
form {
            text-align: center;
        }

        input {
            font-size: 23px; 
            padding: 15px; 
        }
    </style>  
</html>