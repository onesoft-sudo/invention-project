<?php


namespace Tests\Feature;


use Tests\TestCase;

class LoginTest extends TestCase
{
    /** @test */
    public function users_can_access_login_page()
    {
        $this->get('/login');
        $this->assertStatus(200);
    }

    /** @test */
    public function wrong_login_should_be_rejected()
    {
        $d = $this->get('/login');
        $csrf = session()->get('__csrf_token');

        $data = $this->post('/login', [
            '__csrf_token' => $csrf,
            'username' => rand(),
            'password' => rand()
        ]);

        $this->assertSame(302, response()->getCode());
        $this->assertNotSame(false, session()->getFlash());
    }

    /** @test */
    public function login_validation_should_work()
    {
        $d = $this->get('/login');
        $csrf = session()->get('__csrf_token');

        $data = $this->post('/login', [
            '__csrf_token' => $csrf,
        ]);

        $this->assertSame(null, session()->get('uid'));
    }
}
