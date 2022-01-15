<?php

namespace App\Http\Controllers;

use App\Models\User;
use OSN\Framework\Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return $this->render("home", [
            "model" => new User(),
        ]);
        //return response('', 200);
    }
}
