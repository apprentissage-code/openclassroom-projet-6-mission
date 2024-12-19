<div>
  <h1>Mon compte</h1>
  <div class="card">
    <img src="Views/Images/<?=$user->getPicture()?>" alt="profil-picture" style="width:50px;">
    <h2><?= $user->getLogin() ?> </h2>
    <p>Membre depuis <?=$user->getSeniority()?></p>
    <h3>Bibliothèque</h3>
    <p><?= count($books) ?> livres</p>
  </div>
  <div class="card">
    <form action="index.php?action=updateUser" method="post" class="foldedCorner">
      <h2>Vos informations personnelles</h2>
      <div class="formGrid">
        <label for="login">Pseudo</label>
        <input type="text" name="login" id="login" value="<?= $user->getLogin() ?>" required>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="<?= $user->getEmail() ?>" required>
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" value="<?= $user->getPassword() ?>" required>
        <button class="submit">Enregistrer</button>
      </div>
    </form>
  </div>
  <a href="index.php?action=addBook">Ajouter un livre</a>
  <table>
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
          <td><img class="picture-book" src="/Views/Images/<?= $book->getImage() ?>" alt="picture-book" style="width:50px;" /></td>
          <td><?= $book->getTitle() ?></td>
          <td><?= $book->getAuthor() ?></td>
          <td><?= $book->getDescription() ?></td>
          <td><?= $book->getStatus() ?></td>
          <td><a href="index.php?action=updateBook&id=<?= $book->getId() ?>">Editer</a> <a href="index.php?action=deleteBook&id=<?= $book->getId() ?>">Supprimer</a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
