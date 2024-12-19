<?php

class ChatManager extends AbstractEntityManager
{
  public function getConversations($userId)
  {
    $sql = "SELECT
                user.id,
                user.login,
                messages.message,
                messages.sender_id,
                messages.receiver_id AS receiver_id,
                messages.is_read,
                messages.sent_at
            FROM messages
            JOIN user ON user.id = CASE
                                    WHEN messages.sender_id = :user_id THEN messages.receiver_id
                                    ELSE messages.sender_id
                                  END
            WHERE messages.id IN (
                SELECT MAX(id)
                FROM messages
                WHERE sender_id = :user_id OR receiver_id = :user_id
                GROUP BY CASE
                            WHEN sender_id = :user_id THEN receiver_id
                            ELSE sender_id
                        END
            )
            ORDER BY messages.sent_at DESC
            ";
    $params = [
      'user_id' => $userId
    ];

    $result = $this->db->query($sql, $params);
    $conversations = [];

    while ($data = $result->fetch()) {
      $conversation = new Chat($data);
      $userManager = new UserManager();
      $receiver = $userManager->getUserById($data['receiver_id']);
      $conversation->setReceiver($receiver);
      $conversations[] = $conversation;
    }
    return $conversations;
  }

  public function getMessages($user_id, $receiver_id): array
  {
    $sql = "SELECT messages.*
            FROM messages
            JOIN user ON messages.sender_id = user.id
            WHERE (messages.sender_id = :user_id AND messages.receiver_id = :receiver_id)
               OR (messages.sender_id = :receiver_id AND messages.receiver_id = :user_id)
            ORDER BY messages.sent_at ASC
        ";
    $params = [
      'user_id' => $user_id,
      'receiver_id' => $receiver_id
    ];

    $result = $this->db->query($sql, $params);
    $messages = [];

    while ($data = $result->fetch()) {
      $message = new Chat($data);
      $messages[] = $message;
    }
    return $messages;
  }

  public function sendMessage(Chat $chat): void
  {
    $sql = "INSERT INTO
            messages
            (sender_id, receiver_id, message, sent_at, is_read)
            VALUES
            (:sender_id, :receiver_id, :message, :sent_at, :is_read)
            ";
    $params = [
      'sender_id' => $chat->getSenderId(),
      'receiver_id' => $chat->getReceiverId(),
      'message' => $chat->getMessage(),
      'sent_at' => $chat->getsendAt()->format('Y-m-d H:i:s'),
      'is_read' => $chat->getIsRead() ? 1 : 0
    ];

    $this->db->query($sql, $params);
  }
}
