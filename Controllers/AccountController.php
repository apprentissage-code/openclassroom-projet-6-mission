<?php

class AccountController
{
  public function showAccount(): void
  {
    $userManager = new UserManager();
    $user = $userManager->getUserById($_SESSION['idUser']);

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

    if (!$user) {
      header("Location: index.php?action=connection");
      exit;
    }

    $bookManager = new BookManager();
    $books = $bookManager->getBooksByUser($user->getId());

    $view = new View("Compte");
    $view->render("accountPublic", [
      "books" => $books,
      "user" => $user,
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

  public function updateUser(): void
  {
    $id = $_SESSION["idUser"];

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
