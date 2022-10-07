<?php

$mainPosition = __DIR__;//posição diretorio/repositorio

error_reporting(E_ERROR | E_PARSE);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

require_once("{$mainPosition}\helper\helper.php");
require_once("{$mainPosition}\\vendor\autoload.php"); //sistema inclusão classe

use Bootstrap\Env;
use App\FrameworkTools\ProcessServerElements;
use App\FrameworkTools\Implementations\FactoryMethods\FactoryProcessServerElement;
use App\FrameworkTools\Implementations\Route\RouteProcess; 

Env::execute(); //executa cod class env

$factoryProcessServerElement = new FactoryProcessServerElement();
$factoryProcessServerElement->operation();

RouteProcess::execute();