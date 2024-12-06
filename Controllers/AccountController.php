<?php

class AccountController
{
  public function showAccount(): void
  {
    $bookManager = new BookManager();
    $books = $bookManager->getBooks();

    $view = new View("Mon compte");
    $view->render("account", [
      "books" => $books
    ]);
  }

  public function displayConnectionForm(): void
  {
    $view = new View("Connexion");
    $view->render("connectionForm");
  }

  public function connectUser(): void
  {
    $email = Utils::request("email");
    $password = Utils::request("password");

    if (empty($email) || empty($password)) {
      throw new Exception("Tous les champs sont obligatoires. 1");
    }

    $userManager = new UserManager();
    $user = $userManager->getUserByEmail($email);
    if (!$user) {
      throw new Exception("L'utilisateur demandé n'existe pas.");
    }

    if (!password_verify($password, $user->getPassword())) {
      $hash = password_hash($password, PASSWORD_DEFAULT);
      throw new Exception("Le mot de passe est incorrect : $hash");
    }

    $_SESSION['user'] = $user;
    $_SESSION['idUser'] = $user->getId();

    header("Location: index.php?action=account");
  }

  public function displayRegistrationForm(): void
  {
    $view = new View("Inscription");
    $view->render("registrationForm");
  }

  public function registrateUser(): void
  {
    $login = Utils::request("login");
    $email = Utils::request("email");
    $password = Utils::request("password");

    if (empty($email) || empty($password) || empty($login)) {
      throw new Exception("Tous les champs sont obligatoires. 1");
    }

    $user = new User([
      'login' => $login,
      'email' => $email,
      'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);

    $userManager = new UserManager();
    $user = $userManager->registrate($user);

    header("Location: index.php?action=connection");
  }

  public function disconnectUser(): void
  {
    unset($_SESSION['user']);

    header("Location: index.php?action=home");
  }
}
