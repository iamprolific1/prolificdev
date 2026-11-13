<?php

declare(strict_types=1);

namespace ProlificDev\Core;

final class AppConfig
{

    public function __construct(
        private readonly string $name,
        private readonly string $env,
        private readonly bool $debug,
        private readonly string $url,
        private readonly string $key,
        private readonly bool $sessionSecure,
        private readonly string $sessionName,
        private readonly int $sessionLifetime,
        private readonly string $timezone,
    )
    {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getEnv(): string
    {
        return $this->env;
    }

    public function isDebug(): bool
    {
        return $this->debug;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function isSessionSecure(): bool
    {
        return $this->sessionSecure;
    }

    public function getSessionName(): string
    {
        return $this->sessionName;
    }

    public function getSessionLifetime(): int
    {
        return $this->sessionLifetime;
    }

    public function getTimezone(): string
    {
        return $this->timezone;
    }
}
