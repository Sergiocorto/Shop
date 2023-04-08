<?php

error_reporting(E_ALL);

require_once 'autoloader.php';
require_once 'routes.php';

use Controllers\RouterController;
use Exceptions\RouteExceptions;
use Helpers\RequestParsingHelper;




try {
    $requestParts = RequestParsingHelper::getRequestParts();
    RouterController::getInstance()->route($routes, $requestParts);
} catch (RouteExceptions $e){
    exit ($e->getMessage());
}