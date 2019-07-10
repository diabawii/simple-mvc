<?php
namespace App\Core;
class Router {

    public $routes = [
        "GET" => [],
        "POST" => [],
    ];


    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }

    public function direct($uri, $requestType)
    {
        if(! array_key_exists($uri, $this->routes[$requestType]))
        {
            throw new \Exception("$uri is not defined route.");
        }
        
        // var_dump(explode('->', $this->routes[$requestType][$uri]));

        return $this->callAction(
            ...explode('->', $this->routes[$requestType][$uri])
        );
    }

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function callAction($controller, $method)
    {
        $controller = "App\\Controllers\\$controller";
        $controller = new $controller;
        // die(var_dump($controller));

        if(! method_exists($controller, $method))
        {
            throw new \Exception("No defined $method in {$controller} Controller");
            
        }
        
        return $controller->$method();
    }

}