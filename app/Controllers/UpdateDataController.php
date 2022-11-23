<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

class UpdateDataController extends AbstractControllers{

    public function exec(){
        $userId;
        $missingAttribute;
        $response = [
            'success' => true
        ]; 

        try{ //captação
            $requestsVariables = $this->processServerElements->getVariables();
            //validação
            if((!$requestsVariables) || (sizeof($requestsVariables) === 0)){
                $missingAttribute = 'variableIsEmpty'; 
                throw new \Exception("You need to insert variables in url");
            }

            foreach($requestsVariables as $requestVariable){
                if($requestVariable['name'] === 'userId'){
                    $userId = $requestVariable['value'];
                }
            }

            if(!$userId){
                $missingAttribute = 'userIdIsNull';
                throw new \Exception("You need to inform userId variable");
            }

            $users = $this->pdo->query("SELECT * FROM user WHERE id_user = '{$userId}';")->fetchAll();
            //fetchall() - traz todo conteudo do select 

            if(sizeof($users) === 0){
                $missingAttribute = 'thisUserNoExist';
                throw new \Exception("There is not record of this user in db");
            }

            $params = $this->processServerElements->getInputJSONData();
                                                    // getInputJSONData()traz json da request
            if((!$params) || sizeof($params) === 0){
                $missingAttribute = 'paramsNotExist';
                throw new \Exception("You have to inform the params attr to update");
            }

            $updateStructureQuery = "";// estrutura da query que vai fazer update
             
            $toStatement = [];
            //validação
            foreach ($params as $key => $value) {
                if(!in_array($key,['name', 'last_name', 'age'])){
                    $missingAttribute = "KeyNotAcceptable";
                    throw new \Exception($key);
                }

                if ( $key === 'name' ){
                    $updateStructureQuery .="name = :name,"; //.= concatenar
                    $toStatement[':name'] = $value;
                }

                if ( $key === 'last_name' ){
                    $updateStructureQuery .="last_name = :last_name,";
                    $toStatement[':last_name'] = $value;
                }

                if ( $key === 'age' ){
                    $updateStructureQuery .="age = :age,";
                    $toStatement[':age'] = $value;

                }
            }


            $newStringElementsSQL = substr($updateStructureQuery,0,-1);

            $sql = "UPDATE
                        user
                    SET
                        {$newStringElementsSQL}
                    WHERE
                        id_user = {$userId}
                    ";


            $statement = $this->pdo->prepare($sql);

            $statement->execute($toStatement);

            
                               

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

