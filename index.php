<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

include_once 'ClienteController.php';
include_once 'PetController.php';
include_once 'TipoServicoController.php';
require './vendor/autoload.php';

$app = new \Slim\App;

$app->group('/cliente', function(){
    $this->get('','ClienteController:listar'); //ok
    $this->post('','ClienteController:inserir'); //201 //ok

    $this->get('/{id:[0-9]+}','ClienteController:buscarPorId');//ok
    $this->put('/{id:[0-9]+}','ClienteController:atualizar'); //ok
    $this->delete('/{id:[0-9]+}','ClienteController:deletar'); //ok
    
});

$app->group('/pet', function(){
    $this->get('','PetController:listar');
    $this->post('','PetController:inserir');

    $this->get('/{id:[0-9]+}','PetController:buscarPorId');
    $this->put('/{id:[0-9]+}','PetController:atualizar');
    $this->delete('/{id:[0-9]+}','PetController:deletar');
    
});

$app->group('/tiposervico', function(){
    $this->get('','TipoServicoController:listar');
    $this->post('','TipoServicoController:inserir');

    $this->get('/{id:[0-9]+}','TipoServicoController:buscarPorId');
    $this->put('/{id:[0-9]+}','TipoServicoController:atualizar');
    $this->delete('/{id:[0-9]+}','TipoServicoController:deletar');
    
});


$app->run();
?>