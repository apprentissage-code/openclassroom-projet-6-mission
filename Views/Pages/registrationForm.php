<div class="connexion">
  <div class="connection-form">
    <form action="index.php?action=registration" method="post" class="foldedCorner">
      <h2>Inscription</h2>
      <div class="formGrid">
        <label for="login">Pseudo</label>
        <input type="text" name="login" id="login" required>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" required>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" required>
        <button class="submit button-green">S'inscrire</button>
      </div>
    </form>
    <p>Déjà inscrit ? <a href="index.php?action=connection">Connectez-vous</a></p>
  </div>
  <div class="connexion-img">
    <img src="Views/Images/banner-connexion.jpg" alt="banner-connexion">
  </div>
</div>
