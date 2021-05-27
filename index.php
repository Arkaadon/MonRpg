<?php

use Rpg\Controller\CombatController;
use Rpg\Controller\DefaultController;
use Rpg\Controller\VillageController;
use Rpg\Controller\MagasinController;
use Rpg\Router\Router;

include_once __DIR__ . '/vendor/autoload.php';

if(empty($_GET['p'])){
    header('Location: index.php?p=/');
}

//Le fichier index acceuillera l'instance de notre router et c'est ici qu'on définira toutes les routes accéssible
//Le router nous permettra aussi de renvoyer une erreur ou "Exception" lorsqu'une une route ou une méthode n'est pas
//disponible
$router = new Router($_GET['p']);
$defaultController = new DefaultController();
$villageController = new VillageController();
$combatController = new CombatController();
$magasinController = new MagasinController();
// Ici grace au méthodes get et post de notre router nous définissont toutes les routes de notre applications en fonction
// de leur méthodes HTTP ( GET ET POST ), tout en leur attribuant une fonction a éxécuter


$router->get('/', [$defaultController, 'homePage']);
$router->get('/village', [$villageController, 'index']);
$router->get('/fight', [$combatController, 'startFight']);
$router->get('/magasin', [$magasinController, 'magasin']);

$router->post('/',[$defaultController, 'createPerso']);


// On lance l'application via la méthode start du router
$router->start();












