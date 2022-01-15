<?php


namespace Tests\Unit\CLI;


use OSN\Framework\Console\App;
use OSN\Framework\Testing\HTTPRequests;

class TestCase extends \PHPUnit\Framework\TestCase
{
    use HTTPRequests;

    protected bool $initializeApp = true;

    /**
     * @var App|null
     */
    public static ?App $app;
    protected $error = false;

    public function setUp(): void
    {
        parent::setUp();
        file_put_contents(__DIR__ . '/../../../var/test-lock', '');
        server('CLI', 'true');

        if ($this->initializeApp) {
            self::$app = new App(__DIR__ . '/../../..');
        }
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        self::$app = null;
        unlink(__DIR__ . '/../../../var/test-lock');
    }
}
