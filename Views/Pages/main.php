<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tom Troc</title>
  <link rel="stylesheet" href="./CSS/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>

<body>
  <header>
    <a href="index.php?action=home">
      <img src="Views/Images/logo.png" />
    </a>
    <a href="index.php?action=home">
      <p>Accueil</p>
    </a>
    <a href="index.php?action=allBooks"><p>Nos livres à l'échange</p></a>
    <a href="index.php?action=chat&receiver_id=1"><p>Messagerie</p></a>
    <a href="index.php?action=<?= isset($_SESSION['user']) ? 'account' : 'connection' ?>"><p>Mon Compte</p></a>
    <?php
    if (isset($_SESSION['user'])) {
      echo '<a href="index.php?action=disconnect"<p>Déconnexion</p></a>';
    } else {
      echo '<a href="index.php?action=connection"><p>Connexion</p></a>';
    }
    ?>
  </header>

  <main>
    <?= $content ?>
  </main>

  <footer>
    <p>Politiques de confidentialité</p>
    <p>Mentions légales</p>
    <p>Tom Troc ©</p>
    <img src="Views/Images/mini-logo.png" alt="mini-logo-site">
  </footer>

</body>

</html>
