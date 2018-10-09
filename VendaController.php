<?php

include_once 'VendaDAO.php';
include_once 'Venda.php';

    class VendaController{


        //ok
        public function listar($request, $response,$args){
            $dao = new VendaDAO;    
            $array_venda = $dao->listar();        
            
            $response = $response->withJson($array_venda);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        //Ok
        public function buscarPorId($request, $response,$args){
            $id = (int) $args['id'];
            $dao = new VendaDAO;    
            $venda = $dao->buscarPorId($id);        
            $response = $response->withJson($venda);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        //ok
        public function inserir( $request, $response, $args){
            $var = $request->getParsedBody();
            $venda = new Venda(0, $var['dia'], $var['hora'], $var['cliente'], $var['servico'], $var['pet']);
        
            $dao = new VendaDAO;    
            $venda = $dao->inserir($venda);
        
            $response = $response->withJson($venda);
            $response = $response->withHeader('Content-type', 'application/json');    
            $response = $response->withStatus(201);
            return $response;
        }

        //ok
        public function atualizar($request, $response, $args){
            $id = (int) $args['id'];
            $var = $request->getParsedBody();
            $venda= new Pet($id, $var['dia'], $var['hora'], $var['cliente'], $var['servico'], $var['pet']);
            $dao = new VendaDAO;    
            $dao->atualizar($venda);
            $response = $response->withJson($venda);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;        
        }
        
        //ok
        public function deletar($request, $response, $args){
            $id = (int) $args['id'];
            $dao = new VendaDAO;    
            $venda = $dao->buscarPorId($id);   
            $dao->deletar($id);
            $response = $response->withJson($venda);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }
    }

?>