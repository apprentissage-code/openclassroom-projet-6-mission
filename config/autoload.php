<?php

spl_autoload_register(function($className) {
  // On va voir dans le dossier Service si la classe existe.
  if (file_exists('Services/' . $className . '.php')) {
      require_once 'Services/' . $className . '.php';
  }

  // On va voir dans le dossier Model si la classe existe.
  if (file_exists('Models/' . $className . '.php')) {
      require_once 'Models/' . $className . '.php';
  }

  // On va voir dans le dossier Controller si la classe existe.
  if (file_exists('Controllers/' . $className . '.php')) {
      require_once 'Controllers/' . $className . '.php';
  }

  // On va voir dans le dossier View si la classe existe.
  if (file_exists('Views/' . $className . '.php')) {
      require_once 'Views/' . $className . '.php';
  }

});
