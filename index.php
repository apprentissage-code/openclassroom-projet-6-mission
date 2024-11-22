<?php

require_once 'config/config.php';
require_once 'config/autoload.php';

$action = Utils::request('action', 'allBooks');;
try {
  switch ($action) {
    case 'allBooks':
      $bookController = new BookController();
      $bookController->showBooks();
      break;
  }
} catch (Exception $e) {
  $errorView = new View('Erreur');
  $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}
