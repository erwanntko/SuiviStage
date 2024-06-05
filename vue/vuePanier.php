<!DOCTYPE HTML5>

<html lang="fr">
    <head>
        <link rel="stylesheet" href="../css/panier.css"/>
        <meta charset="UTF-8"/>
        <title>Panier</title>
    </head>
    <body>
        <h1 class="panier">Récapitulatif de votre panier</h1>
        <section class="resume"></section>
        <aside>
            <div class="tarification"></div>
        </aside>
        <div class="reservationDetails" id="reservationDetails">
            <p id="destinationElement" class="destination"></p>
            <label class="quantite" for="nombreBillets">Quantité:</label>
            <select class="quantite" id="nombreBillets" onchange="calculerPrix()">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <p id="prixTotalElement" class="prixTotal"></p>
        </div>
        <button onclick="ajouterAuPanier()">Valider le panier</button>
        <script src="../js/panier.js"></script>
    </body>
</html>