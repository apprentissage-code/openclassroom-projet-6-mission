<div class="content account">
  <h1 class="align-start">Mon compte</h1>
  <div class="cards-profil">
    <div class="card-profil card-height">
      <img src="Views/Images/<?= $user->getPicture() ?>" alt="profil-picture" class="owner-image-account">
      <h2><?= $user->getLogin() ?> </h2>
      <p>Membre depuis <?= $user->getSeniority() ?></p>
      <h3>Bibliothèque</h3>
      <div class="book-icon">
        <img src="Views/Images/book-icon.svg" alt="">
        <p><?= count($books) ?> livres</p>
      </div>
    </div>
    <div class="card-info-profil">
      <form action="index.php?action=updateUser" method="post" class="foldedCorner">
        <h3>Vos informations personnelles</h3>
        <div class="formGrid">
          <label for="login">Pseudo</label>
          <input type="text" name="login" id="login" value="<?= $user->getLogin() ?>" class="input-filled" required>
          <label for="email">Email</label>
          <input type="text" name="email" id="email" value="<?= $user->getEmail() ?>" class="input-filled" required>
          <label for="password">Mot de passe</label>
          <input type="password" name="password" id="password" value="<?= $user->getPassword() ?>" class="input-filled" required>
          <button class="submit button-green">Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
  <a class="button-green" href="index.php?action=addBook">Ajouter un livre</a>
  <table class="table-account">
    <thead>
      <tr>
        <th>PHOTO</th>
        <th>TITRE</th>
        <th>AUTEUR</th>
        <th>DESCRIPTION</th>
        <th>DISPONIBILITE</th>
        <th>ACTION</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($books as $book) { ?>
        <tr>
          <td><img src="/Views/Images/<?= $book->getImage() ?>" alt="picture-book" /></td>
          <td><?= $book->getTitle() ?></td>
          <td><?= $book->getAuthor() ?></td>
          <td><?= $book->getDescription() ?></td>
          <td><p class="status-account <?= $book->getStatus() === "disponible" ? "available" : "unavailable" ?>"><?= ucfirst($book->getStatus()) ?></p></td>
          <td class="table-modify"><a href="index.php?action=updateBook&id=<?= $book->getId() ?>" class="button-edit">Editer</a> <a href="index.php?action=deleteBook&id=<?= $book->getId() ?>" <?= Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer ce livre ?") ?> class="button-delete">Supprimer</a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
