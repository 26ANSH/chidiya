<?php

//require_once _DIR_ . '/vendor/autoload.php';
ini_set('allow_url_fopen',1);
switch (@parse_url($_SERVER['REQUEST_URI'])['path'])
{
   case '/':
      require 'index.php';
      break;
    case '/javascript/chat.js':
        require _DIR_.'/javascript/chat.js';
        break;
    case '/javascript/group-chat.js':
        require _DIR_.'/javascript/group-chat.js';
        break;
    case '/javascript/groups.js':
        require _DIR_.'/javascript/groups.js';
        break;
    case '/javascript/login.js':
        require _DIR_.'/javascript/login.js';
        break;
    case '/javascript/pass-show-hide.js':
        require _DIR_.'/javascript/pass-show-hide.js';
        break;
    case '/javascript/signup.js':
        require _DIR_.'/javascript/signup.js';
        break;
    case '/javascript/users.js':
        require _DIR_.'/javascript/users.js';
        break;
    case 'php/images/default.png':
        require _DIR_.'php/images/default.png';
        break;
    case '/php/config.php':
        require _DIR_.'/php/config.php';
        break;
    case '/php/data.php':
        require _DIR_.'/php/data.php';
        break;
    case '/php/gcp.php':
        require _DIR_.'/php/gcp.php';
        break;
    case '/php/get-chat.php':
        require _DIR_.'/php/get-chat.php';
        break;
    case '/php/insert-chat.php':
        require _DIR_.'/php/insert-chat.php';
        break;
    case '/php/login.php':
        require _DIR_.'/php/login.php';
        break;
    case '/php/logout.php':
        require _DIR_.'/php/logout.php';
        break;
    case '/php/search.php':
        require _DIR_.'/php/search.php';
        break;
    case '/php/signup.php':
        require _DIR_.'/php/signup.php';
        break;
    case '/php/users.php':
        require _DIR_.'/php/users.php';
        break;
    case '/php/group_data.php':
        require _DIR_.'/php/group_data.php';
        break;
    case '/php/group-get-chat.php':
        require _DIR_.'/php/group-get-chat.php';
        break;
    case '/php/group-insert-chat.php':
        require _DIR_.'/php/group-insert-chat.php';
        break;
    case '/php/group.php':
        require _DIR_.'/php/group.php';
        break;
    case '/php/joingrp.php':
        require _DIR_.'/php/joingrp.php';
        break;
    case '/php/makegroup.php':
        require _DIR_.'/php/makegroup.php';
        break;
    case '/php/theme.php':
        require _DIR_.'/php/theme.php';
        break;
    case '/php/usergrp.php':
        require _DIR_.'/php/usergrp.php';
        break;
    case '/chat.php':
        require 'chat.php';
        break;
    case '/chatapp.sql':
        require 'chatapp.sql';
        break;
    case '/handler.php':
        require 'handler.php';
        break;
    case '/header.php':
        require 'header.php';
        break;
    case '/index.php':
        require 'index.php';
        break;
    case '/login.php':
        require 'login.php';
        break;
    case '/signup.php':
        require 'signup.php';
        break;
    case '/style.css':
        require 'style.css';
        break;
    case '/users.php':
        require 'users.php';
        break;
    case '/group.php':
        require 'users.php';
        break;

    default:
        http_response_code(404);
        echo @parse_url($_SERVER['REQUEST_URI'])['path'];
        exit('Not Found');
}


?>
