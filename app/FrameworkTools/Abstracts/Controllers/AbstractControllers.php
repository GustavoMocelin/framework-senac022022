<?php

namespace App\FrameworkTools\Abstracts\Controllers;

use App\FrameworkTools\ProcessServerElements;

abstract class AbstractControllers {

    protected $processServerElements;

    public function __construct(){
        $typeOfAPI = env('TYPE_API');
        header("Content-Type: application/json");
        $this->processServerElements = ProcessServerElements::start();
    }
}



