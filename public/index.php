<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tom
 * Date: 17/03/2018
 * Time: 14:02
 */

$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

switch ($request_uri[0]) {
    case '/':
        require 'controllers/index.php';
        $controller = new index;
        $controller->View();
        require 'views/index.php';
        break;
    default:
        header('HTTP/1.0 404 Not Found');
        require 'views/404.php';
        break;
}