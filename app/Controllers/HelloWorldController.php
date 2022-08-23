<?php


namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;


    class HelloWorldController extends AbstractControllers{
        
        public function execute(){
            $requestsVariables = $this->processServerElements->getVariables();
            $valueOfVariable = null;

            foreach($requestsVariables as $value){
                if($value["name"] == "info"){
                    $valueOfVariable = $value["value"];
                }
            }

            view([
                "name" => "Api to Learning",
                "version" => 1.0,
                "value_of_variable_info" => $valueOfVariable,
                "manager_developer" => "Gustavo Mocelin Procopio",
                "web_site_company" => "https://gmp.com"     
            ]);
        }
    }




