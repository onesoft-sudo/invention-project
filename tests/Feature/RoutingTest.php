<?php


namespace Tests\Feature;


use OSN\Framework\Facades\Router;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    /** @test */
    public function add_a_get_route()
    {
        $rand = rand();
        $prevCount = count(self::$app->router->routes());
        Router::get('/' . rand() . '/', function () {})->name('test_route' . $rand);
        $currentCount = count(self::$app->router->routes());
        $r = route('test_route' . $rand);

        $this->assertSame($currentCount, $prevCount + 1);
        $this->assertNotNull($r);
        $this->assertSame('test_route' . $rand, $r->name());
    }
}
