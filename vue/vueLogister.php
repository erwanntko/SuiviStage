<!DOCTYPE HTML5>

<html lang="fr">
    <head>
        <meta charset="UTF-8"/>
        <title>Création de compte / Connexion</title>
        <link rel="stylesheet" href="../css/logister.css" />
        <link rel="stylesheet" href="../css/navbar.css" />
    </head>
    <body>
        <h1 class="backgroundText">BOOQUEEN.COM</h1>
        <div class="midSlice">
            <div class="Box">  
                <h1>Créer un compte</h1>
                <form action="logister.php" method="post" onsubmit="return validateFormRegister()">
                    <input type="hidden" name="csrf_token" value="jeton_logister_register"/>
                    <input type="hidden" name="role" id="role" />
                
                    <div class="input-box">
                        <label for="registerUsername">Pseudo :</label>
                        <input type="text" id="registerUsername" name="registerUsername" class="input-field"/>
                        <p id="errorEmptyRegisterUsername" class="erorr">* Ce champ ne peut pas être vide. *</p>
                        <p id="errorLenRegisterUsername" class="erorr">* Le nom d'utilisateur doit faire entre 6 et 18 charactères. *</p>
                    </div>

                    <div class="input-box">
                        <label for="registerPassword">Mot de passe :</label>
                        <input type="password" id="registerPassword" name="registerPassword" class="input-field"/>
                        <button type="button" class="passwordButton" onmousedown="showPassword('registerPassword', 'passwordRegisterIcon')" onmouseup="hidePassword('registerPassword', 'passwordRegisterIcon')" onmouseleave="hidePassword('registerPassword', 'passwordRegisterIcon')">
                            <img class="passwordIcon" id="passwordRegisterIcon" src="../images/Internal/eye1-icon.png" data-default-src="../images/Internal/eye1-icon.png" data-active-src="../images/Internal/eye2-icon.png">
                        </button>
                        <p id="errorEmptyRegisterPassword" class="erorr">* Ce champ ne peut pas être vide. *</p>
                        <p id="errorLenRegisterPassword" class="erorr">* Il doit faire au moins 8 charactères. *</p>
                        <p id="errorNumberRegisterPassword" class="erorr">* Il doit contenir un chiffre. *</p>
                        <p id="errorSpecialCharRegisterPassword" class="erorr">* Il doit contenir un charactères spéciales. *</p>
                        <p id="errorMajRegisterPassword" class="erorr">* Il doit contenir une majuscule. *</p>
                    </div>

                    <div class="input-box">
                        <label for="registerFirstName">Prénom :</label>
                        <input type="text" id="registerFirstName" name="registerFirstName" class="input-field"/>
                        <p id="errorEmptyRegisterFirstName" class="erorr">* Ce champ ne peut pas être vide. *</p>
                        <p id="errorRegisterFirstName" class="erorr">* Votre prénom n'est pas conforme. *</p>
                    </div>

                    <div class="input-box">
                        <label for="registerLastName">Nom :</label>
                        <input type="text" id="registerLastName" name="registerLastName" class="input-field"/>
                        <p id="errorEmptyRegisterLastName" class="erorr">* Ce champ ne peut pas être vide. *</p>
                        <p id="errorRegisterLastName" class="erorr">* Votre nom de famille n'est pas conforme. *</p>
                    </div>

                    <div class="input-box">
                        <label for="registerPhoneNumber">Téléphone :</label>
                        <input type="text" id="registerPhoneNumber" name="registerPhoneNumber" class="input-field"/>
                        <p id="errorEmptyRegisterPhoneNumber" class="erorr">* Ce champ ne peut pas être vide. *</p>
                        <p id="errorRegisterPhoneNumber" class="erorr">* Votre numéro de téléphone n'est pas conforme. *</p>
                    </div>

                    <div class="input-box">
                        <label for="registerAddress">Adresse :</label>
                        <input type="text" id="registerAddress" name="registerAddress" class="input-field"/>
                        <p id="errorEmptyRegisterAddress" class="erorr">* Ce champ ne peut pas être vide. *</p>
                    </div>

                    <div class="input-box">
                        <label for="registerPostalCode">Code postal :</label>
                        <input type="text" id="registerPostalCode" name="registerPostalCode" class="input-field"/>
                        <p id="errorEmptyRegisterPostalCode" class="erorr">* Ce champ ne peut pas être vide. *</p>
                        <p id="errorRegisterPostalCode" class="erorr">* Votre code postal n'est pas conforme. *</p>
                    </div>

                    <?php if (isset($_SESSION['user_exists_message'])) { ?>
                        <p class="erorrUsernameKeep"><?php echo $_SESSION['user_exists_message'] ?></pclass>
                        <?php unset($_SESSION['user_exists_message']);
                     } ?>

                    <div class="input-box">
                        <p class="nom-role">Rôle :</p>
                        <div class="toggle-buttons">
                            <button type="button" id="role-admin" class="toggle-btn" onclick="selectRole('Admin')">Admin</button>
                            <button type="button" id="role-user" class="toggle-btn" onclick="selectRole('User')">User</button>
                        </div>
                        <p id="errorEmptyRegisterRole" class="erorr">* Le choix n'est pas optionel. *</p>
                    </div>
                    <button type="submit" class="btn">Créer un compte</button>
                </form>
            </div>
        </div>
        <div class="midSlice">
            <section class="loginSection">
                <div class="Box">
                    <h1>Qui êtes-vous?</h1>
                    <form action="logister.php" method="post" onsubmit="return validateFormLogin()">
                        <input type="hidden" name="csrf_token" value="jeton_logister_login" />
                        
                        <div class="input-box">
                            <label for="loginUsername">Nom d'utilisateur :</label>
                            <input type="text" id="loginUsername" name="loginUsername" class="input-field"/>
                            <p id="errorEmptyLoginUsername" class="erorr">* Ce champ ne peut pas être vide. *</p>
                            <p id="errorLenLoginUsername" class="erorr">* Le nom d'utilisateur doit faire entre 6 et 18 charactères. *</p>
                        </div>

                        <div class="input-box">
                            <label for="loginPassword">Mot de passe :</label>
                            <input type="password" id="loginPassword" name="loginPassword" class="input-field"/>
                            <button type="button" class="passwordButton" onmousedown="showPassword('loginPassword', 'passwordLoginIcon')" onmouseup="hidePassword('loginPassword', 'passwordLoginIcon')" onmouseleave="hidePassword('loginPassword', 'passwordLoginIcon')">
                                <img class="passwordIcon" id="passwordLoginIcon" src="../images/Internal/eye1-icon.png" data-default-src="../images/Internal/eye1-icon.png" data-active-src="../images/Internal/eye2-icon.png">
                            </button>
                            <p id="errorEmptyLoginPassword" class="erorr">* Ce champ ne peut pas être vide. *</p>
                            <p id="errorLenLoginPassword" class="erorr">* Il doit faire au moins 8 charactères. *</p>
                            <p id="errorNumberLoginPassword" class="erorr">* Il doit contenir un chiffre. *</p>
                            <p id="errorSpecialCharLoginPassword" class="erorr">* Il doit contenir un charactères spéciales. *</p>
                            <p id="errorMajLoginPassword" class="erorr">* Il doit contenir une majuscule. *</p>
                        </div>

                        <div class="souvenir">
                            <div class="input-box-souvenir">
                                <input type="checkbox" class="input-checkbox" id="souvenir" />
                                <label for="souvenir">Se souvenir de moi</label>
                            </div>
                        </div>

                        <button type="submit" class="btn">Valider</button>
                    </form>
                </div>
            </section>
        </div>
        <script src="../js/logister.js"></script>
    </body>
</html>