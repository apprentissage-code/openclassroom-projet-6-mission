<?php

class Utils
{
  public static function request(string $variableName, mixed $defaultValue = null): mixed
  {
    return $_REQUEST[$variableName] ?? $defaultValue;
  }

  public static function askConfirmation(string $message): string
  {
    return "onclick=\"return confirm('$message');\"";
  }
}
