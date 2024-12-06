<?php

require_once 'config/config.php';
require_once 'config/autoload.php';

$action = Utils::request('action') ?? 'home';
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
      $bookController->updateBook();
      break;

    case 'deleteBook':
      $bookController = new BookController();
      $bookController->deleteBook();
      break;

    case 'addBook':
      $bookController = new BookController();
      $bookController->addBook();
      break;

    case 'account':
      $accountController = new AccountController();
      $accountController->showAccount();
      break;

    case 'connection':
      $accountController = new AccountController();
      $accountController->displayConnectionForm();
      break;

    case 'connectUser':
      $accountController = new AccountController();
      $accountController->connectUser();
      break;

    case 'disconnect':
      $accountController = new AccountController();
      $accountController->disconnectUser();
      break;

    case 'registration':
      $accountController = new AccountController();
      $accountController->displayRegistrationForm();
      break;

    case 'registrateUser':
      $accountController = new AccountController();
      $accountController->registrateUser();
      break;

    default:
      throw new Exception("Action non reconnue.");
  }
} catch (Exception $e) {
  $errorView = new View('Erreur');
  $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}
