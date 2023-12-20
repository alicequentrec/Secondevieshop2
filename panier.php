
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>projetphp</title>
  <link rel="stylesheet" href="panier.php">
</head>
<body>

  <header>
    <h1>Mon panier SecondeVieShop</h1>
  </header>


    <section class="annonce">
      <img src="https://saint-laurent.dam.kering.com/m/4d972cec12fc60ce/Medium-378299DZEAW1000_E.jpg?v=3" alt="annonce 1">
      <h2>Sac de jour small en cuir mat embossé crocodile</h2>
      <p>Description: Cadenas amovible avec étui en cuir, poche interne zippée, cinq clous de fond.32 X 25,5 X 15,5 cm longueur de la bandoulière: 48 cm Hauteur des anses: 9,5cm 100% cuir de veau Prix 2800€</p>
      <button class="add-to-cart-btn">Payer</button>
    </section>

    <section class="annonce">
    '<img src="https://th.bing.com/th/id/OIP.7f9ZkEPkp_ngiKalzaticAHaHa?rs=1&pid=ImgDetMain" alt="annonce 2">
      <h2>Bague Osmose, petit modèle</h2>
      <p>Description :Bague en argent Fabrication : Italie/France Argent 925/1000 Largeur : 1,35 cm Prix 560€</p>
      <button class="add-to-cart-btn">Payer</button>
    </section>
  </main>
  <main>
    <?php
  
    $connexion = new mysqli;
    
        $host= '51.158.59.186'; 
        $port= '14301'; 
        $dhname ='AQ';
         $user = 'phpex';
          $pass = 'Supermotdepasse!42';
   
    if ($connexion->connect_error) {
        die("Connexion échouée : " . $connexion->connect_error);
    }

     $requeteAnnonces = $connexion->query("SELECT * FROM article ORDER BY id LIMIT 2");
     while ($annonce = $requeteAnnonces->fetch_assoc()) {
       
    }
    $connexion->close();
    ?>
</main>

  <aside class="cart">
    <h2>Panier</h2>
    <ul class="cart-items">
    </ul>
    <div class="cart-total">
      <p>Total : 2670€</p>
      <button class="checkout-btn">Valider mon panier</button>
    </div>
  </aside>

  <footer>
    <p>&copy; 2023 Votre Site de Vente. Tous droits réservés.</p>
    <p>Adresse : 45 av Bosquet, 75007 Paris Téléphone : +33 66 78 94 23  Email : contact@secondevieshop.fr</p>
      
  </footer>

</body>
</html>


<style>
    body {
  font-family: 'Arial', sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f4f4f4;
}

header {
  background-color: #333;
  color: #fff;
  text-align: center;
  padding: 10px;
}

main {
  display: flex;
  justify-content: space-around;
  margin: 20px;
}

.annonce {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.add-to-cart-btn {
  background-color: #3498db;
  color: #fff;
  padding: 8px 16px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.add-to-cart-btn:hover {
  background-color: #2980b9;
}

aside.cart {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  position: fixed;
  top: 0;
  right: 0;
  width: 300px;
}

.cart h2 {
  text-align: center;
  color: #333;
}

.cart-items {
  list-style: none;
  padding: 0;
}

.cart-item {
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 1px solid #ccc;
  padding: 8px 0;
}

.cart-total {
  margin-top: 20px;
  text-align: right;
}

.checkout-btn {
  background-color: #2ecc71;
  color: #fff;
  padding: 8px 16px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.checkout-btn:hover {
  background-color: #27ae60;
}

footer {
  background-color: #333;
  color: #fff;
  text-align: center;
  padding: 10px;
  position: fixed;
  bottom: 0;
  width: 100%;
}

.annonce img {
    max-width: 60%;
    height: auto;
}


.cart-item img {
    max-width: 60%;
    height: auto;
}


    </style>
</body>
</html>

   
