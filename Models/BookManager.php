<?php

class BookManager extends AbstractEntityManager
{
  public function getBooks(string $searchQuery = '', string $limit = null): array
  {
    $params = [];
    $sql = $this->getBaseSelectQuery();

    if (!empty($searchQuery)) {
      $sql .= " WHERE book.title LIKE :searchQuery";
      $params = ['searchQuery' => $searchQuery];
    }

    $sql .= " ORDER BY date_creation DESC";

    if ($limit !== null) {
      $sql .= " LIMIT " . intval($limit);
    }

    return $this->getBookData($sql, $params);
  }

  public function getBook(int $id): ?Book
  {
    $sql = $this->getBaseSelectQuery();
    $sql .= " WHERE book.id = :id";

    $params = ['id' => $id];
    $books = $this->getBookData($sql, $params);

    return !empty($books) ? $books[0] : null;
  }

  public function addBook(Book $book): void
  {
    $sql = "INSERT INTO
              book
              (user_id, title, author, description, picture, status, date_creation, date_update)
            VALUES
              (:user_id, :title, :author, :description, :picture, :status, :date_creation, :date_update)
            ";
    $params = [
      'title' => $book->getTitle(),
      'author' => $book->getAuthor(),
      'description' => $book->getDescription(),
      'picture' => $book->getImage(),
      'status' => $book->getStatus(),
      'user_id' => $book->getIdUser(),
      'date_creation' => $book->getDateCreation()->format('Y-m-d H:i:s'),
      'date_update' => $book->getDateUpdate()->format('Y-m-d H:i:s'),
    ];

    $this->db->query($sql, $params);
  }

  public function updateBook(Book $book): void
  {
    $sql = "UPDATE book
            SET
              title = :title,
              author = :author,
              description = :description,
              picture = :picture,
              status = :status
            WHERE
              id = :id";

    $params = [
      'title' => $book->getTitle(),
      'author' => $book->getAuthor(),
      'description' => $book->getDescription(),
      'picture' => $book->getImage(),
      'status' => $book->getStatus(),
      'id' => $book->getId()
    ];

    $this->db->query($sql, $params);
  }

  public function deleteBook(Book $book): void
  {
    $sql = "DELETE FROM book WHERE id = :id";
    $this->db->query($sql, ["id" => $book->getId()]);
  }

  private function getBaseSelectQuery(): string
  {
    return "SELECT
                  book.*,
                  user.login AS name,
                  user.email,
                  user.password,
                  user.nickname
                FROM book
                LEFT JOIN user ON user.id = book.user_id";
  }

  private function getBookData(string $sql, array $params = []): array
  {
    $result = $this->db->query($sql, $params);
    $books = [];

    while ($data = $result->fetch()) {
      $book = new Book($data);
      if (!empty($data['name'])) {
        $user = $this->createUserFromData($data);
        $book->setUser($user);
      }
      $books[] = $book;
    }
    return $books;
  }

  private function createUserFromData(array $data): User
  {
    return new User([
      'login' => $data['name'],
      'id' => $data['user_id'],
      'email' => $data['email'],
      'password' => $data['password'],
      'nickname' => $data['nickname'],
    ]);
  }
}
