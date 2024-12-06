<?php

class ManageImage
{
  public static function uploadImage(string $uniqueName = ""): string
  {
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
      $uploadDir = 'Views/Images/';
      $photoTmpName = $_FILES['photo']['tmp_name'];
      $photoName = basename($_FILES['photo']['name']);
      $photoExt = strtolower(pathinfo($photoName, PATHINFO_EXTENSION));
      $allowedExtensions = ['jpg', 'jpeg', 'png'];

      if (in_array($photoExt, $allowedExtensions)) {
        $uniqueName = uniqid('book_') . '.' . $photoExt;
        $photoPath = $uploadDir . $uniqueName;

        if (!move_uploaded_file($photoTmpName, $photoPath)) {
          die("Erreur lors du téléchargement de la photo.");
        }
      } else {
        die("Extension de fichier non autorisée.");
      }
    }
    return $uniqueName;
  }
}
