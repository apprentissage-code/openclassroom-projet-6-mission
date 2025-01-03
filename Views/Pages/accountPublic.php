<div class="content account-public">
  <div class="card-profil">
    <img src="Views/Images/<?= $user->getPicture() ?>" alt="profil-picture" class="owner-image-account">
    <h2><?= $user->getLogin() ?> </h2>
    <p>Membre depuis <?= $user->getSeniority() ?></p>
    <h3>BIBLIOTHÈQUE</h3>
    <div class="book-icon">
      <img src="Views/Images/book-icon.svg" alt="">
      <p><?= count($books) ?> livres</p>
    </div>
    <a href="index.php?action=<?= isset($_SESSION['user']) ? 'chat&receiver_id=' . $user->getId() : 'connection' ?>" class="button-green-empty">Ecrire un message</a>
  </div>
  <table>
    <thead>
      <tr>
        <th>PHOTO</th>
        <th>TITRE</th>
        <th>AUTEUR</th>
        <th>DESCRIPTION</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($books as $book) { ?>
        <tr>
          <td><img src="/Views/Images/<?= $book->getImage() ?>" alt="picture-book" /></td>
          <td><?= $book->getTitle() ?></td>
          <td><?= $book->getAuthor() ?></td>
          <td><?= $book->getDescription() ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
