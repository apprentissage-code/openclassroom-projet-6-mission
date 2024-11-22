<?php

class Book extends AbstractEntity
{
  private int $idUser;
  private string $title;
  private string $description;
  private string $picture;
  private string $status;
  private ?DateTime $dateCreation;
  private ?DateTime $dateUpdate;

  public function __construct(array $data)
  {
    $this->idUser = $data['user_id'];
    $this->title = $data['title'];
    $this->description = $data['description'];
    $this->picture = $data['picture'];
    $this->status = $data['status'];
    $this->dateCreation = new DateTime($data['date_creation']);
    $this->dateUpdate = isset($data['date_update']) ? new DateTime($data['date_update']) : null;
  }

  public function getTitle(): string
  {
    return $this->title;
  }

  public function getDescription(): string
  {
    return $this->description;
  }

  public function getStatus(): string
  {
    return $this->status;
  }

  // public function getDateCreation(): ?DateTime
  // {
  //   return $this->dateCreation;
  // }
}
