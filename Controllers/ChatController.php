<?php

class ChatController extends AbstractEntityController
{
  public function showChat(): void
  {
    $receiverId = Utils::request("receiver_id", -1);
    $senderId = $this->getCurrentUser()->getId();
    $content = htmlspecialchars(trim(Utils::request('content')));

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $message = new Chat([
        "sender_id" => $senderId,
        "receiver_id" => $receiverId,
        "message" => $content,
        "sent_at" => (new DateTime())->format('Y-m-d H:i:s'),
        "is_read" => false
      ]);
      $chatManager = new ChatManager();
      $chatManager->sendMessage($message);

      header("Location: " .  $_SERVER['HTTP_REFERER']);
    }
    $userManager = new UserManager();
    $user = $userManager->getUserById($senderId);
    $receiver = $userManager->getUserById($receiverId);

    $chatManager = new ChatManager();
    $messages = $chatManager->getMessages($senderId, $receiverId);
    $conversations = $chatManager->getConversations($senderId);

    $view = new View("Messagerie");
    $view->render("chat", [
      "messages" => $messages,
      "user" => $user,
      "receiver" => $receiver,
      "receiverId" => $receiverId,
      "conversations" => $conversations
    ]);
  }
}
