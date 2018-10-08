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
        



    }    

?>