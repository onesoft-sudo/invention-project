<?php

namespace App\Http\Controllers;

use App\Models\User;
use OSN\Framework\Attributes\GETRoute;
use OSN\Framework\Core\Controller;

class HomeController extends Controller
{
    #[GETRoute('/')]
    public function index()
    {
        return $this->render("home", [
            "model" => new User(),
        ]);
        //return response('', 200);
    }
}
