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


    private function isJSON()
    {
        if ($_SERVER['HTTP_CONTENT_TYPE'] === "application/json") {
            return true;
        }
        return false;
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
        if ($this->method === "POST" && !empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $this->body[$key] = $value;
            }
        }
        if ($this->isJSON()) {
            $json = file_get_contents('php://input');
            $this->body = json_decode($json, true);
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
