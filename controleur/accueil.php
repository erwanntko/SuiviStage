<?php
//Démarrage de la session
session_start();

//Création de racine et icon
$racine = __DIR__ . '/..';
echo '<link rel="icon" type ="png" href="../images/Internal/logo.png">';

// Inclusions des bdd
include_once "$racine/modele/bd.accueil.inc.php";
include_once "$racine/modele/bd.ajouterVoyage.inc.php";

//Initiation des variables
$catalogueDirectorName = getCatalogueDirectorNames();
$catalogueDirectorFileNames = getCatalogueDirectorFileNames();
$catalogueParPays = getVoyagesParPays();

//Requete Supression Ville
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'deleteVille') {
        $ville = $_POST['ville'];
        deleteVilleByName($ville);
    }
}

//Requete Supression Pays
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'deletePays') {
        $pays = $_POST['pays'];
        deletePaysByName($pays);
    }
}

// Inclusions des vues
include_once "$racine/vue/vueNavbar.php";
include_once "$racine/vue/vueAccueil.php";
?>