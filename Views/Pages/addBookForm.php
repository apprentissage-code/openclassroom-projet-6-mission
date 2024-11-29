<h1>Modifier les informations</h1>
<form action="index.php?action=addBook" method="post" enctype="multipart/form-data">
  <div class="form-photo">
    <label for="photo">Photo</label>
    <input type="file" name="photo" id="photo" accept="image/png, image/jpeg, image/jpg">
  </div>
  <div class="form-info">
    <label for="title">Titre</label>
    <input type="text" name="title" id="title" required>
    <label for="author">Auteur</label>
    <input type="text" name="author" id="author" required>
    <label for="description">Commentaires</label>
    <input type="text" name="description" id="description" required>
  </div>
  <input type="Submit" value="Valider">
</form>
