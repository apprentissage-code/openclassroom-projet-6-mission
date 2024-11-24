<?php

class BookManager extends AbstractEntityManager
{
  public function getBooks(string $limit = null): array
  {
    $sql = "SELECT *
            FROM book
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
      $books[] = $book;
    }

    return $books;
  }

  public function getBook(int $id): ?Book
  {
    $sql = "SELECT * FROM book WHERE id = :id";
    $result = $this->db->query($sql, ['id' => $id]);
    $book = $result->fetch();
    if ($book) {
      return new Book($book);
    }
    return null;
  }
}
