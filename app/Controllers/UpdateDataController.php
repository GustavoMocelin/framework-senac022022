<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

class UpdateDataController extends AbstractControllers{

    public function exec(){
        $missingAttribute;
        $response = [
            'success' => true
        ]; 

        try{
            $requestsVariables = $this->processServerElements->getVariables();

            if((!$requestsVariables) || (sizeof($requestsVariables) === 0)){
                $missingAttribute = 'userIdNull'; 
                throw new \Exception("You need to insert variables in url");
            }

            foreach($requestsVariables as $requestVariable){
                if($requestVariable['name'] === 'userId'){
                    $userId = $requestVariable['value'];
                }
            }

            if(!$userId){
                $missingAttribute = 'userIdNull';
                throw new \Exception("You need to inform userId variable");
            }

            $users = $this->pdo->query("SELECT * FROM user WHERE id_user = '{$userId}';")->fetchAll();

           // dd($users);

            if(sizeof($users) === 0){
                $missingAttribute = 'thisUserNoExist';
                throw new \Exception("There is not record of this user in db");
            }

        }catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
                'missingAttribute' => $missingAttribute
            ];
        }

        view($response);

        

      
        
        //view(['test' => 'direct from controller']);
    }
}







