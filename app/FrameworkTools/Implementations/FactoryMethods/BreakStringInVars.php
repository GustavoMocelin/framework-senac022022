<?php

namespace App\FrameworkTools\Implementations\FactoryMethods;

trait BreakStringInVars{

    public function breakStringInVars($requestUri){
        explode($requestUri, "?");


        if(!isset($urlAndVars[1]) ){
            return;
        }

        $stringWithVars = $urlAndVars[1];

        $stringWithVars = explode("&", $stringWithVars);

        $varsOfUrl = array_map(function($element){
            return explode("=",$element);
        },$arrayWithVars);

        DD("LSKCKD");
    }

}








