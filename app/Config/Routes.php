<?php

use App\Controllers\ContatoController;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\EventoController;

/**
 * @var RouteCollection $routes
 */


$routes->get('/', [EventoController::class, 'index'], ['as' => 'eventos.index']); 
$routes->get('eventos/show/(:num)', [EventoController::class, 'showEvent'], ['as' => 'eventos.show']);
$routes->get('eventos/create', [EventoController::class, 'createForm'], ['as' => 'eventos.create']); 
$routes->post('eventos/store', [EventoController::class, 'insertEvent'], ['as' => 'eventos.store']); 
$routes->get('eventos/edit/(:num)', [EventoController::class, 'editForm'], ['as' => 'eventos.edit']); 
$routes->post('eventos/update/(:num)', [EventoController::class, 'updateEvent'], ['as' => 'eventos.update']); 
$routes->post('eventos/delete/(:num)', [EventoController::class, 'deleteEvent'], ['as' => 'eventos.delete']); 


$routes->get('/contatos',[ContatoController::class,'index'],['as' => 'contatos.index']);
$routes->get('/contato/(:num)',[ContatoController::class,'showContact'],['as' => 'contatos.showContact']);
$routes->get('/contatos/create',[ContatoController::class,'contactForm'],['as' => 'contatatos.create']);
$routes->post('/contatos/insert',[ContatoController::class,'insertContact'],['as' => 'contatos.insert']);
$routes->post('/contatos/delete/(:num)',[ContatoController::class,'deleteContact'],['as' => 'contatos.delete']);
