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
       $query = "INSERT INTO user (name,last_name,age) VALUES (:name,:last_name,:age)";

       $statement = $pdo->prepare($query);

       $statement->execute([
            ':name' => $params["name"],
            ':last_name' => $params["lastName"],
            ':age' => $params["age"]
       ]);

        view([
            "sucess" => true         
            
        ]);
    }
}























