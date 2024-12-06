-- DATABASE : tom_troc

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `picture` text NOT NULL,
  `status` text NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lnk_book_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

INSERT INTO `book`(`id`, `user_id`, `title`, `author`, `description`, `picture`, `status`, `date_creation`, `date_update`) VALUES
(1, 1, 'Le Monde perdu', 'Michael Crichton', 'Un roman d\'aventure sur les dinosaures.', 'monde_perdu.jpg', 'disponible', '2023-01-15', '2023-01-16'),
(2, 2, 'Voyage au centre de la Terre', 'Jules Verne', 'Un voyage palpitant à l\'intérieur de la Terre.', 'centre_terre.jpg', 'disponible', '2023-02-01', '2023-02-02'),
(3, 3, 'Le Tour du monde en 80 jours', 'Jules Verne', 'L\'histoire d\'un voyage aventureux autour du monde.', 'tour_monde_80_jours.jpg', 'emprunté', '2023-03-10', '2023-03-11'),
(4, 4, 'Moby Dick', 'Herman Melville', 'Une histoire d\'obsession et de mer.', 'moby_dick.jpg', 'disponible', '2023-04-15', '2023-04-16'),
(5, 5, 'Orgueil et Préjugés', 'Jane Austen', 'Un roman d\'amour dans l\'Angleterre du XIXe siècle.', 'orgueil_prejuges.jpg', 'réservé', '2023-05-01', '2023-05-02'),
(6, 1, 'Dracula', 'Bram Stoker', 'Un roman gothique d\'horreur.', 'dracula.jpg', 'disponible', '2023-06-12', '2023-06-13'),
(7, 2, 'Frankenstein', 'Mary Shelley', 'Une histoire où la science tourne mal.', 'frankenstein.jpg', 'disponible', '2023-07-05', '2023-07-06'),
(8, 3, 'Ne tirez pas sur l\'oiseau moqueur', 'Harper Lee', 'Un roman sur l\'injustice raciale.', 'oiseau_moqueur.jpg', 'emprunté', '2023-08-01', '2023-08-02'),
(9, 4, 'Gatsby le Magnifique', 'F. Scott Fitzgerald', 'Une critique du rêve américain.', 'gatsby.jpg', 'disponible', '2023-09-15', '2023-09-16'),
(10, 5, '1984', 'George Orwell', 'Un roman dystopique sur le totalitarisme.', '1984.jpg', 'disponible', '2023-10-20', '2023-10-21'),
(11, 1, 'L\'Attrape-cœurs', 'J.D. Salinger', 'Un roman sur la rébellion adolescente.', 'attrape_coeurs.jpg', 'emprunté', '2023-11-01', '2023-11-02'),
(12, 2, 'Le Meilleur des mondes', 'Aldous Huxley', 'Un monde dystopique où le bonheur est contrôlé.', 'meilleur_monde.jpg', 'disponible', '2023-12-15', '2023-12-16'),
(13, 3, 'L\'Odyssée', 'Homère', 'Une épopée grecque antique d\'aventures.', 'odyssee.jpg', 'réservé', '2024-01-10', '2024-01-11'),
(14, 4, 'Les Misérables', 'Victor Hugo', 'L\'histoire d\'une quête de justice.', 'miserables.jpg', 'disponible', '2024-02-14', '2024-02-15'),
(15, 5, 'Les Trois Mousquetaires', 'Alexandre Dumas', 'Un roman d\'aventures et d\'amitié.', 'trois_mousquetaires.jpg', 'disponible', '2024-03-01', '2024-03-02'),
(16, 1, 'Les Fleurs du mal', 'Charles Baudelaire', 'Un recueil de poèmes célèbres.', 'fleurs_du_mal.jpg', 'emprunté', '2024-04-10', '2024-04-11'),
(17, 2, 'Madame Bovary', 'Gustave Flaubert', 'Une tragédie de la vie bourgeoise.', 'madame_bovary.jpg', 'disponible', '2024-05-15', '2024-05-16'),
(18, 3, 'Le Rouge et le Noir', 'Stendhal', 'Une histoire de passion et d\'ambition.', 'rouge_et_noir.jpg', 'réservé', '2024-06-20', '2024-06-21'),
(19, 4, 'Don Quichotte', 'Miguel de Cervantes', 'Les aventures d\'un noble idéaliste.', 'don_quichotte.jpg', 'disponible', '2024-07-01', '2024-07-02'),
(20, 5, 'La Condition humaine', 'André Malraux', 'Un roman sur la condition humaine et la révolution.', 'condition_humaine.jpg', 'disponible', '2024-08-10', '2024-08-11');

DROP TABLE IF EXISTS `user`;

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `login`, `email`, `password`, `nickname`) VALUES
('1', 'Solène', 'solene.baudic@test.com', '$2y$10$vjwQOh1CDEFoz1ScIBs/AeiAnKxp2lUmWYnAnWMjx5PnbYIhXWkTe', 'Solène Baudic'),
('2', 'Paul', 'paul.durand@test.com', '$2y$10$vjwQOh1CDEFoz1ScIBs/AeiAnKxp2lUmWYnAnWMjx5PnbYIhXWkTe', 'Paul Durand'),
('3', 'Marie', 'marie.leroux@test.com', '$2y$10$vjwQOh1CDEFoz1ScIBs/AeiAnKxp2lUmWYnAnWMjx5PnbYIhXWkTe', 'Marie Leroux'),
('4', 'Jean', 'jean.martin@test.com', '$2y$10$vjwQOh1CDEFoz1ScIBs/AeiAnKxp2lUmWYnAnWMjx5PnbYIhXWkTe', 'Jean Martin'),
('5', 'Claire', 'claire.benoit@test.com', '$2y$10$vjwQOh1CDEFoz1ScIBs/AeiAnKxp2lUmWYnAnWMjx5PnbYIhXWkTe', 'Claire Benoit');

ALTER TABLE `book`
  ADD CONSTRAINT `link_book_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
