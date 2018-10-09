<?php

    include_once 'Cliente.php';
    include_once 'ClienteDAO.php';

    class ClienteController{

        public function listar($request, $response,$args){
            $dao = new ClienteDAO;    
            $array_cliente = $dao->listar();        
            
            $response = $response->withJson($array_cliente);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function buscarPorId($request, $response, $args){
            $id = (int) $args['id'];
            
            $dao = new ClienteDAO;    
            $cliente = $dao->buscarPorId($id);  
                
            $response = $response->withJson($cliente);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function inserir( $request, $response, $args){
            $var = $request->getParsedBody();
            $cliente = new Cliente(0, $var['cpf'], $var['nome'], $var['telefone']);
        
            $dao = new ClienteDAO;    
            $cliente = $dao->inserir($cliente);
        
            $response = $response->withJson($cliente);
            $response = $response->withHeader('Content-type', 'application/json');    
            $response = $response->withStatus(201);
            return $response;
        }
        public function atualizar($request, $response, $args){
            $id = (int) $args['id'];
            $var = $request->getParsedBody();
            $cliente= new Cliente($id, $var['cpf'], $var['nome'], $var['telefone']);
        
            $dao = new ClienteDAO;    
            $dao->atualizar($cliente);
        
            $response = $response->withJson($cliente);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;        
        }
        public function deletar($request, $response, $args){
            $id = (int) $args['id'];
            
            $dao = new ClienteDAO; 
            $cliente = $dao->buscarPorId($id);   
            $dao->deletar($id);
            
            $response = $response->withJson($cliente);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }
    }

?>