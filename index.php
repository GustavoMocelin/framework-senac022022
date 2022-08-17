<?php

$mainPosition = __DIR__;//posição diretorio/repositorio

require_once("{$mainPosition}\helper\helper.php");
require_once("{$mainPosition}\\vendor\autoload.php"); //sistema inclusão classe

use Bootstrap\Env;
use App\FrameworkTools\ProcessServerElements;
use App\FrameworkTools\Implementations\FactoryMethods\FactoryProcessServerElement;

Env::execute(); //executa cod class env

$factoryProcessServerElement = new FactoryProcessServerElement();
$factoryProcessServerElement->operation();