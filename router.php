<?php
require_once 'libs/Router.php';
require_once 'controllers/APIController.php';
require_once 'controllers/EjercicioAPIController.php';
require_once 'controllers/ZonaAPIController.php';

//instancio el router
$router = new Router();

//tabla de ruteo de ejercicios
$router->addRoute('ejercicio', 'GET', 'EjercicioAPIController', 'get');
$router->addRoute('ejercicio/:ID', 'GET', 'EjercicioAPIController', 'get');
$router->addRoute('ejercicio/:sort/:order', 'GET', 'EjercicioAPIController', 'get');
$router->addRoute('ejercicio', 'POST', 'EjercicioAPIController', 'addEjercicio');
$router->addRoute('ejercicio/:ID', 'PUT', 'EjercicioAPIController', 'updateEjercicio');
$router->addRoute('ejercicio/:ID', 'DELETE', 'EjercicioAPIController', 'deleteEjercicio');

//tabla de ruteo de zonas
$router->addRoute('zona', 'GET', 'ZonaAPIController', 'get');
$router->addRoute('zona/:ID', 'GET', 'ZonaAPIController', 'get');
$router->addRoute('zona', 'POST', 'ZonaAPIController', 'addZona');
$router->addRoute('zona/:ID', 'PUT', 'ZonaAPIController', 'updateEjercicio');
$router->addRoute('zona/:ID', 'DELETE', 'ZonaAPIController', 'deleteEjercicio');


//ruteo
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);