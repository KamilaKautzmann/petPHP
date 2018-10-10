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

function getId() {
    return $this->id;
}
function setId($id) {
    $this->id = $id;
}

function getdia() {
    return $this->dia;
}
function setdia($dia) {
    $this->dia = $dia;
}

function gethora() {
    return $this->hora;
}
function sethora($hora) {
    $this->hora = $hora;
}

function getcliente() {
    return $this->cliente;
}
function setcliente($cliente) {
    $this->cliente = $cliente;
}

function getservico() {
    return $this->servico;
}
function setservico($servico) {
    $this->servico = $servico;
}

function getpet() {
    return $this->pet;
}
function setpet($pet) {
    $this->pet = $pet;
}
}



?>