<?php 

require_once __DIR__ . '/config/app.php';

spl_autoload_register(function (string $class) {
    $paths = [
        __DIR__ . '/helpers/' . $class . '.php',
        __DIR__ . '/controllers/' . $class . '.php',
        __DIR__ . '/middleware/' . $class . '.php',
    ];

    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});

function getJsonInput(): array 
{
    $raw = file_get_contents('php://input');
    $data = json_decode($raw, true);
    return is_array($data) ? $data : [];
}