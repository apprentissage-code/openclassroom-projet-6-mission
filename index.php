<?php

require_once 'config/config.php';
require_once 'config/autoload.php';

session_start();

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

    case 'accountPublic':
      $accountController = new AccountController();
      $accountController->showAccountPublic();
      break;

    case 'connection':
      $accountController = new AccountController();
      $accountController->connectUser();
      break;

    case 'disconnect':
      $accountController = new AccountController();
      $accountController->disconnectUser();
      break;

    case 'registration':
      $accountController = new AccountController();
      $accountController->registrateUser();
      break;

    case 'updateUser':
      $accountController = new AccountController();
      $accountController->updateUser();
      break;

    case 'chat':
      $chatController = new ChatController();
      $chatController->showChat();
      break;

    default:
      throw new Exception("Action non reconnue.");
  }
} catch (Exception $e) {
  $errorView = new View('Erreur');
  $errorView->render('errorPage', ['errorMessage' => $e->getMessage()]);
}
