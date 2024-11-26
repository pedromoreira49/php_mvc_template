<?php

namespace database;

class Database
{
  public static function connect()
  {
    try {
      $pdo = new \PDO("pgsql:host=" . $_ENV['DB_HOST'] . ";port=" . $_ENV['DB_PORT'] . ";dbname=" . $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
      if ($pdo) {
        return $pdo;
      }
    } catch (\Exception $e) {
      error_log(date('d-m-Y H:i:s') . " = database connection = " . $e->getMessage() . "\n", 3, './logs/error.log');
      throw new \Exception("Erro ao conectar no banco de dados!");
    }
  }
}
