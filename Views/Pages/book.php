<div>
  <img class="picture-book" src="/Views/Images/<?= $book->getImage()?>" alt="picture-book">
</div>
<div class="info-book">
  <div class="title">
    <h1><?= $book->getTitle() ?></h1>
    <h2>par <?= $book->getAuthor() ?></h2>
  </div>
  <div class="description">
    <h3>DESCRIPTION</h3>
    <p><?= $book->getDescription() ?></p>
  </div>
  <div class="owner">
    <h3><?= strtoupper("Propriétaire") ?></h3>
    <a href="index.php?action=accountPublic&id=<?= $book->getUser()->getId()?>">
      <img src="Views/Images/<?=$book->getUser()->getPicture()?>" alt="profil-picture" style="width:50px;">
      <p><?= $book->getUser()->getLogin() ?></p>
    </a>
  </div>
  <a href="index.php?action=chat&receiver_id=<?= $book->getUser()->getId() ?>">Envoyer un message</a>
</div>
