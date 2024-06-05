$(document).ready(function() {
    function loadContent(url, divId) {
        $(divId).load(url, function(response, status, xhr) {
            if (status == "error") {
                $(divId).html("<p>Le contenu n'a pas pu être chargé.</p>").show();
            } else {
                // Ajouter dynamiquement le bouton de fermeture après avoir chargé le contenu
                $(divId).prepend('<button class="closeButton">X</button>');
                $(divId).show();
                // Ajouter la classe pour flouter l'arrière-plan
                $('.MainContent').addClass('blur-background');
            }
        });
    }

    // Gérer le clic sur le bouton d'ajout d'utilisateur
    $('#buttonAjouterVoyage').on('click', function() {
        var newUrl = 'controleur/ajouterVoyage.php';
        loadContent(newUrl, '#divAjouterVoyage');
        // Utilisation de l'API History pour changer l'URL sans recharger la page
        history.replaceState(null, '', '/?ajouterVoyage');
    });

    // Gérer le clic sur le bouton de fermeture
    $('body').on('click', '.closeButton', function() {
        $('#divAjouterVoyage').hide();
        // Retirer la classe pour enlever le flou de l'arrière-plan
        $('.MainContent').removeClass('blur-background');
        history.replaceState(null, '', ''); // Remettre l'URL à panel.php sans query string
    });
});






/*
function deleteVille(button) {

    const ville = button.getAttribute('data-ville');
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'controleur/accueil.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
    xhr.onload = function() {
        if (xhr.status === 200) {
            location.reload();
        } else {
            console.error('Erreur:', xhr.status);
        }
    };
    xhr.send(`action=deleteVille&ville=${encodeURIComponent(ville)}`);
}

function deletePays(button) {

    const pays = button.getAttribute('data-pays');
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'controleur/accueil.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
    xhr.onload = function() {
        if (xhr.status === 200) {
            location.reload();
        } else {
            console.error('Erreur:', xhr.status);
        }
    };
        
    xhr.send(`action=deletePays&pays=${encodeURIComponent(pays)}`);
}

//Récupère les propiété avec data pour reserverVol
document.addEventListener('DOMContentLoaded', function() {
var reserverVolBtns = document.querySelectorAll('.reserverVol');

reserverVolBtns.forEach(function(btn) {
    btn.addEventListener('click', function(event) {
        var destination = event.target.getAttribute('data-destination');
        var prix = parseFloat(event.target.getAttribute('data-prix'));
        var userId = event.target.getAttribute('data-userId');
        
        ouvrirPageReservation(userId, destination, prix);
    });
});
});

//Stock les propriété pour le panier
function ouvrirPageReservation(userId, destination, prix) {
    if (userId) {
        var volSelectionne = {
            user_id: userId,
            destination: destination,
            prix: prix
        };
        
        localStorage.setItem("volSelectionne", JSON.stringify(volSelectionne));
        window.location.href = "controleur/panier.php";
    }
}

//Envoie des données vers modifierVoyage.php
document.addEventListener('DOMContentLoaded', (event) => {
document.querySelectorAll('.editVille').forEach(button => {
    button.addEventListener('click', function() {
        var ville = this.getAttribute('data-ville');
        window.location.href = 'controleur/modifierVoyage.php?ville=' + encodeURIComponent(ville);
    });
});
});
*/

//Le slide bien mignon
document.querySelectorAll('.pays').forEach(image => {
image.addEventListener('click', () => {
    const targetClass = image.alt;
    const targetElement = document.querySelector('.' + targetClass);
    if (targetElement) {
        targetElement.scrollIntoView({
            behavior: 'smooth'
        });
    }
});
});
