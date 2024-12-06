<?php

class BookManager extends AbstractEntityManager
{
  public function getBooks(string $searchQuery = '', string $limit = null): array
  {
    $sql = "SELECT
              book.*,
              user.login AS name,
              user.email,
              user.password,
              user.nickname
            FROM book
            LEFT JOIN user ON user.id = book.user_id";

    if (!empty($searchQuery)) {
      $sql .= " WHERE book.title LIKE :searchQuery";
    }

    $sql .= " ORDER BY date_creation ASC";

    if ($limit !== null) {
      $sql .= " LIMIT " . intval($limit);
    }

    if (!empty($searchQuery)) {
      $result = $this->db->query($sql, ['searchQuery' => $searchQuery]);
    } else {
      $result = $this->db->query($sql);
    }

    $books = [];

    while ($data = $result->fetch()) {
      $book = new Book($data);

      if (!empty($data['name'])) {
        $user = new User([
          'login' => $data['name'],
          'id' => $data['user_id'],
          'email' => $data['email'],
          'password' => $data['password'],
          'nickname' => $data['nickname'],
        ]);
        $book->setUser($user);
      }

      $books[] = $book;
    }

    return $books;
  }

  public function getBook(int $id): ?Book
  {
    $sql = "SELECT
              book.*,
              user.login AS name,
              user.email,
              user.password,
              user.nickname
            FROM book
            LEFT JOIN user ON user.id = book.user_id
            WHERE book.id = :id";
    $result = $this->db->query($sql, ['id' => $id]);
    $data = $result->fetch();

    if ($data) {
      $book = new Book($data);
      if (!empty($data['name'])) {
        $user = new User([
          'login' => $data['name'],
          'id' => $data['user_id'],
          'email' => $data['email'],
          'password' => $data['password'],
          'nickname' => $data['nickname'],
        ]);
        $book->setUser($user);
      }
    }
    return $book;
  }

  public function addBook($title, $author, $description, $picture): void
  {
    $sql = "INSERT INTO
              book
              (user_id, title, author, description, picture, status, date_creation, date_update)
            VALUES
              (:user_id, :title, :author, :description, :picture, :status, NOW(), NOW())
            ";
    $this->db->query($sql, [
      'user_id' => 1,
      'title' => $title,
      'author' => $author,
      'description' => $description,
      'picture' => $picture,
      'status' => "disponible"
    ]);
  }

  public function updateBook(Book $book): void
  {
    $sql = "UPDATE book
            SET
              title = :title,
              author = :author,
              description = :description,
              picture = :picture,
              status = :status,
            WHERE
              id = :id";


    $this->db->query($sql, [
      'title' => $book->getTitle(),
      'author' => $book->getAuthor(),
      'description' => $book->getDescription(),
      'picture' => $book->getImage(),
      'status' => $book->getStatus(),
      'id' => $book->getId()
    ]);
  }

  public function deleteBook(Book $book): void
  {
    $sql = "DELETE FROM book WHERE id = :id";
    $this->db->query($sql, ["id" => $book->getId()]);
  }
}
