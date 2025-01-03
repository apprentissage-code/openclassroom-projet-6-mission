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

    $error = null;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $email = htmlspecialchars(trim(Utils::request("email")));
      $password = htmlspecialchars(trim(Utils::request("password")));

      if (empty($email) || empty($password)) {
        $error = "Tous les champs sont obligatoires.";
      } else {
        $userManager = new UserManager();
        $user = $userManager->getUserByEmail($email);

        if (!$user) {
          $error = "L'utilisateur demandé n'existe pas.";
        } elseif (!password_verify($password, $user->getPassword())) {
          $error = "Le mot de passe est incorrect.";
        } else {
          $_SESSION['user'] = $user;
          header("Location: index.php?action=account");
          exit;
        }
      }
    }

    $view = new View("Connexion");
    $view->render("connectionForm", ['error' => $error]);
  }

  public function registrateUser(): void
  {
    $error = null;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $login = htmlspecialchars(trim(Utils::request("login")));
      $email = htmlspecialchars(trim(Utils::request("email")));
      $password = htmlspecialchars(trim(Utils::request("password")));

      if (empty($email) || empty($password) || empty($login)) {
        $error = "Tous les champs sont obligatoires.";
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
    $view->render("registrationForm", ["error" => $error]);
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
        'login' => htmlspecialchars(trim(Utils::request('login'))),
        'email' => htmlspecialchars(trim(Utils::request('email'))),
        'password' => !empty(trim(Utils::request('password')))
          ? password_hash(trim(Utils::request('password')), PASSWORD_DEFAULT)
          : $user->getPassword()
      ];

      $user->update($data);
      $userManager->updateUser($user);

      $_SESSION['user'] = $userManager->getUserById($id);

      header("Location: index.php?action=account");
    }
  }
}
