<?php
include_once 'VendaDAO.php';
include_once 'Venda.php';
include_once 'Pet.php';
include_once 'PetDAO.php';
include_once 'Cliente.php';
include_once 'ClienteDAO.php';
include_once 'TipoServicoDAO.php';
include_once 'TipoServico.php';

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
            $venda2 = new Venda(0, $var['dia'], $var['hora'], $var['cliente'], $var['servico'], $var['pet']);
        
            //gambiearra
            $daoCliente = new ClienteDAO;
            $daoPet = new PetDAO;
            $daptipoServico = new TipoServicoDAO;
            $ClienteOBJ = $daoCliente->buscarPorId($venda2->getcliente());
            $PetOBJ = $daoPet->buscarPorId($venda2->getpet());
            $tipoServOBJ = $daptipoServico->buscarPorId($venda2->getservico());
            $venda = new Venda(0,$venda2->getdia(),$venda2->gethora(),$ClienteOBJ,$tipoServOBJ,$PetOBJ);


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
            $venda2= new Venda($id, $var['dia'], $var['hora'], $var['cliente'], $var['servico'], $var['pet']);

             $daoCliente = new ClienteDAO;
             $ClienteOBJ = $daoCliente->buscarPorId($venda2->getcliente()->getId());

             $daptipoServico = new TipoServicoDAO;
             $tipoServOBJ = $daptipoServico->buscarPorId($venda2->getservico()->getId());

             $daoPet = new PetDAO;
             $PetOBJ = $daoPet->buscarPorId($venda2->getpet()->getId());

             $venda = new Venda($venda2->getId(),$venda2->getdia(),$venda2->gethora(),$ClienteOBJ,$tipoServOBJ,$PetOBJ);


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