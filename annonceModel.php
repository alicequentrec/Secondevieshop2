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
                <img src="<?php echo $annonce['image']; ?>" alt="img/191442FLC.02GR_1_FW23_W.webp">
                <p class="prix">Prix : <?php echo $annonce['prix']; ?> €</p>
            </div>
        <?php endforeach; ?>
    </div>
<?php
} else {
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
