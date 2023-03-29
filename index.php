<?php

error_reporting(E_ALL);

require_once 'autoloader.php';

use controllers\RouteController;
use exceptions\RouteExceptions;

try {
    RouteController::getInstance()->route();
} catch (RouteExceptions $e){
    exit ($e->getMessage());
}