<?php

abstract class AbstractEnityManager {
  protected $db;

  public function __construct()
  {
    $this->db = DBManager::getInstance();
  }
}
