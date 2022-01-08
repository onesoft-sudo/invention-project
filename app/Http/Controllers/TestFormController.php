<?php


namespace App\Http\Controllers;

use App\Http\Requests\StoreTestFormRequest;
use App\Models\User;
use Database\Factories\UserFactory;
use OSN\Framework\Core\Controller;
use OSN\Framework\Http\Headers;
use OSN\Framework\Http\Response;

class TestFormController extends Controller
{
    public function __construct()
    {
        $this->setLayout("test");
    }

    public function index()
    {
        return view("testform.power-test", ['e' => new \Exception('err msg', 403)]);
    }

    public function store(StoreTestFormRequest $request)
    {
        //dd(User::factory()->count(5)->make());
        return new Response("404 Not Found", 404, [
            'Content-Type' => 'text/plain'
        ]);
    }

    public function update()
    {
        return $this->render("testform-post", [
            "model" => ["update", \request()]
        ]);
    }

    public function delete()
    {
        return $this->render("testform-post", [
            "model" => ["delete", \request()]
        ]);
    }
}
