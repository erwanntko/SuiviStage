<?php
// Démarrez la session
session_start();

//Création de racine et icon
$racine = __DIR__ . '/..';
echo '<link rel="icon" type ="png" href="../images/Internal/logo.png">';

// Inclusions des bdd
include_once "$racine/modele/bd.panier.inc.php";

// Inclusions des vues
include_once "$racine/vue/vueNavbar.php";
include_once "$racine/vue/vuePanier.php";
?>