<!DOCTYPE HTML5>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Ajout destination</title>
        <link rel="stylesheet" href="../css/ajouterVoyage.css"/>
    </head>
    <body>
        <div class="container">
            <p class="texteAccroche">Ajout de destination</p>
             <form action="/" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="flex-container">
                    <label for="pays">Choisissez un pays :</label>
                    <select name="pays" id="pays" onchange=paysChange()>
                        <?php foreach ($lesPays as $unPays) { ?>
                            <option value= <?= htmlspecialchars($unPays['name']) ?>><?= htmlspecialchars($unPays['name']) ?></option>';
                        <?php } ?>
                        <option value="addPays">Ajouter un pays</option>
                    </select>
                </div>
                <div class="flex-container">
                    <label for="newPays" id="labelNewPays" style="display: none;">Entrez un pays :</label>
                    <input type="text" name="newPays" id="newPays" style="display: none;">
                </div>
            
                <p id="errorEmptyNewPays" style='color: red; display: none;'>* Ce champ ne peut pas être vide. *</p>
                <p id="errorNumericNewPays" style='color: red; display: none;'>* Ce champ ne peut pas contenir de chiffre. *</p>                     
                <div class="flex-container">
                    <label for="imgNewPays" id="labelImgNewPays" style="display: none;">Insérez une image de votre pays :</label>
                    <input type="file" name="imageCatalogueDirector" id="imgNewPays" accept="image/*" style="display: none;"/>
                </div>
                <p id="errorEmptyImgNewPays" style='color: red; display: none;'>* Cette image est obligatoire. *</p>
                <p id="errorExtensionImgNewPays" style='color: red; display: none;'>* Seules les images PNG et JPG sont acceptées. *</p>

                <div class="flex-container">
                    <label for="ville">Choisissez une ville :</label>
                    <input type="text" name="newVille" id="ville">
                </div>
                <p id="errorEmptyVille" style='color: red; display: none;'>* Ce champ ne peut pas être vide. *</p>
                <p id="errorNumericVille" style='color: red; display: none;'>* Ce champ ne peut pas contenir de chiffre. *</p>

                <div class="flex-container">
                    <label for="slogan">Choisissez un slogan :</label>
                    <input type="text" name="newSlogan" id="slogan">
                </div>
                <p id="errorEmptySlogan" style='color: red; display: none;'>* Ce champ ne peut pas être vide. *</p>

                <div class="flex-container">
                    <label for="imageJour">Choisissez une image de jour :</label>
                    <input type="file" name="newRacineImg1" id="imageJour" accept="image/*">
                </div>
                <p id="errorEmptyImageJour" style='color: red; display: none;'>* Cette image est obligatoire. *</p>
                <p id="errorExtensionImageJour" style='color: red; display: none;'>* Seules les images PNG et JPG sont acceptées. *</p>

                <div class="flex-container">
                    <label for="imageNuit">Choisissez une image de nuit :</label>
                    <input type="file" name="newRacineImg2" id="imageNuit" accept="image/*">
                </div>
                <p id="errorEmptyImageNuit" style='color: red; display: none;'>* Cette image est obligatoire. *</p>
                <p id="errorExtensionImageNuit" style='color: red; display: none;'>* Seules les images PNG et JPG sont acceptées. *</p>

                <div class="flex-container">
                    <label for="para1">Choisissez un premier paragraphe :</label>
                    <input type="text" name="newPara1" id="para1">
                </div>
                <p id="errorEmptyPara1" style='color: red; display: none;'>* Ce champ ne peut pas être vide. *</p>

                <div class="flex-container">
                    <label for="para2">Choisissez un second paragraphe :</label>
                    <input type="text" name="newPara2" id="para2">
                </div>
                <p id="errorEmptyPara2" style='color: red; display: none;'>* Ce champ ne peut pas être vide. *</p>

                <div class="flex-container">
                    <label for="para3">Choisissez un troisième paragraphe :</label>
                    <input type="text" name="newPara3" id="para3">
                </div>
                <p id="errorEmptyPara3" style='color: red; display: none;'>* Ce champ ne peut pas être vide. *</p>

                <div class="flex-container">
                    <label for="prix">Choisissez un prix :</label>
                    <input type="number" name="prix" id="prix" min="1" max="9999">
                </div>
                <p id="errorPrix" style='color: red; display: none;'>* Choisissez un prix entier entre 1 et 9999 *</p>

                <button type="submit" id="submitBtn">Soumettre</button>
            </form>
        </div>
        <script src="../js/ajouterVoyage.js"></script>
    </body>
</html>