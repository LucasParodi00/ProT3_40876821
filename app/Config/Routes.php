<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/quienesSomos', 'QuienesSomos::vista');
$routes->get('/acercaDe', 'AcercaDe::vista');

$routes->group('', ['filter' => 'auth'], function ($routes){
    $routes->get('/listaUsuarios', 'Usuario_controller::index');
    $routes->get('/actualizar/(:num)', 'Usuario_controller::editar/$1');
    $routes->post('/actualizar/(:num)', 'Usuario_controller::actualizarUsuario/$1');
    $routes->delete('/eliminar/(:num)', 'Usuario_controller::eliminarUsuario/$1');
});

$routes->get('/registro', 'Usuario_controller::nuevo');
$routes->post('/registro', 'Usuario_controller::cargarUsuario');

$routes->get('/login', 'Registro::vistaLogin');
$routes->post('/login', 'Login_controller::login');
$routes->get('/logout', 'Login_controller::logout');
