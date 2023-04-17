<?php
namespace Routers;

use Helpers\GenerateQueryStringHelper;
use Interfaces\RouterInterface;
use Models\Db;
use Repositories\Repository;

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
            $tableName = $this->routes[$modelName]['tableName'];
            $method = $this->routes[$modelName]['actions'][$action]['method'];
            $data = $requestParts['body'] ?? $requestParts['params'];

           (new $controller(new $model(new $repository(new Repository(new Db(), new GenerateQueryStringHelper(), $tableName)))))->$method($data);
        } else {
            print_r('404');
        }
    }
}