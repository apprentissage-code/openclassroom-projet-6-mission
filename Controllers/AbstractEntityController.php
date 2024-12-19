<?php

abstract class AbstractEntityController
{
  public function getCurrentUser(): ?User
  {
    if (isset($_SESSION['user'])) {
      return $_SESSION['user'];
    }

    return null;
  }
}
