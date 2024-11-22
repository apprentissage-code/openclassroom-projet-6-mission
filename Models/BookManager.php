<?php

class BookManager extends AbstractEntityManager
{
  public function getAllBooks(): array
  {
    $sql = "SELECT *
            FROM book
            ORDER BY date_creation asc";

    $result = $this->db->query($sql);
    $books = [];

    while ($data = $result->fetch()) {
      $book = new Book($data);
      $books[] = $book;
    }
    return $books;
  }
}
