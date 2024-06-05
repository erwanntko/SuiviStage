<!DOCTYPE HTML5>

<html lang="fr">
    <head>
        <link rel="stylesheet" href="../css/modifierVoyage.css"/>
        <meta charset="utf-8"/>
        <title>Accueil</title>
    </head>
    <body>
        <form class="register" action="modifierVoyage.php?ville=<?= urlencode($data['ville']) ?>" method="post"> 
            <h1 class='title'>Modification de <?= htmlspecialchars($data['ville']) ?></h1>
            <button type="submit" class="btn">Modifier les informations</button>

            <section class="catalogue">
                <div class='rubrique'>
                    <p class='titreRubrique'>  
                        <div class="titreRubrique">
                            <input type="text" id="ville" name="ville" class="input-field" size="5" required value="<?php echo htmlspecialchars($data['ville']);?>" spellcheck="false"/>
                            -
                            <input type="text" id="accroche" name="accroche" class="input-field" size="40" required value="<?php echo htmlspecialchars($data['accroche']);?>" spellcheck="false"/>
                        </div>  
                    </p>
                    <div class="gallery">
                        <img id="racineImg1" name="racineImg1" src="<?=$racine.htmlspecialchars($data['racineImg1'])?>" alt="<?=htmlspecialchars($data['ville'])?> de jour" /><img id="racineImg2" name="racineImg2"src="<?=$racine.htmlspecialchars($data['racineImg2'])?>" alt="<?=htmlspecialchars($data['ville'])?> de nuit"/>
                        <div class='textVille1'><textarea id="textVille1" name="textVille1" rows="2" cols="184" spellcheck="false"><?=htmlspecialchars($data['textVille1'])?></textarea></div>
                        <div class='textVille2'><textarea id="textVille2" name="textVille2" rows="2" cols="184" spellcheck="false"><?=htmlspecialchars($data['textVille2'])?></textarea></div>
                        <div class='textVille3'><textarea id="textVille3" name="textVille3" rows="2" cols="184" spellcheck="false"><?=htmlspecialchars($data['textVille3'])?></textarea></div>
                    </div>
                    <input type="text" id="prix" name="prix" class="input-field" size="2" required value="<?php echo htmlspecialchars($data['prix']);?>" spellcheck="false"/>

                    <input type="hidden" name="racineImg1" value="<?= htmlspecialchars($data['racineImg1']) ?>">
                    <input type="hidden" name="racineImg2" value="<?= htmlspecialchars($data['racineImg2']) ?>">
                </div>                
            </section>
        </form>
    </body>       
</html>  