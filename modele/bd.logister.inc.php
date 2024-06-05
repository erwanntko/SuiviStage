<?php
include "bd.inc.php";

function creerUtilisateur($username, $hashedPassword, $firstName, $lastName, $address, $phoneNumber, $postalCode, $role) {
    
    $conn = connexionPDO();
    $stmt = $conn->prepare("INSERT INTO users (username, password, firstName, lastName, address, phoneNumber, postalCode, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $hashedPassword);
    $stmt->bindParam(3, $firstName);
    $stmt->bindParam(4, $lastName);
    $stmt->bindParam(5, $address);
    $stmt->bindParam(6, $phoneNumber);
    $stmt->bindParam(7, $postalCode);
    $stmt->bindParam(8, $role);
    
    return $stmt->execute();
}

function utilisateurExiste($username) {

    $conn = connexionPDO();
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE username = ?");

    $stmt->bindParam(1, $username);

    $stmt->execute();

    return $stmt->fetchColumn() > 0;
}
function traiterConnexion($username, $password) {

    $conn = connexionPDO();
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");

    $stmt->bindParam(1, $username);
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return ($user && password_verify($password, $user['password'])) ? true : false;
}

function obtenirDonneesUtilisateur($username) {
    $conn = connexionPDO();
    $stmt = $conn->prepare('SELECT id, firstName, lastName, phoneNumber, address, postalCode, role FROM users WHERE username = ?');

    $stmt->bindParam(1, $username);
    $stmt->execute();
    
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>