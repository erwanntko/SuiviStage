/*
function validateFormRegister() {
    resetErrorMessagesRegister();

    var username = document.getElementById("registerUsername").value;
    if (username.trim() === "") {
        document.getElementById("errorEmptyRegisterUsername").style.display = "block";
        return false;
    }

    if (username.length < 6 || username.length > 18) {
        document.getElementById("errorLenRegisterUsername").style.display = "block";
        return false;
    }

    var password = document.getElementById("registerPassword").value;
    if (password.trim() === "") {
        document.getElementById("errorEmptyRegisterPassword").style.display = "block";
        return false;
    }

    if (password.length < 8) {
       document.getElementById("errorLenRegisterPassword").style.display = "block";
        return false;
    }

    if (!/\d/.test(password)) {
        document.getElementById("errorNumberRegisterPassword").style.display = "block";
        return false;
    }
    
     
    if (!/[#?!@$%^&*-]/.test(password)) {
        document.getElementById("errorSpecialCharRegisterPassword").style.display = "block";
        return false;
    }
    
     
    if (!/[A-Z]/.test(password)) {
        document.getElementById("errorMajRegisterPassword").style.display = "block";
        return false;
    }

    var firstName = document.getElementById("registerFirstName").value
    if (firstName.trim() === "") {
        document.getElementById("errorEmptyRegisterFirstName").style.display = "block";
        return false;
    }

    if(!/^[A-Za-zÀ-ÖØ-öø-ÿ\s-]{1,50}$/.test(firstName)) {
        document.getElementById("errorRegisterFirstName").style.display = "block";
        return false;
    }

    var lastName = document.getElementById("registerLastName").value
    if (lastName.trim() === "") {
        document.getElementById("errorEmptyRegisterLastName").style.display = "block";
        return false;
    }

    if(!/^[A-Za-zÀ-ÖØ-öø-ÿ\s-]{1,50}$/.test(lastName)) {
        document.getElementById("errorRegisterLastName").style.display = "block";
        return false;
    }

    var phoneNumber = document.getElementById("registerPhoneNumber").value
    if (phoneNumber.trim() === "") {
        document.getElementById("errorEmptyRegisterPhoneNumber").style.display = "block";
        return false;
    }

    if(!/^0\d(\s\d{2}){4}$/.test(phoneNumber)) {
        document.getElementById("errorRegisterPhoneNumber").style.display = "block";
        return false;
    }

    var address = document.getElementById("registerAddress").value
    if (address.trim() === "") {
        document.getElementById("errorEmptyRegisterAddress").style.display = "block";
        return false;
    }

    var postalCode = document.getElementById("registerPostalCode").value
    if (postalCode.trim() === "") {
        document.getElementById("errorEmptyRegisterPostalCode").style.display = "block";
        return false;
    }

    if(!/^((0[1-9])|([1-8][0-9])|(9[0-5])|(2[abAB]))[0-9]{3}$/.test(postalCode)) {
        document.getElementById("errorRegisterPostalCode").style.display = "block";
        return false;
    }

    var selectedRole = document.querySelector('.toggle-btn.selected');
    if (!selectedRole) {
        document.getElementById("errorEmptyRegisterRole").style.display = "block";
        return false;
    }

    return true;
}


function resetErrorMessagesRegister() {
    document.getElementById("errorEmptyRegisterUsername").style.display = "none";
    document.getElementById("errorLenRegisterUsername").style.display = "none";
    document.getElementById("errorEmptyRegisterPassword").style.display = "none";
    document.getElementById("errorLenRegisterPassword").style.display = "none";
    document.getElementById("errorNumberRegisterPassword").style.display = "none";
    document.getElementById("errorSpecialCharRegisterPassword").style.display = "none";
    document.getElementById("errorMajRegisterPassword").style.display = "none";
    document.getElementById("errorEmptyRegisterFirstName").style.display = "none";
    document.getElementById("errorRegisterFirstName").style.display = "none";
    document.getElementById("errorEmptyRegisterLastName").style.display = "none";
    document.getElementById("errorRegisterLastName").style.display = "none";
    document.getElementById("errorEmptyRegisterPhoneNumber").style.display = "none";
    document.getElementById("errorRegisterPhoneNumber").style.display = "none";
    document.getElementById("errorEmptyRegisterAddress").style.display = "none";
    document.getElementById("errorEmptyRegisterPostalCode").style.display = "none";
    document.getElementById("errorRegisterPostalCode").style.display = "none";  
}

function validateFormLogin() {
    resetErrorMessagesLogin();

    var username = document.getElementById("loginUsername").value;
    if (username.trim() === "") {
        document.getElementById("errorEmptyLoginUsername").style.display = "block";
        return false;
    }

    if (username.length < 6 || username.length > 18) {
        document.getElementById("errorLenLoginUsername").style.display = "block";
        return false;
    }

    var password = document.getElementById("loginPassword").value;
    if (password.trim() === "") {
        document.getElementById("errorEmptyLoginPassword").style.display = "block";
        return false;
    }

    if (password.length < 8) {
       document.getElementById("errorLenLoginPassword").style.display = "block";
        return false;
    }

    if (!/\d/.test(password)) {
        document.getElementById("errorNumberLoginPassword").style.display = "block";
        return false;
    }
    
     
    if (!/[#?!@$%^&*-]/.test(password)) {
        document.getElementById("errorSpecialCharLoginPassword").style.display = "block";
        return false;
    }
    
     
    if (!/[A-Z]/.test(password)) {
        document.getElementById("errorMajLoginPassword").style.display = "block";
        return false;
    }

    return true;
}

function resetErrorMessagesLogin() {
    document.getElementById("errorEmptyLoginUsername").style.display = "none";
    document.getElementById("errorLenLoginUsername").style.display = "none";
    document.getElementById("errorEmptyLoginPassword").style.display = "none";
    document.getElementById("errorLenLoginPassword").style.display = "none";
    document.getElementById("errorNumberLoginPassword").style.display = "none";
    document.getElementById("errorSpecialCharLoginPassword").style.display = "none";
    document.getElementById("errorMajLoginPassword").style.display = "none";
}
*/

function showPassword(passwordId, iconId) {
    var passwordInput = document.getElementById(passwordId);
    var icon = document.getElementById(iconId);
    if (passwordInput && icon) {
        passwordInput.type = 'text';
        icon.src = icon.getAttribute('data-active-src'); // Change l'image
    }
}

function hidePassword(passwordId, iconId) {
    var passwordInput = document.getElementById(passwordId);
    var icon = document.getElementById(iconId);
    if (passwordInput && icon) {
        passwordInput.type = 'password';
        icon.src = icon.getAttribute('data-default-src'); // Réinitialise l'image
    }
}

function selectRole(role) {
    document.querySelectorAll('.toggle-btn').forEach(btn => {
        btn.classList.remove('selected');
    });
    document.getElementById('role-' + role.toLowerCase()).classList.add('selected');
    document.getElementById('role').value = role;
}