<?php
declare(strict_types=1);

namespace ProlificDev\Core;

final class Request {
    public function __construct(
        private readonly string $method,
        private readonly string $path,
        private readonly array $queryParams = [],
        private readonly array $bodyParams = [],
        private readonly array $headers = []
    ){}

    /** Create a Request object from PHP's global variable */
    public static function fromGlobals(): self
    {
        $method = strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';
        
        // Remove trailing slash except for the root path
        if($path != '/') {
            $path = rtrim($path, '/');
        }

        $headers = [];
        // collect request headers
        if(function_exists('getallheaders')) {
            $headers = getallheaders() ?: [];
        }

        return new self(
            method: $method,
            path: $path,
            queryParams: $_GET,
            bodyParams: $_POST,
            headers: $headers
        );
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function query(string $key, mixed $default = null): mixed
    {
        return $this->queryParams[$key] ?? $default;
    }

    public function input(string $key, mixed $default = null): mixed
    {
        return $this->bodyParams[$key] ?? $default;
    }

    public function getHeader(string $name, mixed $default = null): mixed
    {
        foreach($this->headers as $header => $value) {
            if(strcasecmp($header, $name) === 0) {
                return $value;
            }
        }

        return $default;
    }

    public function allQuery(): array
    {
        return $this->queryParams;
    }

    public function allInput(): array
    {
        return $this->bodyParams;
    }

}