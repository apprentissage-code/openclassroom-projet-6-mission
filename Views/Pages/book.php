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
    <p><?= $book->getUser($userManager)->getLogin() ?></p>
  </div>
  <a href="#">Envoyer un message</a>
</div>
