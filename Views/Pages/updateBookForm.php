<div class="content">
  <h1 class="align-start">Modifier les informations</h1>
  <form action="index.php?action=updateBook&id=<?= $book->getId() ?>" method="post" enctype="multipart/form-data" class="book-form">
    <div class="form-photo">
      <label for="photo">Photo</label>
      <img src="/Views/Images/<?= htmlspecialchars($book->getImage()) ?>" alt="Photo du livre">
      <input type="file" name="photo" id="photo" accept="image/png, image/jpeg, image/jpg">
    </div>
    <div class="form-info">
      <label for="title">Titre</label>
      <input type="text" name="title" id="title" value="<?= $book->getTitle() ?>" class="input-filled" required>
      <label for="author">Auteur</label>
      <input type="text" name="author" id="author" value="<?= $book->getAuthor() ?>" class="input-filled" required>
      <label for="description">Commentaires</label>
      <input type="text" name="description" id="description" value="<?= $book->getDescription() ?>" class="input-filled" required>
      <label for="status">Disponibilité</label>
      <select name="status" id="status" class="input-select">
        <option value="disponible" <?= $book->getStatus() === 'Disponible' ? 'selected' : '' ?>>Disponible</option>
        <option value="réservé" <?= $book->getStatus() === 'Réservé' ? 'selected' : '' ?>>Réservé</option>
        <option value="emprunté" <?= $book->getStatus() === 'Emprunté' ? 'selected' : '' ?>>Emprunté</option>
      </select>
      <input class="button-green" type="Submit" value="Valider">
    </div>
  </form>
</div>
