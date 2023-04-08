<?php

use Exceptions\RouteExceptions;

function autoloadClasses($class_name) {

    $class_name = str_replace('\\', '/', $class_name);

    if (!@include_once $class_name . '.php') {
        throw new RouteExceptions('Invalid class name - ' . $class_name);
    }
}

spl_autoload_register('autoloadClasses');
