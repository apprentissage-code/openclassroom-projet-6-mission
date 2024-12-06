<div class="content">
  <h1>Nos livres à l'échange</h1>
  <a href="index.php?action=account">Mon Compte</a>
  <div class="search-bar">
  <form action="index.php" method="get">
      <input type="hidden" name="action" value="allBooks">
      <input type="text" id="search" name="search" placeholder="Rechercher un livre" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
      <button type="submit">Rechercher</button>
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
