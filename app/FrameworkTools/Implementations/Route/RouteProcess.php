<?php

namespace App\FrameworkTools\Implementations\Route;

use App\FrameworkTools\ProcessServerElements;
use App\Controllers\HelloWorldController;
use App\Controllers\InsertDataController;
use APP\Controllers\InsertDataControllerPost;


class RouteProcess{

    public static function execute(){

        $processServerElements = ProcessServerElements::start();
        $routeArray = [];

        switch ($processServerElements->getVerb()){

            case 'GET':

                switch($processServerElements->getRoute()){
                    //dd([$processServerElements->getVerb()]);

                    case '/hello-world':
                        return (new HelloWorldController)->execute();
                    break;
                }
            break;    

            case 'POST':

                switch($processServerElements->getRoute()){
                        //dd([$processServerElements->getVerb()]);
    
                    case '/insert-data':
                        return (new InsertDataController )->exec();
                    break;

                    case '/carinsert':
                        return (new InsertDataControllerPost)->exec();
                    break;               
                    

                }
            break;   
            }

        //dd([$getRoutes]);
    }

}