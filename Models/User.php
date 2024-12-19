<?php

class User
{
  private ?int $id;
  private string $login;
  private string $email;
  private string $password;
  private ?string $nickname;
  private ?string $picture;
  private DateTime $dateCreation;

  public function __construct(array $data)
  {
    $this->id = $data['id'] ?? null;
    $this->login = $data['login'];
    $this->email = $data['email'];
    $this->password = $data['password'];
    $this->nickname = $data['nickname'] ?? "";
    $this->picture = $data['picture'] ?? "";
    $this->dateCreation = new DateTime($data['date_creation']);
  }

  public function getId(): int
  {
    return $this->id;
  }

  public function getLogin(): string
  {
    return $this->login;
  }

  public function setLogin($login): void
  {
    $this->login = $login;
  }

  public function getPassword(): string
  {
    return $this->password;
  }

  public function setPassword($password): void
  {
    $this->password = $password;
  }

  public function getEmail(): string
  {
    return $this->email;
  }

  public function setEmail($email): void
  {
    $this->email = $email;
  }

  public function getNickname(): string
  {
    return $this->nickname;
  }

  public function getPicture(): string
  {
    return $this->picture;
  }

  public function getDateCreation(): DateTime
  {
    return $this->dateCreation;
  }

  public function getseniority()
  {
    $now = new DateTime();
    $seniority = $this->dateCreation->diff($now);
    if ($seniority->format('%Y') == 0) {
      return $seniority->format('%m') . " mois";
    } else {
      return $seniority->format('%Y') . " an";
    }
  }

  public function update($data)
  {
    foreach ($data as $key => $value) {
      $method = 'set' . ucfirst($key);
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }
}
