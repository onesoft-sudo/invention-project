<?php

namespace Tests\Unit\CLI;

use OSN\Framework\Console\App;
use OSN\Framework\Testing\ChecksIfDevServerIsListening;
use Throwable;

class ApplicationInitializationTest extends TestCase
{
    public function testConsoleApplicationCanBeInitialized()
    {
        self::$app = new App(__DIR__ . '/../../..');
        $this->assertInstanceOf(App::class, self::$app);
    }
}
