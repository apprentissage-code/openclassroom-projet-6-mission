<?php

class Conversation
{
  private ?int $id;
  private string $login;
  private string $picture;
  private int $senderId;
  private int $receiverId;
  private string $message;
  private DateTime $sendAt;
  private bool $is_read;

  public function __construct(array $data)
  {
    $this->id = $data['id'] ?? null;
    $this->login = $data['login'];
    $this->picture = $data['picture'];
    $this->senderId = $data['sender_id'];
    $this->receiverId = $data['receiver_id'];
    $this->message = $data['message'];
    $this->sendAt = new DateTime($data['sent_at']);
    $this->is_read = $data['is_read'];
  }
  public function getId()
  {
    return $this->id;
  }

  public function getLogin(): string
  {
    return $this->login;
  }

  public function getMessage(): string
  {
    return $this->message;
  }

  public function getPicture(): string
  {
    return $this->picture;
  }

  public function getSendAt(): DateTime
  {
    return $this->sendAt;
  }

  public function getReceiverId(): int
  {
    return $this->receiverId;
  }

  public function getSenderId(): int
  {
    return $this->senderId;
  }


}
