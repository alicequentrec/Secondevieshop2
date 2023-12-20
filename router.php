<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {
        case 'premierepage':
            include('../view/premierepage.php');  
            break;
        case 'inscription':
            include('../view/inscription.php');
            $user->getFormInscription();
            break;
            case 'connexion':
                include('view/connexion.php');
                $user->getFormConnexion();
                break;
            case 'accueil':
                include('view/accueil.php');
                $articles = new articlesController;
                $articles->getArticles();
                break;
            case 'panier':
                include('view/panier.php');
                break;
                case 'deconnexion':
                    include('view/deconnexion.php');
                    break;
        default:
            include('../view/premierepage.php');
            break;
    }
} else {
    include('../view/premierepage.php');
}
?>


