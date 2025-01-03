<?php

abstract class AbstractEntity
{
  protected int $id = -1;

  public function setId(int $id): void
  {
    $this->id = $id;
  }

  public function getId(): int
  {
    return $this->id;
  }
}
