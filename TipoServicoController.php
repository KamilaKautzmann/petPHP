<?php

    include_once 'TipoServico.php';
    include_once 'TipoServicoDAO.php';

    class TipoServicoController{

        public function listar($request, $response,$args){
            $dao = new TipoServicoDAO;    
            $array_tipoServico = $dao->listar();        
            
            $response = $response->withJson($array_tipoServico);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }
        public function buscarPorId($request, $response, $args){
            $id = (int) $args['id'];
            
            $dao = new TipoServicoDAO;    
            $tipoServico = $dao->buscarPorId($id);  
                
            $response = $response->withJson($tipoServico);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }
        public function inserir( $request, $response, $args){
            $var = $request->getParsedBody();
            $tipoServico = new TipoServico(0, $var['nomeServico'], $var['tipoatendimento'], $var['preco']);
        
            $dao = new TipoServicoDAO;    
            $tipoServico = $dao->inserir($tipoServico);
        
            $response = $response->withJson($tipoServico);
            $response = $response->withHeader('Content-type', 'application/json');    
            $response = $response->withStatus(201);
            return $response;
        }
        public function atualizar($request, $response, $args){
            $id = (int) $args['id'];
            $var = $request->getParsedBody();
            $tipoServico = new TipoServico($id, $var['nomeservico'], $var['tipoatendimento'], $var['preco']);
        
            $dao = new TipoServicoDAO;    
            $dao->atualizar($tipoServico);
        
            $response = $response->withJson($tipoServico);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;        
        }
        public function deletar($request, $response, $args){
            $id = (int) $args['id'];
            
            $dao = new TipoServicoDAO; 
            $tipoServico = $dao->buscarPorId($id);   
            $dao->deletar($id);
            
            $response = $response->withJson($tipoServico);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }
    }

?>