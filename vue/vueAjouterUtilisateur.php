<!DOCTYPE HTML5>

<html lang="fr">
    <head>
        <meta charset="UTF-8"/>
        <title>Création de compte / Connexion</title>
        <link rel="stylesheet" href="../css/ajouterUtilisateur.css" />
    </head>
    <body>
        <section class="inscription">
            <div class="wrapper2">
                <form class="register" action="panel.php" method="post" onsubmit="return validateFormAjouter()">
                    <h1 class="title">Ajouter un utilisateur</h1>

                    <div class="input-box">
                        <label for="username" placeholder="Nom d'utilisateur">
                            <p class="nom">Username :</p>
                        </label>
                        <input type="text" id="username" name="username" class="input-field"/>
                        <p id="errorEmptyUsername" class="erorr">* Ce champ ne peut pas être vide. *</p>
                        <p id="errorLenUsername" class="erorr">* Le nom d'utilisateur doit faire entre 6 et 18 charactères. *</p>
                        <p id="errorSpecialCharUsername" class="erorr">* Le nom d'utilisateur ne doit pas avoir de charactères spéciales. *</p>
                    </div>
                    
                    <div class="input-box">
                        <label for="password" placeholder="Mot de passe">
                            <p class="nom">Mot de passe :</p>
                        </label>
                        <input type="password" id="password" name="password" class="input-field"/>
                        <p id="errorEmptyPassword" class="erorr">* Ce champ ne peut pas être vide. *</p>
                        <p id="errorLenPassword" class="erorr">* Il doit faire au moins 8 charactères. *</p>
                        <p id="errorNumberPassword" class="erorr">* Il doit contenir un chiffre. *</p>
                        <p id="errorSpecialCharPassword" class="erorr">* Il doit contenir un charactères spéciales. *</p>
                        <p id="errorMajPassword" class="erorr">* Il doit contenir une majuscule. *</p>
                    </div>
                    
                    <div class="input-box">
                        <label for="firstName" placeholder="Prénom">
                            <p class="nom">Prénom :</p>
                        </label>
                        <input type="text" id="firstName" name="firstName" class="input-field">
                        <p id="errorEmptyFirstName" class="erorr">* Ce champ ne peut pas être vide. *</p>
                        <p id="errorFirstName" class="erorr">* Votre prénom n'est pas conforme. *</p>
                    </div>

                    <div class="input-box">
                        <label for="lastName" placeholder="Nom de famille">
                            <p class="nom">Nom :</p>
                        </label>
                        <input type="text" id="lastName" name="lastName" class="input-field"/>
                        <p id="errorEmptyLastName" class="erorr">* Ce champ ne peut pas être vide. *</p>
                        <p id="errorLastName" class="erorr">* Votre nom de famille n'est pas conforme. *</p>
                    </div>

                    <div class="input-box">
                        <label for="phoneNumber" placeholder="Numéro de téléphone">
                            <p class="nom">Téléphone :</p>
                        </label>
                        <input type="text" id="phoneNumber" name="phoneNumber" class="input-field"/>
                        <p id="errorEmptyPhoneNumber" class="erorr">* Ce champ ne peut pas être vide. *</p>
                        <p id="errorPhoneNumber" class="erorr">* Votre numéro de téléphone n'est pas conforme. *</p>
                    </div>

                    <div class="input-box">
                        <label for="address" placeholder="Adresse">
                            <p class="nom">Adresse :</p>
                        </label>
                        <input type="text" id="address" name="address" class="input-field"/>
                        <p id="errorEmptyAddress" class="erorr">* Ce champ ne peut pas être vide. *</p>
                    </div>

                    <div class="input-box">
                        <label for="postalCode" placeholder="Code postal">
                            <p class="nom">Code postal :</p>
                        </label>
                        <input type="text" id="postalCode" name="postalCode" class="input-field"/>
                        <p id="errorEmptyPostalCode" class="erorr">* Ce champ ne peut pas être vide. *</p>
                        <p id="errorPostalCode" class="erorr">* Votre code postal n'est pas conforme. *</p>
                    </div>
                    
                    <?php if (isset($_SESSION['user_exists_message'])) { ?>
                        <p class="erorrUsernameKeep"><?php echo $_SESSION['user_exists_message'] ?></pclass>
                        <?php unset($_SESSION['user_exists_message']);
                     } ?>

                    <div class="input-box">
                        <p class="nom-role">Rôle:</p>
                        <div class="toggle-buttons">
                            <button type="button" id="role-admin" class="toggle-btn" onclick="selectRole('Admin')">Admin</button>
                            <button type="button" id="role-user" class="toggle-btn" onclick="selectRole('User')">User</button>
                        </div>
                        <p id="errorEmptyRole" class="erorr">* Le choix n'est pas optionel. *</p>
                        <input type="hidden" name="role" id="role" />
                    </div>
                    <button type="submit" class="btn">Créer un compte</button>
                </form>
            </div>
        </section> 
        <script src="../js/ajouterUtilisateur.js"></script>
    </body>      
</html>