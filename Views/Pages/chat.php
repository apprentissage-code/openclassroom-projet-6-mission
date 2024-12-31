<div class="chat">
  <div class="conversations">
    <h1 class="align-start">Messagerie</h1>
    <?php foreach ($conversations as $conversation) { ?>
      <div class="card-conversation">
        <a href="index.php?action=chat&receiver_id=<?= $conversation->getReceiverId() == $user->getId() ? $conversation->getSenderId() : $conversation->getReceiverId() ?>">
          <div class="conversation-info">
            <img src="Views/Images/<?= $conversation->getPicture() ?>" alt="photo-profil">
            <div class="conversation-last-message">
              <div class="conversation-user-info">
                <p><?= $conversation->getLogin() ?></p>
                <p><?= $conversation->getSendAt()->format("d-m-Y H:i") ?></p>
              </div>
              <p class="last-message"><?= $conversation->getMessage() ?></p>
            </div>
          </div>
        </a>
      </div>
    <?php } ?>
  </div>
  <div class="actual-conversation">
    <div class="message-title">
      <img src="Views/Images/<?= $receiver->getPicture() ?>" alt="photo-profil" class="owner-image">
      <h3 style="padding: 10px;"><?= $receiver->getLogin() ?></h3>
    </div>
    <div class="messages">
      <?php foreach ($messages as $index => $message) {
      ?>
        <div class="card-message <?= $index % 2 == 0 ? 'message-left' : 'message-right' ?>">
          <div class="sender-message">
            <img src="Views/Images/<?= $message->getSenderId() == $user->getId() ? $user->getPicture() : $receiver->getPicture() ?>" alt="photo-profil" class="owner-image">
            <p><?= $message->getsendAt()->format("d-m-Y H:i") ?></p>
          </div>
          <p class="conversation-message <?= $index % 2 == 0 ? 'message-left' : 'message-right' ?>"><?= $message->getMessage() ?></p>
        </div>
      <?php } ?>
    </div>
    <div class="form-messages">
      <form class="form-message" action="index.php?action=chat&receiver_id=<?= $receiverId ?>" method="post">
        <input class="form-message-input" type="text" name="content" placeholder="Tapez votre message ici" required>
        <input class="form-message-submit button-green" type="submit" value="Envoyer" />
      </form>
    </div>
  </div>
</div>
