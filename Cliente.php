<?php

    Class Cliente{

        public $id;
        public $cpf;
        public $nome;
        public $telefone;

        function __construct($id, $cpf, $nome, $telefone){
            $this->id = $id;
            $this->cpf = $cpf;
            $this->nome = $nome;
            $this->telefone = $telefone;
        }
        
        function getId() {
            return $this->id;
        }
        function setId($id) {
            $this->id = $id;
        }
        function getNome() {
            return $this->nome;
        }
        function setNome($nome) {
            $this->nome = $nome;
        }
        function getCpf() {
            return $this->cpf;
        }
        function setCpf($cpf) {
            $this->cpf = $cpf;
        }
        function getTelefone() {
            return $this->telefone;
        }
        function setTelefone($telefone) {
            $this->telefone = $telefone;
        }




    }    

?>