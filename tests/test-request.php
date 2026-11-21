<?php
declare(strict_types=1);
require dirname(__DIR__) . '/vendor/autoload.php';

use ProlificDev\Core\Request;

$request = new Request(
    method: 'GET',
    path: '/dashboard',
    queryParams: [
        'tab' => 'analytics',
        'page' => 2
    ]
);

echo $request->getMethod() . PHP_EOL;
echo $request->getPath() . PHP_EOL;
echo $request->query('tab') . PHP_EOL;
echo $request->query('page') . PHP_EOL;