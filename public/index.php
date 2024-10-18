<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\NovedadController;

$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [AppController::class,'index']);

$router->get('/novedad', [NovedadController::class, 'index']);
$router->get('/API/novedad/buscar', [NovedadController::class, 'buscarAPI']);
$router->post('/API/novedad/guardar', [NovedadController::class, 'guardarAPI']);
$router->post('/API/novedad/modificar', [NovedadController::class, 'modificarAPI']);
$router->post('/API/novedad/eliminar', [NovedadController::class, 'eliminarAPI']);




$router->comprobarRutas();
