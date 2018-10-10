<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

include_once 'ClienteController.php';
include_once 'PetController.php';
include_once 'TipoServicoController.php';
include_once 'VendaController.php';
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
    $this->get('','PetController:listar');//ok
    $this->post('','PetController:inserir'); //ok

    $this->get('/{id:[0-9]+}','PetController:buscarPorId');//ok
    $this->put('/{id:[0-9]+}','PetController:atualizar'); //ok
    $this->delete('/{id:[0-9]+}','PetController:deletar'); //ok
    
});

$app->group('/tiposervico', function(){
    $this->get('','TipoServicoController:listar'); //ok
    $this->post('','TipoServicoController:inserir'); //ok

    $this->get('/{id:[0-9]+}','TipoServicoController:buscarPorId');//ok
    $this->put('/{id:[0-9]+}','TipoServicoController:atualizar'); //ok
    $this->delete('/{id:[0-9]+}','TipoServicoController:deletar');//ok

});

$app->group('/venda', function(){
    $this->get('','VendaController:listar');//ok
    $this->post('','VendaController:inserir');//ok

    $this->get('/{id:[0-9]+}','VendaController:buscarPorId');//ok
    $this->put('/{id:[0-9]+}','VendaController:atualizar');//
    $this->delete('/{id:[0-9]+}','VendaController:deletar');
});


$app->run();
?>