function paysChange() {
    var selectedOption = document.getElementById("pays").value;
    var newPays = document.getElementById("newPays");
    var imgNewPays = document.getElementById("imgNewPays");
    var labelImgNewPays = document.getElementById("labelImgNewPays");
    var labelNewPays = document.getElementById("labelNewPays");

    if (selectedOption === "addPays") {
        newPays.style.display = "block";
        imgNewPays.style.display = "block";
        labelImgNewPays.style.display = "block";
        labelNewPays.style.display = "block";
    } else {
        inputNewPays.style.display = "none";
        imgNewPays.style.display = "none";
        labelImgNewPays.style.display = "none";
        labelNewPays.style.display = "none";
    }
}

function validateForm() {
    resetErrorMessages();

    var pays = document.getElementById("pays").value;
    if (pays === "addPays") {

        var newPays = document.getElementById("newPays").value;
        if (newPays.trim() === "") {
            document.getElementById("errorEmptyNewPays").style.display = "block";
            return false;
        }

        if (/\d/.test(newPays)) {
            document.getElementById("errorNumericNewPays").style.display = "block";
            return false;
        }
        var imgNewPays = document.getElementById("imgNewPays").value;
        if (imgNewPays.trim() === "") {
            document.getElementById("errorEmptyImgNewPays").style.display = "block";
            return false;
        }
        if (!isValidImageType(imgNewPays)) {
            document.getElementById("errorExtensionImgNewPays").style.display = "block";
            return false;
        }
    }

    var ville = document.getElementById("ville").value;
    if (ville.trim() === "") {
        document.getElementById("errorEmptyVille").style.display = "block";
        return false;
    }            
    if (/\d/.test(ville)) {
        document.getElementById("errorNumericVille").style.display = "block";
        return false;
    }

    var slogan = document.getElementById("slogan").value;
    if (slogan.trim() === "") {
        document.getElementById("errorEmptySlogan").style.display = "block";
        return false;
    }

    var imageJour = document.getElementById("imageJour").value;
    if (imageJour.trim() === "") {
        document.getElementById("errorEmptyImageJour").style.display = "block";
        return false;
    }
    if (!isValidImageType(imageJour)) {
        document.getElementById("errorExtensionImageJour").style.display = "block";
        return false;
    }

    var imageNuit = document.getElementById("imageNuit").value;
    if (imageNuit.trim() === "") {
        document.getElementById("errorEmptyImageNuit").style.display = "block";
        return false;
    }
    if (!isValidImageType(imageNuit)) {
        document.getElementById("errorExtensionImageNuit").style.display = "block";
        return false;
    }

    var para1 = document.getElementById("para1").value;
    if (para1.trim() === "") {
        document.getElementById("errorEmptyPara1").style.display = "block";
        return false;
    }

    var para2 = document.getElementById("para2").value;
    if (para2.trim() === "") {
        document.getElementById("errorEmptyPara2").style.display = "block";
        return false;
    }

    var para3 = document.getElementById("para3").value;
    if (para3.trim() === "") {
        document.getElementById("errorEmptyPara3").style.display = "block";
        return false;
    }

    var prix = document.getElementById("prix").value;
    if (parseInt(prix) < 1 || parseInt(prix) > 9999 || isNaN(parseInt(prix))) {
        document.getElementById("errorPrix").style.display = "block";
        return false;
    }

    return true;
}

function resetErrorMessages() {
    document.getElementById("errorEmptyNewPays").style.display = "none";
    document.getElementById("errorNumericNewPays").style.display = "none";
    document.getElementById("errorEmptyImgNewPays").style.display = "none";
    document.getElementById("errorExtensionImgNewPays").style.display = "none";
    document.getElementById("errorEmptyVille").style.display = "none";
    document.getElementById("errorNumericVille").style.display = "none";
    document.getElementById("errorEmptySlogan").style.display = "none";
    document.getElementById("errorEmptyImageJour").style.display = "none";
    document.getElementById("errorExtensionImageJour").style.display = "none";
    document.getElementById("errorEmptyImageNuit").style.display = "none";
    document.getElementById("errorExtensionImageNuit").style.display = "none";
    document.getElementById("errorEmptyPara1").style.display = "none";
    document.getElementById("errorEmptyPara2").style.display = "none";
    document.getElementById("errorEmptyPara3").style.display = "none";
    document.getElementById("errorPrix").style.display = "none";
}

function isValidImageType(filename) {
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    return allowedExtensions.test(filename);
}