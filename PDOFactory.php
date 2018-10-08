<?php

    class PDOFactory{ //classe que representa a conexão com o banco
 
        private static $pdo; //é statico para criar somente uma conexão
        
        public function getConexao(){

            if(!isset($pdo)){ //se o banco nao estiver ja conectado
                $pdo = new PDO("mysql:host=localhost;dbname=petservico","root", "");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		        $pdo->setAttribute(PDO::ATTR_STRINGIFY_FETCHES,false);
		        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            }
            return $pdo; //retorna conectado
            
        } //final da funcao de conexão




    } //final da classe



?>