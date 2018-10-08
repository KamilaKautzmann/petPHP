<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

include_once 'ClienteController.php';
include_once 'PetController.php';
require './vendor/autoload.php';

$app = new \Slim\App;

$app->group('/cliente', function(){
    $this->get('','ClienteController:listar');
    $this->post('','ClienteController:inserir');

    $this->get('/{id:[0-9]+}','ClienteController:buscar');
    $this->put('/{id:[0-9]+}','ClienteController:atualizar');
    $this->delete('/{id:[0-9]+}','ClienteController:deletar');
    
});

$app->group('/pet', function(){
    $this->get('','PetController:listar');
    $this->post('','PetController:inserir');

    $this->get('/{id:[0-9]+}','PetController:buscar');
    $this->put('/{id:[0-9]+}','PetController:atualizar');
    $this->delete('/{id:[0-9]+}','PetController:deletar');
    
});



$app->run();
?>