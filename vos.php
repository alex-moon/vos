<?php

spl_autoload_register(
    function ($className) {
        require_once(str_replace('Vos\\', 'src/', $className) . '.php');
    }
);

function usage($argv)
{
    echo "Usage: " . $argv[0] . " target measure value unit\n";
    echo "e.g. " . $argv[0] . " sun width 1 m\n";
    exit();
}

function formatTrace($trace)
{
    $result = [];
    foreach ($trace as $line) {
        $file = array_key_exists('file', $line) ? $line['file'] : '-';
        $line = array_key_exists('line', $line) ? $line['line'] : '-';
        $result[] = $file . ':' . $line;
    }
    return implode("\n", $result);
}

if ($argc < 5) {
    usage($argv);
}

$app = new \Vos\Vos;
try {
    $app->run($argv[1], $argv[2], $argv[3], $argv[4]);
} catch (\Vos\VosException $e) {
    echo "Error: " . $e->getMessage() . "\n" . formatTrace($e->getTrace()) . "\n";
    usage($argv);
}
