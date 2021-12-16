<?php

namespace App\Http\Controllers;

use App\Core\Controller;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        return $this->render("home", [
            "model" => new User(),
        ]);
    }
}