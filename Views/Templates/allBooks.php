<h1>Nos livres à l'échange</h1>
<div class="search-bar">
  <form action="">
    <input type="text" id="search" name="search" placeholder="Rechercher un livre">
  </form>
</div>
<div class="bookList">
  <?php foreach ($books as $book) {
    ?>
    <article class="book">
      <img class="picture-book" src="/Views/Images/<?= $book->getImage()?>" alt="picture-book" />
      <h2><?= $book->getTitle() ?></h2>
      <p><?= $book->getAuthor() ?></p>
      <p>Vendu par : <?= $book->getUser($userManager)->getLogin() ?></p>
      <p><?= ucfirst($book->getStatus()) ?></p>
    </article>
  <?php } ?>
</div>
