<div class="content">
  <h1>Nos livres à l'échange</h1>
  <a href="index.php?action=admin">Mon Compte</a>
  <div class="search-bar">
    <form action="">
      <input type="text" id="search" name="search" placeholder="Rechercher un livre">
    </form>
  </div>

  <div class="bookList">
    <?php foreach ($books as $book) {
      ?>
      <a href="index.php?action=detailBook&id=<?= $book->getId()?>">
        <div class="card-book">
          <img class="picture-book" src="/Views/Images/<?= $book->getImage()?>" alt="picture-book" />
          <h2><?= $book->getTitle() ?></h2>
          <p><?= $book->getAuthor() ?></p>
          <p>Vendu par : <?= $book->getUser()->getLogin() ?></p>
          <p><?= ucfirst($book->getStatus()) ?></p>
        </div>
      </a>
    <?php } ?>
  </div>
</div>
