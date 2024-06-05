<!DOCTYPE HTML5>

<html lang="fr">
    <head>
        <meta charset="utf-8"/>
        <title>Mon Compte</title>
        <link rel="stylesheet" href="../css/monCompte.css"/>
    </head>
    <body>
        <section class="background">
            <div class="table-container">
                <h1>Informations de compte :</h1>
                <table>
                    <tr>
                        <th>Vos données</th>
                    </tr>
                    <tr>
                        <td>Username : <?php echo htmlspecialchars($username); ?></td>
                    </tr>
                    <tr>
                        <td>Prénom : <?php echo htmlspecialchars($firstName); ?></td>
                    </tr>
                    <tr>
                        <td>Nom : <?php echo htmlspecialchars($lastName); ?></td>
                    </tr>
                    <tr>
                        <td>Téléphone : <?php echo htmlspecialchars($phoneNumber); ?></td>
                    </tr>
                    <tr>
                        <td>Adresse : <?php echo htmlspecialchars($address); ?></td>
                    </tr>
                    <tr>
                        <td>Code Postal : <?php echo htmlspecialchars($postalCode); ?></td>
                    </tr>
                    <tr>
                        <td>Role : <?php echo htmlspecialchars($role); ?></td>
                    </tr>
                </table>
            </div>
            <div class="disconnect-container">
                <form action="monCompte.php" method="POST">
                    <button type="submit" name="action" value="disconnect" class="round-button">Deconnexion</button>
                </form>
            </div>
        </section>
    </body>
</html>