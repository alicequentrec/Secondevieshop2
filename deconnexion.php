<?php
$connexion = new mysqli;
$bdd = new PDO ;
        $host= '51.158.59.186'; 
        $port= '14301'; 
        $dhname ='AQ';
         $user = 'phpex';
          $pass = 'Supermotdepasse!42';
if ($connexion->connect_error) {
    die("Connexion échouée : " . $connexion->connect_error);
} else {
    echo "  ";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = isset($_POST["nom"]) ? $_POST["nom"] : null;
    $text = isset($_POST["text"]) ? $_POST["text"] : null;
    $etoile = isset($_POST["etoile"]) ? $_POST["etoile"] : null;  
if ($nom !== null) {
    
    $requete = $connexion->prepare("INSERT INTO avis (nom, text, etoile) VALUES (?, ?, ?)");
    if ($requete === false) {
        die("Erreur de préparation de la requête : " . $connexion->error);
    }

    $requete->bind_param("sss", $nom, $text, $etoile);

   
    if ($requete->execute()) {
        echo "  ";
    } else {
        echo "Erreur lors de l'enregistrement de l'avis : " . $requete->error;
        header("Location: deconnexion.php");
        exit; 
    }
} 
}
$connexion->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fin du Site</title>
  <link rel="stylesheet" href="deconnexion.php">
</head>
<body>
<div class="container">
    <h1>Merci d'avoir visité notre site !</h1>
    <p>Nous aimerions avoir votre avis. Merci de partager vos commentaires ci-dessous :</p>
    
    <form action="deconnexion.php" method="post">
     
      <label for="nomr">Votre nom :</label>
      <input type="text" id="nom" name="nom" placeholder="Votre identifiant" required>
      <label for="text">Votre avis :</label>
      <textarea id="text" name="text" rows="4" placeholder="Saisissez votre commentaire ici..." required></textarea>
      <label for="etoile">Votre note (sur 5) :</label>
      <input type="number" id="etoile" name="etoile" min="1" max="5" required>
      <button type="submit">Envoyer</button>
    </form>
  </div>
<style>
body {
  font-family: 'Arial', sans-serif;
  margin: 0;
  padding: 0;
  background-color: lightblue;
}

.container {
  max-width: 800px;
  margin: 50px auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
  color: #333;
}

p {
  color: #666;
}

form {
  margin-top: 20px;
}

label {
  display: block;
  margin-bottom: 8px;
  color: #333;
}

textarea,
input {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button {
  background-color: #3498db;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #2980b9;
}

    </style>
</body>
</html>
