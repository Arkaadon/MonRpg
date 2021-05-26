<?php


namespace Rpg\Router;


class Route
{

    private $callable;
    private $path;

    public function __construct($path, $callable)
    {
        $this->path = $path;
        $this->callable = $callable;
    }

    /**
     * Vérifier si le paramétre url correspond a $path
     */
    public function match($url){
        //$url = trim($url,'/');
        if($url === $this->path){
            return true;
        }
        return false;
    }

    public function call()
    {
        return call_user_func($this->callable);
    }

}
