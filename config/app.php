<?php

declare(strict_types=1);

return [
    "name" => $_ENV['APP_NAME'] ?? 'ProlificDev',
    "env" => $_ENV['APP_ENV'] ?? 'local',
    "debug" => filter_var($_ENV['APP_DEBUG'] ?? false, FILTER_VALIDATE_BOOLEAN),
    "url" => rtrim($_ENV['APP_URL'] ?? 'http://localhost', '/'),
    "key" => $_ENV['APP_KEY'] ?? '',
    "session_name" => $_ENV['SESSION_NAME'] ?? 'prolificdev_session',
    "session_secure" => filter_var($_ENV['SESSION_SECURE'] ?? false, FILTER_VALIDATE_BOOLEAN),
    "session_lifetime" => (int) ($_ENV['SESSION_LIFETIME'] ?? 7200),
    "timezone" => $_ENV['APP_TIMEZONE'] ?? 'UTC',
];