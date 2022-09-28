<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;
use App\FrameworkTools\Database\DatabaseConnection;

class InsertDataController extends AbstractControllers{

    public function exec (){
       
        $pdo = DatabaseConnection::start()->getPDO();
        //dd($pdo); 
        $params = $this->processServerElements->getInputJSONData();
       // dd($params);
       $response = ['success'=>true];
       $attrName;

       try{
       if(!$params['name'] ){
            $attrName = 'name';
            throw new \Exception('Digite o nome');
        }

        if(!$params['last_name'] ){
            $attrName = 'last_name';
            throw new \Exception('Digite o ultimo nome');
        }

        if(!$params['age'] ){
            $attrName = 'age';
            throw new \Exception('Digite a idade');
        }


       $query = "INSERT INTO user (name,last_name,age) VALUES (:name,:last_name,:age)";

       $statement = $pdo->prepare($query);

       $statement->execute([
            ':name' => $params["name"],
            ':last_name' => $params["lastName"],
            ':age' => $params["age"]
       ]);

    }catch(\Exception $e){
        $response = [
            'success' => false,
            'message' => $e->getMessage(),
            'missingAtribute' => $attrName
        ];
    }


        view($response);
    }
}























