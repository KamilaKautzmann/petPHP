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



}


?>