<div class="banner">
  <div class="banner-info">
    <h1>Rejoignez nos lecteurs passionnés</h1>
    <p>Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture. Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres. </p>
    <a href="index.php?action=allBooks">Découvrir</a>
  </div>
  <img src="Views/Images/banner-home.jpg" alt="Homme lisant un livre">
</div>
<div class="last-books">
  <h2>Les derniers livres ajoutés</h2>
  <div class="books">
    <div class="card-book">
    <?php foreach ($books as $book) {
      ?>
      <a href="index.php?action=detailBook&id=<?= $book->getId()?>">
        <div class="card-book">
          <img class="picture-book" src="/Views/Images/<?= $book->getImage()?>" alt="picture-book" />
          <h2><?= $book->getTitle() ?></h2>
          <p><?= $book->getAuthor() ?></p>
          <p>Vendu par : <?= $book->getUser($userManager)->getLogin() ?></p>
          <p><?= ucfirst($book->getStatus()) ?></p>
        </div>
      </a>
    <?php } ?>
    </div>
  </div>
</div>
<div class="info-organization">
  <h2>Comment ça marche ?</h2>
  <p>Échanger des livres avec TomTroc c’est simple et amusant ! Suivez ces étapes pour commencer :</p>
  <div class="card-step">
    <p>Inscrivez-vous gratuitement sur notre plateforme.</p>
    <p>Ajoutez les livres que vous souhaitez échanger à votre profil.</p>
    <p>Parcourez les livres disponibles chez d'autres membres.</p>
    <p>Proposez un échange et discutez avec d'autres passionnés de lecture.</p>
  </div>
  <a href="index.php?action=allBooks">Voir tous les livres</a>
</div>
<img src="Views/Images/banner-home-2.jpg" alt="Librairie">
<div class="values">
  <h2>Nos valeurs</h2>
  <p>Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté. Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes.</p>
  <p>Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé.</p>
  <p>Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lecteurs de se connecter, de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment sur les étagères.</p>
  <p>L’équipe Tom Troc</p>
</div>
