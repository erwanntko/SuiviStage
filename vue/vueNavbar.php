<!DOCTYPE HTML5>

<html lang="fr">
  <head>
    <link rel="stylesheet" href="../css/navbar.css"/>
    <meta charset="utf-8"/>
  </head>

  <body>
    <nav class="navbar">
      <a href="../controleur/monCompte.php"><img src="../images/Internal/account-icon.png" class="image"/></a>
      <a href="/"><img src="../images/Internal/plane-icon.png" class="image"/></a>
      <a href="../controleur/panier.php"><img src="../images/Internal/cart-icon.png" class="image"/></a>
      <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'Admin') { ?>
        <a href="/controleur/panel.php"><img src="../images/Internal/hammer-icon.png" class="image"/></a>
      <?php } ?>
    </nav>
  </body>
</html>