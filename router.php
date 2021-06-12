<?php

$uri = $_SERVER['REQUEST_URI'];

if (preg_match('~^/assets~', $uri)) {
    return false;
}

if (preg_match('~^/favicon.ico$~', $uri)) {
    $p = 'assets/favicon.ico';
    $f = fopen($p, 'rb');
    header('Content-type: image/x-icon');
    echo fread($f, filesize($p));
    return;
}

spl_autoload_register(
    function ($className) {
        require_once(str_replace('Vos\\', 'src/', $className) . '.php');
    }
);

$vos = new \Vos\Vos;
if (preg_match('~^/get/~', $uri)) {
    $vos->json($uri);
    return;
}

$vos->html($uri);
