<?php

class UserManager extends AbstractEntityManager
{
  public function getUserByEmail(string $email)
  {
    $sql = "SELECT * FROM user WHERE email = :email";
    $result = $this->db->query($sql, ['email' => $email]);
    $user = $result->fetch();
    if ($user) {
      return new User($user);
    }
    return null;
  }

  public function getUserById(int $id)
  {
    $sql = "SELECT * FROM user WHERE id = :id";
    $result = $this->db->query($sql, ['id' => $id]);
    $user = $result->fetch();
    if ($user) {
      return new User($user);
    }
    return null;
  }

  public function registrate(User $user)
  {
    $sql = "INSERT INTO
            user
            (login, email, password, nickname)
            VALUES
            (:login, :email, :password, :nickname)";

    $params = [
      'login' => $user->getLogin(),
      'email' => $user->getEmail(),
      'password' => $user->getPassword(),
      'nickname' => $user->getNickname()
    ];

    $this->db->query($sql, $params);

  }

  public function updateUser(User $user)
  {
    $sql = "UPDATE user
            SET
            login = :login,
            email = :email,
            password = :password
            WHERE
            id = :id";
    $params = [
      'login' => $user->getLogin(),
      'email' => $user->getEmail(),
      'password' => $user->getPassword(),
      'id' => $user->getId()
    ];

    $this->db->query($sql, $params);
  }
}
