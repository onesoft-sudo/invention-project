<?php


namespace App\Http\Controllers;

use App\Http\Requests\StoreTestFormRequest;
use App\Models\User;
use Database\Factories\UserFactory;
use OSN\Framework\Core\App;
use OSN\Framework\Core\Config;
use OSN\Framework\Core\Controller;
use OSN\Framework\Http\Request;
use OSN\Framework\Http\Response;

class TestFormController extends Controller
{
    public function __construct()
    {
        $this->setLayout("layouts.main");
    }

    public function index()
    {
//        return view("testform", [
//            "data" => User::find(7)
//        ]);
        //$config = new Config();
        dd(config('layout'));
    }

    public function store(StoreTestFormRequest $request)
    {
        //dd(User::factory()->count(5)->make());
        return new Response("404 Not Found", 404, [
            'Content-Type' => 'text/plain'
        ]);
    }

    public function update(Request $request)
    {
        dd($request);
        return response('Created', 201);
    }

    public function delete()
    {
        return $this->render("testform-post", [
            "model" => ["delete", \request()]
        ]);
    }
}
