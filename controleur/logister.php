<?php
// Démarrez la session
session_start();

//Création de racine et icon
$racine = __DIR__ . '/..';
echo '<link rel="icon" type ="png" href="../images/Internal/logo.png">';

// Inclusions des fichiers nécessaires
include_once "$racine/modele/bd.logister.inc.php";

// Gérer la requête POST pour l'inscription
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Gérer la requête POST pour l'inscription
    if (isset($_POST['csrf_token']) && $_POST['csrf_token'] == 'jeton_logister_register') {
        $username = $_POST['registerUsername'];
        $password = $_POST['registerPassword'];
        $firstName = $_POST['registerFirstName'];
        $lastName = $_POST['registerLastName'];
        $phoneNumber = $_POST['registerPhoneNumber'];
        $address = $_POST['registerAddress'];
        $postalCode = $_POST['registerPostalCode'];
        $role = $_POST['role'];

        if (utilisateurExiste($username)) {
            $_SESSION['user_exists_message'] = "* Le nom d'utilisateur \"" . $_POST['registerUsername'] . "\" est déjà pris. *";
            header("Location: logister.php");
            exit();
        }

        if (creerUtilisateur($username, password_hash($password, PASSWORD_BCRYPT), $firstName, $lastName, $address, $phoneNumber, $postalCode, $role)) {
            
            $_SESSION['username'] = $username;
            $_SESSION['firstName'] = $firstName;
            $_SESSION['lastName'] = $lastName;
            $_SESSION['phoneNumber'] = $phoneNumber;
            $_SESSION['address'] = $address;
            $_SESSION['postalCode'] = $postalCode;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['role'] = $role;
            
            header("Location: monCompte.php");
            exit();
        }
    }
    
    // Gérer la requête POST pour la connexion
    if (isset($_POST['csrf_token']) && $_POST['csrf_token'] == 'jeton_logister_login') {
        $username = $_POST['loginUsername'];
        $password = $_POST['loginPassword'];
        
        if (traiterConnexion($username, $password)) {
            $userData = obtenirDonneesUtilisateur($username);
            
            if ($userData) {
                
                $_SESSION['username'] = $username;
                $_SESSION['firstName'] = $userData['firstName'];
                $_SESSION['lastName'] = $userData['lastName'];
                $_SESSION['phoneNumber'] = $userData['phoneNumber'];
                $_SESSION['address'] = $userData['address'];
                $_SESSION['postalCode'] = $userData['postalCode'];
                $_SESSION['user_id'] = $userData['id'];
                $_SESSION['role'] = $userData['role'];
                
                header("Location: monCompte.php");
                exit();
            }
        }
    }
}

// Inclusions des vues
include_once "$racine/vue/vueNavbar.php";
include_once "$racine/vue/vueLogister.php";
include_once "$racine/vue/vueFooter.php";
?>