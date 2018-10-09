<?php

 class TipoServico{
    
    public $id;
    public $nomeservico;
    public $tipoatendimento;
    public $preco;

    function __construct($id, $nomeservico, $tipoatendimento, $preco){
        $this->id = $id;
        $this->nomeservico = $nomeservico;
        $this->tipoatendimento = $tipoatendimento;
        $this->preco = $preco;
    }

    function getId() {
        return $this->id;
    }
    function setId($id) {
        $this->id = $id;
    }
    function getNomeservico() {
        return $this->servico;
    }
    function setServico($servico) {
        $this->servico = $servico;
    }
    function getTipoatendimento() {
        return $this->tipoatendimento;
    }
    function setTipoatendimento($tipoatendimento) {
        $this->tipoatendimento = $tipoatendimento;
    }
    function getPreco() {
        return $this->preco;
    }
    function setPreco($preco) {
        $this->preco = $preco;
    }

 } 

?>