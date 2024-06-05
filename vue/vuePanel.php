<!DOCTYPE HTML5>

<html lang="fr">
<head>
    <meta charset="UTF-8"/> 
    <title>Panel</title>
    <link rel="stylesheet" href="../css/panel.css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <section class="Main_Panel">
        <div class="header-container">
            <div class="position-button">
                <button class="round-button" id="buttonAjouterUtilisateur">Ajouter un utilisateur</button>
            </div>
            <h1>Panel D'administration</h1>
        </div>
        <div class="table-container">
            <table>
                <tr>
                    <th>Username</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>Code Postal</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($lesUsers as $user) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                    <td><?php echo htmlspecialchars($user['lastName']); ?></td>
                    <td><?php echo htmlspecialchars($user['firstName']); ?></td>
                    <td><?php echo htmlspecialchars($user['address']); ?></td>
                    <td><?php echo htmlspecialchars($user['phoneNumber']); ?></td>
                    <td><?php echo htmlspecialchars($user['postalCode']); ?></td>
                    <td><?php echo htmlspecialchars($user['role']); ?></td>
                    <td>
                        <button class="buttonModifierUtilisateur" id="buttonModifierUtilisateur" data-userid="<?php echo htmlspecialchars($user['id']); ?>">Mettre à jour</button>
                        <!-- <button onclick="window.location.href='modifierUtilisateur.php?id=<?php echo htmlspecialchars($user['id']); ?>';" nonce="<?php echo htmlspecialchars($nonce); ?>">Mettre à jour</button> -->
                        <form action="panel.php" method="post">
                            <input type="hidden" name="csrf_token" value="jeton_maj"/>
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>" />
                            <input type="hidden" name="action" value="supprimer"/>
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </section>
    <div id="divAjouterUtilisateur"></div>
    <div id="divModifierUtilisateur"></div>
    <script src="../js/panel.js"></script>
    <script src="../js/ajouterUtilisateur.js"></script>
    <script src="../js/modifierUtilisateur.js"></script>
</body>
</html>