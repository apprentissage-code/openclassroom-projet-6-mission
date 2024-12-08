<div class="card">
  <img src="Views/Images/<?= $user->getPicture() ?>" alt="profil-picture" style="width:50px;">
  <h2><?= $user->getLogin() ?> </h2>
  <p>Membre depuis <?= $user->getSeniority() ?> mois</p>
  <h3>Bibliothèque</h3>
  <p><?= count($books) ?> livres</p>
  <a href="">Ecrire un message</a>
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
        <td><img class="picture-book" src="/Views/Images/<?= $book->getImage() ?>" alt="picture-book" style="width:50px;" /></td>
        <td><?= $book->getTitle() ?></td>
        <td><?= $book->getAuthor() ?></td>
        <td><?= $book->getDescription() ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>
