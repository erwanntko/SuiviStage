<?php
include_once "bd.inc.php";

function getCatalogueDirectorNames() {

    $conn = connexionPDO();
    $req = $conn->prepare("SELECT name FROM catalogueDirector");
    
    return $req->execute() ? $req->fetchAll(PDO::FETCH_ASSOC) : FALSE;
}

function getCatalogueDirectorFileNames() {

    $conn = connexionPDO();
    $req = $conn->prepare("SELECT fileNameImages FROM catalogueDirector");

    return $req->execute() ? $req->fetchAll(PDO::FETCH_ASSOC) : FALSE;
}

function getVoyagesParPays() {
    $conn = connexionPDO();
    $req = $conn->prepare("SELECT * FROM catalogue ORDER BY pays");
    $catalogueData = $req->execute() ? $req->fetchAll(PDO::FETCH_ASSOC) : [];

    return array_reduce($catalogueData, function($result, $data) {
        $result[$data['pays']][] = $data;
        return $result;
    }, []);
}

function deleteVilleByName($ville) {

    $conn = connexionPDO();
    $req = $conn->prepare("DELETE FROM catalogue WHERE ville = ?");

    $req->bindParam(1, $ville);
    $req->execute();
    
}

function deletePaysByName($pays) {

    $conn = connexionPDO();
    
    $req1 = $conn->prepare("DELETE FROM catalogueDirector WHERE name = ?");
    $req1->bindParam(1, $pays);
    $req1->execute();

    $req2 = $conn->prepare("DELETE FROM catalogue WHERE pays = ?");
    $req2->bindParam(1, $pays);
    $req2->execute();

}
?>