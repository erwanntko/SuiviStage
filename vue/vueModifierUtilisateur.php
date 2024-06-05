<!DOCTYPE HTML5>

<html lang="fr">
    <head>
        <meta charset="UTF-8"/>
        <title>Modifier les informations de l'utilisateur</title>
        <link rel="stylesheet" href="../css/modifierUtilisateur.css">
    </head>
    <body>
        <section class="inscription">
            <div class="wrapper2">
                <form class="register" action="modifierUtilisateur.php" method="post" onsubmit="return validateFormModifier()">
                    <h1 class='title'>Modifier les informations de l'utilisateur</h1>
                    
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
                    <div class="input-box">
                        <label for="username">Nom d'utilisateur :</label>
                        <input type="text" id="username" name="username" class="input-field" value="<?php echo htmlspecialchars($user['username']); ?>"/>
                        <p id="errorEmptyUsername" class="erorr">* Ce champ ne peut pas être vide. *</p>
                        <p id="errorLenUsername" class="erorr">* Le nom d'utilisateur doit faire entre 6 et 18 charactères. *</p>
                        <p id="errorSpecialCharUsername" class="erorr">* Le nom d'utilisateur ne doit pas avoir de charactères spéciales. *</p>
                    </div>
                    
                    <div class="input-box">
                        <label for="firstName">Prénom :</label>
                        <input type="text" id="firstName" name="firstName" class="input-field" value="<?php echo htmlspecialchars($user['firstName']); ?>"/>
                        <p id="errorEmptyFirstName" class="erorr">* Ce champ ne peut pas être vide. *</p>
                        <p id="errorFirstName" class="erorr">* Votre prénom n'est pas conforme. *</p>
                    </div>
                    
                    <div class="input-box">
                        <label for="lastName">Nom :</label>
                        <input type="text" id="lastName" name="lastName" class="input-field" value="<?php echo htmlspecialchars($user['lastName']); ?>"/>
                        <p id="errorEmptyLastName" class="erorr">* Ce champ ne peut pas être vide. *</p>
                        <p id="errorLastName" class="erorr">* Votre nom de famille n'est pas conforme. *</p>
                    </div>

                    <div class="input-box">
                        <label for="phoneNumber">Téléphone :</label>
                        <input type="text" id="phoneNumber" name="phoneNumber" class="input-field" value="<?php echo htmlspecialchars($user['phoneNumber']); ?>"/>
                        <p id="errorEmptyPhoneNumber" class="erorr">* Ce champ ne peut pas être vide. *</p>
                        <p id="errorPhoneNumber" class="erorr">* Votre numéro de téléphone n'est pas conforme. *</p>
                    </div>

                    <div class="input-box">
                        <label for="address">Adresse :</label>
                        <input type="text" id="address" name="address" class="input-field" value="<?php echo htmlspecialchars($user['address']); ?>"/>
                        <p id="errorEmptyAddress" class="erorr">* Ce champ ne peut pas être vide. *</p>
                    </div>

                    <div class="input-box">
                        <label for="postalCode">Code postal :</label>
                        <input type="text" id="postalCode" name="postalCode" class="input-field" value="<?php echo htmlspecialchars($user['postalCode']); ?>"/>
                        <p id="errorEmptyPostalCode" class="erorr">* Ce champ ne peut pas être vide. *</p>
                        <p id="errorPostalCode" class="erorr">* Votre code postal n'est pas conforme. *</p>
                    </div>

                    <div class="input-box">
                        <p class="nom-role">Rôle:</p>
                        <div class="toggle-buttons">
                            <button type="button" id="role-admin" class="toggle-btn" onclick="selectRole('Admin')">Admin</button>
                            <button type="button" id="role-user" class="toggle-btn" onclick="selectRole('User')">User</button>
                        </div>
                        <p id="errorEmptyRole" class="erorr">* Le choix n'est pas optionel. *</p>
                        <input type="hidden" name="role" id="role" data-role="<?php echo htmlspecialchars($user['role']); ?>"/>
                    </div>
                    <button type="submit" class="btn">Modifier les informations</button>
                </form>
            </div>
        </section>
        <script src="../js/modifierUtilisateur.js"></script>
    </body>
</html>