#!/usr/local/bin/php
<?php

spl_autoload_register(
    function ($className) {
        require_once(str_replace('Vos\\', 'src/', $className) . '.php');
    }
);

function usage($argv)
{
    echo "Usage: " . $argv[0] . " target value unit\n";
    echo "e.g. " . $argv[0] . " sun 1 m\n";
    exit();
}

if ($argc < 4) {
    usage($argv);
}

$app = new \Vos\Vos;
try {
    $app->run($argv[1], $argv[2], $argv[3]);
} catch (\Vos\VosException $e) {
    echo "Error: " . $e->getMessage();
    usage($argv);
}
