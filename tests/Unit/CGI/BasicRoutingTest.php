<?php

namespace Tests\Unit\CGI;

use OSN\Framework\Testing\HTTPRequests;
use PHPUnit\Framework\TestCase;

class BasicRoutingTest extends TestCase
{
    use HTTPRequests;

    public function testHomePageCanBeAccessed()
    {
        $data = $this->sendGET('/');
        $this->assertMatchesRegularExpression("/HTTP\/[0-9](.[0-9])? [1-3][0-9][0-9] (.*)/", $data);
    }

    public function testRestrictedPagesCanNotBeAccessed()
    {
        $data = $this->sendGET('/dashboard');
        $this->assertMatchesRegularExpression("/HTTP\/[0-9](.[0-9])? [3-5][0-9][0-9] (.*)/", $data);
    }

    public function testNonExistingPagesShouldReturn404NotFound()
    {
        $data = $this->sendGET('/' . rand() . '/' . rand());
        $this->assertMatchesRegularExpression("/HTTP\/[0-9](.[0-9])? 404 (.*)/", $data);
    }
}
