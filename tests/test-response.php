<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use ProlificDev\Core\Response;

$response = Response::html(
    '<h1>Hello from ProlificDev</h1>'
);

$response->send();