<!DOCTYPE HTML5>

<html lang="fr">
    <head>
        <link rel="stylesheet" href="../css/accueil.css"/>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <meta charset="utf-8"/>
        <title>Accueil</title>
    </head>
    <body>
        <section class='MainContent'>
            <div class='container'> 
                <section class="catalogueDirector"> 
                    <p class="title">Partez dans des destinations à couper le souffle dans tout l'univers</p>
                    <div class="row">
                        <?php $counter = 0;
                        foreach (array_map(null, $catalogueDirectorName, $catalogueDirectorFileNames) as [$name, $image]) { ?>
                            <div class='column'>      
                                <img src="<?= htmlspecialchars($image['fileNameImages'])?>" alt=<?= htmlspecialchars($name['name']) ?> class='pays'>   
                                <p><?= htmlspecialchars($name['name']) ?></p>

                                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'Admin') { ?>
                                    <button class='deletePays' data-pays=<?= htmlspecialchars($name['name'])?> onclick=deletePays(this)>
                                        <img class='iconDeletePays' src='../images/Internal/trash-icon.png'/>
                                    </button>
                                <?php } ?>
                            </div>
                        <?php $counter++;
                        if ($counter >= 7) { ?>
                    </div>
                    <div class='row'>
                        <?php
                        $counter = 0;
                        }
                        } ?>    
                    </div>  
                </section> 
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'Admin') { ?>
                    <div class='voyageButtonDiv'>
                        <button class="addVoyageButton" id="buttonAjouterVoyage">Ajouter un voyage</button>
                    </div>
                <?php } ?>        
                <section class="catalogue">
                    </br>
                    <?php foreach ($catalogueParPays as $pays => $voyages) { ?>
                        <div class=<?= $pays ?>> 
                            <h1 style='text-align: center;'><?= $pays ?></h1>
                            <?php foreach ($voyages as $voyage) { ?>
                                <div class='rubrique'>
                                    <div class=<?= htmlspecialchars($voyage['ville']) ?>>
                                        <p class='titreRubrique'><?= htmlspecialchars($voyage['ville'])  ?> - <?= htmlspecialchars($voyage['accroche'])  ?></p>
                                        <div class="gallery">
                                            <img src="<?= htmlspecialchars($voyage['racineImg1']) ?>" alt="<?= htmlspecialchars($voyage['ville']) ?> de jour"/>
                                            <img src="<?= htmlspecialchars($voyage['racineImg2']) ?>" alt="<?= htmlspecialchars($voyage['ville']) ?> de nuit"/>
                                        </div>
                                        <p class='text_ville_1'><?= htmlspecialchars($voyage['textVille1']) ?></p>
                                        <p class='text_ville_2'><?= htmlspecialchars($voyage['textVille2']) ?></p>
                                        <p class='text_ville_3'><?= htmlspecialchars($voyage['textVille3']) ?></p>
                                        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'Admin') { ?>
                                            <button class='editVille' data-ville=<?= htmlspecialchars($voyage['ville']) ?>><img class='iconEditVille' src='../images/Internal/pen-icon.png'/></button>
                                            <button class='deleteVille' data-ville=<?= htmlspecialchars($voyage['ville']) ?> onclick=deleteVille(this)>
                                                <img class='iconDeleteVille' src='../images/Internal/trash-icon.png'/>
                                            </button>
                                        <?php } ?>
                                        <button class="reserverVol" data-destination=<?= htmlspecialchars($voyage['pays']) ?> data-ville=<?= htmlspecialchars($voyage['ville']) ?> data-prix=<?= htmlspecialchars($voyage['prix']) ?> data-userId=<?= htmlspecialchars($_SESSION['user_id']) ?>>Réserver un vol</button>
                                    </div>
                                </div>
                                </br>
                            <?php } ?>
                        </div>
                        <?php } ?>
                </section>
            </div>
        </section>
        <div id='divAjouterVoyage'></div>    
        <script src="../js/accueil.js"></script>
    </body>
</html>