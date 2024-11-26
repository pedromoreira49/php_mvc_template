<?php

namespace core;

class Application
{

  private $controller;

  private function setApp()
  {
    $loadName = 'src\controllers\\';
    $url = explode('/', @$_GET['url']);
    if ($url[0] == '') {
      $loadName .= 'Home';
    } else {
      $loadName .= ucfirst(strtolower($url[0]));
    }

    $loadName .= 'Controller';

    $controllerFile = 'src/controllers/' . ucfirst(strtolower($url[0])) . 'Controller.php';

    if (file_exists($controllerFile)) {
      $view = 'src\views\\' . ucfirst($url[0]) . 'View';
      $model = 'src\models\\' . ucfirst($url[0]) . 'Model';
      $this->controller = new $loadName(new $view, new $model);
    } else {
      include('src/views/templates/404.php');
      error_log(date('d-m-Y H:i:s') . "- File does not exists - " . $controllerFile . "\n", 3, './logs/error.log');
      exit();
    }
  }

  public function run()
  {
    $this->setApp();
    $this->controller->index();
  }
}
