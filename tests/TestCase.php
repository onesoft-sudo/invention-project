<?php


namespace Tests;


use OSN\Framework\Core\App;
use OSN\Framework\Testing\HTTPRequests;

class TestCase extends \PHPUnit\Framework\TestCase
{
    use HTTPRequests;

    protected static $response_body = '';
    protected bool $initializeApp = true;

    /**
     * @var App|null
     */
    public static ?App $app;
    protected $error = false;

    protected function setUp(): void
    {
        parent::setUp();
        server('CLI', 'false');

        if ($this->initializeApp) {
            $CGI = true;
            self::$app = require(__DIR__ . "/../boot/app.php");
        }
    }

    public function assertStatus(int $status)
    {
        $this->assertSame($status, self::$app->response->getCode());
    }

    public function assertStatusText(int $statusText)
    {
        $this->assertSame($statusText, self::$app->response->getStatusText());
    }

    public function assertResponseNotEmpty()
    {
        $this->assertNotEquals('', self::$response_body);
    }
}
