<div class="conversations">
  <h1>Messagerie</h1>
  <?php foreach ($conversations as $conversation) { ?>
  <div class="card-conversation">
   <a href="index.php?action=chat&receiver_id=<?= $conversation->getReceiver()->getId() ?>">
      <div>
        <div>
          <img src="Views/Images/<?= $conversation->getReceiver()->getPicture()?>" alt="photo-profil" style="width:50px;">
          <p><?= $conversation->getReceiver()->getLogin() ?></p>
          <p><?= $conversation->getsendAt()->format("d-m-Y H:i") ?></p>
        </div>
        <p><?= $conversation->getMessage() ?></p>
      </div>
    </a>
  </div>
  <?php } ?>
</div>
<div class="messages">
  <h2>Conversation</h2>
  <div class="message-title">
    <img src="Views/Images/<?= $receiver->getPicture()?>" alt="photo-profil" style="width:50px;">
    <h2><?= $receiver->getLogin() ?></h2>
  </div>
  <?php foreach ($messages as $message) {
    ?>
    <div class="card-message">
      <p><?= $message->getsendAt()->format("d-m-Y H:i") ?></p>
      <p><?= $message->getSenderId() == $user->getId() ? $user->getLogin() : $receiver->getLogin() ?></p>
      <img src="Views/Images/<?= $message->getSenderId() == $user->getId() ? $user->getPicture() : $receiver->getPicture() ?>" alt="photo-profil" style="width:50px;">
      <p><?= $message->getMessage() ?></p>
    </div>
  <?php } ?>
</div>
<div class="form-messages">
  <form action="index.php?action=chat&receiver_id=<?= $receiverId ?>" method="post">
    <input type="text" name="content" placeholder="Tapez votre message ici" required>
    <input type="submit" value="Envoyer" />
  </form>
</div>
