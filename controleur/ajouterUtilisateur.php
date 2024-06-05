<?php
// Démarrer la session
session_start();

//Création de racine et icon
$racine = __DIR__ . '/..';
echo '<link rel="icon" type ="png" href="../images/Internal/logo.png">';

//Inclusions des bdd
include_once "$racine/modele/bd.inc.php";
include_once "$racine/modele/bd.ajouterUtilisateur.inc.php";

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
            $_SESSION['user_exists_message'] = "* Le nom d'utilisateur \"" . $_POST['registerUsername'] . "\" est déjà pris. *";
            header("Location: panel.php");
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

//Inclusions des vues
include_once "$racine/vue/vueAjouterUtilisateur.php";
?>
