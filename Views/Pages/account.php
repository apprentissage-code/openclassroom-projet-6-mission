<div>
  <h1>Mon compte</h1>
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
          <td><img class="picture-book" src="/Views/Images/<?= $book->getImage()?>" alt="picture-book" style="width:50px;"/></td>
          <td><?= $book->getTitle() ?></td>
          <td><?= $book->getAuthor() ?></td>
          <td><?= $book->getDescription() ?></td>
          <td><?= $book->getStatus() ?></td>
          <td><a href="index.php?action=updateBook&id=<?= $book->getId()?>">Editer</a> <a href="index.php?action=deleteBook&id=<?= $book->getId()?>">Supprimer</a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
