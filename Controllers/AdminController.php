<?php

class AdminController
{

  public function showAdmin(): void
  {
    $bookManager = new BookManager();
    $books = $bookManager->getBooks();

    $view = new View("Mon compte");
    $view->render("admin", [
      "books" => $books
    ]);
  }
}
