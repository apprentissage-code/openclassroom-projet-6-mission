<?php

class Chat
{
  private ?int $id;
  private int $senderId;
  private int $receiverId;
  private string $message;
  private DateTime $sendAt;
  private bool $is_read;
  private ?User $receiver = null;

  public function __construct(array $data)
  {
    $this->id = $data['id'] ?? null;
    $this->senderId = $data['sender_id'];
    $this->receiverId = $data['receiver_id'];
    $this->message = $data['message'];
    $this->sendAt = new DateTime($data['sent_at']);
    $this->is_read = $data['is_read'];
    if (isset($data['receiver'])) {
      $this->receiver = $data['receiver'];
    }
  }

  public function getId(): int
  {
    return $this->id;
  }

  public function getMessage(): string
  {
    return $this->message;
  }

  public function getsendAt(): DateTime
  {
    return $this->sendAt;
  }

  public function getSenderId()
  {
    return $this->senderId;
  }

  public function getReceiverId(): int
  {
    return $this->receiverId;
  }

  public function getIsRead(): bool
  {
    return $this->is_read;
  }

  public function setReceiver(User $receiver): void
  {
    $this->receiver = $receiver;
  }

  public function getReceiver(): ?User
  {
    return $this->receiver;
  }

}
