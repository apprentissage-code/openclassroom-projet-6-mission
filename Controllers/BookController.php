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
}
