<div class="content">
  <p class="site-path"> <a href="index.php?action=account">Compte</a> > Modifier un livre</p>
  <h1 class="align-start">Modifier les informations</h1>
  <form action="index.php?action=updateBook&id=<?= $book->getId() ?>" method="post" enctype="multipart/form-data" class="book-form">
    <div class="form-photo p-10">
      <label for="photo">Photo</label>
      <img src="/Views/Images/<?= htmlspecialchars($book->getImage()) ?>" alt="Photo du livre">
      <input type="file" name="photo" id="photo" accept="image/png, image/jpeg, image/jpg">
    </div>
    <div class="form-info">
      <label for="title">Titre</label>
      <input type="text" name="title" id="title" value="<?= htmlspecialchars($book->getTitle()) ?>" class="input-filled" required>
      <label for="author">Auteur</label>
      <input type="text" name="author" id="author" value="<?= htmlspecialchars($book->getAuthor()) ?>" class="input-filled" required>
      <label for="description">Commentaires</label>
      <input type="text" name="description" id="description" value="<?= htmlspecialchars($book->getDescription()) ?>" class="input-filled" required>
      <label for="status">Disponibilité</label>
      <select name="status" id="status" class="input-select">
        <option value="disponible" <?= $book->getStatus() === 'disponible' ? 'selected' : '' ?>>Disponible</option>
        <option value="réservé" <?= $book->getStatus() === 'réservé' ? 'selected' : '' ?>>Réservé</option>
        <option value="emprunté" <?= $book->getStatus() === 'emprunté' ? 'selected' : '' ?>>Emprunté</option>
      </select>
      <input class="button-green" type="Submit" value="Valider">
    </div>
  </form>
</div>
