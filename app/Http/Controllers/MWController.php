<?php


namespace App\Http\Controllers;

use App\Http\Middlewares\AuthMiddleware;
use OSN\Framework\Core\Controller;
use OSN\Framework\Core\View;

class MWController extends Controller
{
    public function __construct()
    {
        $this->setMiddleware([AuthMiddleware::class]);
    }

    public function index(): View
    {
        return $this->render("mw-test");
    }

    public function login()
    {

    }
}
