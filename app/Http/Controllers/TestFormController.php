<?php


namespace App\Http\Controllers;

use App\Http\Requests\StoreTestFormRequest;
use App\Models\User;
use Database\Factories\UserFactory;
use OSN\Framework\Core\Controller;

class TestFormController extends Controller
{
    public function __construct()
    {
        $this->setLayout("test");
    }

    public function index()
    {
        return $this->render("testform");
    }

    public function store(StoreTestFormRequest $request)
    {
        dd(User::factory()->count(5)->make());
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
