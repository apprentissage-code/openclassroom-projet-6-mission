<?php

class Book
{
  private ?int $id;
  private int $idUser;
  private string $title;
  private string $author;
  private string $description;
  private string $picture;
  private string $status = "disponible";
  private ?DateTime $dateCreation;
  private ?DateTime $dateUpdate;
  private ?User $user = null;

  public function __construct(array $data)
  {
    $this->id = $data['id'] ?? null;
    $this->idUser = $data['user_id'] ?? 1;
    $this->title = $data['title'];
    $this->author = $data['author'];
    $this->description = $data['description'];
    $this->picture = $data['picture'];
    $this->status = $data['status'] ?? "disponible";
    $this->dateCreation = new DateTime($data['date_creation']);
    $this->dateUpdate = isset($data['date_update']) ? new DateTime($data['date_update']) : null;
    if (isset($data['user'])) {
      $this->user = $data['user'];
    }
  }

  public function getId(): int
  {
    return $this->id;
  }

  public function getIdUser(): int
  {
    return $this->idUser;
  }

  public function setTitle($title): void
  {
    $this->title = $title;
  }

  public function getTitle(): string
  {
    return $this->title;
  }

  public function setAuthor($author): void
  {
    $this->author = $author;
  }

  public function getAuthor(): string
  {
    return $this->author;
  }

  public function setDescription($description): void
  {
    $this->description = $description;
  }

  public function getDescription(): string
  {
    return $this->description;
  }

  public function setStatus($status): void
  {
    $this->status = $status;
  }

  public function getStatus(): string
  {
    return $this->status;
  }

  public function setUser(User $user): void
  {
    $this->user = $user;
  }

  public function getUser(): ?User
  {
    return $this->user;
  }

  public function setImage($picture): void
  {
    $this->picture = $picture;
  }

  public function getImage(): string
  {
    return $this->picture;
  }

  public function getDateCreation(): DateTime
  {
    return $this->dateCreation;
  }

  public function getDateUpdate(): DateTime
  {
    return $this->dateUpdate;
  }

  public function update(array $data): void
  {
    foreach ($data as $key => $value) {
      if ($key === 'user_id' && $value === null) {
          $value = $this->idUser;
      }
      $method = 'set' . ucfirst($key);
      if (method_exists($this, $method)) {
          $this->$method($value);
      }
  }
  }
}
