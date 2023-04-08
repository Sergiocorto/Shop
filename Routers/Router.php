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
        $requestType = $requestParts['urlParts'][1];
        if (array_key_exists($modelName, $this->routes))
        {
            $controller = $this->routes[$modelName]['controller'];
            $model = $this->routes[$modelName]['model'];
            $repository = $this->routes[$modelName]['repository'];
            $method = $this->routes[$modelName]['actions'][$requestType];
            $data = $requestParts['body'] ?? $requestParts['params'];

           (new $controller(new $model(new $repository(new Db()))))->$method($data);
        } 
        else{
            print_r("404");
        }
    }
}