<?php
class BookController extends AbstractEntityController
{
  const HOME_LIMIT_BOOK = 4;

  public function showBooks(): void
  {
    $bookManager = new BookManager();
    $searchQuery = $_GET['search'] ?? '';
    $books = $bookManager->getBooks($searchQuery);

    $view = new View("Tous nos livres");
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

    $user = $this->getCurrentUser();

    $view = new View($book->getTitle());
    $view->render("book", [
      "book" => $book,
      "user" => $user
    ]);
  }

  public function showHome(): void
  {
    $bookManager = new BookManager();
    $books = $bookManager->getBooks('', self::HOME_LIMIT_BOOK);

    $view = new View("home");
    $view->render("home", [
      "books" => $books,
    ]);
  }
  public function addBook(): void
  {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $title = htmlspecialchars(trim(Utils::request('title')));
      $author = htmlspecialchars(trim(Utils::request('author')));
      $description = htmlspecialchars(trim(Utils::request('description')));
      $image = ManageImage::uploadImage();
      $user = $this->getCurrentUser();

      $book = new Book([
        'user_id' => $user->getId(),
        'title' => $title,
        'author' => $author,
        'description' => $description,
        'picture' => $image,
        'date_creation' => (new DateTime())->format('Y-m-d H:i:s'),
        'date_update' => (new DateTime())->format('Y-m-d H:i:s')
      ]);

      $bookManager = new BookManager();
      $bookManager->addBook($book);

      header("Location: index.php?action=account");
    }

    $view = new View("Ajouter un livre");
    $view->render("addBookForm");
  }

  public function updateBook(): void
  {
    $id = Utils::request("id", -1);

    $bookManager = new BookManager();
    $book = $bookManager->getBook($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $data = [
        'title' => htmlspecialchars(trim(Utils::request('title'))),
        'author' => htmlspecialchars(trim(Utils::request('author'))),
        'description' => htmlspecialchars(trim(Utils::request('description'))),
        'status' => htmlspecialchars(trim(Utils::request('status'))),
        'picture' => ManageImage::uploadImage($book->getImage()),
        'date_update' => (new DateTime())->format('Y-m-d H:i:s')
      ];

      $book->update($data);

      $bookManager->updateBook($book);

      header("Location: index.php?action=account");
    }

    $view = new View("Modifier les informations");
    $view->render("updateBookForm", [
      "book" => $book,
    ]);
  }

  public function deleteBook(): void
  {
    $id = Utils::request("id", -1);

    $bookManager = new BookManager();
    $book = $bookManager->getBook($id);

    $bookManager->deleteBook($book);

    header("Location: index.php?action=account");
  }
}
