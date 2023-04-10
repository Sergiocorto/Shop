<?php
namespace Routers;

use Interfaces\RouterInterface;
use Models\Db;

class Router implements RouterInterface
{
    private $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function route($requestParts)
    {
        $modelName = $requestParts['urlParts'][0];
        $action = $requestParts['urlParts'][1];
        if (array_key_exists($modelName, $this->routes))
        {
            $requestMethod = $this->routes[$modelName]['actions'][$action]['requestMethod'] ;
            
            if($requestMethod != $_SERVER['REQUEST_METHOD'])
            {
                throw new \Exception('Invalid request method');
            }
            
            $controller = $this->routes[$modelName]['controller'];
            $model = $this->routes[$modelName]['model'];
            $repository = $this->routes[$modelName]['repository'];
            $method = $this->routes[$modelName]['actions'][$action]['method'];
            $data = $requestParts['body'] ?? $requestParts['params'];

           (new $controller(new $model(new $repository(new Db()))))->$method($data);
        } 
        print_r("404");
    }
}