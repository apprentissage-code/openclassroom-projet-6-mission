<div class="book">
  <div class="book-image">
    <p class="site-path"> <a href="index.php?action=allBooks">Nos livres</a> > <?= $book->getTitle() ?></p>
    <img class="picture-book" src="/Views/Images/<?= $book->getImage() ?>" alt="picture-book">
  </div>
  <div class="info-book">
    <div class="title">
      <h1><?= $book->getTitle() ?></h1>
      <p class="book-author">par <?= $book->getAuthor() ?></p>
    </div>
    <hr />
    <div class="description">
      <h3>DESCRIPTION</h3>
      <p><?= $book->getDescription() ?></p>
    </div>
    <div>
      <h3>PROPRIÉTAIRE</h3>
      <a href="index.php?action=accountPublic&id=<?= $book->getUser()->getId() ?>" class="book-owner">
        <img src="Views/Images/<?= $book->getUser()->getPicture() ?>" alt="profil-picture" class="owner-image">
        <p><?= $book->getUser()->getLogin() ?></p>
      </a>
    </div>
    <a href="index.php?action=chat&receiver_id=<?= $book->getUser()->getId() ?>" class="button-green">Envoyer un message</a>
  </div>
</div>
