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
    case '/javascript/chat.js':
        require __DIR__.'/javascript/chat.js';
        break;

    default:
        http_response_code(404);
        echo @parse_url($_SERVER['REQUEST_URI'])['path'];
        exit('Not Found');
}


?>
