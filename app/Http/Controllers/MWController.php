<?php


namespace App\Http\Controllers;

use App\Http\Middleware\AuthMiddleware;
use OSN\Framework\Core\Controller;

class MWController extends Controller
{
    public function __construct()
    {
        $this->setMiddleware([AuthMiddleware::class]);
    }

    public function index()
    {
        return $this->render("mw-test");
    }

    public function login()
    {

    }
}
