<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" href="style.css">
    <title>ProjetPHP</title>   
</head>
<body>
<h1>Inscription</h1><hr>    <form action="" method="post" >
        <p><input type = "text" name = "nom" placeholder="Entrez votre Nom" required></p>
        <p><input type = "text" name = "prenom" placeholder="Entrez votre Prénom" required></p>
        <p><input type = "email" name = "mail" placeholder="Entrez votre mail" required></p>
        <p><input type = "password" name = "mdp" placeholder="Mot de passe" required></p>
        <p><input type = "password" name = "mdp" placeholder="Mot de passe" required></p>    
        <p><input type = "submit" value = "Envoyer" name = "bouton" required></p>
        <a href="Connexion.php">Déjà inscrit?</a>
    </form><hr>

</form>
<style>
    body {
    background-color:  lightblue;
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
            font-size: 18px; 
            padding: 10px; 
        }
    </style>  
<?php
if(isset($_POST["bouton"])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    $hashedmdp = password_hash($mdp, PASSWORD_DEFAULT);
  
    
    $bdd = new PDO ;
        $host= '51.158.59.186'; 
        $port= '14301'; 
        $dhname ='AQ';
         $user = 'phpex';
          $pass = 'Supermotdepasse!42';

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
</body>
</html>

