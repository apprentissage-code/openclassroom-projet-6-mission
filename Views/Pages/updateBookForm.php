<h1>Modifier les informations</h1>
<form action="index.php?action=updateBook&id=<?= $book->getId() ?>" method="post" enctype="multipart/form-data">
  <div class="form-photo">
    <label for="photo">Photo</label>
    <img src="/Views/Images/<?=htmlspecialchars($book->getImage()) ?>" alt="Photo du livre">
    <input type="file" name="photo" id="photo" accept="image/png, image/jpeg, image/jpg">
  </div>
  <div class="form-info">
    <label for="title">Titre</label>
    <input type="text" name="title" id="title" value="<?= $book->getTitle() ?>" required>
    <label for="author">Auteur</label>
    <input type="text" name="author" id="author" value="<?= $book->getAuthor() ?>" required>
    <label for="description">Commentaires</label>
    <input type="text" name="description" id="description" value="<?= $book->getDescription() ?>" required>
    <label for="status">Disponibilité</label>
    <div>
      <input type="radio" name="status" id="available" value="disponible" <?= $book->getStatus() === 'disponible' ? 'checked' : '' ?>>
      <label for="available">Disponible</label>
    </div>
    <div>
      <input type="radio" name="status" id="reserved" value="réservé" <?= $book->getStatus() === 'réservé' ? 'checked' : '' ?>>
      <label for="reserved">Réservé</label>
    </div>
    <div>
      <input type="radio" name="status" id="borrowed" value="emprunté" <?= $book->getStatus() === 'emprunté' ? 'checked' : '' ?>>
      <label for="borrowed">Emprunté</label>
    </div>
  </div>
  <input type="Submit" value="Valider">
</form>
