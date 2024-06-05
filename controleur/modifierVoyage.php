<?php
//Démarage de la session
session_start();

//Création de racine et icon
$racine = "../";
echo '<link rel="icon" type ="png" href="../images/Internal/logo.png">';

// Inclusions des bdd
include_once "$racine/modele/bd.inc.php";
include_once "$racine/modele/bd.modifierVoyage.inc.php";

// Création des variables
if (isset($_GET['ville'])) {
    $data = obtenirDonnéeParVille($_GET['ville']);
}

// Récupération formulaire pour lancer une fonction
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prix = $_POST['prix'];
    $ville = $_POST['ville'];
    $accroche = $_POST['accroche'];
    $racineImg1 = $_POST['racineImg1'];   
    $racineImg2 = $_POST['racineImg2']; 
    $textVille1 = $_POST['textVille1'];
    $textVille2 = $_POST['textVille2'];
    $textVille3 = $_POST['textVille3'];

    $result = mettreAJourCatalogue($prix, $ville, $accroche, $racineImg1, $racineImg2, $textVille1, $textVille2, $textVille3, $_GET['ville']);

    if ($result) {
        header('Location: /');
        exit();
    }
}

//Inclusions des vues
include_once "$racine/vue/vueNavbar.php";
include_once "$racine/vue/vueModifierVoyage.php";
include_once "$racine/vue/vueFooter.php";
?>