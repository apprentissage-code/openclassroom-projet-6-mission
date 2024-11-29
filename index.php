<?php

require_once 'config/config.php';
require_once 'config/autoload.php';

$action = Utils::request('action');
try {
  switch ($action) {
    case 'allBooks':
      $bookController = new BookController();
      $bookController->showBooks();
      break;

    case 'detailBook':
      $bookController = new BookController();
      $bookController->detailBook();
      break;

    case 'home':
      $bookController = new BookController();
      $bookController->showHome();
      break;

    case 'updateBook':
      $bookController = new BookController();
      $bookController->showUpdateBook();
      break;

    case 'deleteBook':
      $bookController = new BookController();
      $bookController->deleteBook();

    default:
      throw new Exception("Action non reconnue.");
  }
} catch (Exception $e) {
  $errorView = new View('Erreur');
  $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}
