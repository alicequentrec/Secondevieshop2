<?php
session_start();
if (!isset($_SESSION['mail'])) {
    header('Location: Connexion.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <title>SecondeVieShop</title>

    <button href="deconnexion.php" id="btnDeconnexion">Déconnexion
</button>

    <style>

#btnDeconnexion {
  position: fixed; 
  top: 10px; 
  right: 10px; 
  background-color: lightblue;
  color: blue;
  padding: 10px;
  border: none;
  cursor: pointer;
}

/
h1 {
  margin: 40px;
}

p {
  margin: 20px;
}

    body {
    background-color: lightblue;
    color: blue;
    font-family: 'Arial', sans-serif;
    text-align: center;
}

h1 {
    font-size: 36px;
}

.annonces {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.annonce {
    border: 1px solid #ddd;
    padding: 10px;
    background-color:white;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.annonce img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
}

.annonce h2 {
    font-size: 24px;
    margin-bottom: 10px;
}

.annonce p {
    font-size: 16px;
    margin-bottom: 30px;
    color: lightblue;
}

.annonce .prix {
    font-size: 30px;
    font-weight: bold;
    color: black;
}
.annonce img {
    max-width: 50%;
    height: auto;
}
    </style>
</head>
<body>

<h1>Bienvenue sur votre site SecondeVieShop</h1>

<?php


$bdd = new PDO ;
        $host= '51.158.59.186'; 
        $port= '14301'; 
        $dhname ='AQ';
         $user = 'phpex';
          $pass = 'Supermotdepasse!42';

$requete = "SELECT * FROM article";
$resultat = $bdd->query($requete);

if ($resultat !== false) {
   
    $annonces = $resultat->fetchAll(PDO::FETCH_ASSOC);

?>
        <div class="annonces-container">
        <?php foreach ($annonces as $annonce): ?>
    <div class="annonce">
        <h2><?php echo $annonce['name']; ?></h2>
        <p><?php echo $annonce['Description']; ?></p>
        <a href='annonce.php?annonce=<?php echo $annonce['name']; ?>'>
            <img src="<?php echo $annonce['image']; ?>" alt="image">
        </a>
        <p class="prix">Prix : <?php echo $annonce['prix']; ?> €</p>
        <form action="panier.php" method="post">
            <input type="hidden" href="panier.php" name="adpanier" value="<?php echo $annonce['name']; ?>">
            <input type="submit" name="name" value="Ajouter cet article au panier">
        </form>
        <form action="deconnexion.php" method="post">
            <input type="hidden" name="deconnexion" value="<?php echo $annonce['name']; ?>">
            <input type="submit" name="name"id="btnDeconnexion" value="déconnexion">
           
    </div>

<?php endforeach;  ?>

 <?php 
    }
else {
    echo "<p>Aucune annonce disponible pour le moment.</p>";
}
if (isset($_GET['name'])) {
    $adName = $_GET['name'];
    echo "<h1>name: $adName</h1>";
    
} else {
    echo "<p>Aucune annonce sélectionnée.</p>";
 }
 
 ?>
</body>
</html>