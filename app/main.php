<?php

include_once __DIR__ . '/functions.php';

@session_start();

$env = env_parser();

$conn = connect_to_db($env['DB_HOST'], $env['DB_USER'], $env['DB_PASS'], $env['DB_NAME']);

$uri = $_SERVER['REQUEST_URI'];
$uri = explode('/', $uri);

switch ($uri[1]){
    case '':
    case 'index':
    case 'home':
        require_once (base_dir('app/controllers/interface/home.php'));
        break;
    case 'admin':
        switch ($uri[2]){
            case 'profile':
                require_once (base_dir('app/controllers/admin/profile.php'));
                break;
            case 'projects':
                require_once (base_dir('app/controllers/admin/projects.php'));
                break;
            case (preg_match('/submit.*/m', $uri[2]) ? true : false):
            case 'submit':
            require_once (base_dir('app/controllers/admin/submit.php'));
            break;
            default:
                header('HTTP/1.0 404 Not Found');
                die('Page not found!');
        }
        break;
    default:
        header('HTTP/1.0 404 Not Found');
        die('Page not found!');
}

