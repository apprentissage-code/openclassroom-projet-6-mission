<div class="content">
  <div class="books-title">
    <h1>Nos livres à l'échange</h1>
    <div class="search-bar">
      <form action="index.php" method="get">
        <div class="search">
          <img src="Views/Images/search.svg" alt="icone-search">
          <input type="text" id="search" name="search" placeholder="Rechercher un livre" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
        </div>
        <input type="hidden" name="action" value="allBooks">
      </form>
    </div>
  </div>

  <div class="book-list">
    <?php foreach ($books as $book) { ?>
      <div class="card-book">
        <a href="index.php?action=detailBook&id=<?= $book->getId() ?>">
          <div>
            <img class="picture-book" src="/Views/Images/<?= $book->getImage() ?>" alt="picture-book" />
          </div>
          <div class="card-info">
            <p class="card-title"><?= $book->getTitle() ?></p>
            <p class="card-content"><?= $book->getAuthor() ?></p>
            <p class="card-content owner">Vendu par : <?= $book->getUser()->getLogin() ?></p>
            <p class="status <?= $book->getStatus() === "disponible" ? "available" : "unavailable" ?>"><?= ucfirst($book->getStatus()) ?></p>
          </div>
        </a>
      </div>
    <?php } ?>
  </div>
</div>
