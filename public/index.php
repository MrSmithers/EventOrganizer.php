<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tom
 * Date: 17/03/2018
 * Time: 14:02
 */

$requestUri = explode('?', $_SERVER['REQUEST_URI'], 2);

// Routes.
switch ($requestUri[0]) {
    case '/':
        require 'controllers/index.php';
        $controller = new index;
        $controller->View();
        require $_SERVER['DOCUMENT_ROOT'] . '/views/layout.php';
        break;
    case '/login':
        require 'controllers/Users/login.php';
        $controller = new login;
        _checkPost($controller, $requestUri);
        require $_SERVER['DOCUMENT_ROOT'] . '/views/layout.php';
        break;
    case '/logout':
        require 'controllers/Users/logout.php';
        $controller = new logout;
        $controller->View();
        require $_SERVER['DOCUMENT_ROOT'] . '/views/layout.php';
        break;
    case '/sign-up':
        require 'controllers/Users/register.php';
        $controller = new register;
        _checkPost($controller, $requestUri);
        require $_SERVER['DOCUMENT_ROOT'] . '/views/layout.php';
        break;
        break;
    case '/events':
        require 'controllers/Events/listing.php';
        $controller = new listing;
        $controller->View();
        require $_SERVER['DOCUMENT_ROOT'] . '/views/layout.php';
        break;
    case '/events/create':
        require 'controllers/Events/create.php';
        $controller = new create;
        _checkPost($controller, $requestUri);
        require $_SERVER['DOCUMENT_ROOT'] . '/views/layout.php';
        break;
    case '/events/edit':
        require 'controllers/Events/edit.php';
        $controller = new edit;
        _checkPost($controller, $requestUri);
        require $_SERVER['DOCUMENT_ROOT'] . '/views/layout.php';
        break;
    case '/events/delete':
        require 'controllers/Events/delete.php';
        $controller = new delete;
        $controller->View();
        require $_SERVER['DOCUMENT_ROOT'] . '/views/layout.php';
        break;
    case '/events/delete/confirm':
        require 'controllers/Events/delete.php';
        $controller = new delete;
        $controller->Confirm();
        break;
    case (preg_match('/\/events\/view\/.*/', $requestUri[0]) ? true : false):
        require 'controllers/Events/landing.php';
        $controller = new landing;
        $controller->View($requestUri[0]);
        require $_SERVER['DOCUMENT_ROOT'] . '/views/layout.php';
        break;
    case (preg_match('/\/profile\/.*/', $requestUri[0]) ? true : false):
        require 'controllers/Users/profile.php';
        $controller = new profile;
        $controller->View($requestUri[0]);
        require $_SERVER['DOCUMENT_ROOT'] . '/views/layout.php';
        break;
    case '/api/events':
        require 'controllers/Events/listing.php';
        $controller = new listing;
        $controller->Export();
        require $_SERVER['DOCUMENT_ROOT'] . '/views/export.php';
        break;
    case (preg_match('/\/api\/events\/.*/', $requestUri[0]) ? true : false):
        require 'controllers/Events/landing.php';
        $controller = new landing;
        $controller->Export($requestUri[0]);
        require $_SERVER['DOCUMENT_ROOT'] . '/views/export.php';
        break;
    default:
        _404();
        break;
}

function _404() {
    header('HTTP/1.0 404 Not Found');
    require 'views/404.php';
    exit;
}

function _checkPost($controller, $requestUri) {
    if ($_SERVER["REQUEST_METHOD"] == 'GET') {
        $controller->View($requestUri[0]);
    } elseif ($_SERVER["REQUEST_METHOD"] == 'POST' && !empty($_POST)) {
        $controller->Post();
    } else {
        _404();
    }
}