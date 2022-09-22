<?php

namespace App\FrameworkTools\Implementations\Route;

use App\FrameworkTools\ProcessServerElements;
use App\Controllers\HelloWorldController;
use App\Controllers\InsertDataController;

class RouteProcess
{

    public static function execute(){
        $processServerElements = ProcessServerElements::start();   

        $routeArray = [];

        //dd($processServerElements->getRoute());

        switch($processServerElements->getVerb()){
            
            case 'GET';

            switch($processServerElements->getRoute()){
                case '/hello-world';

                return (new HelloWorldController)->execute();
            break;
            }
            
            case 'POST';

            switch($processServerElements->getRoute()){
              /*  case '/rota-desafio';
                    return (new HelloWorldController)->execute();
                break;
*/
                case '/insert-data';
                    return (new InsertDataController)->exec();
                break;
            }


            
          
        }       

    }
}
