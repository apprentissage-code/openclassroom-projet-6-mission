<div class="content">
  <h1 class="align-start">Modifier les informations</h1>
  <form action="index.php?action=addBook" method="post" enctype="multipart/form-data">
    <div class="form-photo" style="padding-bottom: 0px;">
      <label for="photo">Photo</label>
      <input type="file" name="photo" id="photo" accept="image/png, image/jpeg, image/jpg">
    </div>
    <div class="form-info" style="padding-top: 0px;">
      <label for="title">Titre</label>
      <input type="text" name="title" id="title" required>
      <label for="author">Auteur</label>
      <input type="text" name="author" id="author" required>
      <label for="description">Commentaires</label>
      <input type="text" name="description" id="description" required>
    </div>
    <input class="button-green" type="Submit" value="Valider">
  </form>
</div>
