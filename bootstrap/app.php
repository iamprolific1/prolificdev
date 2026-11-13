<?php

declare(strict_types=1);

use ProlificDev\Core\AppConfig;
use ProlificDev\Core\Application;
use Dotenv\Dotenv;

require_once dirname(__DIR__) . '/vendor/autoload.php';
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->safeLoad();

$appValues = require dirname(__DIR__) . '/config/app.php';

$appConfig = new AppConfig(
    name: $appValues['name'],
    env: $appValues['env'],
    debug: $appValues['debug'],
    url: $appValues['url'],
    key: $appValues['key'],
    sessionSecure: $appValues['session_secure'],
    sessionName: $appValues['session_name'],
    sessionLifetime: $appValues['session_lifetime'],
    timezone: $appValues['timezone']
);

// set application timezone
date_default_timezone_set($appConfig->getTimezone());

return new Application($appConfig);