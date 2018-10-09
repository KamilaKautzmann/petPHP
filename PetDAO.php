<?php

include_once 'Pet.php';
include_once 'PDOFactory.php';
include_once 'Cliente.php';

    class PetDAO{

        public function inserir(Pet $pet){
            $queryInserir = "INSERT INTO pet(nomepet,tipoanimal,cliente) VALUES(:nomepet, :tipoanimal, :cliente)";
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($queryInserir);
            $comando->bindParam(":nomepet", $pet->nomepet);
            $comando->bindParam("tipoanimal", $pet->tipoanimal);
            $comando->bindParam("cliente", $pet->cliente);
            $comando->execute();
            $pet->id = $pdo->lastInserirID();
            return $pet;
       }

       public function deletar($id){
            $queryDeletar = "DELETE from pet WHERE id=:id";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($queryDeletar);
            $comando->bindParam(":id",$id);
            $comando->execute();
        }

        public function atualizar(Pet $pet){
            $queryAtualizar = "UPDATE pet SET nomepet=:nomepet, tipoanimal=:tipoanimal, cliente=:cliente WHERE id=:id";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($queryAtualizar);
            $comando->bindParam("nomepet", $pet->nomepet);
            $comando->bindParam(":tipoanimal",$pet->tipoanimal);
            $comando->bindParam(":cliente",$pet->cliente);
            $comando->bindParam(":id",$pet->id);
            $comando->execute();        
        }

        public function listar(){
            /*$queryListar = 'SELECT * FROM pet INNER JOIN cliente WHERE pet.id = cliente.id';
    		$pdo = PDOFactory::getConexao();
	    	$comando = $pdo->prepare($queryListar);
    		$comando->execute();
            $pet=array();    
	        while($row = $comando->fetch(PDO::FETCH_OBJ)){
                $dao = new ClienteDAO;    
                $clienteOb = $dao->buscarPorId($row->cliente); 
                $pet[] = new Pet($row->id,$row->nomepet,$row->tipoanimal,$clienteOb);
            }

            return $pet;*/
            $queryListar = 'SELECT * FROM pet';
    		$pdo = PDOFactory::getConexao();
	    	$comando = $pdo->prepare($queryListar);
    		$comando->execute();
            $pet=array();	
		    while($row = $comando->fetch(PDO::FETCH_OBJ)){
                $dao = new ClienteDAO;    
                $clienteObj = $dao->buscarPorId($row->cliente); 
                $pet[] = new Pet($row->id,$row->nomepet,$row->tipoanimal,$clienteObj);
            }
            return $pet;
        }

        public function buscarPorId($id){
 		   /* $queryBuscaId = 'SELECT * FROM produtos WHERE id=:id';		
            $pdo = PDOFactory::getConexao(); 
		    $comando = $pdo->prepare($queryBuscaId);
		    $comando->bindParam ('id', $id);
		    $comando->execute();
            $result = $comando->fetch(PDO::FETCH_OBJ);
            $dao = new ClienteDAO;    
            $clienteOb = $dao->buscarPorId($row->cliente); 
            return new Pet($row->id,$row->nomepet,$row->tipoanimal,$clienteOb);*/
          
               $queryBuscaId = 'SELECT * FROM pet WHERE id=:id';		
               $pdo = PDOFactory::getConexao(); 
               $comando = $pdo->prepare($queryBuscaId);
               $comando->bindParam ('id', $id);
               $comando->execute();
               $result = $comando->fetch(PDO::FETCH_OBJ);
               $dao = new ClienteDAO;    
               $clienteObj = $dao->buscarPorId($row->cliente); 
               return new Pet($row->id,$row->nomepet,$row->tipoanimal,$clienteObj);                      
        }






    }

?>