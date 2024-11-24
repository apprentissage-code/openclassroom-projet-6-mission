<?php

class BookController
{
  public function showBooks(): void
  {
    $bookManager = new BookManager();
    $books = $bookManager->getBooks();

    $userManager = new UserManager();

    $view = new View("allBooks");
    $view->render("allBooks", [
      "books" => $books,
      "userManager" => $userManager,
    ]);
  }

  public function detailBook(): void
  {
    $id = Utils::request("id", -1);

    $bookManager = new BookManager();
    $book = $bookManager->getBook($id);

    $userManager = new UserManager();

    if (!$book) {
      throw new Exception("Le livre demandé n'existe pas.");
    }

    $view = new View("book");
    $view->render("book", [
      "book" => $book,
      "userManager" => $userManager,
    ]);
  }

  public function showHome(): void
  {
    $bookManager = new BookManager();
    $books = $bookManager->getBooks(4);

    $userManager = new UserManager();

    $view = new View("home");
    $view->render("home", [
      "books" => $books,
      "userManager" => $userManager,
    ]);
  }
}
