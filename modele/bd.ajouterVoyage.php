<?php
include "bd.inc.php";

function getPays() {

    $conn = connexionPDO();
    $req = $conn->prepare("SELECT name FROM catalogueDirector");
  
    return $req->execute() ? $req->fetchAll(PDO::FETCH_ASSOC) : FALSE;
}

function insertCatalogueDirector($pays, $fileNameImages) {

    $conn = connexionPDO();
    $req = $conn->prepare("INSERT INTO catalogueDirector (name, fileNameImages) VALUES (?, ?)");

    $req->bindParam(1, $pays);
    $req->bindParam(2, $fileNameImages);

    $req->execute();
}

function creerCatalogue($prix, $pays, $ville, $slogan, $racineImg1, $racineImg2, $textVille1, $textVille2, $textVille3) {

    $conn = connexionPDO();
    $req = $conn->prepare("INSERT INTO catalogue (prix, pays, ville, accroche, racineImg1, racineImg2, textVille1, textVille2, textVille3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $req->bindParam(1, $prix);
    $req->bindParam(2, $pays);
    $req->bindParam(3, $ville);
    $req->bindParam(4, $slogan);
    $req->bindParam(5, $racineImg1);
    $req->bindParam(6, $racineImg2);
    $req->bindParam(7, $textVille1);
    $req->bindParam(8, $textVille2);
    $req->bindParam(9, $textVille3);

    $req->execute();
}
?>