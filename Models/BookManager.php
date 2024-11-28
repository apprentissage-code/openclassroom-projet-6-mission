<?php

class BookManager extends AbstractEntityManager
{
  public function getBooks(string $limit = null): array
  {
    $sql = "SELECT
              book.*,
              user.login AS name,
              user.email,
              user.password,
              user.nickname
            FROM book
            LEFT JOIN user ON user.id = book.user_id
            ORDER BY date_creation ASC";

    if ($limit !== null) {
      $sql .= " LIMIT " . intval($limit);
      $result = $this->db->query($sql);
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
}
