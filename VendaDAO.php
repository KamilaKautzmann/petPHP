<?php

include_once 'PetDAO.php';
include_once 'Pet.php';
include_once 'PDOFactory.php';
include_once 'Cliente.php';
include_once 'ClienteDAO.php';
include_once 'Venda.php';
include_once 'TipoServicoDAO.php';
include_once 'TipoServico.php';

    class VendaDAO{


    //ok
    public function inserir(Venda $venda){
        $queryInserir = "INSERT INTO venda(dia,hora,cliente,pet,servico)  VALUES(:dia,:hora,:cliente,:pet,:servico)";
        $pdo = PDOFactory::getConexao();
        $comando = $pdo->prepare($queryInserir);
        $comando->bindParam(":dia", $venda->dia);
        $comando->bindParam(":hora", $venda->hora);
        $comando->bindParam(":cliente", $venda->cliente->getId());
        $comando->bindParam(":pet", $venda->pet->getId());
        $comando->bindParam(":servico", $venda->servico->getId());
        $comando->execute();
        $venda->id = $pdo->lastInsertId();
        return $venda;    
    }

    //ok
    public function deletar($id){
        $queryDeletar = "DELETE from venda WHERE id=:id";            
        $pdo = PDOFactory::getConexao();
        $comando = $pdo->prepare($queryDeletar);
        $comando->bindParam(":id",$id);
        $comando->execute();
    }

    //ok
    public function atualizar(Venda $venda){
        //UPDATE `venda` SET `id`=[value-1],`dia`=[value-2],`hora`=[value-3],`cliente`=[value-4],`pet`=[value-5],`servico`=[value-6] WHERE 1
        $queryAtualizar = "UPDATE venda SET dia=:dia, hora=:hora, cliente=:cliente, pet=:pet,servico=:servico WHERE id=:id";            
        $pdo = PDOFactory::getConexao();
        $comando->bindParam(":dia", $venda->dia);
        $comando->bindParam("hora", $venda->hora);
        $comando->bindParam("cliente", $venda->cliente->getId());
        $comando->bindParam("pet", $venda->pet->getId());
        $comando->bindParam("servico", $venda->servico->getId());
        $comando->bindParam(":id",$venda->id);
        $comando->execute();        
    }

    //OK
    public function listar(){
        $queryListar = 'SELECT * FROM venda';
        $pdo = PDOFactory::getConexao();
        $comando = $pdo->prepare($queryListar);
        $comando->execute();
        $venda=array();	
        while($row = $comando->fetch(PDO::FETCH_OBJ)){
            //cliente
            $daoCliente = new ClienteDAO;    
            $clienteObj = $daoCliente->buscarPorId($row->cliente); 
            //pet
            $daoPet = new PetDAO;
            $petObj = $daoPet->buscarPorId($row->pet);
            //servico
            $daoServico = new TipoServicoDAO;
            $servicoOBJ = $daoServico->buscarPorId($row->servico);
            $venda[] = new Venda($row->id,$row->dia,$row->hora,$clienteObj,$petObj,$servicoOBJ);
        }
        return $venda;
    }

    //OK
    public function buscarPorId($id){
      
           $queryBuscaId = 'SELECT * FROM venda WHERE id=:id';		
           $pdo = PDOFactory::getConexao(); 
           $comando = $pdo->prepare($queryBuscaId);
           $comando->bindParam ('id', $id);
           $comando->execute();
           $result = $comando->fetch(PDO::FETCH_OBJ);
           //cliente
           $daoCliente = new ClienteDAO;    
           $clienteObj = $daoCliente->buscarPorId($result->cliente); 
           //pet
           $daoPet = new PetDAO;
           $petObj = $daoPet->buscarPorId($result->pet);
           //servico
           $daoServico = new TipoServicoDAO;
           $servicoOBJ = $daoServico->buscarPorId($result->servico);
           return new Venda($result->id,$result->dia,$result->hora,$clienteObj,$petObj,$servicoOBJ);         
    }
}//fim classe





?>