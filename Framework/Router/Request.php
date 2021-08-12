<?php

namespace Framework\Router;

class Request
{
    private string $method;
    private array $body;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function isPost(): bool
    {
        if ($this->method === "POST") {
            return true;
        }
        return false;
    }

    public function setBody(): void
    {
        if ($this->method === "GET") {
            $this->body = [];
        }
        if ($this->method === "POST") {
            foreach ($_POST as $key => $value) {
                $this->body[$key] = $value;
            }
        }
    }

    /**
     * @return array
     */
    public function getBody(): array
    {
        return $this->body;
    }
}
