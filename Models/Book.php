<?php

class Book extends AbstractEntity
{
  private int $idUser;
  private string $title;
  private string $author;
  private string $description;
  private string $picture;
  private string $status;
  private ?DateTime $dateCreation;
  private ?DateTime $dateUpdate;
  private ?User $user = null;

  public function __construct(array $data)
  {
    $this->idUser = $data['user_id'];
    $this->title = $data['title'];
    $this->author = $data['author'];
    $this->description = $data['description'];
    $this->picture = $data['picture'];
    $this->status = $data['status'];
    $this->dateCreation = new DateTime($data['date_creation']);
    $this->dateUpdate = isset($data['date_update']) ? new DateTime($data['date_update']) : null;
    if (isset($data['user'])) {
      $this->user = $data['user'];
    }
  }

  public function getTitle(): string
  {
    return $this->title;
  }

  public function getAuthor(): string
  {
    return $this->author;
  }

  public function getDescription(): string
  {
    return $this->description;
  }

  public function getStatus(): string
  {
    return $this->status;
  }

  public function setUser(User $user): void
  {
    $this->user = $user;
  }
  public function getUser(UserManager $userManager): User
  {
    if ($this->user === null) {
      $this->user = $userManager->getUserById($this->idUser);
    }
    return $this->user;
  }

  public function getImage(): string
  {
    return $this->picture;
  }

  // public function getDateCreation(): ?DateTime
  // {
  //   return $this->dateCreation;
  // }
}
