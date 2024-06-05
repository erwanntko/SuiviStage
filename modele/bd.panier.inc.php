<?php
include_once "bd.inc.php";

function ajouterReservation($user_id, $ville, $reservation_date) {

    $conn = connexionPDO();
    $req = $conn->prepare("INSERT INTO reservations (username, ville, reservation_date) VALUES (?, ?, ?)");

    $req->bindParam(1, $user_id);
    $req->bindParam(2, $ville);
    $req->bindParam(3, $reservation_date);
    
    return $req->execute();
}
?>