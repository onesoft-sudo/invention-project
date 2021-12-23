<?php


namespace App\Http\Controllers;

use App\Http\Middlewares\AuthMiddleware;
use OSN\Framework\Core\Controller;
use OSN\Framework\Core\View;
use OSN\Framework\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->setMiddleware([AuthMiddleware::class]);
    }

    public function index(): View
    {
        return $this->render("dashboard", ["model" => Auth::user()]);
    }
}
