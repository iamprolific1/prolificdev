<?php
declare(strict_types=1);

namespace ProlificDev\Core;
use RuntimeException;

final class Response
{
    public function __construct(
        private readonly string $content = '',
        private readonly int $statusCode = 200,
        private readonly array $headers = []
    ){}

    public function send(): void
    {
        if(headers_sent()) {
            throw new RuntimeException('Cannot send response: Headers already sent');
        }

        http_response_code($this->statusCode);
        foreach($this->headers as $name => $value) {
            header($name . ':' . $value);
        }
        echo $this->content;
    }

    public static function html(
        string $content,
        int $statusCode = 200
    ): self
    {
        return new self(
            content: $content,
            statusCode: $statusCode,
            headers: [
                'Content-Type'=> 'text/html; charset=UTF-8'
            ]
        );
    }

    public static function json(
        array $data,
        int $statusCode = 200
    ): self
    {
        return new self(
            content: json_encode($data, JSON_THROW_ON_ERROR),
            statusCode: $statusCode,
            headers: [
                'Content-Type' => 'application/json; charset=UTF-8'
            ]
        );
    }

    public static function redirect(
        string $url,
        int $statusCode = 302
    ): self
    {
        return new self(
            content: '',
            statusCode: $statusCode,
            headers: [
                'Location' => $url
            ]
        );
    }
}