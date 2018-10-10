<?php

    include_once 'Pet.php';
    include_once 'PetDAO.php';
    include_once 'Cliente.php';
    include_once 'ClienteDAO.php';

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
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }
        public function inserir( $request, $response, $args){
            $var = $request->getParsedBody();
            $pet2 = new Pet(0, $var['nomepet'], $var['tipoanimal'], $var['cliente']);
            
            $daoCliente = new ClienteDAO;
            $clienteOBJ = $daoCliente->buscarPorId($pet2->getCliente());
           // nomepet, $tipoanimal, $cliente)
            $pet = new Pet(0,$pet2->getNomepet(),$pet2->getTipoanimal(),$clienteOBJ);
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
            $pet2= new Pet($id, $var['nomepet'], $var['tipoanimal'], $var['cliente']);
            
            $daoCliente = new ClienteDAO;
            $clienteOBJ = $daoCliente->buscarPorId($pet2->getCliente());
            $pet = new Pet($pet2->getId(),$pet2->getNomepet(),$pet2->getTipoanimal(),$clienteOBJ);
            
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