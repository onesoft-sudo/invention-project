<?php


namespace App\Http\Controllers;

use App\Core\Controller;
use App\Core\Request;
use App\Core\Response;

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

    public function store(Request $request)
    {
        return 'done';
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