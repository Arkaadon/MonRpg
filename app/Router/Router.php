<?php


namespace Rpg\Router;

/**
 * Dans notre Router on définit 2 propriétés, la premiére contiendra la valeur de "p" passer en $_GET ce sera
 * "l'url", notre deuxiéme propriété sera un tableau contenant l'ensemble de nos objets route crée a l'aide des méthodes
 * get et post de notre router.
 */
class Router
{

    private $routes = [];
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Permet d'ajouter un objet Route dans le tableau des methodes "GET"
     */
    public function get($path, $callable){
        $route = new Route($path, $callable);
        $this->routes['GET'][] = $route;
    }

    /**
     * Permet d'ajouter un objet Route dans le tableau des methodes "POST"
     */
    public function post($path, $callable){
        $route = new Route($path, $callable);
        $this->routes['POST'][] = $route;
    }

    public function start()
    {
        // Si la méthode http utilisé n'éxiste pas dans le tableau alors tu jette une Exception
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            throw new RouterException("La méthode http utilisé n'est pas reconnu");
        }
        $routes = $this->routes[$_SERVER['REQUEST_METHOD']] ; // On récupére tous les objets route en fonctione de la méthode HTTP utilisé
        foreach ($routes as $route){
            if($route->match($this->url)){
                return $route->call();
            }
        }

        // Si la route n'éxiste pas alors tu jette une exception
        throw new RouterException("Cette url n'existe pas");
    }
}
