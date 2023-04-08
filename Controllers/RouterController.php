<?php

namespace Controllers;

use Routers\Router;

class RouterController
{
    private static $_instance;
    
    public static function getInstance(){
        if(self::$_instance instanceof self){
            return self::$_instance;
        }
        return self::$_instance = new self;
    }

    public function route(array $routers, array $requestParts)
    {
        $router = new Router($routers);
        $router->route($requestParts);
    }
}