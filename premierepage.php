<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="PageAccueil.css" type="premierepage.css">
    <title>projetphp</title>
</head>
<style>
    body {
    background-color:  lightblue;
    color: white;
    justify-content: center;
    height: 70vh; 
}
h1 {
    font-size: 50px;
    text-align: center;
    font-family: 'Nom de la police', sans-serif;
    color:hsl(240, 100%, 75%);
}

p {
    font-size: 26px;
    .texte-aligne-a-gauche {
    text-align: left;    
}

}
.bouton {
            font-size: 30px;
            padding: 30px 50px;
            position: relative;
            left: 600px;
             top: -400px;
            
        }
    </style>        
</head>

<body> 
<h1>Bienvenue sur SecondeVieShop</h1>
<hr>
<img  href="premierepage.php" src="controller/img/logo.png " width="100" height="50">
<p class="texte-aligne-a-gauche">Luxe Authentique à Prix Réduit: Découvrez</p>
<p class="texte-aligne-a-gauche">des pièces de créateurs uniques et</p>
<p class="texte-aligne-a-gauche">durables sur SecondeVieShop.</p>
<p class="texte-aligne-a-gauche">Explorez une collection exclusive de vêtements, </p>
<p class="texte-aligne-a-gauche">accessoires et articles de luxe</p>
<p class="texte-aligne-a-gauche">de seconde main, garantissant authenticité</p>
<p class="texte-aligne-a-gauche">et élégance à des prix irrésistibles.</p>

    <form action="" method="post" enctype="multipart/form-data">
        <p><input type = "submit" value = "je crée un compte" name = "bouton" class="bouton"></p>
        <p><input type = "submit" value = "je me connecte" name = "bouton1" class="bouton"></p>
    </form>

<?php


if (isset($_POST["bouton"])) {
    echo "Vous allez être redirigé vers Inscription";
    header("refresh:2; url=Inscription.php");
    exit();
}

if (isset($_POST["bouton1"])) {
    echo "Vous allez être redirigé vers Connexion";
    header("refresh:2; url=Connexion.php");
    exit();
}
?>
</body>
</html>