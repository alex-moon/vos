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

function respond($data, $success = true, $status = 200) {
    header('Content-Type: application/json');
    http_response_code($status);
    echo json_encode([
        'status' => $success,
        'data' => $data,
    ]);
}

spl_autoload_register(
    function ($className) {
        require_once(str_replace('Vos\\', 'src/', $className) . '.php');
    }
);

$tokens = explode('/', $uri);

if (count($tokens) < 4) {
    respond(['error' => 'Usage: /[object]/[value]/[unit] - e.g. /sun/1/m'], false, 400);
} else {
    $vos = new Vos\Vos;
    try {
        respond($vos->get($tokens[1], $tokens[2], $tokens[3]));
    } catch (\Vos\VosException $e) {
        respond(['error' => $e->getMessage()], false, 500);
    }
}
