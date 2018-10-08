<?php

    include_once 'Pet.php';
    include_once 'PetDAO.php';

    class PetController{

        public function listar($request, $response,$args){
            $dao = new PetDAO;    
            $array_pet = $dao->listar();        
            
            $response = $response->withJson($array_pet);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }
        public function buscarPorId($request, $response, $args){
            $id = (int) $args['id'];
            
            $dao = new PetDAO;    
            $pet = $dao->buscarPorId($id);  
                
            $response = $response->withJson($pet);
            $response = $response->wit-hHeader('Content-type', 'application/json');    
            return $response;
        }
        public function inserir( $request, $response, $args){
            $var = $request->getParsedBody();
            $pet = new Pet(0, $var['nomepet'], $var['tipoanimal'], $var['cliente']);
        
            $dao = new PetDAO;    
            $pet = $dao->inserir($pet);
        
            $response = $response->withJson($pet);
            $response = $response->withHeader('Content-type', 'application/json');    
            $response = $response->withStatus(201);
            return $response;
        }
        public function atualizar($request, $response, $args){
            $id = (int) $args['id'];
            $var = $request->getParsedBody();
            $pet= new Pet($id, $var['nomepet'], $var['tipoanimal'], $var['cliente']);
        
            $dao = new PetDAO;    
            $dao->atualizar($pet);
        
            $response = $response->withJson($pet);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;        
        }
        public function deletar($request, $response, $args){
            $id = (int) $args['id'];
            
            $dao = new PetDAO; 
            $pet = $dao->buscarPorId($id);   
            $dao->deletar($id);
            
            $response = $response->withJson($pet);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }
    }

?>