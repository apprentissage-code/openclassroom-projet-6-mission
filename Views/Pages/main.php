<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tom Troc</title>
  <link rel="stylesheet" href="./CSS/style.css">
</head>

<body>
  <header>
    <nav>
      <a href="index.php?action=home"><h1>Tom Troc</h1></a>
      <a href="index.php?action=home"><h1>Accueil</h1></a>
      <a href="index.php?action=allBooks">Nos livres à l'échange</a>
      <a href="#">Messagerie</a>
      <a href="index.php?action=<?= isset($_SESSION['user']) ? 'account' : 'connection'?>">Mon Compte</a>
      <?php
      if (isset($_SESSION['user'])) {
        echo '<a href="index.php?action=disconnect">Déconnexion</a>';
      } else {
        echo '<a href="index.php?action=connection">Connexion</a>';
      }
      ?>
    </nav>
  </header>

  <main>
    <?= $content ?>
  </main>

  <footer>
    <p>Politiques de confidentialité</p>
    <p>Mentions légales</p>
    <p>Tom Troc ©</a>
  </footer>

</body>

</html>
