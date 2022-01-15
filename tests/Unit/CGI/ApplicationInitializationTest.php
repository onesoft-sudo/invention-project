<?php

namespace Tests\Unit\CGI;

use OSN\Framework\Core\App;
use OSN\Framework\Testing\ChecksIfDevServerIsListening;
use Throwable;

class ApplicationInitializationTest extends TestCase
{
    use ChecksIfDevServerIsListening;

    public function testCoreApplicationCanBeInitialized()
    {
        $this->assertInstanceOf(App::class, self::$app);
    }
}
