<?php
// Démarrage de la session
session_start();

// Création de racine et icon
$racine = __DIR__ . '/..';
echo '<link rel="icon" type="png" href="../images/Internal/logo.png">';

// Inclusions des bdd
include_once "$racine/modele/bd.ajouterVoyage.php";

// Création des variables
$lesPays = getPays();

// Inclusions des vues
include_once "$racine/vue/vueAjouterVoyage.php";

// Importation des images
function getFileExtension($filePath)
{
    return pathinfo($filePath, PATHINFO_EXTENSION);
}

// Définition de la variable de redirection par défaut
$redirectLocation = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $targetDirectory = '/var/www/html/images/';
    $fileNameImages = null;
    $racineImg1Path = null;
    $racineImg2Path = null;
    $pays = isset($_POST['pays']) ? $_POST['pays'] : null;
    $prix = isset($_POST['prix']) ? $_POST['prix'] : null;
    $newVille = isset($_POST['newVille']) ? $_POST['newVille'] : null;
    $newSlogan = isset($_POST['newSlogan']) ? $_POST['newSlogan'] : null;
    $newPays = isset($_POST['newPays']) ? $_POST['newPays'] : null;
    $newRacineImg1 = isset($_POST['newRacineImg1']) ? $_POST['newRacineImg1'] : null;
    $newRacineImg2 = isset($_POST['newRacineImg2']) ? $_POST['newRacineImg2'] : null;
    $newPara1 = isset($_POST['newPara1']) ? $_POST['newPara1'] : null;
    $newPara2 = isset($_POST['newPara2']) ? $_POST['newPara2'] : null;
    $newPara3 = isset($_POST['newPara3']) ? $_POST['newPara3'] : null;

    if (isset($_FILES['imageCatalogueDirector']) && $_FILES['imageCatalogueDirector']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['imageCatalogueDirector'];
        $uniqueFileName = 'pays' . basename($_POST['newPays']) . '.' . getFileExtension($_FILES['imageCatalogueDirector']['name']);
        chdir("..");
        chdir("images");
        mkdir($_POST['newPays']);
        $targetPath = $targetDirectory . $_POST['newPays'] . '/' . $uniqueFileName;
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            $fileNameImages = $targetPath;
        }
    }

    if (isset($_FILES['newRacineImg1']) && $_FILES['newRacineImg1']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['newRacineImg1'];
        $uniqueFileName1 = basename($_POST['newVille']) . '1.' . getFileExtension($_FILES['newRacineImg1']['name']);
        $targetPath1 = $targetDirectory . $_POST['newPays'] . '/' . $uniqueFileName1;
        if (move_uploaded_file($file['tmp_name'], $targetPath1)) {
            $racineImg1Path = $targetPath1;
        }
    }

    if (isset($_FILES['newRacineImg2']) && $_FILES['newRacineImg2']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['newRacineImg2'];
        $uniqueFileName2 = basename($_POST['newVille']) . '2.' . getFileExtension($_FILES['newRacineImg2']['name']);
        $targetPath2 = $targetDirectory . $_POST['newPays'] . '/' . $uniqueFileName2;
        if (move_uploaded_file($_FILES['newRacineImg2']['tmp_name'], $targetPath2)) {
            $racineImg2Path = $targetPath2;
        }
        exec("chmod -R 775 " . escapeshellarg($targetDirectory . $_POST['newPays']));
    }
    if ($pays !== null) {
        $pays = $_POST['pays'];
        if ($pays === 'addPays') {
            $pays = $_POST['newPays'];
            $fileNameImages = 'images/' . $_POST['newPays'] . '/' . 'pays' . $_POST['newPays'] . '.' . getFileExtension($_FILES['imageCatalogueDirector']['name']);
        }

        $prix = $_POST['prix'];
        $ville = $_POST['newVille'];
        $slogan = $_POST['newSlogan'];
        $racineImg1 = 'images/' . $_POST['newPays'] . '/' . $_POST['newVille'] . '1.' . getFileExtension($_FILES['newRacineImg1']['name']);
        $racineImg2 = 'images/' . $_POST['newPays'] . '/' . $_POST['newVille'] . '2.' . getFileExtension($_FILES['newRacineImg2']['name']);
        $textVille1 = $_POST['newPara1'];
        $textVille2 = $_POST['newPara2'];
        $textVille3 = $_POST['newPara3'];

    
        $resultCat = creerCatalogue($prix, $pays, $ville, $slogan, $racineImg1, $racineImg2, $textVille1, $textVille2, $textVille3);
        $resultCatDir = ($fileNameImages === null) ? true : insertCatalogueDirector($pays, $fileNameImages);
    }   
}
?>