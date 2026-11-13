<?php

declare(strict_types=1);
namespace ProlificDev\Core;
final class Application
{
    public function __construct(
        private readonly AppConfig $config,
    )
    {}

    public function getConfig(): AppConfig
    {
        return $this->config;
    }

    public function run(): void
    {
        echo "Application is running: " . $this->config->getName();
    }
}