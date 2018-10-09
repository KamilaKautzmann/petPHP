<?php

include_once 'TipoServico.php';
include_once 'PDOFactory.php';

    class TipoServicoDAO{

        public function inserir(TipoServico $tiposervico){
            $queryInserir = "INSERT INTO tiposervico(nomeservico,tipoatendimento,preco) VALUES(:nomepet, :tipoatendimento, :preco)";
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($queryInserir);
            $comando->bindParam(":nomeservico", $tiposervico->nomeservico);
            $comando->bindParam("tipoatendimento", $tiposervico->tipoatendimento);
            $comando->bindParam("preco", $tiposervico->preco);
            $comando->execute();
            $tiposervico->id = $pdo->lastInserirID();
            return $tiposervico;
       }

       public function deletar($id){
            $queryDeletar = "DELETE from tiposervico WHERE id=:id";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($queryDeletar);
            $comando->bindParam(":id",$id);
            $comando->execute();
        }

        public function atualizar(Tiposervico $tiposervico){
            $queryAtualizar = "UPDATE tiposervico SET nomeservico=:nomeservico, tipoatendimento=:tipoatendimento, preco=:preco WHERE id=:id";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($queryAtualizar);
            $comando->bindParam("nomeservico", $tiposervico->nomeservico);
            $comando->bindParam(":tipoatendimento",$tiposervico->tipoatendimento);
            $comando->bindParam(":preco",$tiposervico->preco);
            $comando->bindParam(":id",$tiposervico->id);
            $comando->execute();        
        }

        public function listar(){
		    $queryListar = 'SELECT * FROM tiposervico';
    		$pdo = PDOFactory::getConexao();
	    	$comando = $pdo->prepare($queryListar);
    		$comando->execute();
            $tiposervico=array();	
		    while($row = $comando->fetch(PDO::FETCH_OBJ)){
                $tiposervico[] = new Pet($row->id,$row->nomeservico,$row->tipoatendimento,$row->preco);
            }
            return $tiposervico;
        }

        public function buscarPorId($id){
 		    $queryBuscaId = 'SELECT * FROM tiposervico WHERE id=:id';		
            $pdo = PDOFactory::getConexao(); 
		    $comando = $pdo->prepare($queryBuscaId);
		    $comando->bindParam ('id', $id);
		    $comando->execute();
		    $result = $comando->fetch(PDO::FETCH_OBJ);
		    return new Tiposervico($row->id,$row->nomeservico,$row->tipoatendimento,$row->preco);           
        }






    }

?>