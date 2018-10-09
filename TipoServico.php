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

 } 

?>