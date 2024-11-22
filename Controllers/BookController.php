<?php

class BookController
{
  public function showBooks(): void
  {
    $bookManager = new BookManager();
    $books = $bookManager->getAllBooks();

    $view = new View("allBooks");
    $view->render("allBooks", ["books" => $books]);
  }
}
