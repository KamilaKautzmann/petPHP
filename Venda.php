<?php

    class Venda{
        public $id;
        public $dia;
        public $hora;
        public $cliente;
        public $servico;
        public $pet;
       
        function __construct($id,$dia,$hora,$cliente,$servico,$pet){
            $this->id = $id;
            $this->dia = $dia;
            $this->hora = $hora;
            $this->cliente = $cliente;
            $this->servico = $servico;
            $this->pet = $pet;

        }
    }



?>