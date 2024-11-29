<?php
class BookController
{
  CONST HOME_LIMIT_BOOK = 4;

  public function showBooks(): void
  {
    $bookManager = new BookManager();
    $books = $bookManager->getBooks();

    $view = new View("allBooks");
    $view->render("allBooks", [
      "books" => $books
    ]);
  }

  public function detailBook(): void
  {
    $id = Utils::request("id", -1);

    $bookManager = new BookManager();
    $book = $bookManager->getBook($id);

    if (!$book) {
      throw new Exception("Le livre demandé n'existe pas.");
    }

    $view = new View("book");
    $view->render("book", [
      "book" => $book,
    ]);
  }

  public function showHome(): void
  {
    $bookManager = new BookManager();
    $books = $bookManager->getBooks(self::HOME_LIMIT_BOOK);

    $view = new View("home");
    $view->render("home", [
      "books" => $books,
    ]);
  }

  public function showUpdateBook(): void
  {
    $id = Utils::request("id", -1);

    $bookManager = new BookManager();
    $book = $bookManager->getBook($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $title = Utils::request('title');
      $author = Utils::request('author');
      $description = Utils::request('description');
      $status = Utils::request('status');

      $uniqueName = $book->getImage();
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

      $book->setTitle($title);
      $book->setAuthor($author);
      $book->setDescription($description);
      $book->setStatus($status);
      $book->setImage($uniqueName);

      $bookManager->updateBook($book);

      header("Location: index.php?action=detailBook&id=" . $book->getId());
    }

    $view = new View("updateBookForm");
    $view->render("updateBookForm", [
      "book" => $book,
    ]);
  }
}
