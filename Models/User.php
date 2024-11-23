<?php

class User extends AbstractEntity
{
  protected int $id;
  private string $login;
  private string $email;
  private string $password;
  private string $nickname;

  public function __construct(array $data)
  {
    $this->id = $data['id'];
    $this->login = $data['login'];
    $this->email = $data['email'];
    $this->password = $data['password'];
    $this->nickname = $data['nickname'];
  }

  public function getLogin(): string
  {
    return $this->login;
  }
}
