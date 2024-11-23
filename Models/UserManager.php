<?php

class UserManager extends AbstractEntityManager
{
  public function getUserById($id): User
  {
    $sql = "SELECT * FROM user WHERE id = :id";
    $result = $this->db->query($sql, ['id' => $id]);
    $user = $result->fetch();
    if($user) {
      return new User($user);
    }
    return null;
  }
}
