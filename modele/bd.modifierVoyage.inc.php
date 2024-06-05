<?php
include_once "bd.inc.php";

function obtenirDonnéeParVille($ville) {
    $conn = connexionPDO();
    $req = $conn->prepare("SELECT * FROM catalogue WHERE ville = ?");

    $req->bindParam(1, $ville);
    $req->execute();
    
    return $req->execute() ? $req->fetch(PDO::FETCH_ASSOC) : FALSE;
}

function mettreAJourCatalogue($prix, $ville, $accroche, $racineImg1, $racineImg2, $textVille1, $textVille2, $textVille3, $villeTarget) {
    $conn = connexionPDO(); 
    $req = $conn->prepare("UPDATE catalogue SET prix = ?, ville = ?, accroche = ?, racineImg1 = ?, racineImg2 = ?, textVille1 = ?, textVille2 = ?, textVille3 = ? WHERE ville = ?");
    
    $req->bindParam(1, $prix);
    $req->bindParam(2, $ville);
    $req->bindParam(3, $accroche);
    $req->bindParam(4, $racineImg1);
    $req->bindParam(5, $racineImg2);
    $req->bindParam(6, $textVille1);
    $req->bindParam(7, $textVille2);
    $req->bindParam(8, $textVille3);
    $req->bindParam(9, $villeTarget);
    
    return $req->execute();
}
?>