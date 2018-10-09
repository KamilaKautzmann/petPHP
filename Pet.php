<?php

Class Pet{

    public $id;
    public $nomepet;
    public $tipoanimal;
    public $cliente;

    function __construct($id, $nomepet, $tipoanimal, $cliente){
        $this->id = $id;
        $this->nomepet = $nomepet;
        $this->tipoanimal = $tipoanimal;
        $this->cliente = $cliente;

    }

    function getId() {
        return $this->id;
    }
    function setId($id) {
        $this->id = $id;
    }
    function getNomepet() {
        return $this->nomepet;
    }
    function setNomepet($nomepet) {
        $this->nomepet = $nomepet;
    }
    function getTipoanimal() {
        return $this->tipoanimal;
    }
    function setTipoanimal($tipoanimal) {
        $this->tipoanimal = $tipoanimal;
    }
    function getCliente() {
        return $this->cliente;
    }
    function setCliente($cliente) {
        $this->cliente = $cliente;
    }



}


?>