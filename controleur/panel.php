<?php
// Démarrez la session
session_start();

// Création de racine et icon
$racine = __DIR__ . '/..';
echo '<link rel="icon" type ="png" href="../images/Internal/logo.png">';

// Inclusions des bdd
include_once "$racine/modele/bd.panel.inc.php";
include_once "$racine/modele/bd.ajouterUtilisateur.inc.php";

// Initiation des variables
$lesUsers = recupererTousLesUtilisateurs();

// Verification rôle
if ($_SESSION['role'] !== 'Admin') {
    header("Location: /");
    exit();
}

// Requête Supprimer
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'supprimer') {
    $id = $_POST['id'];
    supprimerUtilisateur($id);
    header('Location: panel.php');
    exit;
}

// Récupération POST pour creerUtilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $postalCode = $_POST['postalCode'];
    $role = $_POST['role'];

    if (!empty($username) && !empty($password) && !empty($firstName) && !empty($lastName) && !empty($phoneNumber) && !empty($address) && !empty($postalCode) && !empty($role)) {
        if (utilisateurExiste($username)) {
            $_SESSION['user_exists_message'] = "* Le nom d'utilisateur \"" . $_POST['username'] . "\" est déjà pris. *";
            // Réafficher la page actuelle avec un message d'erreur
            include_once "$racine/vue/vueNavbar.php";
            include_once "$racine/vue/vuePanel.php";
            exit();
        } else {
            $result = creerUtilisateur($username, password_hash($password, PASSWORD_BCRYPT), $firstName, $lastName, $address, $phoneNumber, $postalCode, $role);
            if ($result) {
                header("Location: panel.php");
                exit();
            }
        }
    }
}


// Récupération POST pour modifierUtilisateur
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $firstName = $_POST['firstName'];   
    $lastName = $_POST['lastName'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $postalCode = $_POST['postalCode'];
    $role = $_POST['role'];

    $result = mettreAJourUtilisateur($id, $username, $firstName, $lastName, $phoneNumber, $address, $postalCode, $role);

    if ($result) {
        header('Location: panel.php');
        exit();
    }
}

// Inclusions des vues
include_once "$racine/vue/vueNavbar.php";
include_once "$racine/vue/vuePanel.php";
?>