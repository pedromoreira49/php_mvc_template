<?php

namespace config;

require __DIR__ . '/../vendor/autoload.php';

// Iniciar o autoloader
spl_autoload_register(function ($class) {
  $file = ROOT_PATH . '/core/' . $class . '.php';
  if (file_exists($file)) {
    require_once $file;
  }
});

// date_default_timezone_set('America/Sao_Paulo');

// Iniciar qualquer outra configuração necessária

ob_start();
session_start();
date_default_timezone_set('America/Sao_Paulo');

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

ob_end_flush();
