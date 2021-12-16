<?php


namespace App\Core;


class Response
{
    protected ?string $response;
    protected string $statusText;
    protected int $code;

    public function __construct(?string $response = null, int $code = 200, string $statusText = '')
    {
        $this->response = $response;
        $this->code = $code;
        $this->statusText = $statusText;
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getContent(): string
    {
        return $this->response === null ? '' : $this->response;
    }

    public function getStatusText(): string
    {
        return $this->statusText;
    }

    protected function initData()
    {
        $this->setStatus($this->code . " " . $this->statusText);
    }

    public function __toString()
    {
        $this->initData();
        return $this->getContent();
    }

    public function __invoke(): string
    {
        $this->initData();
        return $this->getContent();
    }

    public function setCode(int $code = 200)
    {
        http_response_code($code);
    }

    public function redirect($url, int $code = 301)
    {
        $this->setCode($code);
        header("Location: $url");
    }

    public function setStatus(string $status)
    {
        header("HTTP/1.1 $status");
    }
}