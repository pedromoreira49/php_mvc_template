<?php

// Define a constante ROOT_PATH para facilitar o uso dos caminhos absolutos
define('ROOT_PATH', __DIR__);

use core\Application;

// Carrega o arquivo bootstrap.php, que irá configurar e iniciar a aplicação
require_once ROOT_PATH . '/config/bootstrap.php';

// Inicia a aplicação (o arquivo bootstrap.php carrega a classe Application)
$app = new Application();
$app->run();
