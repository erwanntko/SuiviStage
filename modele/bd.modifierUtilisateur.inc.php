<?php
include "bd.inc.php";

function obtenirUtilisateurParId($id) {
    $conn = connexionPDO();
    $req = $conn->prepare("SELECT * FROM users WHERE id = ?");

    $req->bindParam(1, $id, PDO::PARAM_INT);
    $req->execute();
    
    return $req->execute() ? $req->fetch(PDO::FETCH_ASSOC) : FALSE;
}

function mettreAJourUtilisateur($id, $username, $firstName, $lastName, $phoneNumber, $address, $postalCode, $role) {
    $conn = connexionPDO(); 
    $req = $conn->prepare("UPDATE users SET username = ?, firstName = ?, lastName = ?, phoneNumber = ?, address = ?, postalCode = ?, role = ? WHERE id = ?");
    
    $req->bindParam(1, $username);
    $req->bindParam(2, $firstName);
    $req->bindParam(3, $lastName);
    $req->bindParam(4, $phoneNumber);
    $req->bindParam(5, $address);
    $req->bindParam(6, $postalCode);
    $req->bindParam(7, $role);
    $req->bindParam(8, $id);
    
    return $req->execute();
}
?>