<?php

include_once 'Cliente.php';
include_once 'PDOFactory.php';

    class ClienteDAO{

        public function inserir(Cliente $cliente){
            $queryInserir = "INSERT INTO cliente (cpf, nome, telefone) VALUES (:cpf, :nome, :telefone)";
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($queryInserir);
            $comando->bindParam(":cpf",$cliente->cpf);
            $comando->bindParam(":nome",$cliente->nome);
            $comando->bindParam(":telefone",$cliente->telefone);
            $comando->execute();
            $cliente->id = $pdo->lastInsertId();
            return $cliente;
       }

       public function deletar($id){
            $queryDeletar = "DELETE from cliente WHERE id=:id";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($queryDeletar);
            $comando->bindParam(":id",$id);
            $comando->execute();
        }

        public function atualizar(Cliente $cliente){
            $queryAtualizar = "UPDATE cliente SET cpf=:cpf, nome=:nome, telefone=:telefone WHERE id=:id";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($queryAtualizar);
            $comando->bindParam("cpf", $cliente->cpf);
            $comando->bindParam(":nome",$cliente->nome);
            $comando->bindParam(":telefone",$cliente->telefone);
            $comando->bindParam(":id",$cliente->id);
            $comando->execute();        
        }

        public function listar(){
		    $queryListar = 'SELECT * FROM cliente';
    		$pdo = PDOFactory::getConexao();
	    	$comando = $pdo->prepare($queryListar);
    		$comando->execute();
            $cliente=array();	
		    while($row = $comando->fetch(PDO::FETCH_OBJ)){
                $cliente[] = new Cliente($row->id,$row->cpf,$row->nome,$row->telefone);
            }
            return $cliente;
        }

        public function buscarPorId($id){
 		    $queryBuscaId = 'SELECT * FROM cliente WHERE id=:id';		
            $pdo = PDOFactory::getConexao(); 
		    $comando = $pdo->prepare($queryBuscaId);
		    $comando->bindParam ('id', $id);
		    $comando->execute();
		    $result = $comando->fetch(PDO::FETCH_OBJ);
		    return new Cliente($result->id,$result->cpf,$result->nome,$result->telefone);           
        }






    }

?>