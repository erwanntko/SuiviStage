<?php
// Démarrez la session
session_start();

// Création de racine et icon
$racine = __DIR__ . '/..';
echo '<link rel="icon" type ="png" href="../images/Internal/logo.png">';

// Inclusions des bdd
include_once "$racine/modele/bd.inc.php";

// Vérification de connexion 
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $firstName = $_SESSION['firstName'];
    $lastName = $_SESSION['lastName'];
    $phoneNumber = $_SESSION['phoneNumber'];
    $address = $_SESSION['address'];
    $postalCode = $_SESSION['postalCode'];
    $role = $_SESSION['role'];
} else {
    header("Location: logister.php");
    exit();
}

// Deconnexion de l'utilisateur
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['action']) && $_POST['action'] === 'disconnect'){
        session_destroy();
        header("Location: /");
    }
}

// Inclusions des vues
include_once "$racine/vue/vueNavbar.php";
include_once "$racine/vue/vueCompte.php";
?>