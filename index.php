<?php

    define('APP_PATH', dirname(__FILE__) . "/");

    require 'vendor/autoload.php';

    require 'config.php';

    function processInput($uri){        
        $uri = implode('/', 
            array_slice(
                explode('/', $_SERVER['REQUEST_URI']), 2));

            return $uri;    
    }

    function processOutput($response){
        echo json_encode($response);    
    }

    function getPDOInstance(){
        try {
            return new PDO(sprintf('mysql:host=%s;dbname=%s;charset=utf8', DB_HOST, DB_NAME), DB_USERNAME, DB_PASSWORD);
        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }

    $router = new Phroute\Phroute\RouteCollector(new Phroute\Phroute\RouteParser);

    require 'routes.php';

    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

    try {

        $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], processInput($_SERVER['REQUEST_URI']));

    } catch (Phroute\Phroute\Exception\HttpRouteNotFoundException $e) {

        var_dump($e);      
        die();

    } catch (Phroute\Phroute\Exception\HttpMethodNotAllowedException $e) {

        var_dump($e);       
        die();

    }

    processOutput($response);