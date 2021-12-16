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

    public function store()
    {
        return response(null, 403, 'Forbidden');
    }

    public function update()
    {
        return $this->render("testform-post");
    }

    public function delete()
    {
        return $this->render("testform-post");
    }
}