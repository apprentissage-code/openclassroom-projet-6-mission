
<div class="bookList">
  <?php foreach ($books as $book) {
    ?>
    <article class="book">
      <h2><?= $book->getTitle() ?></h2>
      <p><?= $book->getDescription(400) ?></p>
      <p><?= $book->getStatus() ?></p>
    </article>
  <?php } ?>
</div>
