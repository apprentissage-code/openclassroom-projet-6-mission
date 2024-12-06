<?php

class User
{
  private ?int $id;
  private string $login;
  private string $email;
  private string $password;
  private ?string $nickname;

  public function __construct(array $data)
  {
    $this->id = $data['id'] ?? null;
    $this->login = $data['login'];
    $this->email = $data['email'];
    $this->password = $data['password'];
    $this->nickname = $data['nickname'] ?? "";
  }

  public function getId(): int
  {
    return $this->id;
  }

  public function getLogin(): string
  {
    return $this->login;
  }

  public function getPassword(): string
  {
    return $this->password;
  }

  public function getEmail(): string
  {
    return $this->email;
  }

  public function getNickname(): string
  {
    return $this->nickname;
  }
}
