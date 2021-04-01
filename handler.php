<?php

//require_once __DIR__ . '/vendor/autoload.php';
ini_set('allow_url_fopen',1);
switch (@parse_url($_SERVER['REQUEST_URI'])['path']) {
    case '/':
        require 'index.php';
        break;
    case '/index':
        require 'index.php';
        break;
    case '/index.php':
        require 'index.php';
        break;
    case '/login':
        require 'login.php';
        break;
     case '/login.php':
        require 'login.php';
        break;
    case '/clientes':
        require 'clientes.php';
        break;
     case '/clientes.php':
        require 'clientes.php';
        break;
    case '/clases/Clientes.php':
        require __DIR__.'/clases/Clientes.php';
        break;
    case '/clasesDAO/ClientesDAO.php':
        require __DIR__.'/clasesDAO/ClientesDAO.php';
        break;
    case '/clases/Usuario.php':
        require __DIR__.'/clases/Usuario.php';
        break;
    case '/clasesDAO/UsuarioDAO.php':
        require __DIR__.'/clasesDAO/UsuarioDAO.php';
        break;
    default:
        http_response_code(404);
        echo @parse_url($_SERVER['REQUEST_URI'])['path'];
        exit('Not Found');
}


?>