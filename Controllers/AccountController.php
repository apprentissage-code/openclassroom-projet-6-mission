<?php

class AccountController extends AbstractEntityController
{
  public function showAccount(): void
  {
    $user = $this->getCurrentUser();

    if (!$user) {
      header("Location: index.php?action=connection");
      exit;
    }

    $bookManager = new BookManager();
    $books = $bookManager->getBooksByUser($user->getId());

    $view = new View("Mon compte");
    $view->render("account", [
      "books" => $books,
      "user" => $user,
    ]);
  }

  public function showAccountPublic(): void
  {
    $id = Utils::request("id", -1);

    $userManager = new UserManager();
    $user = $userManager->getUserById($id);

    $bookManager = new BookManager();
    $books = $bookManager->getBooksByUser($user->getId());

    $view = new View("Compte");
    $view->render("accountPublic", [
      "books" => $books,
      "user" => $user,
    ]);
  }

  public function connectUser(): void
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $email = Utils::request("email");
      $password = Utils::request("password");

      if (empty($email) || empty($password)) {
        throw new Exception("Tous les champs sont obligatoires.");
      }

      $userManager = new UserManager();
      $user = $userManager->getUserByEmail($email);
      if (!$user) {
        throw new Exception("L'utilisateur demandé n'existe pas.");
      }

      if (!password_verify($password, $user->getPassword())) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        throw new Exception("Le mot de passe est incorrect.");
      }

      $_SESSION['user'] = $user;

      header("Location: index.php?action=account");
    }

    $view = new View("Connexion");
    $view->render("connectionForm");
  }

  public function registrateUser(): void
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $login = Utils::request("login");
      $email = Utils::request("email");
      $password = Utils::request("password");

      if (empty($email) || empty($password) || empty($login)) {
        throw new Exception("Tous les champs sont obligatoires.");
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

    $view = new View("Inscription");
    $view->render("registrationForm");
  }

  public function disconnectUser(): void
  {
    unset($_SESSION['user']);

    header("Location: index.php?action=home");
  }

  public function updateUser(): void
  {
    $id = $this->getCurrentUser()->getId();

    $userManager = new UserManager;
    $user = $userManager->getUserById($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $data = [
        'login' => Utils::request('login'),
        'email' => Utils::request('email'),
        'password' => password_hash(Utils::request('password'), PASSWORD_DEFAULT)
      ];

      $user->update($data);
      $userManager->updateUser($user);

      header("Location: index.php?action=account");
    }

  }
}
